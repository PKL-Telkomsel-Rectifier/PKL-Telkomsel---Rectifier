@extends('layouts.main')

@section('container')
    <div class="container my-5 d-flex align-items-center justify-content-center">
        <div class="card py-4 w-100" style="background-image:url('/img/memphis-bg.jpg')">
            <div class="container text-center mb-3">
                <h1>Form Rectifier</h1>
            </div>

            {{-- FORM ADD RECTIFIER  --}}
            <form action="/form" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="row mx-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" required>
                            <label for="name" class="form-label text-black" style="font-weight: bold">Rectifier
                                Name</label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" name="site_name"
                                class="form-control @error('site_name') is-invalid @enderror" id="site_name" required>
                            <label for="site_name" class="form-label text-black" style="font-weight: bold">Site Name</label>
                            @error('site_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <select name="rtpo" id="rtpo" class="form-select" required>
                                <option hidden value="">Choose RTPO...</option>
                                <option>Banjarnegara</option>
                                <option>Demak</option>
                                <option>Magelang</option>
                                <option>Pati</option>
                                <option>Pekalongan</option>
                                <option>Purwokerto</option>
                                <option>Semarang</option>
                                <option>Sragen</option>
                                <option>Surakarta</option>
                                <option>Tegal</option>
                                <option>Yogyakarta</option>
                            </select>
                            <label for="rtpo" class="form-label text-black" style="font-weight: bold">RTPO</label>
                        </div>

                        <div class="form-floating mb-4">
                            <select name="nsa" id="nsa" class="form-select" required>
                                <option hidden value="">Choose NSA...</option>
                                <option>Pekalongan</option>
                                <option>Purwokerto</option>
                                <option>Semarang</option>
                                <option>Solo</option>
                                <option>Yogyakarta</option>
                            </select>
                            <label for="nsa" class="form-label text-black" style="font-weight: bold">NSA</label>
                        </div>

                        <div class="form-floating mb-4">
                            <select name="type" id="type" class="form-select" required>
                                <option hidden value="">Choose type...</option>
                                <option>Inner</option>
                                <option>Outer</option>
                                <option>TTC</option>
                            </select>
                            <label for="type" class="form-label text-black" style="font-weight: bold">Type</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select id="port" class="form-select" required>
                                <option hidden value="">Choose port...</option>
                                <option>161</option>
                                <option>162</option>
                            </select>
                            <label for="port" class="form-label text-black" style="font-weight: bold">Port</label>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input name="ip_recti" type="text"
                                class="form-control @error('ip_recti') is-invalid @enderror" id="ip_recti" required>
                            <label for="ip_recti" class="form-label text-black" style="font-weight: bold">IP
                                Rectifier</label>
                            @error('ip_recti')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input name="community" type="text"
                                class="form-control @error('community') is-invalid @enderror" id="community" required>
                            <label for="community" class="form-label text-black" style="font-weight: bold">Community</label>
                            @error('community')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <select name="version" id="version" class="form-select" required>
                                <option hidden value="">Choose version...</option>
                                <option>1</option>
                                <option>2</option>
                            </select>
                            <label for="version" class="form-label text-black" style="font-weight: bold">Version</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input name="oid_voltage" type="text"
                                class="form-control @error('oid_voltage') is-invalid @enderror" id="oid_voltage" required>
                            <label for="oid_voltage" class="form-label text-black" style="font-weight: bold">OID
                                (Voltage)</label>
                            @error('oid_voltage')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input name="oid_current" type="text"
                                class="form-control @error('oid_current') is-invalid @enderror" id="oid_current" required>
                            <label for="oid_current" class="form-label text-black" style="font-weight: bold">OID (Total
                                Current)</label>
                            @error('oid_current')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input name="oid_temp" type="text"
                                class="form-control @error('oid_temp') is-invalid @enderror" id="oid_temp" required>
                            <label for="oid_temp" class="form-label text-black" style="font-weight: bold">OID
                                (Temperature)</label>
                            @error('oid_temp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
            new mdb.Input(formOutline).init();
        });
        (() => {
            'use strict'

            // Ambil semua form yang memiliki class .needs-validation
            const forms = document.querySelectorAll('.needs-validation')

            // Lakukan loop pada setiap form dan cek validitas
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
