@extends('layouts.main')

@section('container')
    <div class="container mb-4 text-center">
        <h1 class="mt-3">TTC Analysis Chart</h1>
    </div>

    <form action="#" method="GET" >
        @csrf
        <div class="mb-2">
            <strong>Filter Data</strong>
        </div>
        <div class="form-group row">
            <div class="col-6">
                <label for="start_date" class="w-100 text-center">Start Date</label>
                <input type="date" class="form-control mt-1" name="start_date" id="start_date">
            </div>
            <div class="col-6">
                <label for="end_date" class="w-100 text-center">End Date</label>
                <input type="date" class="form-control mt-1" name="end_date" id="end_date">
            </div>
        </div>
        <button id="search" type="submit" class="btn btn-primary mt-3 w-100">Search</button>
    </form>

    <div class="chartBox mb-4"
        style="padding: 20px;border-radius: 20px;border: solid 3px rgba(54, 162, 235, 1);background: white;">
        <canvas id="analysisChart" height="120"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('analysisChart');

        var detailChart = new Chart(ctx, {
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


        var updateChart = function(start_date = '', end_date = '') {

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
                    detailChart.data.labels = data.labels;
                    detailChart.data.datasets = data.datasets;
                    detailChart.update();
                },
                error: function(data) {
                    console.log(data);
                },
            });
        };

        $(window).on('load', function() {
            updateChart(start_date, end_date)
        })
        

        $('#search').click(function(e) {
            e.preventDefault();
            start_date = $('#start_date').val()
            end_date = $('#end_date').val()

            console.log(`start date: ${start_date} | end date: ${end_date}`);

            updateChart(start_date, end_date)
        })
    </script>
@endsection
