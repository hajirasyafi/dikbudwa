@extends('base')
@section('content')
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card my-4 border-blue">
                        <div class="card-header">
                            <div class="text-center">
                                Berita terbaru
                            </div>
                        </div>
                        <div class="card-body py-2 px-5">
                            <div class="row">
@foreach ($berita_models as $berita)
                                <div class="media py-3 border-bottom">
                                    <a href="#" class="float-left">
                                        <img src="db.png" width="150" height="150" class="img-fluid pr-3">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{route('berita', $berita->id)}}">
                                            <h3>{{$berita->title_berita}}</h3>
                                        </a>{!!Str::limit(strip_tags($berita->description), $limit=200, $end='...');!!}
                                        <a href="#">Baca Selengkapnya</a>
                                    </div>
                                </div>
@endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
@endsection
