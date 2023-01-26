@extends('layouts.main')

@section('container')
    <div class="container mb-4 text-center">
        <h1>All Rectifiers</h1>
    </div>

    <div class="row">
        @foreach ($rectifiers as $rectifier)
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rectifier name : {{ $rectifier->getName($rectifier) }}</h5>
                        <p class="card-text">Community name : {{ $rectifier->community }}</p>
                        <a href="/rectifier/{{ $rectifier->ip_recti }}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
