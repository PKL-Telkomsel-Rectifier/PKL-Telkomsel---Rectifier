<div class="modal-header">
    <h1 class="modal-title fs-5">Realtime chart: {{ $name }}</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="chartBox"
                style="padding: 20px;border-radius: 20px;border: solid 3px rgba(54, 162, 235, 1);background: white;">
                <canvas id="realtimeChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>

<script>
    var prc = document.getElementById("realtimeChart");
    var randomColors = [];

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    for (var i = 0; i < 3; i++) {
        randomColors.push(getRandomColor());
    }

    var realtimeChart = new Chart(prc, {
        type: "line",
        data: {
            labels: [],
            datasets: [{
                    label: "Rectifier Voltage",
                    data: [],
                    borderColor: randomColors[0],
                    backgroundColor: randomColors[0],
                    fill: false,
                },
                {
                    label: "Rectifier Current",
                    data: [],
                    borderColor: randomColors[1],
                    backgroundColor: randomColors[1],
                    fill: false,
                },
                {
                    label: "Rectifier Temperature",
                    data: [],
                    borderColor: randomColors[2],
                    backgroundColor: randomColors[2],
                    fill: false,
                },
            ],
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

    var updateChart = function() {

        $.ajax({
            url: "{{ route('api.realtime', ['rectifier' => $ip_recti]) }}",
            type: "GET",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function(data) {
                // UPDATE CHART
                realtimeChart.data.labels = data.labels;
                realtimeChart.data.datasets[0].data = data.data["voltage"];
                realtimeChart.data.datasets[1].data = data.data["current"];
                realtimeChart.data.datasets[2].data = data.data["temp"];
                realtimeChart.update();
            },
            error: function(data) {
                console.log(data);
            },
        });

    };
    updateChart();

    if ($(""))
        setInterval(() => {
            updateChart();
        }, 60000);
</script>
