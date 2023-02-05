@extends('layouts.main')

@section('container')
    <div class="container mb-4 text-center">
        <h1>{{ $title }}</h1>
    </div>
    <div class="filter d-flex justify-content-between">

        {{-- DROPDOWN  --}}
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

        {{-- SEARCH  --}}
        <div class="p-1 bg-light rounded shadow-sm mb-4">
            <form action="/home" method="GET">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                        class="form-control border-0 bg-light">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- CONTENT  --}}
    <main>
        <div class="row">
            @if ($rectifiers->count())
                @foreach ($rectifiers as $rectifier)
                    <div id="recti-list" class="col-sm-3 mb-3 mb-sm-0">
                        <div class="data-card">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="edit/{{ $rectifier->ip_recti }}" id="edit-recti"><i class="bi bi-pencil-square fa-2x"></i></a>
                                </div>
                                <div class="col-md-6">
                                    <a href="delete/{{ $rectifier->ip_recti }}" id="delete-recti" ><i class="bi bi-trash fa-2x"></i></a>
                                </div>
                            </div>
                        
                            <h3>{{ $rectifier->name }}</h3>
                            <h4>{{ $rectifier->ip_recti }}</h4>
                            <h6>Voltage : {{ $rectifier->dataRectifiers->last()->voltage }}</h6>
                            <h6>Current : {{ $rectifier->dataRectifiers->last()->current }}</h6>
                            <h6>Temperature : {{ $rectifier->dataRectifiers->last()->temp }}</h6>
                            <p>Site : {{ $rectifier->site_name }}</p>
                            <p>RTPO : {{ $rectifier->rtpo }}</p>
                            <p>NSA : {{ $rectifier->nsa }}</p>
                            <p>Type : {{ $rectifier->type }}</p>
                            <div class="d-flex flex-row">
                                <div class="col-6">
                                    <a href="javascript:void(0)" class="detail-btn" data-bs-toggle="modal"
                                        data-id="{{ $rectifier->ip_recti }}" data-bs-target="#modalRecti">
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
                                <div class="col-6">
                                    <a href="javascript:void(0)" class="realtime-btn" data-bs-toggle="modal"
                                        data-id="{{ $rectifier->ip_recti }}" data-bs-target="#modalRecti">
                                        <span class="link-text">
                                            Realtime
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
                    </div>
                @endforeach
            @else
                <h3 class="text-center fs-3">No Rectifier found.</h3>
            @endif
    
            {{-- MODALS  --}}
            <div class="modal fade" id="modalRecti" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalRecti"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content" style="background-image: url('/img/memphis-bg.jpg')">
                    </div>
                </div>
            </div>
    
        </div>
    
        <div class="d-flex justify-content-end">
            {{ $rectifiers->links() }}
        </div>
    </main>

    <script>
        // TOAST
        @if (request()->has('success'))
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


        // AJAX MODAL realtime
        $(".realtime-btn").click(function() {
            const ip_recti = $(this).attr("data-id");

            try {
                $.ajax({
                    url: "rectifier/realtime/" + ip_recti,
                    type: "GET",
                    success: function(data) {
                        $(".modal-content").html(data);
                    },
                    error: function(data) {
                        console.log(data);
                    },
                });
            } catch (error) {
                console.log(error);
            }
        });

        // AJAX MODAL DETAIL
        $(".detail-btn").click(function() {
            const ip_recti = $(this).attr("data-id");

            try {
                $.ajax({
                    url: "rectifier/detail/" + ip_recti,
                    type: "GET",
                    success: function(data) {
                        $(".modal-content").html(data);
                    },
                    error: function(data) {
                        console.log(data);
                    },
                });
            } catch (error) {
                console.log(error);
            }
        });

        // AJAX MODAL update
        $("#edit-recti").click(function() {
            const ip_recti = $(this).attr("data-id");
            
            try {
                $.ajax({
                    url: "edit/" + ip_recti,
                    type: "GET",
                    success: function(data) {
                        $(".modal-content").html(data);
                    },
                    error: function(data) {
                        console.log(data);
                    },
                });
            } catch (error) {
                console.log(error);
            }
        });
    </script>
@endsection
