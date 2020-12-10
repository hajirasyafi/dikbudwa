<?php

// Home
Breadcrumbs::for('beranda', function ($trail) {
    $trail->push('Beranda', url('/'));
});


Breadcrumbs::for('semuasekolah', function($trail) {
	$trail->parent('sekolah');
	$trail->push('Semua Sekolah', route('semuasekolah'));
});

Breadcrumbs::for('semuasma', function($trail) {
	$trail->parent('sekolah');
	$trail->push('Semua SMA', route('semuasma'));
});

Breadcrumbs::for('semuasmp', function($trail) {
	$trail->parent('sekolah');
	$trail->push('Semua SMP', route('semuasmp'));
});

Breadcrumbs::for('semuasd', function($trail) {
	$trail->parent('sekolah');
	$trail->push('Semua SD', route('semuasd'));
});

Breadcrumbs::for('semuatk', function($trail) {
	$trail->parent('sekolah');
	$trail->push('Semua TK', route('semuatk'));
});

Breadcrumbs::for('semuapaud', function($trail) {
	$trail->parent('sekolah');
	$trail->push('Semua PAUD', route('semuapaud'));
});


Breadcrumbs::for('sekolah', function($trail) {
	$trail->parent('beranda');
	$trail->push('Sekolah Perwilayah', route('sekolah'));
});

Breadcrumbs::for('onprovinsi', function ($trail, $onprovinsi) {
	$trail->parent('sekolah');
	$trail->push($onprovinsi->name, route('sekolah/onprovinsi', $onprovinsi->id));
});

Breadcrumbs::for('onkota', function ($trail, $onkota, $onprovinsi) {
	$trail->parent('onprovinsi', $onprovinsi);
	$trail->push($onkota->name, route('sekolah/onkota', $onkota->id));
});

Breadcrumbs::for('onkecamatan', function ($trail, $onkecamatan, $onkota, $onprovinsi) {
	$trail->parent('onkota', $onkota, $onprovinsi);
	$trail->push($onkecamatan->name, route('sekolah/onkecamatan', $onkecamatan->id));
});

Breadcrumbs::for('satuanpendidikanbc', function($trail, $satuanpendidikanbc, $onkecamatan, $onkota, $onprovinsi) {
	$trail->parent('onkecamatan', $onkecamatan, $onkota, $onprovinsi);
	$trail->push($satuanpendidikanbc->nama_sp, route('satuanpendidikan', $satuanpendidikanbc->npsn));
});

Breadcrumbs::for('panel', function($trail){
	$trail->push('Beranda', route('panel'));
});

Breadcrumbs::for('daftarberita', function($trail){
	$trail->parent('panel');
	$trail->push('Daftar Berita', route('panel/daftarberita'));
});

Breadcrumbs::for('panelsekolah', function($trail){
	$trail->parent('panel');
	$trail->push('Sekolah', route('panel/sekolah'));
});

Breadcrumbs::for('spkota', function($trail, $provinsi){
	$trail->parent('panelsekolah');
	$trail->push($provinsi->name, route('panel/spkota', $provinsi->id));
});

Breadcrumbs::for('spkec', function($trail, $kota ,$provinsi){
	$trail->parent('spkota', $provinsi);
	$trail->push($kota->name, route('panel/spkec', $kota->id));
});

Breadcrumbs::for('spall', function($trail, $kecamatan, $kota ,$provinsi){
	$trail->parent('spkec', $kota, $provinsi);
	$trail->push($kecamatan->name, route('panel/spall', $kecamatan->id));
});

Breadcrumbs::for('spbc', function($trail, $spbc, $kecamatan, $kota, $provinsi) {
	$trail->parent('spall', $kecamatan, $kota, $provinsi);
	$trail->push($spbc->nama_sp, route('panel/sp', $spbc->npsn));
});