<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        // List all buku
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        // Show form to create new buku
        return view('buku.create');
    }

    public function store(Request $request)
    {
        // Store new Buku
        $validatedData = $request->validate([
            'nm_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
            'author' => 'required|string|max:255',
            'flag' => 'sometimes|boolean',
        ]);
        // Set default value for flag to false on creation
        $validatedData['flag'] = false;

        Buku::create($validatedData);
        return redirect()->route('buku.index')->with('success', 'Buku created successfully.');
    }

    public function show($id)
    {
        // Show single buku
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function edit($id)
    {
        // Show form to edit buku
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        // Update buku
        $validatedData = $request->validate([
            'nm_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
            'author' => 'required|string|max:255',
            'flag' => 'sometimes|boolean',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($validatedData);
        return redirect()->route('buku.index')->with('success', 'Buku updated successfully.');
    }
    public function toggle($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->flag = !$buku->flag;
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku flag toggled successfully.');
    }
    public function destroy($id)
    {
        // Delete buku
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku deleted successfully.');
    }
}
