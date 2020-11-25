<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    public function kecamatan ()
    {
        return $this->hasOne('App\Models\Kecamatan');
    }

}
