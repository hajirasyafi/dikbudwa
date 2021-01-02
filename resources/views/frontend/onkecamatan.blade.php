@extends('frontend.base')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
<style type="text/css">
    table.dataTable td {
  padding-top: 5px;
  padding-bottom: 5px;
}
</style>
@endsection
@section('content')
<div class="col-md-12">
{{ Breadcrumbs::render('onkecamatan', $onkecamatan, $onkota, $onprovinsi) }}
</div>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <div class="card-tittle">DAFTAR SEKOLAH PERWILAYAH</div>
        </div>
        <div class="card-body">
            <table class="table table-striped hover" id="sekolah" class="display nowrap" style="width:100%">
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function () {
    var route = '{{route("fgetdesasp", (request()->segment(3)))}}';
    $('#sekolah').DataTable({
        processing: true,
        serverSide: true,
        ajax: route,
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
            { className: "text-center",
            targets: [ 0, 2, 3, 4]}
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