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
{{ Breadcrumbs::render('spall', $kecamatan, $kota, $provinsi) }}
</div>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header bg-info">
            <div class="card-tittle text-center"><h3><strong>DAFTAR SEKOLAH PERWILAYAH</strong></h3></div>
        </div>
        <div class="card-body">
            <table class="table table-striped hover display compact" id="sekolah" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Satuan Pendidikan</th>
                        <th>Jenjang Pendidikan</th>
                        <th>NPSN</th>
                        <th>Desa/Kelurahan</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

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
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
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
            { data: 'action', name: 'action', orederable: false, searchable: false}
        ],
        columnDefs: [
            {   targets: [ 0, 2, 3, 4, 5],
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
                success: function (result) {
                        $('#sekolah').DataTable().ajax.reload();
                        $('#deleteModal').modal('hide');
                }
            });
        });
    });
</script>

@endsection