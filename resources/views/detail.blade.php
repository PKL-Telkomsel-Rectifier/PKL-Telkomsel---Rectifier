<div class="modal-header">
    <h1 class="modal-title fs-5">{{ $name }} Details</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="d-flex flex-column">
                <div class="me-3">
                    <Strong class="mb-2">Rectifier Details</Strong>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Rectifier</th>
                                <td>: {{ $name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">IP Rectifier</th>
                                <td>: {{ $ip_recti }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Community</th>
                                <td>: {{ $community }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <form action="#" method="GET" class="me-3 mt-3">
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
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="chartBox"
                style="padding: 20px;border-radius: 20px;border: solid 3px rgba(54, 162, 235, 1);background: white;">
                <canvas id="detailChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>


<script>
    var dChart = document.getElementById("detailChart");
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

    var detailChart = new Chart(dChart, {
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


    


    var updateChart = function(start_date, end_date ) {
        console.log(start_date, end_date)
        if (start_date == '' && end_date == ''){
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Warning!',
                text: 'Isi range tanggal terlebih dahulu',
                showConfirmButton: false,
                timer: 1500
            })
        } else {
            $.ajax({
                url: "{{ route('api.detail', ['rectifier' => $ip_recti]) }}",
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
                    detailChart.data.datasets[0].data = data.data["voltage"];
                    detailChart.data.datasets[1].data = data.data["current"];
                    detailChart.data.datasets[2].data = data.data["temp"];
                    detailChart.update();
                },
                error: function(data) {
                    console.log(data);
                },
            });
        }
    };

    $(window).on('load', function() {
        var start_date = '';
        var end_date = '';
    });

    $('#search').click(function(e) {
        e.preventDefault();
        start_date = $('#start_date').val()
        end_date = $('#end_date').val()

        console.log(`start date: ${start_date} | end date: ${end_date}`);

        updateChart(start_date, end_date)
    })
</script>
