<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Montir; //tambahin ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kategori_MontirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_kategori_montir = Kategori_Montir::all();
// buat turunan model kelurahan
        return view('kategori_montir.index', ['data_kategori_montir'=>$data_kategori_montir]);
// kirim array data ke view kelurahan index menggunakan assosiatif array
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori_montir = new Kategori_Montir();
        $kategori_montir->nama = $request->nama;
        $kategori_montir->save();
        return redirect('kategori_montir/index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //buat perintah detail
        $data_kategori_montir = Kategori_Montir::all();
        return view('kategori_montir.detail', ['data_kategori_montir'=>$data_kategori_montir]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data_kategori_montir = DB::table('kategori_montir')->where('id',$id)->get();
        return view('kategori_montir.edit', compact('data_kategori_montir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //buat perintah update
        $kategori_montir = Kategori_Montir::find($request->id);
        $kategori_montir->nama = $request->nama;
        $kategori_montir->save();
        return redirect('kategori_montir/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // kasih perintah hapus data
        $kategori_montir = Kategori_Montir::findOrFail($id);
        $kategori_montir->delete();
    
        return redirect()->back()->with('success', 'kategori montir berhasil dihapus.');
    }
}
