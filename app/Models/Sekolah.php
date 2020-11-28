<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_sp',
        'jenjang',
        'npsn',
        'alamat',
        'rt',
        'rw',
        'kodepos',
        'email',
        'phone',
        'website',
        'province_id',
        'regency_id',
        'district_id',
        'village_id'
    ];

    public function getDesa(){
        return $this->belongsTo('App\Models\Desa', 'village_id');
    }
    public function getKecamatan(){
        return $this->belongsTo('App\Models\Kecamatan', 'district_id');
    }
    public function getKota(){
        return $this->belongsTo('App\Models\Kota', 'regency_id');
    }
    public function getProvinsi(){
        return $this->belongsTo('App\Models\Provinsi', 'province_id');
    }
}
