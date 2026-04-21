<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::query()->latest()->get();

        return view('admin.barang', [
            'barangs' => $barangs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'kode_barang' => ['required', 'string', 'max:255', 'unique:barangs,kode_barang'],
            'stok' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
        ]);

        Barang::query()->create($validated);

        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'kode_barang' => ['required', 'string', 'max:255', 'unique:barangs,kode_barang,'.$barang->id],
            'stok' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
        ]);

        $barang->update($validated);

        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Data barang berhasil dihapus.');
    }
}
