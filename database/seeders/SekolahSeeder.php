<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sekolahs')->insert(array(
        	[
        	'nama_sp' => 'SMAS Wahidiyah',
        	'jenjang' => 'SMA',
        	'npsn' => '20534390',
        	'alamat' => 'Jl. KH. Wachid Hasyim',
        	'rt' => 17,
        	'rw' => 3,
        	'kodepos' => 64114,
        	'email' => 'smaswahidiyah@gmail.com',
        	'phone' => '(0354) 717717',
        	'website' => 'smawa.sch.id',
        	'province_id' => 35,
        	'regency_id' => 3571,
        	'district_id' => 357101,
        	'village_id' => 3571011001
        	],
        	[
        	'nama_sp' => 'SMP Wahidiyah',
        	'jenjang' => 'SMP',
        	'npsn' => '20534370',
        	'alamat' => 'Jl. KH. Wachid Hasyim',
        	'rt' => 17,
        	'rw' => 3,
        	'kodepos' => 64114,
        	'email' => 'smpwahidiyah@gmail.com',
        	'phone' => '(0354) 717717',
        	'website' => 'smawa.sch.id',
        	'province_id' => 35,
        	'regency_id' => 3571,
        	'district_id' => 357101,
        	'village_id' => 3571011001
        	]
        ));
    }
}
