<?php

namespace App\Http\Controllers;

use App\Models\Infografis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InfografisController extends Controller
{
    public function index()
    {
        $infografis = Infografis::with('penulis')->latest()->get();
        return view('fitur.infografis.view-info', compact('infografis'));
    }

    public function create()
    {
        return view('fitur.infografis.crud-info');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'      => 'required|string|max:255',
            'gambar_url' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'kategori'   => 'required|string|max:255',
        ]);

        $path = null;
        if ($request->hasFile('gambar_url')) {
            $path = $request->file('gambar_url')->store('infografis', 'public');
        }

        Infografis::create([
            'judul'      => $validatedData['judul'],
            'gambar_url' => $path,
            'kategori'   => $validatedData['kategori'],
            'penulis_id' => Auth::id(),
            'views'      => 0
        ]);

        return redirect()->route('infografis.index')->with('success', 'Infografis berhasil ditambahkan.');
    }

    public function show($id)
    {
        $infografis = Infografis::with('penulis')->findOrFail($id);
        $infografis->increment('views');
        return view('fitur.infografis.show', compact('infografis'));
    }

    public function edit($id)
    {
        $infografis = Infografis::findOrFail($id);
        return view('fitur.infografis.edit', compact('infografis'));
    }

    public function update(Request $request, $id)
    {
        $infografis = Infografis::findOrFail($id);

        $validatedData = $request->validate([
            'judul'      => 'required|string|max:255',
            'gambar_url' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'kategori'   => 'required|string|max:255',
        ]);

        $path = $infografis->gambar_url;

        if ($request->hasFile('gambar_url')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('gambar_url')->store('infografis', 'public');
        }

        $infografis->update([
            'judul'      => $validatedData['judul'],
            'gambar_url' => $path,
            'kategori'   => $validatedData['kategori'],
        ]);

        return redirect()->route('infografis.index')->with('success', 'Infografis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $infografis = Infografis::findOrFail($id);
        if ($infografis->gambar_url) {
            Storage::disk('public')->delete($infografis->gambar_url);
        }
        $infografis->delete();
        return redirect()->route('infografis.index')->with('success', 'Infografis berhasil dihapus.');
    }
}
