@extends('panel.base')

@section('css')
<link rel="stylesheet"
      href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.4.1/build/styles/default.min.css">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Buat postingan baru</h3>
            </div>
            <form role="form" method="post" action="{{route('updateberita', $berita->id)}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="judul" id="judul">Judul</label>
                  <input type="text" name="title_berita" class="form-control" id="judul" required value="{{$berita->title_berita}}">
                </div>
                <div id="standalone-container">
                  <div id="toolbar-container">
                    <span class="ql-formats">
                      <select class="ql-font"></select>
                      <select class="ql-size"></select>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-bold"></button>
                      <button class="ql-italic"></button>
                      <button class="ql-underline"></button>
                      <button class="ql-strike"></button>
                    </span>
                    <span class="ql-formats">
                      <select class="ql-color"></select>
                      <select class="ql-background"></select>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-script" value="sub"></button>
                      <button class="ql-script" value="super"></button>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-header" value="1"></button>
                      <button class="ql-header" value="2"></button>
                      <button class="ql-blockquote"></button>
                      <button class="ql-code-block"></button>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-list" value="ordered"></button>
                      <button class="ql-list" value="bullet"></button>
                      <button class="ql-indent" value="-1"></button>
                      <button class="ql-indent" value="+1"></button>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-direction" value="rtl"></button>
                      <select class="ql-align"></select>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-link"></button>
                      <button class="ql-image"></button>
                      <button class="ql-video"></button>
                      <button class="ql-formula"></button>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-clean"></button>
                    </span>
                  </div>
                  <div id="description"></div>
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
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.4.1/build/highlight.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
  var quill = new Quill('#description', {
    modules: {
      syntax: true,
      toolbar: '#toolbar-container'
    },
    placeholder: 'Ketik teks disini....',
    theme: 'snow',
  });
  quill.setContents([
      { insert: '{!!$berita->description!!}' }
    ]);
</script>
@endsection