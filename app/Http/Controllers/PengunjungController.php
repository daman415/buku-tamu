<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengunjung = Pengunjung::all();

        return view('pengunjung.peng-index', compact('pengunjung'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengunjung.peng-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pengunjung::create([
            'nama' => $request->nama,
            'j_identitas' => $request->jIdent,
            'n_identitas' => $request->nIdent,
            'jk' => $request->jenisKelamin,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'no_hp' => $request->noHp,
            'keperluan' => $request->keperluan,
            'tujuan' => $request->tujuan,
            'jam' => $request->jam,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengunjung $pengunjung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengunjung $pengunjung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengunjung $pengunjung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengunjung $pengunjung)
    {
        //
    }

    public function getDataPengunjung($id)
    {

        $getData = Pengunjung::where('id',$id)->get();
        return response()->json([
            'data' => $getData,
            'message' => 'Data Pengunjung',
            'success' => true
        ]);
    }
}
