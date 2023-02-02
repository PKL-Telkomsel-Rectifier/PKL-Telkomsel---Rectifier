<div class="modal-header">
    <h1 class="modal-title fs-5" id="modalRecti">{{ $name }} - ( {{ $ip_recti }} )</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="container">
        <div class="d-flex flex-row">
            <div class="col-4">
                <div class="d-flex flex-column">
                    <div class="me-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2" class="text-center fs-4">Rectifier Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Rectifier</th>
                                    <td> {{ $name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">IP Rectifier</th>
                                    <td> {{ $ip_recti }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Community</th>
                                    <td> {{ $community }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <form action="#" method="GET" class="me-3 mt-3">
                            <div class="mb-2">
                                <strong>Filter Data</strong>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="s-date" class="w-100 text-center">Start Date</label>
                                    <input type="date" class="form-control mt-1" name="s-date">
                                </div>
                                <div class="col-6">
                                    <label for="e-date" class="w-100 text-center">End Date</label>
                                    <input type="date" class="form-control mt-1" name="e-date">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 w-100">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8 my-auto"
                style="padding: 20px; border-radius: 20px; border: solid 3px #36a2eb; background: white;">
                <canvas id="rectifierChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>

{{-- CHART  --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- JQUERY  --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    var chart = document.getElementById('rectifierChart');

    var rectifierChart = new Chart(chart, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                    label: 'Rectifier Voltage',
                    data: [],
                    borderColor: "red",
                    backgroundColor: "red",
                    fill: false
                },
                {
                    label: "Rectifier Current",
                    data: [],
                    borderColor: "blue",
                    backgroundColor: "blue",
                    fill: false
                },
                {
                    label: "Rectifier Temperature",
                    data: [],
                    borderColor: "green",
                    backgroundColor: "green",
                    fill: false
                },
            ]
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
                rectifierChart.data.labels = data.labels;
                rectifierChart.data.datasets[0].data = data.data['voltage'];
                rectifierChart.data.datasets[1].data = data.data['current'];
                rectifierChart.data.datasets[2].data = data.data['temp'];
                rectifierChart.update();
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    updateChart();
    setInterval(() => {
        updateChart();
    }, 60000);
</script>
