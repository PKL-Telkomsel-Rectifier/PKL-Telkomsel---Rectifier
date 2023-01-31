@extends('layouts.main')

@section('container')
    <div class="container mb-4 text-center">
        <h1>{{ $title }}</h1>
    </div>
    <div class="filter d-flex justify-content-between">
        <div class="dropdown">
            <div class="bg-light rounded shadow-sm mb-4" style="padding: 12px">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    style="color:black">
                    Type Rectifier
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/home?type=TTC">TTC</a></li>
                    <li>
                        <hr class="dropdown-divider m-0">
                    </li>
                    <li><a class="dropdown-item" href="/home?type=Inner">Inner</a></li>
                    <li>
                        <hr class="dropdown-divider m-0">
                    </li>
                    <li><a class="dropdown-item" href="/home?type=Outer">Outer</a></li>
                </ul>
            </div>
        </div>

        <div class="p-1 bg-light rounded shadow-sm mb-4">
            <form action="/home" method="GET">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                        class="form-control border-0 bg-light">
                    <div class="input-group-append">
                        <button id="searchBtn" type="submit" name="searchBtn" class="btn btn-link text-primary"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach ($rectifiers as $rectifier)
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div>
                    <a href="#" class="data-card" data-bs-toggle="modal" data-bs-target="#modalRecti">
                        <h3>{{ $rectifier->name }}</h3>
                        <h4>{{ $rectifier->ip_recti }}</h4>
                        <p>Type Rectifier</p>
                        <span class="link-text">
                            Details
                            <svg width="25" height="16" viewBox="0 0 25 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                                    fill="#753BBD" />
                            </svg>
                        </span>
                    </a>
                    <div class="modal fade" id="modalRecti" data-bs-backdrop="static" tabindex="-1"
                        aria-labelledby="modalRecti" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalRecti">{{ $rectifier->name }}
                                        ({{ $rectifier->ip_recti }}) Details</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($rectifier->dataRectifiers as $data)
                                        Voltage : {{ $data->voltage }} V<br>
                                        Current : {{ $data->current }} A<br>
                                        Temperature : {{ $data->temp }} °C<br>
                                    @endforeach
                                        <div class="d-flex justify-content-center">
                                            <div class="card p-3">
                                                <div style="width: 600px; margin: auto;">
                                                    <canvas id="processorChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-end">

        {{ $rectifiers->links() }}
    </div>

    <script>
        @if (session()->has('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: "#14A44D",
                },
            }).showToast();
        @endif

        var chartData = {
            labels: ['17:00', '18.00', '19.00', '20.00', '21.00'],
            datasets: [{
                    label: "Voltage",
                    data: [35.5, 45.1, 33.2, 35.3, 36.4],
                    borderColor: "red",
                    fill: false
                },
                {
                    label: "Current",
                    data: [54.3, 44.9, 52.7, 34.9, 35.7],
                    borderColor: "blue",
                    fill: false
                },
                {
                    label: "Temperature",
                    data: [33.5, 43.1, 37.2, 39.3, 40.4],
                    borderColor: "green",
                    fill: false
                }
            ]
        };

        const prc = document.getElementById('processorChart');

        new Chart(prc, {
            type: 'line',
            data: chartData,
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
