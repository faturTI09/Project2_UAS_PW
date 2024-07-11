<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Montir extends Model
{
    use HasFactory;
    protected $table = 'montir';
// table adalah property laravel yang didalam nya terkoneksi dengan
// nama table yang mau kita tampilkan data nya,
// tetapi hanya dapat di akses di dalam class model tersebut ataupun turunan nya

protected $fillable = ['id','nomor','nama','gender','tgl_lahir','tmp_lahir','keahlian','kategori_montir_id'];

//disable created_at and updated_at field
public $timestamps = false;

public function kategori_montir(){
    return $this->belongsTo(Kategori_Montir::class);
}

// fillable adalah variable dalam model eloquent yang tugasnya
// membatasi kolom mana yang dapat di isi atau di input
}
