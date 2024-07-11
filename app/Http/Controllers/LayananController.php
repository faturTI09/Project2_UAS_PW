<?php

namespace App\Http\Controllers;

use App\Models\Detail_Layanan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_layanan = DB::table('layanan')->join('detail_layanan','layanan.jenis_layanan_id','=','detail_layanan.id')
        ->select('layanan.*','detail_layanan.pekerjaan as pekerjaan_jenis_layanan')
        ->get();

        $detail_layanans = Detail_Layanan::all();

// buat turunan model montir
        return view('layanan.index',compact('data_layanan','detail_layanans'));
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
        $layanan = new Layanan();
        $layanan->kode = $request->kode;
        $layanan->nama = $request->nama;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->jenis_layanan_id = $request->jenis_layanan_id;
        $layanan->total_biaya = $request->total_biaya;
        $layanan->rating = $request->rating;
        $layanan->save();
        return redirect('layanan/index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = DB::table('layanan')->join('detail_layanan','layanan.jenis_layanan_id','=','detail_layanan.id')
        ->select('layanan.*','detail_layanan.pekerjaan as pekerjaan_jenis_layanan')
        ->get();
        $data_layanan = $data->where('id',$id);
        return view('layanan.detail',compact('data_layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    
        $data_layanan = DB::table('layanan')->where('id',$id)->get();
        $detail_layanans = DB::table('detail_layanan')->get();
        return view('layanan.edit', compact('data_layanan','detail_layanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $layanan = Layanan::find($request->id);
        $layanan->kode = $request->kode;
        $layanan->nama = $request->nama;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->jenis_layanan_id = $request->jenis_layanan_id;
        $layanan->total_biaya = $request->total_biaya;
        $layanan->rating = $request->rating;
        $layanan->save();
        return redirect('layanan/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus.');
    }
}
