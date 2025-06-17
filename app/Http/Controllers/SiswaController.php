<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        // List all siswa
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        // Show form to create new siswa
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Store new Siswa
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis,',
            'alamat' => 'required|string|max:255',
        ]);

        Siswa::create($validatedData);
        return redirect()->route('siswa.index')->with('success', ' created successfully.');
    }

    public function show($id)
    {
        // Show single siswa
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        // Show form to edit siswa
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        // Update siswa
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis,' . $id,
            'alamat' => 'required|string|max:255',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($validatedData);
        return redirect()->route('siswa.index')->with('success', 'siswa updated successfully.');
    }

    public function destroy($id)
    {
        // Delete siswa
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'siswa deleted successfully.');
    }
}
