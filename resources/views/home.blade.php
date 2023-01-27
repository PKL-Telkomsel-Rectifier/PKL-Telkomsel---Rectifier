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
                                        <p>Rectifier Processor : </p>
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
    </div>
@endsection
