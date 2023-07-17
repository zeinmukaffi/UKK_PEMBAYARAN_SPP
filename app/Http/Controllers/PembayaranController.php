<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use App\Models\Siswa;
use App\Models\Petugas;
use PDF;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBayar = Pembayaran::orderby('id', 'desc')->get();
        $dataSiswa = Siswa::orderBy('id', 'desc')->get();
        return view('pembayaran.index', compact('dataBayar', 'dataSiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $bayarId = Siswa::findorfail($id);
        return view('pembayaran.entry', compact('bayarId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {
        $this->validate($request, [
            'bulan_dibayar' => 'required',
            'tgl_bayar' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $byr =  new Pembayaran();
        $tagihan = Siswa::select('tagihan')
        ->where('siswas.id', '=', $request->siswa_id)
        ->get();

        foreach ($tagihan as $val) {
            $sisa = $val->tagihan;
            $byr->sisa_tagihan = $sisa - str_replace(',', '', $request->jumlah_bayar);
            
            if ($byr->sisa_tagihan === $sisa) {
                $byr->status = "LUNAS";
            }else{
                $byr->status = "BELUM LUNAS";
            }
        }
        
        $byr->petugas_id = $request->petugas_id;
        $byr->siswa_id = $request->siswa_id;
        $byr->bulan_dibayar = $request->bulan_dibayar;
        $byr->tgl_bayar = $request->tgl_bayar;
        $byr->jumlah_bayar = str_replace(',', '', $request->jumlah_bayar);
        $byr->save();
        return redirect('pembayaran');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $bayarId = Pembayaran::findorfail($id);
    //     $data = DB::select('CALL history(?)', array($bayarId->siswa_id));
    //     return view('pembayaran.invoice', compact('bayarId', 'data'));
    // }

    public function show($id)
    {
        ini_set('max_execution_time', '300');
        set_time_limit(300);

        $bayarId = Pembayaran::findorfail($id);
        $data = DB::select('CALL history(?)', array($bayarId->siswa_id));
        $pdf = PDF::loadView('pembayaran.invoice', compact('bayarId','data'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape');
        return $pdf->download('INV'.$bayarId->sppSiswa->nisn.$bayarId->bulan_dibayar.'.pdf');
        // return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findorfail($id);
        $pembayaran->delete();
        return redirect('/pembayaran');
    }
}
