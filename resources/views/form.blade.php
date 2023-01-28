@extends('layouts.main')

@section('container')
    <div class="container mb-3 d-flex align-items-center justify-content-center">
        <div class="card py-4 w-100" style="background-image:url('/img/memphis-bg.jpg')">
            <div class="container text-center mb-3">
                <h1>Form Rectifier</h1>
            </div>
            <form action="#" method="#" class="needs-validation" novalidate>
                <div class="row mx-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="recti-name" required>
                            <label for="recti-name" class="form-label text-black" style="font-weight: bold">Rectifier
                                Name</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="site-name" required>
                            <label for="site-name" class="form-label text-black" style="font-weight: bold">Site Name</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select id="rtpo" class="form-select" required>
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
                            <select id="nsa" class="form-select" required>
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
                            <select id="type" class="form-select" required>
                                <option hidden value="">Choose type...</option>
                                <option>Inner</option>
                                <option>Outer</option>
                                <option>TTC</option>
                            </select>
                            <label for="type" class="form-label text-black" style="font-weight: bold">Type</label>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="ip-recti" required>
                            <label for="ip-recti" class="form-label text-black" style="font-weight: bold">IP
                                Rectifier</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="community" required>
                            <label for="community" class="form-label text-black" style="font-weight: bold">Community</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select id="version" class="form-select" required>
                                <option hidden value="">Choose version...</option>
                                <option>1</option>
                                <option>2</option>
                            </select>
                            <label for="version" class="form-label text-black" style="font-weight: bold">Version</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="oid-v" required>
                            <label for="oid-v" class="form-label text-black" style="font-weight: bold">OID
                                (Voltage)</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="oid-c" required>
                            <label for="oid-c" class="form-label text-black" style="font-weight: bold">OID (Total
                                Current)</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="oid-t" required>
                            <label for="oid-t" class="form-label text-black" style="font-weight: bold">OID
                                (Temperature)</label>
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
