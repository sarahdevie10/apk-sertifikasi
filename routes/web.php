
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;
use App\Models\Peserta;
use App\Models\Skema;

// Halaman pembuka
Route::get('/', function () {
    return view('landing');
})->name('home');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Dashboard Admin dan CRUD
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        $jumlahPeserta = Peserta::count();
        $jumlahSkema = Skema::count();

        return view('dashboard', compact(
            'jumlahPeserta',
            'jumlahSkema'
        ));
    })->name('dashboard');

    Route::resource('skema', SkemaController::class);

    Route::resource('peserta', PesertaController::class)
        ->parameters(['peserta' => 'peserta']);
});

// Dashboard User
Route::get('/user/dashboard', function () {
    $userId = auth()->id();

    $pesertas = Peserta::with('skema')
        ->where('user_id', $userId)
        ->latest()
        ->get();

    $skemas = $pesertas
        ->map(fn ($peserta) => $peserta->skema)
        ->filter()
        ->unique('id')
        ->values();

    $allSkemas = Skema::orderBy('nama_skema')->get();

    return view('user.dashboard', compact(
        'pesertas',
        'skemas',
        'allSkemas'
    ));
})->middleware(['auth', 'role:user'])->name('user.dashboard');

// Simpan data peserta untuk User yang belum memiliki data
Route::post('/user/peserta', function (Request $request) {
    $user = $request->user();

    if (Peserta::where('user_id', $user->id)->exists()) {
        return redirect()
            ->route('user.dashboard')
            ->withErrors([
                'peserta' => 'Data peserta untuk akun ini sudah tersedia.'
            ]);
    }

    $validated = $request->validate([
        'no_peserta' => [
            'required',
            'string',
            'max:255',
            'unique:pesertas,no_peserta',
        ],
        'nik' => [
            'required',
            'string',
            'max:255',
            'unique:pesertas,nik',
        ],
        'jenis_kelamin' => [
            'required',
            Rule::in(['Laki-laki', 'Perempuan']),
        ],
        'no_telepon' => ['nullable', 'string', 'max:20'],
        'alamat' => ['nullable', 'string'],
        'skema_id' => ['required', 'exists:skemas,id'],
    ]);

    $peserta = new Peserta();
    $peserta->user_id = $user->id;
    $peserta->no_peserta = $validated['no_peserta'];
    $peserta->nama = $user->name;
    $peserta->nik = $validated['nik'];
    $peserta->jenis_kelamin = $validated['jenis_kelamin'];
    $peserta->no_telepon = $validated['no_telepon'] ?? null;
    $peserta->alamat = $validated['alamat'] ?? null;
    $peserta->skema_id = $validated['skema_id'];
    $peserta->save();

    return redirect()
        ->route('user.dashboard')
        ->with('success', 'Data peserta berhasil disimpan.');
})->middleware(['auth', 'role:user'])->name('user.peserta.store');

// Edit data peserta milik User yang sedang login
Route::put('/user/peserta/{peserta}', function (
    Request $request,
    Peserta $peserta
) {
    abort_unless(
        (int) $peserta->user_id === (int) $request->user()->id,
        403
    );

    $validated = $request->validate([
        'nama' => ['required', 'string', 'max:255'],
        'nik' => [
            'required',
            'string',
            'max:255',
            Rule::unique('pesertas', 'nik')->ignore($peserta->id),
        ],
        'jenis_kelamin' => [
            'required',
            Rule::in(['Laki-laki', 'Perempuan']),
        ],
        'no_telepon' => ['nullable', 'string', 'max:20'],
        'alamat' => ['nullable', 'string'],
    ]);

    $peserta->nama = $validated['nama'];
    $peserta->nik = $validated['nik'];
    $peserta->jenis_kelamin = $validated['jenis_kelamin'];
    $peserta->no_telepon = $validated['no_telepon'] ?? null;
    $peserta->alamat = $validated['alamat'] ?? null;
    $peserta->save();

    $user = $request->user();
    $user->name = $validated['nama'];
    $user->save();

    return redirect()
        ->route('user.dashboard')
        ->with('success', 'Data peserta berhasil diperbarui.');
})->middleware(['auth', 'role:user'])->name('user.peserta.update');
