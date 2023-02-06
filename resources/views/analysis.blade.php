@extends('layouts.main')

@section('container')
    <div class="container mb-4 text-center">
        <h1 class="mt-3">TTC Analysis Chart</h1>
    </div>

    <form action="#" method="GET">
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
    <div class="chartBox mb-4"
        style="padding: 20px;border-radius: 20px;border: solid 3px rgba(54, 162, 235, 1);background: white;">
        <canvas id="analysisChart" height="120"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('analysisChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    maintainAspectRatio: false,
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
