<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_berita',
        'description',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

