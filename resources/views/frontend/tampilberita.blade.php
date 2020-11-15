@extends('base')
@section('content')
<div class="col-md-9">
    <div class="card my-4 border-blue">
        <div class="card-body p-5 p-sm-2">
            <h2>{{$berita_models->title_berita}}</h2>
            {!!$berita_models->description!!}
        </div>
    </div>
</div>
@endsection
