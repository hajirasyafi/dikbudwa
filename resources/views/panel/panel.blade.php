@extends('panel.base')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
@endsection
@section('content')

<div class="col-md-12 mb-3">
    <div class="card-deck">
        <div class="card bg-secondary">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2 px-2">
              <div class="text-center text-white"><h5>Total Sekolah</h5></div>
              <a href="{{ $url['semuasekolah']}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsekolah']}}</h2>
            </div>
        </div>
        <div class="card bg-warning">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="text-center text-white">Total SMA</h5>
              <a href="{{ $url['semuasma'] }}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsma']}}</h2>
            </div>
        </div>
        <div class="card bg-info">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="text-center text-white">Total SMP</h5>
              <a href="{{ $url['semuasmp'] }}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsmp']}}</h2>
            </div>
        </div>
        <div class="card bg-danger">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="text-center text-white">Total SD</h5>
              <a href="{{ $url['semuasd'] }}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countsd']}}</h2>
            </div>
        </div>
        <div class="card bg-primary">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="text-center text-white">Total TK</h5>
              <a href="{{$url['semuatk']}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['counttk']}}</h2>
            </div>
        </div>
        <div class="card bg-success">
            <img class="card-img-top pt-2 px-5" src="{{asset('kemdikbud.png')}}" alt="kemdikbud">
            <div class="card-body py-2">
              <h5 class="text-center text-white">Total PAUD</h5>
              <a href="{{$url['semuapaud']}}" class="stretched-link"></a>
            </div>
            <div class="card-footer">
                <h2 class="card-text text-center text-white">{{$countall['countpaud']}}</h2>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="chart">
                <canvas id="sekolahChartBar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="chart">
                <canvas id="sekolahChartDoughnut" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="chart">
                <canvas id="sekolahChartHorizontal" style="min-height: 1500px; height: 1500px; max-height: 1500px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script type="text/javascript">
    $(function(){
        function renderChart(data, labels) {
            Chart.plugins.unregister(ChartDataLabels);
            var ctx = document.getElementById('sekolahChartBar').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 193, 7,1.0)',
                            'rgba(33, 150, 243,1.0)',
                            'rgba(244, 67, 54,1.0)',
                            'rgba(76, 175, 80,1.0)',
                            'rgba(156, 39, 176,1.0)'
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: true,
                    legend: {display: false},
                    title: {
                        display:true,
                        text: 'Data Statistik Sekolah Wahidiyah'
                    },
                    responsive: true,
                    plugins: {
                        datalabels: {
                            align: 'end',
                            anchor: 'end',
                            font: function(context) {
                                var w = context.chart.width;
                                return {
                                    size: w < 512 ? 12 : 12,
                                    weight: 'bold'
                                }
                            },
                            formatter: function(value, context) {
                                return context.chart.data[context.dataIndex];
                            }
                        }
                    },
                    elements: {
                        line: {
                            fill: true
                        }
                    },
                    scales: {
                      xAxes: [{
                        display: true,
                        offset: true
                      }],
                      yAxes: [{
                        ticks: {
                            stepSize: 5,
                            beginAtZero: true
                        }
                      }]
                    }
                }
            });
        }

        var url = "{{route('chartsekolah')}}";
        $.get(url, function(response){
            var data = Object.values(response);
            var labels = Object.keys(response);
            renderChart(data, labels);
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        function renderChart(data, labels) {
            Chart.plugins.unregister(ChartDataLabels);
            var ctx = document.getElementById('sekolahChartDoughnut').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Sekolah',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 193, 7,1.0)',
                            'rgba(33, 150, 243,1.0)',
                            'rgba(244, 67, 54,1.0)',
                            'rgba(76, 175, 80,1.0)',
                            'rgba(156, 39, 176,1.0)'
                        ],
                    }]
                },
                options: {
                    maintainAspectRatio: true,
                    legend: {display: false},
                    title: {
                        display:true,
                        text: 'Data Statistik Sekolah Wahidiyah',
                        padding: 20
                    },
                    responsive: true,
                    plugins: {
                        datalabels: {
                            align: 'end',
                            anchor: 'end',
                            font: function(context) {
                                var w = context.chart.width;
                                return {
                                    size: w < 512 ? 12 : 12,
                                    weight: 'bold'
                                }
                            },
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                        }
                    },
                }
            });
        }

        var url = "{{route('chartsekolah')}}";
        $.get(url, function(response){
            var data = Object.values(response);
            var labels = Object.keys(response);
            renderChart(data, labels);
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        function renderChart(data, labels) {
            Chart.plugins.unregister(ChartDataLabels);
            var ctx = document.getElementById('sekolahChartHorizontal').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'horizontalBar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'jumlah sekolah',
                        data: data,
                        backgroundColor: getRandomColorRgb
                    }]
                },
                options: {
                    title: {
                        display:true,
                        text: 'Data Statistik Sekolah Wahidiyah Nasional'
                    },
                    legend: {display: false},
                    maintainAspectRatio: true,
                    responsive: true,
                    plugins: {
                        datalabels: {
                            align: 'end',
                            anchor: 'end',
                            font: function(context) {
                                var w = context.chart.width;
                                return {
                                    size: w < 512 ? 12 : 12,
                                    weight: 'bold'
                                }
                            },
                            formatter: function(value, context) {
                                return context.chart.data[context.dataIndex];
                            }
                        }
                    },
                    scales: {
                      xAxes: [{
                        ticks: {
                            display: true,
                            stepSize: 5,
                            beginAtZero: true
                        }
                      }],
                      yAxes: [{
                      }]
                    }
                }
            });
        }
        var url = "{{route('chartspnasional')}}";
        $.get(url, function(response){
            var data = Object.values(response);
            var labels = Object.keys(response);
            renderChart(data, labels);
        });

        function getRandomColorRgb() {
            let red = Math.floor(Math.random() * 256);
            let green = Math.floor(Math.random() * 256);
            let blue = Math.floor(Math.random() * 256);
            return `rgb(${red}, ${green}, ${blue})`;
        }
    })
</script>
@endsection