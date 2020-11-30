<div class="col-md-12 mb-3">
    <div class="card-deck">
        <div class="card bg-secondary">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2 px-2">
              <div class="card-title text-center text-white"><h5>Total Sekolah</h5></div>
              <a href="{{route('semuasekolah')}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsekolah']}}</h2>
            </div>
        </div>
        <div class="card bg-warning">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="card-title text-center text-white">Total SMA</h5>
              <a href="{{route('semuasma')}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsma']}}</h2>
            </div>
        </div>
        <div class="card bg-info">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="card-title text-center text-white">Total SMP</h5>
              <a href="{{route('semuasmp')}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsmp']}}</h2>
            </div>
        </div>
        <div class="card bg-danger">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="card-title text-center text-white">Total SD</h5>
              <a href="{{route('semuasd')}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsd']}}</h2>
            </div>
        </div>
        <div class="card bg-primary">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="card-title text-center text-white">Total TK</h5>
              <a href="{{route('semuatk')}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['counttk']}}</h2>
            </div>
        </div>
        <div class="card bg-success">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="card-title text-center text-white">Total PAUD</h5>
              <a href="{{route('semuapaud')}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countpaud']}}</h2>
            </div>
        </div>
    </div>
</div>