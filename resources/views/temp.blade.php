@extends('layouts.main')

@section('container')
<canvas id="line-chart" height="80"></canvas>

<script>
var ctx = document.getElementById("line-chart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            @foreach ($datarectifiers as $datarectifier)
                "{{ $datarectifier->created_at }}",
            @endforeach
        ],
        datasets: [
            @foreach ($rectifiers as $rectifier)
            {
                label: "{{ $rectifier->name }} (Voltage)",
                data: [
                    @foreach ($datarectifiers as $datarectifier)
                        @if ($datarectifier->rectifier_id == $rectifier->id)
                            {{ $datarectifier->voltage }},
                        @endif
                    @endforeach
                ],
                backgroundColor: "rgba(153,255,51,0.4)"
            },
            {
                label: "{{ $rectifier->name }} (Current)",
                data: [
                    @foreach ($datarectifiers as $datarectifier)
                        @if ($datarectifier->rectifier_id == $rectifier->id)
                            {{ $datarectifier->current }},
                        @endif
                    @endforeach
                ],
                backgroundColor: "rgba(255,153,0,0.4)"
            },
            {
                label: "{{ $rectifier->name }} (Temperature)",
                data: [
                    @foreach ($datarectifiers as $datarectifier)
                        @if ($datarectifier->rectifier_id == $rectifier->id)
                            {{ $datarectifier->temperature }},
                        @endif
                    @endforeach
                ],
                backgroundColor: "rgba(255,99,132,0.4)"
            },
            @endforeach
        ]
    }
});
</script>

@endsection