@extends('panel.base')
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
{{ Breadcrumbs::render('panelsekolah') }}
</div>
<div class="col-md-12 mb-3">
    <div class="card-deck">
        <div class="card bg-secondary">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2 px-2">
              <div class="text-center text-white"><h5>Total Sekolah</h5></div>
              <a href="{{ $url['semuasekolah']}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsekolah']}}</h2>
            </div>
        </div>
        <div class="card bg-warning">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="text-center text-white">Total SMA</h5>
              <a href="{{ $url['semuasma'] }}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsma']}}</h2>
            </div>
        </div>
        <div class="card bg-info">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="text-center text-white">Total SMP</h5>
              <a href="{{ $url['semuasmp'] }}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsmp']}}</h2>
            </div>
        </div>
        <div class="card bg-danger">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="text-center text-white">Total SD</h5>
              <a href="{{ $url['semuasd'] }}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsd']}}</h2>
            </div>
        </div>
        <div class="card bg-primary">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="text-center text-white">Total TK</h5>
              <a href="{{$url['semuatk']}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['counttk']}}</h2>
            </div>
        </div>
        <div class="card bg-success">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="text-center text-white">Total PAUD</h5>
              <a href="{{$url['semuapaud']}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countpaud']}}</h2>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card border-blue">
        <div class="card-header bg-info">
            <div class="card-tittle text-center"><h3><strong>DAFTAR SEKOLAH PERWILAYAH</strong></h3></div>
        </div>
        <div class="card-body">
            <table class="table table-striped hover display compact" id="sekolah" class="display nowrap" style="width:100%">
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function () {
    $('#sekolah').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{ route('getprovsp') }}',
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
            {   targets: [ 0, 2, 3, 4, 5, 6, 7],
                className: 'text-center',
            }
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