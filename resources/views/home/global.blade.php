<!-- Created by Ariful Islam at 03/20/2020 - 2:54 PM -->
@extends('layouts.master')

@section('head-js')
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
    <script src="https://unpkg.com/leaflet.markercluster@1.0.6/dist/leaflet.markercluster.js"></script>
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.0.6/dist/MarkerCluster.css"/>
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.0.6/dist/MarkerCluster.Default.css"/>

    <script type="text/javascript">
        window.onload = function() {

            L.mapquest.key = 'lYrP4vF3Uk5zgTiGGuEzQGwGIVDGuy24';
            var baseLayer = L.mapquest.tileLayer('map');

            var map = L.mapquest.map('map', {
                center: L.latLng(49.000, 50.000),
                layers: baseLayer,
                zoom: 2
            });
            var addressPoints = [];
            var mymapsdata = {!! $bymaps !!};
            for(var i=0; i<mymapsdata.length; i++){
                var lat = parseFloat(mymapsdata[i].latitude);
                var lon = parseFloat(mymapsdata[i].longitude);
                var mydata=[lat, lon, "Confirmed: "+mymapsdata[i].confirmed];
                //console.log(mydata);
                addressPoints.push(mydata);
            }
            // var mydata=[-37.8210922667, 175.2209316333, "2000"];


            var markers = L.markerClusterGroup();

            for (var i = 0; i < addressPoints.length; i++) {
                var addressPoint = addressPoints[i];
                var title = addressPoint[2];
                var marker = L.marker(new L.LatLng(addressPoint[0], addressPoint[1]), {
                    title: title,
                    icon: L.mapquest.icons.marker()
                });
                marker.bindPopup(title);
                markers.addLayer(marker);
            }

            map.addLayer(markers);
        }
    </script>
    @endsection


@section('content')

    <div class="row">
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-primary text-light rounded">
            <div class="card-body text-center">
                <h3>{{en2bn($summary[0]->confirmed)}}</h3>
                <h5>সর্বমোট আক্রান্তের সংখ্যা </h5>

            </div>
        </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-danger text-light rounded">
            <div class="card-body text-center">
                <h3>{{en2bn($summary[0]->deaths)}}</h3>
                <h5> সর্বমোট মৃতের সংখ্যা</h5>

            </div>
        </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-success text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->recovered)}}</h3>
                    <h5>সর্বমোট আরোগ্য লাভকারী</h5>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-info text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->confirmed - ($summary[0]->deaths+$summary[0]->recovered))}}</h3>
                    <h5>সর্বমোট সক্রিয় রোগী</h5>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-dark text-light rounded">
            <div class="card-body text-center">
                <h3>{{en2bn(count($countries))}}</h3>
                <h5>সর্বমোট আক্রান্ত দেশ</h5>
            </div>
        </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-dark text-light rounded">
            <div class="card-body text-center">
                <h5>{{en2bn(\Carbon\Carbon::parse($lastupdate->updated_at)->format('h:m'))}}</h5>
                <h5>{{en2bn(\Carbon\Carbon::parse($lastupdate->updated_at)->format('d-m-y'))}}</h5>
                <h5>সর্বশেষ আপডেট </h5>
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div id="map" style="width: 100%; height: 530px;"></div>
        </div>
        <div class="col-md-4">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">আক্রান্ত রোগী</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">মৃত </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">আরোগ্য লাভকারী</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu3"> সক্রিয় রোগী </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active" style="overflow: scroll; height: 500px"><br>

                    @foreach($data as $tab)
                        <div class="card bg-primary text-light" style="margin-bottom: 2px;">
                            <div class="card-body">{{txten2bn($tab->country)}} : <b>{{en2bn($tab->confirmed)}}</b></div>
                        </div>
                     @endforeach

                </div>
                <div id="menu1" class="container tab-pane fade" style="overflow: scroll; height: 500px"><br>

                    @foreach($data as $tab)
                        <div class="card bg-danger text-light" style="margin-bottom: 2px;">
                            <div class="card-body">{{txten2bn($tab->country)}} : <b>{{en2bn($tab->deaths)}}</b></div>
                        </div>
                    @endforeach
                </div>
                <div id="menu2" class="container tab-pane fade" style="overflow: scroll; height: 500px"><br>

                    @foreach($data as $tab)
                        <div class="card bg-success text-light" style="margin-bottom: 2px;">
                            <div class="card-body">{{txten2bn($tab->country)}} : <b>{{en2bn($tab->recovered)}}</b></div>
                        </div>
                    @endforeach
                </div>
                <div id="menu3" class="container tab-pane fade" style="overflow: scroll; height: 500px"><br>

                    @foreach($data as $tab)
                        <div class="card bg-info text-light" style="margin-bottom: 2px;">
                            <div class="card-body">{{txten2bn($tab->country)}} : <b>{{en2bn($tab->confirmed-($tab->deaths+$tab->recovered))}}</b></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            <canvas id="bdchart"  ></canvas>
        </div>
    </div>


@endsection


@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script>

        //Global Data
        var jsonFile = {!! $data !!};
        var displayTotalData = 9;
        var countries=[];
        var confirmed=[];
        var deaths=[];
        var recovered=[];
        for(var i=0; i<displayTotalData; i++){
            countries.push(jsonFile[i].country);
            confirmed.push(jsonFile[i].confirmed);
            deaths.push(jsonFile[i].deaths);
            recovered.push(jsonFile[i].recovered);
        }
        countries.push('Others');
        confirmed.push({!! $othersdata[0]->confirmed !!});
        deaths.push({!! $othersdata[0]->deaths !!});
        recovered.push({!! $othersdata[0]->recovered !!});


        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar', // also try bar or other graph types

            // The data for our dataset
            data: {
                labels:countries,
                // Information about the dataset
                datasets: [{
                    label: "Confirmed",
                    backgroundColor: 'lightblue',
                    borderColor: 'royalblue',
                    data: confirmed,
                },
                    {
                        label: "Death",
                        backgroundColor: 'red',
                        borderColor: 'royalblue',
                        data: deaths,
                    },
                    {
                        label: "Recovered",
                        backgroundColor: 'green',
                        borderColor: 'royalblue',
                        data: recovered,
                    }

                ]
            },

            // Configuration options
            options: {
                layout: {
                    padding: 10,
                },
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'করোনা ভাইরাস কোভিড-১৯ বিশ্বব্যাপী বিভিন্ন কেস বিশ্লেষণ'
                },
                "animation": {
                    "duration": 1,
                    "onComplete": function() {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;

                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function(dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function(bar, index) {
                                var data = dataset.data[index];
                                ctx.fillText(data, bar._model.x, bar._model.y - 5);
                            });
                        });
                    }
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'আক্রান্ত ব্যাক্তির সংখ্যা '
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'দেশ/এলাকার নাম'
                        }
                    }]
                }
            }
        });

        //data by time
        var bdJsonFile = {!! $databydates !!};
        var batches=[];
        var bdconfirmed=[];
        var bddeaths=[];
        var bdrecovered=[];
        for(var i=0; i<bdJsonFile.length; i++){
            batches.push(bdJsonFile[i].batch);
            bdconfirmed.push(bdJsonFile[i].confirmed);
            bddeaths.push(bdJsonFile[i].deaths);
            bdrecovered.push(bdJsonFile[i].recovered);
        }

        //BD Data
        var bdctx = document.getElementById('bdchart').getContext('2d');
        var bdchart = new Chart(bdctx, {


            // The type of chart we want to create
            type: 'line', // also try bar or other graph types

            // The data for our dataset
            data: {
                labels:batches,
                // Information about the dataset
                datasets: [{
                    label: "Confirmed",
                    backgroundColor: 'blue',
                    borderColor: 'royalblue',
                    fill: false,
                    data: bdconfirmed,
                },
                    {
                        label: "Death",
                        backgroundColor: 'red',
                        borderColor: 'red',
                        fill: false,
                        data: bddeaths,
                    },
                    {
                        label: "Recovered",
                        backgroundColor: 'green',
                        borderColor: 'green',
                        fill: false,
                        data: bdrecovered,
                    }

                ]
            },

            // Configuration options
            options: {
                responsive: true,
                layout: {
                    padding: 10,
                },
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'তারিখ অনুসারে করোনা ভাইরাস কোভিড-১৯ বিশ্বব্যাপী বিভিন্ন কেস বিশ্লেষণ '
                },
                "animation": {
                    "duration": 1,
                    "onComplete": function() {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;

                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function(dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function(bar, index) {
                                var data = dataset.data[index];
                                ctx.fillText(data, bar._model.x, bar._model.y - 5);

                            });
                        });
                    }
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'আক্রান্ত ব্যাক্তি'
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'তারিখ'
                        }
                    }]
                }
            }
        });





    </script>


@endsection
