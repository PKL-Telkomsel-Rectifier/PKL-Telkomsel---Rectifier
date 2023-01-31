@extends('layouts.main')

@section('container')
    <div class="container text-center mb-5">
        <h1>Rectifier name {{ $name }} ( {{ $ip_recti }} )</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="container" style="background-color: aliceblue">
                <canvas id="voltageChart"></canvas>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-3 mb-5">
        <a type="button" class="btn btn-primary" href="/home">Back</a>
    </div>

    <script>
        const prc = document.getElementById('voltageChart');
        const mry = document.getElementById('memoryChart');

        var voltageChart = new Chart(prc, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Rectifier Voltage',
                    data: [],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var updateChart = function() {
            $.ajax({
                url: "{{ route('api.chart', ['rectifier' => $ip_recti]) }}",
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    voltageChart.data.labels = data.labels;
                    voltageChart.data.datasets[0].data = data.data;
                    voltageChart.update();
                },
                error: function(data){
                    console.log(data);
                }
            });
        }

        updateChart();
        setInterval(() => {
            updateChart();
        }, 2000);

    </script>
@endsection
