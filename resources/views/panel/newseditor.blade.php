@extends('panel.base')

@section('css')
<link href="{{asset('summernote/summernote-bs4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Buat postingan baru</h3>
            </div>
            <form role="form" method="post" action="{{route('storeberita')}}" id="form">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="judul" id="judul">Judul</label>
                  <input type="text" name="title_berita" class="form-control" id="title_berita" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="description" id="description"></textarea>
                </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
              </div>
            </form>
          </div>
        </div>
@endsection

@section('script')
<script src="{{asset('summernote/summernote-bs4.min.js')}}"></script>
<script>
$(document).ready(function() {
$('#description').summernote({
    placeholder: 'Masukkan teks disini...',
});
});
</script>
@endsection