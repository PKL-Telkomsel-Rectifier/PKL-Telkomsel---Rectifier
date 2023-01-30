@extends('layouts.main')

@section('container')
    <div class="container text-center mb-5">
        <h1>Rectifier name {{ $name }} ( {{ $ip_recti }} )</h1>
    </div>
    <div class="container">
        <h1>Voltage : {{ $voltage }}</h1>
        <h1>Current : {{ $current }}</h1>
        <h1>Temp : {{ $temp }}</h1>
    </div>
    <div class="row">
        <div class="d-flex col-6">
            <div class="card mt-3 p-3">
                <div style="width: 600px; margin: auto;">
                    <canvas id="processorChart"></canvas>
                </div>
            </div>
        </div>
        <div class="d-flex col-6">
            <div class="card mt-3 p-3">
                <div style="width: 600px; margin: auto;">
                    <canvas id="memoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-3 mb-5">
        <a type="button" class="btn btn-primary" href="/home">Back</a>
    </div>

    <script>
        const prc = document.getElementById('processorChart');
        const mry = document.getElementById('memoryChart');

        new Chart(prc, {
            type: 'line',
            data: {
                labels: ['17:00', '18.00', '19.00', '20.00', '21.00'],
                datasets: [{
                    label: 'Rectifier Processor',
                    data: [234, 123, 214, 221, 543],
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

        new Chart(mry, {
            type: 'line',
            data: {
                labels: ['17:00', '18.00', '19.00', '20.00', '21.00'],
                datasets: [{
                    label: 'Rectifier Memory',
                    data: [234, 123, 214, 221, 543],
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
    </script>
@endsection
