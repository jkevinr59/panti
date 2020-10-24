<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonaturHasAnak extends Model
{
    //
    protected $table="donatur_has_anaks";
    protected $guarded=['_token','_method'];
    public function donatur()
    {
        return $this->belongsTo('App\User', 'id_donatur');
    }
    public function anak()
    {
        return $this->belongsTo('App\Anak', 'id_anak');
    }
}
