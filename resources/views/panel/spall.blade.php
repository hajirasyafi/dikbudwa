@extends('panel.base')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
@endsection
@section('content')
<div class="col-md-12">
{{ Breadcrumbs::render('spall', $kecamatan, $kota, $provinsi) }}
</div>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <div class="card-tittle">DAFTAR SEKOLAH PERWILAYAH</div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="sekolah" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Satuan Pendidikan</th>
                        <th>Jenjang Pendidikan</th>
                        <th>NPSN</th>
                        <th>Desa/Kelurahan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
$(function () {
    var route = '{{route("getallsp", (request()->segment(3)))}}';
    $('#sekolah').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: route,
            type: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
            { data: 'nama_sp', name: 'nama_sp', render: function(data, type, row){
                return '<a href="'+row.link+'">'+row.nama_sp+'</a>'
            } },
            { data: 'jenjang', name: 'jenjang' },
            { data: 'npsn', name: 'npsn', render: function(data,type, row){
                return '<a href="'+row.link+'">'+row.npsn+'</a>'
            } },
            { data: 'desa', name: 'desa' },
        ],
        columnDefs: [
            { className: "dt-center", "targets": [ 0, 2, 3, 4]}
        ],
        order: [2, 'des'],
        scrollX: true,
        scrollY: '500px',
        scrollCollapse: true,
        paging: false,
    });
} );
</script>
@endsection