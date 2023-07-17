<?php

namespace App\Http\Controllers;


use App\Models\SPP;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SPPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dataSPP = DB::select('CALL callSpp()');
        $dataSPP = SPP::all();
        return view('spp.index', compact('dataSPP'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun' => 'required',
            // 'nominal' => 'required',
            'per_bulan' => 'required',
        ]);

        $spp = new SPP();
        $total = str_replace(',', '', $request->per_bulan);
        // dd($total);
        $spp->tahun = $request->tahun;
        $spp->nominal = $total * 36;
        $spp->per_bulan = str_replace(',', '', $request->per_bulan);
        $spp->save();

        return redirect('spp');
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
        $sppId = DB::select('CALL callSppEdit(?)', array($id));
        // dd($sppId);
        return view('spp.edit', compact('sppId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tahun' => 'required',
            // 'nominal' => 'required',
            'per_bulan' => 'required',
        ]);

        $spp = SPP::findorfail($id);
        $total = str_replace(',', '', $request->per_bulan);
        // dd($total);
        $spp->tahun = $request->tahun;
        $spp->nominal = $total * 36;
        $spp->per_bulan = str_replace(',', '', $request->per_bulan);
        $spp->save();

        return redirect('spp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $sppId = SPP::findorfail($id);
        // $sppId->delete();
        $sppId = DB::select('CALL callSppDelete(?)', array($id));

        return redirect('spp');
    }

    public function pdf()
    {
        ini_set('max_execution_time', '300');
        set_time_limit(300);
        $spp = DB::select('CALL callSpp()');
        $pdf = PDF::loadView('pdf.spp_pdf', ['spp' => $spp]);
        return $pdf->download('laporanSPP.pdf');
    }

    // public function s()
    // {
    //     $spp = DB::select('CALL callSpp()');
    //     return view('pdf.spp_pdf', compact('spp'));
    // }
}
