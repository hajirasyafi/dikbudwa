@extends('frontend.base')

@section('content')
<div class="col-md-12">
{{ Breadcrumbs::render('semuaberita') }}
</div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-blue">
                <div class="card-header">
                    <div class="text-center">
                        Berita terbaru
                    </div>
                </div>
                <div class="card-body py-2 px-5">
                    <div class="row d-flex justify-content-center">
                        @if(count($berita_models) > 0)
                            @foreach ($berita_models as $berita)
                                <div class="media py-3 border-bottom">
                                    <a href="#" class="float-left">
                                        <img src="db.png" width="150" height="150" class="img-fluid pr-3">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{route('berita', $berita->slug)}}">
                                            <h3>{{$berita->title_berita}}</h3>
                                        </a>{!!Str::limit(strip_tags($berita->description), $limit=200, $end='...');!!}
                                        <a href="{{route('berita', $berita->slug)}}">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <div class="alert alert-warning" role="alert">
                        Tidak ada berita terbaru.
                        </div>
                        @endif
                    </div>
                    <div class="text-center" style="margin-top: 20px;">
                    {{$berita_models->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
