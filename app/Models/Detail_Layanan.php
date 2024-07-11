<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Layanan extends Model
{
    use HasFactory;

    protected $table = 'detail_layanan';

    protected $fillable = ['id',
        'pekerjaan',
        'biaya',
        'layanan_id',
        'pj_montir_id',
    ];
    
    public $timestamps = false;

    public function montir()
    {
        return $this->belongsTo(Montir::class, 'pj_montir_id');
    }
    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'jenis_layanan_id');
    }
}
