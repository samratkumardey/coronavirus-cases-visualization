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
        <div class="col-md-3">
            <div class="card bg-light shadow p-3 mb-5 bg-white rounded">
            <div class="card-body text-center">
                <h4>{{$summary[0]->confirmed}}</h4>
                <p>Total Confirmed</p>
            </div>
        </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light shadow p-3 mb-5 bg-white rounded">
            <div class="card-body text-center">
                <h4>{{$summary[0]->deaths}}</h4>
                <p>Total Deaths</p>
            </div>
        </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light shadow p-3 mb-5 bg-white rounded">
            <div class="card-body text-center">
                <h4>{{$summary[0]->recovered}}</h4>
                <p>Total Recovered</p>
            </div>
        </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light shadow p-3 mb-5 bg-white rounded">
            <div class="card-body text-center">
                <h4>{{count($countries)}}</h4>
                <p>Total Country/Region</p>
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div id="map" style="width: 100%; height: 530px;"></div>
        </div>
        <div class="col-md-3">
            <p>Lorem ipsum dolor sit amet, consectetur.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <canvas id="myChart"></canvas>
        </div>
    </div>


@endsection


@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script>

        //Global Data
        var jsonFile = {!! $data !!};
        var countries=[];
        var confirmed=[];
        var deaths=[];
        var recovered=[];
        for(var i=0; i<jsonFile.length; i++){
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
                    text: 'Covid 19 reports'
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
                            labelString: 'Persons'
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Countries'
                        }
                    }]
                }
            }
        });



    </script>


@endsection
