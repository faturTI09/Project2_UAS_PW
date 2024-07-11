<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = ['id','kode','nama','deskripsi','jenis_layanan_id','total_biaya','rating'];
    
    public $timestamps = false;

    public function jenis_layanan()
    {
        return $this->belongsTo(Detail_Layanan::class, 'jenis_layanan_id');
    }
}
