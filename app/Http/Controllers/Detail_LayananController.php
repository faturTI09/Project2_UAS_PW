<?php

namespace App\Http\Controllers;

use App\Models\Detail_Layanan;
use App\Models\Layanan;
use App\Models\Montir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Detail_LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_detail_layanan = DB::table('detail_layanan')
        ->join('layanan','detail_layanan.layanan_id','=','layanan.id')
        ->join('montir','detail_layanan.pj_montir_id','=','montir.id')
        ->select('detail_layanan.*','layanan.nama as nama_layanan','montir.nama as nama_pj_montir')
        ->get();

        $layanans = Layanan::all();
        $montirs = Montir::all();

        return view('detail_layanan.index', compact('data_detail_layanan', 'layanans', 'montirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detail_layanan = new Detail_Layanan();
        $detail_layanan->pekerjaan = $request->pekerjaan;
        $detail_layanan->biaya = $request->biaya;
        $detail_layanan->layanan_id = $request->layanan_id;
        $detail_layanan->pj_montir_id = $request->pj_montir_id;
        $detail_layanan->save();
        return redirect('detail_layanan/index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = DB::table('detail_layanan')
        ->join('layanan','detail_layanan.layanan_id','=','layanan.id')
        ->join('montir','detail_layanan.pj_montir_id','=','montir.id')
        ->select('detail_layanan.*','layanan.nama as nama_layanan','montir.nama as nama_pj_montir')
        ->get();
        $data_detail_layanan = $data->where('id',$id);
        return view('detail_layanan.detail',compact('data_detail_layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data_detail_layanan = DB::table('detail_layanan')->where('id',$id)->get();
        $layanans = DB::table('layanan')->get();
        $montirs = DB::table('montir')->get();
        return view('detail_layanan.edit', compact('data_detail_layanan','layanans','montirs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $detail_layanan = Detail_Layanan::find($request->id);
        $detail_layanan->pekerjaan = $request->pekerjaan;
        $detail_layanan->biaya = $request->biaya;
        $detail_layanan->layanan_id = $request->layanan_id;
        $detail_layanan->pj_montir_id = $request->pj_montir_id;
        $detail_layanan->save();
        return redirect('detail_layanan/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detail_layanan = Detail_Layanan::findOrFail($id);
        $detail_layanan->delete();

        return redirect()->back()->with('success', 'detail layanan berhasil dihapus.');
    }
}
