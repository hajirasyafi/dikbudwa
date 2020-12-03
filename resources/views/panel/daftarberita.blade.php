@extends('panel.base')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
@endsection

@section('content')
<div class="col-md-12">
{{ Breadcrumbs::render('daftarberita') }}
</div>
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
$(function() {
    $('#daftarberita').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('getdaftarberita') !!}',
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "Semua"]],
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
            { data: 'title_berita', name: 'title_berita' },
            { data: 'action', name: 'action', orederable: false, searchable: false},
        ]
    });
});
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "deleteberita/"+id,
                method: 'get',
                success: function (result) {
                        $('#daftarberita').DataTable().ajax.reload();
                        $('#deleteModal').modal('hide');
                }
            });
        });
    });
</script>
@endsection
