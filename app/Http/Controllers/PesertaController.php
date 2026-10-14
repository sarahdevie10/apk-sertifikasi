<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $pesertas = Peserta::with(['skema', 'user'])
            ->when($search, function ($query) use ($search) {
                $query->where('no_peserta', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('peserta.index', compact('pesertas', 'search'));
    }

    public function create()
    {
        $skemas = Skema::orderBy('nama_skema')->get();

        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_peserta'    => 'required|unique:pesertas,no_peserta',
            'nama'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'nik'           => 'required|unique:pesertas,nik',
            'jenis_kelamin' => 'required|in:L,P', // Disesuaikan dengan enum database
            'alamat'        => 'nullable|string',
            'no_telepon'    => 'nullable|string|max:20',
            'skema_id'      => 'required|exists:skemas,id',
        ]);

        DB::transaction(function () use ($request) {
            // 1. Buatkan akun login (User) otomatis untuk peserta
            $user = User::create([
                'name'     => $request->nama,
                'email'    => $request->email,
                'password' => Hash::make('password123'), // Password default
                'role'     => 'peserta',
            ]);

            // 2. Simpan data peserta terhubung ke user_id
            Peserta::create([
                'user_id'       => $user->id,
                'no_peserta'    => $request->no_peserta,
                'nama'          => $request->nama,
                'nik'           => $request->nik,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat'        => $request->alamat,
                'no_telepon'    => $request->no_telepon,
                'skema_id'      => $request->skema_id,
            ]);
        });

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta dan akun login berhasil ditambahkan (Password default: password123).');
    }

    public function show(Peserta $peserta)
    {
        $peserta->load(['skema', 'user']);

        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $skemas = Skema::orderBy('nama_skema')->get();

        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'no_peserta'    => 'required|unique:pesertas,no_peserta,' . $peserta->id,
            'nama'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $peserta->user_id,
            'nik'           => 'required|unique:pesertas,nik,' . $peserta->id,
            'jenis_kelamin' => 'required|in:L,P',
            'alamat'        => 'nullable|string',
            'no_telepon'    => 'nullable|string|max:20',
            'skema_id'      => 'required|exists:skemas,id',
        ]);

        DB::transaction(function () use ($request, $peserta) {
            // Update data akun User terhubung
            $peserta->user->update([
                'name'  => $request->nama,
                'email' => $request->email,
            ]);

            // Update data Peserta
            $peserta->update([
                'no_peserta'    => $request->no_peserta,
                'nama'          => $request->nama,
                'nik'           => $request->nik,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat'        => $request->alamat,
                'no_telepon'    => $request->no_telepon,
                'skema_id'      => $request->skema_id,
            ]);
        });

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil diubah.');
    }

    public function destroy(Peserta $peserta)
    {
        DB::transaction(function () use ($peserta) {
            // Hapus User terhubung (Foreign key cascade akan otomatis mengurusnya jika di-delete)
            $peserta->user()->delete();
        });

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta beserta akun login berhasil dihapus.');
    }
    public function dashboardPeserta(Request $request)
{
    $userId = $request->user()->id;

    $pesertas = Peserta::with('skema')
        ->where('user_id', $userId)
        ->latest()
        ->get();

    $skemas = $pesertas
        ->map(fn ($peserta) => $peserta->skema)
        ->filter()
        ->unique('id')
        ->values();

    $allSkemas = \App\Models\Skema::orderBy('nama_skema')->get();

    return view('user.dashboard', compact('pesertas', 'skemas', 'allSkemas'));
}

public function storeSelf(Request $request)
{
    $user = $request->user();

    if (Peserta::where('user_id', $user->id)->exists()) {
        return redirect()
            ->route('user.dashboard')
            ->withErrors(['peserta' => 'Data peserta untuk akun ini sudah tersedia.']);
    }

    $validated = $request->validate([
        'no_peserta'    => ['required', 'string', 'max:255', 'unique:pesertas,no_peserta'],
        'nik'           => ['required', 'string', 'max:255', 'unique:pesertas,nik'],
        'jenis_kelamin' => ['required', \Illuminate\Validation\Rule::in(['L', 'P'])],
        'no_telepon'    => ['nullable', 'string', 'max:20'],
        'alamat'        => ['nullable', 'string'],
        'skema_id'      => ['required', 'exists:skemas,id'],
    ]);

    $peserta = new Peserta();
    $peserta->user_id       = $user->id;
    $peserta->no_peserta    = $validated['no_peserta'];
    $peserta->nama          = $user->name;
    $peserta->nik           = $validated['nik'];
    $peserta->jenis_kelamin = $validated['jenis_kelamin'];
    $peserta->no_telepon    = $validated['no_telepon'] ?? null;
    $peserta->alamat        = $validated['alamat'] ?? null;
    $peserta->skema_id      = $validated['skema_id'];
    $peserta->save();

    return redirect()
        ->route('peserta.dashboard')
        ->with('success', 'Data peserta berhasil disimpan.');
}

public function updateSelf(Request $request, Peserta $peserta)
{
    abort_unless((int) $peserta->user_id === (int) $request->user()->id, 403);

    $validated = $request->validate([
        'nama'          => ['required', 'string', 'max:255'],
        'nik'           => ['required', 'string', 'max:255', \Illuminate\Validation\Rule::unique('pesertas', 'nik')->ignore($peserta->id)],
        'jenis_kelamin' => ['required', \Illuminate\Validation\Rule::in(['L', 'P'])],
        'no_telepon'    => ['nullable', 'string', 'max:20'],
        'alamat'        => ['nullable', 'string'],
    ]);

    $peserta->nama          = $validated['nama'];
    $peserta->nik           = $validated['nik'];
    $peserta->jenis_kelamin = $validated['jenis_kelamin'];
    $peserta->no_telepon    = $validated['no_telepon'] ?? null;
    $peserta->alamat        = $validated['alamat'] ?? null;
    $peserta->save();

    $user = $request->user();
    $user->name = $validated['nama'];
    $user->save();

    return redirect()
        ->route('peserta.dashboard')
        ->with('success', 'Data peserta berhasil diperbarui.');
}
}