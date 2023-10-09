<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengunjung = Pengunjung::orderBy('id', 'DESC')->paginate('2');

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

        $uuid = Uuid::uuid4()->toString();

        // dd($request->photoUji1 . ' =!= ' . $request->photoUji2);

        $pengunjung = new Pengunjung;
        $pengunjung->nama = $request->nama;
        $pengunjung->j_identitas =  $request->jIdent;
        $pengunjung->n_identitas = $request->nIdent;
        $pengunjung->jk = $request->jenisKelamin;
        $pengunjung->pekerjaan = $request->pekerjaan;
        $pengunjung->alamat = $request->alamat;
        $pengunjung->no_hp = $request->noHp;
        $pengunjung->keperluan = $request->keperluan;
        $pengunjung->tujuan = $request->tujuan;
        $pengunjung->tgl = $request->tgl;
        $pengunjung->jam = $request->jam;
        $pengunjung->foto = 'assets/labels/'.$uuid;

        $pengunjungFolder = public_path('assets/labels/' . $uuid);
        if (!file_exists($pengunjungFolder)) {
            mkdir($pengunjungFolder, 0755, true);
        }

        $uji1Data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photoUji1));
        $uji1Path = 'assets/labels/'.$uuid.'/1.png';
        file_put_contents(public_path($uji1Path), $uji1Data);
        // Image::make($uji1Data)->fit(720, 720)->save(public_path($uji1Path));

        $uji2Data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photoUji2));
        $uji2Path = 'assets/labels/'.$uuid.'/2.png';
        file_put_contents(public_path($uji2Path), $uji2Data);
        // Image::make($uji2Data)->fit(720, 720)->save(public_path($uji2Path));


        $pengunjung->save();

        // dd($uji1Path .' = ' . $uji1Data . ' ========== ' .$uji2Path .' = ' . $uji2Data);


        // Pengunjung::create([
        //     'nama' => $request->nama,
        //     'j_identitas' => $request->jIdent,
        //     'n_identitas' => $request->nIdent,
        //     'jk' => $request->jenisKelamin,
        //     'pekerjaan' => $request->pekerjaan,
        //     'alamat' => $request->alamat,
        //     'no_hp' => $request->noHp,
        //     'keperluan' => $request->keperluan,
        //     'tujuan' => $request->tujuan,
        //     'tgl' => $request->tgl,
        //     'jam' => $request->jam,
        //     'foto' => 'labels/'.$uuid
        // ]);

        return redirect()->route('pengunjung.index')->with('status', 'Data Berhasil Ditambah');
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

    public function getDataPengunjung()
    {

        $getData = Pengunjung::all();
        return response()->json([
            'data' => $getData,
            'message' => 'Data Pengunjung',
            'success' => true
        ]);
    }
}
