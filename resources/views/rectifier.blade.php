
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

{{-- CHART  --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- JQUERY  --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    var prc = document.getElementById('voltageChart');

    var voltageChart = new Chart(prc, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Rectifier Voltage',
                data: [],
                borderColor: "red",
                fill: false
            }, 
            {
                label: "Rectifier Current",
                data: [],
                borderColor: "blue",
                fill: false
            },
            {
                label: "Rectifier Temperature",
                data: [],
                borderColor: "green",
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
                voltageChart.data.labels = data.labels;
                voltageChart.data.datasets[0].data = data.data['voltage'];
                voltageChart.data.datasets[1].data = data.data['current'];
                voltageChart.data.datasets[2].data = data.data['temp'];
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
    }, 60000);

</script>
