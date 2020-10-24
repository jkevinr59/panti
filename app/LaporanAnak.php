<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanAnak extends Model
{
    //
    protected $table="laporan_anaks";
    protected $guarded=['_token','_method'];
    
    public function anak()
    {
        return $this->belongsTo('App\Anak', 'id_anak', 'id');
    }
}
