@extends('layouts.main')

@section('container')
    <div class="container mb-4 text-center">
        <h1>All Rectifiers</h1>
    </div>

    <div class="row">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @foreach ($rectifiers as $rectifier)
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rectifier name : {{ $rectifier->name }}</h5>
                        <p class="card-text">Community name : {{ $rectifier->community }}</p>
                        <a href="/rectifier/{{ $rectifier->ip_recti }}" class="btn btn-primary">Details</a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#rectifierData">
                            Launch demo modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="rectifierData" tabindex="-1" data-bs-backdrop="static"
                            aria-labelledby="rectifierData" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="rectifierData">Rectifier
                                            {{ $rectifier->community }} ( {{ $rectifier->address }} )</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach ($rectifier->dataRectifiers as $data)
                                            <p>Data voltage: {{ $data->voltage }}</p>
                                            <p>Data current: {{ $data->current }}</p>
                                            <p>Data temp: {{ $data->temp }}</p>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div>
                <a href="/rectifier/{{ $rectifier->ip_recti }}" class="data-card">
                    <h2>{{ $rectifier->community }}</h2>
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
            </div>
        </div>
    </div>
@endsection
