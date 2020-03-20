<!-- Created by Ariful Islam at 03/20/2020 - 4:45 AM -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID19 Live Data</title>
    <style>
        .chart {
            border: 3px solid royalblue;
        }
    </style>
</head>
<body>

<div style="width:75%;">
    <canvas id="bdchart" width="960" height="1000"></canvas>
</div>

<div class="chart">
    <canvas id="myChart" width="960" height="2000"></canvas>
</div>

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
                backgroundColor: 'lightblue',
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

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'horizontalBar', // also try bar or other graph types

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
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Countries'
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Peoples'
                    }
                }]
            }
        }
    });



</script>


</body>
</html>
