<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

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

    public function pdf()
    {
        ini_set('max_execution_time', '300');
        set_time_limit(300);
        $siswa = Siswa::orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('pdf.siswa_pdf', ['siswa' => $siswa]);
        return $pdf->download('laporanSiswa.pdf');
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
        // $this->validate($request, [
        //     'nama' => 'required',
        //     'nisn' => 'required',
        //     'nis' => 'required',
        //     'kelas_id' => 'required',
        //     'spp_id' => 'required',
        //     'alamat' => 'required',
        //     'notelp' => 'required',
        // ]);

        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->spp_id = $request->spp_id;
        $siswa->alamat = $request->alamat;
        $siswa->notelp = $request->notelp;
        $siswa->save();
        $pw = explode('-', $request->tgl_lahir);
        $pass = $pw[2].$pw[1].$pw[0];
        // dd($ppw);
        $akunSiswa = new User();
        $akunSiswa->name = $request->nama;
        $akunSiswa->username = $request->nisn;
        $akunSiswa->password = bcrypt($pass);
        $akunSiswa->level = 'Siswa';
        // dd($siswa);
        $akunSiswa->save();

        return redirect('siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswaId = Siswa::findorfail($id);
        return view('siswa.detail', compact('siswaId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $spp = SPP::all();
        $kelas = Kelas::all();
        $siswaId = Siswa::findorfail($id);
        return view('siswa.edit', compact('spp', 'kelas', 'siswaId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nisn' => 'required',
            'nis' => 'required',
            // 'pin' => 'required',
            'kelas_id' => 'required',
            'spp_id' => 'required',
            // 'tagihan' => 'required',
            'alamat' => 'required',
            'notelp' => 'required',
        ]);

        $siswaId = Siswa::findorfail($id);
        $tagihan = SPP::select('spp.nominal')
        ->where('spp.id', '=', $request->spp_id)
        ->get();

        foreach ($tagihan as $key)
        {
            $val = $key->nominal;
            $siswaId->tagihan = $val;
        }
        $siswaId->nama = $request->nama;
        $siswaId->nisn = $request->nisn;
        // $siswaId->pin = $request->pin;
        $siswaId->nis = $request->nis;
        $siswaId->kelas_id = $request->kelas_id;
        $siswaId->spp_id = $request->spp_id;
        $siswaId->alamat = $request->alamat;
        $siswaId->notelp = $request->notelp;
        $siswaId->save();

        return redirect('siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswaId = Siswa::findorfail($id);
        $siswaId->delete();
        return redirect('siswa');
    }

    public function history()
    {
        // $data = Pembayaran::select('siswas.nama', 'pembayarans.tgl_bayar', 'pembayarans.bulan_dibayar', 'pembayarans.jumlah_bayar', 'pembayarans.sisa_tagihan')
        // ->join('siswas', 'pembayarans.siswa_id', '=', 'siswas.id')
        // ->where('pembayarans.siswa_id', '=', Auth::user()->siswa_id)
        // ->get();

        $data = DB::select('CALL history(?)', array(Auth::user()->siswa_id));
        // dd($data);
        return view('tampilanSiswa.index', compact('data'));
    }
}
