@extends('panel.base')

@section('content')
<div class="card card-info" style="width: 100%;">
  <div class="card-header">
    <h3 class="card-title">Sekolah Berdasarkan Wilayah</h3>
  </div>
    <form class="form-horizontal" action="{{route('storesekolah')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row" style="border-bottom: 1px silver solid;">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="province_id">Provinsi</label>
                    <select class="form-control" id="province_id" name="province_id" required>
                    </select>
                </div>
                <div class="form-group">
                    <label for="regency_id">Kabupaten/Kota</label>
                    <select class="form-control" id="regency_id" name="regency_id" required></select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="district_id">Kecamatan</label>
                    <select class="form-control" id="district_id" name="district_id" required></select>
                </div>
                <div class="form-group">
                    <label for="village_id">Desa/Kelurahan</label>
                    <select class="form-control" id="village_id" name="village_id" required></select>
                </div>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <div class="form-group row">
                    <label for="jenjang" class="col-sm-3 col-form-label">Jenjang Pendidikan</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="jenjang" id="jenjang">
                            <option value="" selected disabled>-- Pilih Jenjang Pendidikan --</option>
                            <option value="SMA">Sekolah Menengah Atas (SMA)</option>
                            <option value="SMP">Sekolah Menengah Pertama (SMP)</option>
                            <option value="SD">Sekolah Dasar (SD)</option>
                            <option value="TK">Taman Kanak-kanak (TK)</option>
                            <option value="PAUD">Pendidikan Anak Usia Dini (PAUD)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_sp" class="col-sm-3 col-form-label">Nama Satuan Pendidikan</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_sp" name="nama_sp" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="npsn" class="col-sm-3 col-form-label">NPSN</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="npsn" name="npsn">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat Jalan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rt" class="col-sm-3 col-form-label">RT</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" id="rt" name="rt">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rw" class="col-sm-3 col-form-label">RW</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" id="rw" name="rw">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kodepos" class="col-sm-3 col-form-label">Kode POS</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="kodepos" name="kodepos">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label">Telepon</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="website" class="col-sm-3 col-form-label">Website</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">Simpan</button>
        </div>
    </form>
</div>
@endsection

@section('script')

<script>
    $(function(){
        $('select[name="province_id"]').ready(function() {
            $.get('getprovinsi', function(data){
                $('select[name="province_id"]').append('<option value="" selected disabled>-- Pilih Provinsi --</option>');
                $.each(data, function(value, key) {
                    $('select[name="province_id"]').append('<option value="'+ value +'">'+ key +'</option>');
                });
            }, 'json');
        });
    });
</script>

<script>
    $(function() {
        $('select[name="province_id"]').on('change', function() {
            var PROVINCE_ID = $(this).val();
            if  (PROVINCE_ID) {
                $.get('getkota/' + PROVINCE_ID, function(data) {
                    $('select[name="regency_id"]').empty();
                    $('select[name="regency_id"]').append('<option value="" selected disabled>-- Pilih Kota --</option>');
                    $.each(data, function(value, key) {
                        $('select[name="regency_id"]').append('<option value="'+value+'">'+key+'</option>');
                    });
                }, 'json');
            }else{
                $('select[name="regency_id"]').empty();
            }
        });
    });
</script>

<script>
    $(function() {
        $('select[name="regency_id"]').on('change', function() {
            var REGENCY_ID = $(this).val();
            if  (REGENCY_ID) {
                $.get('getkecamatan/' + REGENCY_ID, function(data) {
                    $('select[name="district_id"]').empty();
                    $('select[name="district_id"]').append('<option value="" selected disabled>-- Pilih Kecamatan --</option>');
                    $.each(data, function(value, key) {
                        $('select[name="district_id"]').append('<option value="'+value+'">'+key+'</option>');
                    });
                }, 'json');
            }else{
                $('select[name="district_id"]').empty();
            }
        });
    });
</script>

<script>
    $(function() {
        $('select[name="district_id"]').on('change', function() {
            var DISTRICT_ID = $(this).val();
            if  (DISTRICT_ID) {
                $.get('getdesa/' + DISTRICT_ID, function(data) {
                    $('select[name="village_id"]').empty();
                    $('select[name="village_id"]').append('<option value="" selected disabled>-- Pilih Desa/Kelurahan --</option>');
                    $.each(data, function(value, key) {
                        $('select[name="village_id"]').append('<option value="'+value+'">'+key+'</option>');
                    });
                }, 'json');
            }else{
                $('select[name="village_id"]').empty();
            }
        });
    });
</script>

@endsection