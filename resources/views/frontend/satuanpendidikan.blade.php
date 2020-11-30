@extends('frontend.base')
@section('content')
<div class="col-md-12">
{{ Breadcrumbs::render('satuanpendidikanbc', $satuanpendidikanbc, $onkecamatan, $onkota, $onprovinsi) }}
</div>
@foreach($satuanpendidikan as $sekolah)
<div class="col-md-3">
	<div class="card my-4 border-blue">
		<div class="card-body">
			<div class="text-center">
				<img src="{{asset('school.svg')}}" class="img-responsive" width="100%">
			</div>
			<hr>
			<a href="#" class="btn btn-primary btn-block"><strong>Data Referensi Dapodik</strong></a>
		</div>
	</div>
</div>
<div class="col-md-9">
    <div class="card my-4 border-blue">
        <div class="card-body">
        	<div class="card">
        		<div class="card-header bg-info">
        			<div class="card-title text-center text-white"><h4><strong>Identitas Sekolah</strong></h4></div>
        		</div>
        		<div class="card-body">
        			<p><strong>NPSN : </strong>{{$sekolah->npsn}}</p>
        			<p><strong>Nama Sekolah : </strong>{{$sekolah->nama_sp}}</p>
        			<p><strong>Bentuk Pendidikan : </strong>{{$sekolah->jenjang}}</p>
        			<p><strong>SK Pendirian Sekolah : </strong></p>
        			<p><strong>Tanggal SK Pendirian : </strong></p>
        			<p><strong>SK Izin Operasional : </strong></p>
        			<p><strong>Tanggal SK Izin Operasional : </strong></p>
        			<p><strong>Akreditasi : </strong></p>
        			<p><strong>No. SK Akreditasi : </strong></p>
        		</div>
        	</div>
        	<div class="card my-2">
        		<div class="card-header bg-info">
        			<div class="card-title text-center text-white"><h4><strong>Kontak & alamat</strong></h4></div>
        		</div>
        		<div class="card-body">
        			<p><strong>Alamat : </strong>{{$sekolah->alamat}}</p>
        			<p><strong>RT / RW : </strong>{{$sekolah->rt}} / {{$sekolah->rw}}</p>
        			<p><strong>Desa/Kelurahan : </strong>{{$sekolah->getDesa->name}}</p>
        			<p><strong>Kecamatan : </strong> {{$sekolah->getKecamatan->name}}</p>
        			<p><strong>Kabupaten / Kota : </strong> {{$sekolah->getKota->name}}</p>
        			<p><strong>Provinsi : </strong> {{$sekolah->getProvinsi->name}}</p>
        			<p><strong>Kode POS : </strong> {{$sekolah->kodepos}}</p>
        			<p><strong>Telepon : </strong> {{$sekolah->phone}}</p>
        			<p><strong>Website : </strong> {{$sekolah->website}}</p>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endforeach
@endsection