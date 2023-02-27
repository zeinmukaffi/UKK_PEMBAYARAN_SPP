<?php

namespace App\Http\Controllers;


use App\Models\SPP;
use Illuminate\Http\Request;

class SPPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataSPP = SPP::orderBy('id', 'desc')->get();
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
            'nominal' => 'required',
        ]);

        SPP::create([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

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
        $sppId = SPP::findorfail($id);
        return view('spp.edit', compact('sppId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $sppId = SPP::findorfail($id);
        $sppId->update([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect('spp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sppId = SPP::findorfail($id);
        $sppId->delete();

        return redirect('spp');
    }
}
