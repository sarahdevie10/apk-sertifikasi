<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $skemas = Skema::withCount('pesertas')
            ->when($search, function ($query) use ($search) {
                $query->where('kode_skema', 'like', "%{$search}%")
                    ->orWhere('nama_skema', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('skema.index', compact('skemas', 'search'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|string|max:100|unique:skemas,kode_skema',
            'nama_skema' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
        ]);

        Skema::create([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'deskripsi'  => $request->deskripsi,
        ]);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Data skema berhasil ditambahkan.');
    }

    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, Skema $skema)
    {
        $request->validate([
            'kode_skema' => 'required|string|max:100|unique:skemas,kode_skema,' . $skema->id,
            'nama_skema' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
        ]);

        $skema->update([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'deskripsi'  => $request->deskripsi,
        ]);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Data skema berhasil diubah.');
    }

    public function destroy(Skema $skema)
    {
        $skema->delete();

        return redirect()
            ->route('skema.index')
            ->with('success', 'Data skema berhasil dihapus.');
    }
    public function dashboardAdmin()
{
    $jumlahPeserta = \App\Models\Peserta::count();
    $jumlahSkema = \App\Models\Skema::count();

    return view('dashboard', compact('jumlahPeserta', 'jumlahSkema'));
}
}