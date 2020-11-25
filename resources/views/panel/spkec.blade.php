@extends('panel.base')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
@endsection
@section('content')
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
                        <th>Wilayah</th>
                        <th>Total</th>
                        <th>SMA</th>
                        <th>SMP</th>
                        <th>SD</th>
                        <th>TK</th>
                        <th>PAUD</th>
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
    var route = '{{route("getkecsp", (request()->segment(2)))}}';
    $('#sekolah').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: route,
            type: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
            { data: 'name', name: 'name', render: function(data, type, row){
                return '<a href="'+row.link+'">'+row.name+'</a>'
            } },
            { data: 'total', name: 'total' },
            { data: 'sma', name: 'sma' },
            { data: 'smp', name: 'smp' },
            { data: 'sd', name: 'sd' },
            { data: 'tk', name: 'tk' },
            { data: 'paud', name: 'paud' }
        ],
        columnDefs: [
            { className: "dt-center", "targets": [ 0, 2, 3, 4, 5, 6, 7]}
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