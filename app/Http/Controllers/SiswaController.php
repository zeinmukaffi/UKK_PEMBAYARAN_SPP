<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SPP;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataSiswa = Siswa::orderBy('id', 'desc')->get();
        return view('siswa.index', compact('dataSiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spp = SPP::all();
        $kelas = Kelas::all();
        return view('siswa.create', compact('spp', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_siswa' => 'required',
            'nisn' => 'required',
            'kelas_id' => 'required',
            'spp_id' => 'required',
            'spp_terbayar' => 'required',
            'alamat' => 'required',
        ]);

        $sisa = $request->spp->nominal - $request->spp_terbayar;
        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'kelas_id' => $request->kelas_id,
            'spp_id' => $request->spp_id,
            'spp_terbayar' => $request->spp_terbayar,
            'sisa_spp' => $sisa,
            'alamat' => $request->alamat,
        ]);

        return redirect('siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
