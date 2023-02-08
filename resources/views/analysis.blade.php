@extends('layouts.main')

@section('container')
    <div class="container mb-4 text-center">
        <h1 class="mt-3">TTC Analysis Chart</h1>
    </div>

    <form action="#" method="GET">
        @csrf
        <div class="form-group mb-3">
            <div class="card flex-row p-3 w-75">
                <div class="col-4 pe-2">
                    <label for="start_date" class="w-100 text-center">Start Date</label>
                    <input type="date" class="form-control mt-1" name="start_date" id="start_date">
                </div>
                <div class="col-4 pe-2">
                    <label for="end_date" class="w-100 text-center">End Date</label>
                    <input type="date" class="form-control mt-1" name="end_date" id="end_date">
                </div>
                <div class="col-4 align-self-end">
                    <button id="search" type="submit" class="btn btn-primary mt-3 w-100">Search</button>
                </div>
            </div>
        </div>
    </form>

    <h1>Voltage</h1>
    <div class="chartBox mb-4"
        style="padding: 20px;border-radius: 20px;border: solid 3px rgba(54, 162, 235, 1);background: white;">
        <canvas id="voltageChart" height="120"></canvas>
    </div>

    <h1>Current</h1>
    <div class="chartBox mb-4"
        style="padding: 20px;border-radius: 20px;border: solid 3px rgba(54, 162, 235, 1);background: white;">
        <canvas id="currentChart" height="120"></canvas>
    </div>

    <h1>Temperature</h1>
    <div class="chartBox mb-4"
        style="padding: 20px;border-radius: 20px;border: solid 3px rgba(54, 162, 235, 1);background: white;">
        <canvas id="tempChart" height="120"></canvas>
    </div>

    <script>
        var vol = document.getElementById('voltageChart');
        var cur = document.getElementById('currentChart');
        var tmp = document.getElementById('tempChart');

        var detailChartVol = new Chart(vol, {
            type: "line",
            data: {
                labels: [],
                datasets: [],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    zoom: {
                        zoom: {
                            wheel: {
                                enabled: true,
                            },
                            pinch: {
                                enabled: true
                            },
                            drag: {
                                enabled: true
                            },
                            mode: 'xy',
                        },
                    }
                }
            },
        });

        var detailChartCur = new Chart(cur, {
            type: "line",
            data: {
                labels: [],
                datasets: [],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    zoom: {
                        zoom: {
                            wheel: {
                                enabled: true,
                            },
                            pinch: {
                                enabled: true
                            },
                            drag: {
                                enabled: true
                            },
                            mode: 'xy',
                        },
                    }
                }
            },
        });

        var detailChartTmp = new Chart(tmp, {
            type: "line",
            data: {
                labels: [],
                datasets: [],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    zoom: {
                        zoom: {
                            wheel: {
                                enabled: true,
                            },
                            pinch: {
                                enabled: true
                            },
                            drag: {
                                enabled: true
                            },
                            mode: 'xy',
                        },
                    }
                }
            },
        });

        var start_date = '';
        var end_date = '';


        var updateChartVoltage = function(start_date = '', end_date = '') {

            $.ajax({
                url: "/analysis/voltage",
                type: "GET",
                dataType: "json",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(data) {
                    // UPDATE CHART
                    detailChartVol.data.labels = data.labels;
                    detailChartVol.data.datasets = data.datasets;
                    detailChartVol.update();
                },
                error: function(data) {
                    console.log(data);
                },
            });
        };

        var updateChartCurrent = function(start_date = '', end_date = '') {

            $.ajax({
                url: "/analysis/current",
                type: "GET",
                dataType: "json",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(data) {
                    // UPDATE CHART
                    detailChartCur.data.labels = data.labels;
                    detailChartCur.data.datasets = data.datasets;
                    detailChartCur.update();
                },
                error: function(data) {
                    console.log(data);
                },
            });
        };

        var updateChartTmp = function(start_date = '', end_date = '') {

            $.ajax({
                url: "/analysis/temp",
                type: "GET",
                dataType: "json",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(data) {
                    // UPDATE CHART
                    detailChartTmp.data.labels = data.labels;
                    detailChartTmp.data.datasets = data.datasets;
                    detailChartTmp.update();
                },
                error: function(data) {
                    console.log(data);
                },
            });
        };

        $(window).on('load', function() {
            updateChartVoltage(start_date, end_date)
            updateChartCurrent(start_date, end_date)
            updateChartTmp(start_date, end_date)
        })


        $('#search').click(function(e) {
            e.preventDefault();
            start_date = $('#start_date').val()
            end_date = $('#end_date').val()

            console.log(`start date: ${start_date} | end date: ${end_date}`);

            updateChartVoltage(start_date, end_date)
            updateChartCurrent(start_date, end_date)
            updateChartTmp(start_date, end_date)
        })
    </script>
@endsection
