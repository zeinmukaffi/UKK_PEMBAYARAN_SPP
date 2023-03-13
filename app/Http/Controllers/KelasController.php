<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use PDF;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKelas = Kelas::orderBy('id', 'desc')->get();
        return view('kelas.index', compact('dataKelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return redirect('kelas');
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
        $kelasId = Kelas::findorfail($id);
        return view('kelas.edit', compact('kelasId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $kelasId = Kelas::findorfail($id);
        $kelasId->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return redirect('kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelasId = Kelas::findorfail($id);
        $kelasId->delete();

        return redirect('kelas');
    }

    public function pdf()
    {
        ini_set('max_execution_time', '300');
        set_time_limit(300);
        $kelas = Kelas::orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('pdf.kelas_pdf', ['kelas' => $kelas]);
        return $pdf->download('laporanKelas.pdf');
    }
}
