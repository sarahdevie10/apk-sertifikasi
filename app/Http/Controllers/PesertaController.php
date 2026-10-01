<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $pesertas = Peserta::with('skema')
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
            'no_peserta' => 'required|unique:pesertas,no_peserta',
            'nama' => 'required',
            'nik' => 'required|unique:pesertas,nik',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'no_telepon' => 'nullable',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        Peserta::create([
            'no_peserta' => $request->no_peserta,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'skema_id' => $request->skema_id,
        ]);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta)
    {
        $peserta->load('skema');

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
            'no_peserta' => 'required|unique:pesertas,no_peserta,' . $peserta->id,
            'nama' => 'required',
            'nik' => 'required|unique:pesertas,nik,' . $peserta->id,
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'no_telepon' => 'nullable',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        $peserta->update([
            'no_peserta' => $request->no_peserta,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'skema_id' => $request->skema_id,
        ]);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil diubah.');
    }

 public function destroy(Peserta $peserta)
{
    $peserta->delete();

    return redirect()
        ->route('peserta.index')
        ->with('success', 'Data peserta berhasil dihapus.');
}
}