<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Montir;
use App\Models\Montir;//tambahin ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MontirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_montir = DB::table('montir')->join('kategori_montir','montir.kategori_montir_id','=','kategori_montir.id')
        ->select('montir.*','kategori_montir.nama as nama_kategori_montir')
        ->get();

        $kategori_montirs = Kategori_Montir::all();

// buat turunan model montir
        return view('montir.index',compact('data_montir','kategori_montirs'));
// kirim array data ke view montir index menggunakan assosiatif array
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
        $montir = new Montir();
        $montir->nomor = $request->nomor;
        $montir->nama = $request->nama;
        $montir->gender = $request->gender;
        $montir->tgl_lahir = $request->tgl_lahir;
        $montir->tmp_lahir = $request->tmp_lahir;
        $montir->keahlian = $request->keahlian;
        $montir->kategori_montir_id = $request->kategori_montir_id;
        $montir->save();
        return redirect('montir/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //tambahkan detail montir
        $data = DB::table('montir')->join('kategori_montir','montir.kategori_montir_id','=','kategori_montir.id')
        ->select('montir.*','kategori_montir.nama as nama_kategori_montir')->get();
        $data_montir = $data->where('id',$id);
        return view('montir.detail',compact('data_montir'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //edit data montir
        $data_montir = DB::table('montir')->where('id',$id)->get();
        $kategori_montirs = DB::table('kategori_montir')->get();
        return view('montir.edit', compact('data_montir','kategori_montirs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //buat update data
        $montir = Montir::find($request->id);
        $montir->nomor = $request->nomor;
        $montir->nama = $request->nama;
        $montir->gender = $request->gender;
        $montir->tgl_lahir = $request->tgl_lahir;
        $montir->tmp_lahir = $request->tmp_lahir;
        $montir->keahlian = $request->keahlian;
        $montir->kategori_montir_id = $request->kategori_montir_id;
        $montir->save();
        return redirect('montir/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // kasih perintah hapus data
        $montir = Montir::findOrFail($id);
        $montir->delete();
    
        return redirect()->back()->with('success', 'montir berhasil dihapus.');
    }
}
