<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
    $gurus = Guru::all();
    return view('guru.index', compact('gurus'));
    }
    public function create()
    {
        return view('guru.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:gurus',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'file_dokumen' => 'file|mimes:pdf,doc,docx|max:2048',
        ]);
        $guru = new Guru();
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $guru->foto = $filename;
        }

        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('documents'), $filename);
            $guru->file_dokumen = $filename;
        }

        $guru->save();

        return redirect()->route('guru.index');
    }
    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:gurus,nip,' . $guru->id,
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'file_dokumen' => 'file|mimes:pdf,doc,docx|max:2048',
        ]);
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $guru->foto = $filename;
        }
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('documents'), $filename);
            $guru->file_dokumen = $filename;
        }
        $guru->save();
        return redirect()->route('guru.index')->with('success', 'Guru updated successfully.');

}
    public function destroy(Guru $guru)
    {
        if ($guru->foto) {
            unlink(public_path('images') . '/' . $guru->foto);
        }
        if ($guru->file_dokumen) {
            unlink(public_path('documents') . '/' . $guru->file_dokumen);
        }
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru deleted successfully.');
    }
}
