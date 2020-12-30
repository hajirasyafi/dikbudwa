<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class BeritaModel extends Model implements Searchable
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

    public function getSearchResult(): SearchResult
    {
        $url = route('berita', $this->slug);
     
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title_berita,
            $url
        );
    }
}

