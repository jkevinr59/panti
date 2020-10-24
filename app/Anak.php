<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    //
    protected $table="anaks";
    protected $guarded=[];

    public function donatur()
    {
        return $this->belongsToMany('App\User', 'donatur_has_anaks', 'id_donatur', 'id_anak');
    }
}
