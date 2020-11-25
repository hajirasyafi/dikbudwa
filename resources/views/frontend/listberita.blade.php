@extends('frontend.base')

@section('carousel')
    <div id="carouseldikdasmen" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('1.jpg')}}" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="{{asset('2.jpg')}}" class="d-block w-100">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouseldikdasmen" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouseldikdasmen" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection

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
        <div class="col-md-4">
          <div class="card my-4 border-blue">
            <div class="card-header">
              <div class="text-center">Sekolah Wahidiyah</div>
            </div>
            <div class="card-body">
                <div class="alert alert-info text-center">
                  <a href="{{route('sekolah')}}" class="alert-link">
                    <img src="{{asset('school-building.png')}}" class="img-responsive" width="100%">
                  </a>
                  <a href="{{route('sekolah')}}" class="alert-link text-center">
                    <strong>Data Sekolah Wahidiyah</strong>
                  </a>
                </div>
            </div>
          </div>
        </div>
        
@endsection
