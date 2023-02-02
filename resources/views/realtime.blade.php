<div class="modal-header">
    <h1 class="modal-title fs-5">Realtime chart: {{ $name }}</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal"
        aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="chart-container" style="width:100%">
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
    var realtimeChart = new Chart(prc, {
        type: "line",
        data: {
            labels: [],
            datasets: [
                {
                    label: "Rectifier Voltage",
                    data: [],
                    borderColor: "red",
                    fill: false,
                },
                {
                    label: "Rectifier Current",
                    data: [],
                    borderColor: "blue",
                    fill: false,
                },
                {
                    label: "Rectifier Temperature",
                    data: [],
                    borderColor: "green",
                    fill: false,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },plugins: {
                zoom: {
                    zoom: {
                        wheel: {
                            enabled: true,
                        },
                        pinch: {
                            enabled: true
                        },
                        drag: {
                            enabled:true
                        },
                        mode: 'xy',
                    },
                }
            }
        },
    });

    var updateChart = function () {
        
        $.ajax({
            url: "{{ route('api.realtime', ['rectifier' => $ip_recti]) }}",
            type: "GET",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                // UPDATE CHART
                realtimeChart.data.labels = data.labels;
                realtimeChart.data.datasets[0].data = data.data["voltage"];
                realtimeChart.data.datasets[1].data = data.data["current"];
                realtimeChart.data.datasets[2].data = data.data["temp"];
                realtimeChart.update();
            },
            error: function (data) {
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
