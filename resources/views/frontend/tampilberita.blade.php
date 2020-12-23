@extends('frontend.base')
@section('content')
<div class="col-md-12">
    {{ Breadcrumbs::render('berita', $berita_models) }}
</div>
<div class="col-md-9">
    <div class="card my-4 border-blue">
        <div class="card-body" style="padding: 35px;">
            <h2>{{$berita_models->title_berita}}</h2>
            <hr>
                <div class="d-flex d-inline-block align-items-center">
                    <div class="px-2">
                        <i class="material-icons align-middle">date_range</i>
                        <span class="text-center align-middle">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $berita_models->created_at)->format('d-m-Y') }}</span>
                    </div>
                    <div class="px-2">
                        <span>|</span>
                    </div>
                    <div class="px-2">
                        <i class="material-icons align-middle">share</i>
                        <span class="text-center align-middle">Bagikan ke : 
                            <a href="whatsapp://send?text={{$berita_models->title_berita}} {{route('berita', $berita_models->slug)}}" type="button" class="btn btn-success text-white"><img src="{{asset('whatsapp.svg')}}" alt="whatsapp" style="height: 25px;"> WhatsApp</a>
                        </span>
                    </div>
                </div>
            <hr>
            {!!$berita_models->description!!}
        </div>
    </div>
</div>
@endsection
