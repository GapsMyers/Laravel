<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display dashboard page.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::query()->latest()->get();

        return view('admin.karyawan', [
            'karyawans' => $karyawans,
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
            'Nama' => ['required', 'string', 'max:255'],
            'Role' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);

        Karyawan::query()->create($validated);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validated = $request->validate([
            'Nama' => ['required', 'string', 'max:255'],
            'Role' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);

        $karyawan->update($validated);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}

