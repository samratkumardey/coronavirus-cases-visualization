<!-- Created by Ariful Islam at 03/20/2020 - 5:00 PM -->
@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-primary text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->confirmed)}}</h3>
                    <h5>সর্বমোট নিশ্চিত রোগীর সংখ্যা</h5>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-danger text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->deaths)}}</h3>
                    <h5>সর্বমোট মৃত রোগীর সংখ্যা</h5>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-success text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->recovered)}}</h3>
                    <h5>সর্বমোট সুস্থ রোগীর সংখ্যা</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-info text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->confirmed - ($summary[0]->deaths+$summary[0]->recovered))}}</h3>
                    <h5>সর্বমোট সক্রিয় রোগীর সংখ্যা</h5>
                </div>
            </div>
        </div>
{{--        <div class="col-md-4">--}}
{{--            <div class="card shadow p-3 mb-5 bg-dark text-light rounded">--}}
{{--                <div class="card-body text-center">--}}
{{--                    <h5>{{en2bn(\Carbon\Carbon::parse($lastupdate->updated_at)->format('h:m'))}}</h5>--}}
{{--                    <h5>{{en2bn(\Carbon\Carbon::createFromFormat('m-d-Y', $lastupdate->batch)->format('d-m-y'))}}</h5>--}}
{{--                    <h5>সর্বশেষ আপডেট </h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-primary text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->confirmed)}}</h3>
                    <h5>সর্বমোট নিশ্চিত রোগীর সংখ্যা</h5>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-danger text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->deaths)}}</h3>
                    <h5>সর্বমোট মৃত রোগীর সংখ্যা</h5>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-success text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->recovered)}}</h3>
                    <h5>সর্বমোট সুস্থ রোগীর সংখ্যা</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-info text-light rounded">
                <div class="card-body text-center">
                    <h3>{{en2bn($summary[0]->confirmed - ($summary[0]->deaths+$summary[0]->recovered))}}</h3>
                    <h5>সর্বমোট সক্রিয় রোগীর সংখ্যা</h5>
                </div>
            </div>
        </div>
        {{--        <div class="col-md-4">--}}
        {{--            <div class="card shadow p-3 mb-5 bg-dark text-light rounded">--}}
        {{--                <div class="card-body text-center">--}}
        {{--                    <h5>{{en2bn(\Carbon\Carbon::parse($lastupdate->updated_at)->format('h:m'))}}</h5>--}}
        {{--                    <h5>{{en2bn(\Carbon\Carbon::createFromFormat('m-d-Y', $lastupdate->batch)->format('d-m-y'))}}</h5>--}}
        {{--                    <h5>সর্বশেষ আপডেট </h5>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
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
