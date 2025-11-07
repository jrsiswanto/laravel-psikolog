<?php

namespace App\Http\Controllers;

use App\Models\tanya_jawab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanyaJawabController extends Controller
{
    public function index()
    {
        $pertanyaan = tanya_jawab::with(['penanya', 'psikiater'])
            ->latest()
            ->get();

        return view('fitur.tanya-jawab.view-tanjaw', compact('pertanyaan'));
    }

    public function create()
    {
        return view('fitur.tanya-jawab.crud-tanjaw');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required|string',
            'kategori'   => 'nullable|string|max:255',
        ]);

        tanya_jawab::create([
            'user_id'   => Auth::id(),
            'pertanyaan'=> $validated['pertanyaan'],
            'kategori'  => $validated['kategori'] ?? null,
            'status'    => 'belum dijawab',
        ]);

        return redirect()->route('tanya-jawab.index')->with('success', 'Pertanyaan berhasil dikirim.');
    }

    public function edit($id)
    {
        $tanya = tanya_jawab::findOrFail($id);
        return view('fitur.tanya-jawab.edit-tanjaw', compact('tanya'));
    }

    public function update(Request $request, $id)
    {
        $tanya = tanya_jawab::findOrFail($id);

        $validated = $request->validate([
            'jawaban' => 'required|string',
        ]);

        $tanya->update([
            'jawaban'      => $validated['jawaban'],
            'psikiater_id' => Auth::id(),
            'status'       => 'sudah dijawab',
        ]);

        return redirect()->route('tanya-jawab.index')->with('success', 'Jawaban berhasil dikirim.');
    }

    public function destroy($id)
    {
        $tanya = tanya_jawab::findOrFail($id);
        $tanya->delete();

        return redirect()->route('tanya-jawab.index')->with('success', 'Data berhasil dihapus.');
    }
}
