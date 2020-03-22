<!-- Created by Ariful Islam at 03/20/2020 - 5:00 PM -->
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
                center: L.latLng(23.7805733, 90.2792399),
                layers: baseLayer,
                zoom: 10
            });
            var addressPoints = [];
            var confirmed = {!! $summary[0]->confirmed !!};
            {{--var mymapsdata = {!! $bymaps !!};--}}
            {{--for(var i=0; i<mymapsdata.length; i++){--}}
            {{--    var lat = parseFloat(mymapsdata[i].latitude);--}}
            {{--    var lon = parseFloat(mymapsdata[i].longitude);--}}
            {{--    var mydata=[lat, lon, "Confirmed: "+mymapsdata[i].confirmed];--}}
            {{--    //console.log(mydata);--}}
            {{--    addressPoints.push(mydata);--}}
            {{--}--}}
            var mydata=[23.7805733, 90.2792399, "Confirmed: "+confirmed];
            addressPoints.push(mydata);


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
            <div class="card shadow p-3 mb-5 bg-info text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($current->covid_test-$past->covid_test)}}</h3>
                    <h5> গত ২৪ ঘন্টায় কোভিড-১৯ পরীক্ষা হয়েছে </h5>

                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-danger text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($current->positive-$past->positive)}}</h3>
                    <h5> গত ২৪ ঘন্টায় কোভিড-১৯ পজিটিভ রোগী </h5>

                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-info text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($current->covid_test)}}</h3>
                    <h5> সর্বমোট কোভিড-১৯ পরীক্ষা হয়েছে </h5>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-danger text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($current->positive)}}</h3>
                    <h5>সর্বমোট কোভিড-১৯ পজিটিভ রোগ </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3 mb-5 bg-dark text-light rounded">
                <div class="card-body text-center">
                    <h5>{{en2bn(\Carbon\Carbon::parse($lastupdate->updated_at))}}</h5>
{{--                    <h5>{{en2bn(\Carbon\Carbon::parse($lastupdate->updated_at)->format('d-m-Y'))}}</h5>--}}
                    <h5>সর্বশেষ আপডেট </h5>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-primary text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->confirmed)}}</h3>
                    <h5> সর্বমোট আক্রান্তের সংখ্যা  </h5>

                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-danger text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->deaths)}}</h3>
                    <h5> সর্বমোট মৃতের সংখ্যা </h5>

                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-success text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->recovered)}}</h3>
                    <h5> সর্বমোট আরোগ্য লাভকারী </h5>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3 mb-5 bg-info text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->confirmed - ($summary[0]->deaths+$summary[0]->recovered))}}</h3>
                    <h5>সর্বমোট সক্রিয় রোগীর সংখ্যা</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow p-3 mb-5 bg-success text-light rounded">
                <div class="card-body text-center">
                    <h5> ১৬২৬৩ (স্বাস্থ্য বাতায়ন) </h5>
                    <h5> ৩৩৩ </h5>
                    <h5> জরুরী ফোন নাম্বার </h5>
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
                    <a class="nav-link active" data-toggle="tab" href="#home"> গত ২৪ ঘন্টার তথ্য </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1"> সর্বমোট তথ্য </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active" ><br>

                        <div class="card bg-primary text-light" style="margin-bottom: 2px;">
                            <div class="card-body">গত ২৪ ঘন্টায় হোম কোয়ারেন্টাইন : <b>{{en2bn($current->home_quarantine-$past->home_quarantine)}}</b></div>
                        </div>
                        <div class="card bg-primary text-light" style="margin-bottom: 2px;">
                            <div class="card-body">গত ২৪ ঘন্টায় হোম কোয়ারেন্টাইন ছাড়প্রাপ্ত: <b>{{en2bn($current->home_quarantine_release-$past->home_quarantine_release)}}</b></div>
                        </div>
                        <div class="card bg-primary text-light" style="margin-bottom: 2px;">
                            <div class="card-body">গত ২৪ ঘন্টায় অন্যান্য কোয়ারেন্টাইন : <b>{{en2bn($current->govt_quarantine-$past->govt_quarantine)}}</b></div>
                        </div>
                        <div class="card bg-primary text-light" style="margin-bottom: 2px;">
                            <div class="card-body">গত ২৪ ঘন্টায় অন্যান্য কোয়ারেন্টাইন ছাড়প্রাপ্ত : <b>{{en2bn($current->govt_quarantine_release-$past->govt_quarantine_release)}}</b></div>
                        </div>

                        <div class="card bg-primary text-light" style="margin-bottom: 2px;">
                            <div class="card-body">গত ২৪ ঘন্টায় মোট কোয়ারেন্টাইন : <b>{{en2bn(($current->home_quarantine-$past->home_quarantine)+($current->govt_quarantine-$past->govt_quarantine))}}</b></div>
                        </div>
                        <div class="card bg-primary text-light" style="margin-bottom: 2px;">
                            <div class="card-body">গত ২৪ ঘন্টায় মোট কোয়ারেন্টাইন ছাড়প্রাপ্ত : <b>{{en2bn(($current->home_quarantine_release-$past->home_quarantine_release)+($current->govt_quarantine_release-$past->govt_quarantine_release))}}</b></div>
                        </div>


                </div>
                <div id="menu1" class="container tab-pane fade" ><br>

                        <div class="card bg-success text-light" style="margin-bottom: 2px;">
                            <div class="card-body"> সর্বমোট হোম কোয়ারেন্টাইন : <b>{{en2bn($current->home_quarantine)}}</b></div>
                        </div>
                        <div class="card bg-success text-light" style="margin-bottom: 2px;">
                            <div class="card-body"> সর্বমোট হোম কোয়ারেন্টাইন ছাড়প্রাপ্ত : <b>{{en2bn($current->home_quarantine_release)}}</b></div>
                        </div>
                        <div class="card bg-success text-light" style="margin-bottom: 2px;">
                            <div class="card-body"> সর্বমোট অন্যান্য কোয়ারেন্টাইন : <b>{{en2bn($current->govt_quarantine)}}</b></div>
                        </div>
                        <div class="card bg-success text-light" style="margin-bottom: 2px;">
                            <div class="card-body"> সর্বমোট ঘন্টায় অন্যান্য কোয়ারেন্টাইন ছাড়প্রাপ্ত : <b>{{en2bn($current->govt_quarantine_release)}}</b></div>
                        </div>
                        <div class="card bg-success text-light" style="margin-bottom: 2px;">
                            <div class="card-body"> মোট কোয়ারেন্টাইন : <b>{{en2bn($current->home_quarantine+$current->govt_quarantine)}}</b></div>
                        </div>
                        <div class="card bg-success text-light" style="margin-bottom: 2px;">
                            <div class="card-body"> মোট কোয়ারেন্টাইন ছাড়প্রাপ্ত : <b>{{en2bn($current->home_quarantine_release+$current->govt_quarantine_release)}}</b></div>
                        </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <canvas id="bdchart"  ></canvas>
        </div>
    </div>


@endsection


@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script>

        var bdJsonFile = {!! $bd !!};
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
                    text: 'Covid 19 reports of Bangladesh'
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
                            labelString: 'Affected'
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Dates'
                        }
                    }]
                }
            }
        });


    </script>


@endsection
