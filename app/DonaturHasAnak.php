<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonaturHasAnak extends Model
{
    //
    protected $table="donatur_has_anaks";
    protected $guarded=['_token','_method'];
}
