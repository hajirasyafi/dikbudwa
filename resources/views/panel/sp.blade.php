@extends('panel.base')
@section('content')
<div class="col-md-12">
{{ Breadcrumbs::render('spbc', $spbc, $kecamatan, $kota, $provinsi) }}
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
    <div class="card my-4">
        <div class="card-header">
            <a href="#" type="button" class="btn btn-success">
                <i class="material-icons align-middle">edit</i>
                Edit Sekolah
            </a>
            <a href="#" type="button" class="btn btn-danger float-right" data-id="{{$sekolah->npsn}}" data-toggle="modal" data-target="#deleteModal" id="getDeleteId">
                <i class="material-icons align-middle">delete</i>
                Hapus Sekolah
            </a>
        </div>
        <div class="card-body">
        	<div class="card">
        		<div class="card-header bg-info">
        			<div class="text-center text-white"><h4><strong>Identitas Sekolah</strong></h4></div>
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
        			<div class="text-center text-white"><h4><strong>Kontak & alamat</strong></h4></div>
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi hapus data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Anda yakin ingin menghapus data ini?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" name="SubmitDeleteProductForm" id="SubmitDeleteProductForm">Hapus data</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        var deleteID;
        $('body').on('click', '#getDeleteId', function () {
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteProductForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            var route = '{{route('deletesekolah', "id")}}';
            route = route.replace('id', id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: route,
                method: 'get',
                success: function(response) {
                    $('#deleteModal').modal('hide');
                    window.location.href = response.redirect;
                }
            });
        });
    });
</script>
@endsection