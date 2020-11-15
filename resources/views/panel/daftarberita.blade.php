@extends('panel.base')

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.5/datatables.min.css"/>

@endsection

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <div class="card-tittle">Daftar Berita</div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="daftarberita" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Berita</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.5/datatables.min.js"></script>
<script>
$(function() {
    $('#daftarberita').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('getdaftarberita') !!}',
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "Semua"]],
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
            { data: 'title_berita', name: 'title_berita' },
        ]
    });
});
</script>
@endsection
