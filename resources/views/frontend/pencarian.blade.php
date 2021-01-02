@extends('frontend.base')

@section('content')
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-blue">
                <div class="card-header">
                    <div class="text-center">
                        Hasil Pencarian
                    </div>
                </div>
                <div class="card-body py-2 px-5">
                    <div class="row d-flex justify-content-center">
                        @if(count($searchResults) > 0)
                            @foreach($searchResults as $searchResult)
                                <div class="media py-3 border-bottom">
                                    <a href="#" class="float-left">
                                        <img src="db.png" width="150" height="150" class="img-fluid pr-3">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ $searchResult->url }}">
                                            <h3>{{ $searchResult->title }}</h3>
                                        </a>
                                        {!!Str::limit(strip_tags($searchResult->searchable->description), $limit=200, $end='...');!!}
                                        <a href="{{ $searchResult->url }}">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning" role="alert">
                            Pencarian tidak ditemukan.
                            </div>
                        @endif
                    </div>
                    <div class="text-center" style="margin-top: 20px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection