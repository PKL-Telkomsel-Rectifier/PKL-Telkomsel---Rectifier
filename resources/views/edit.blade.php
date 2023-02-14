<div class="modal-header">
    <h1 class="modal-title fs-5">{{ $rectifier->name }}</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="container text-center mb-3">
        <h1>Edit Rectifier</h1>
    </div>

    <form action="/edit/{{ $rectifier->ip_recti }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('put')

        <div class="row mx-3">
            <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" required value="{{ $rectifier->name }}">
                    <label for="name" class="form-label text-black" style="font-weight: bold">Rectifier
                        Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror"
                        id="site_name" required value="{{ $rectifier->site_name }}">
                    <label for="site_name" class="form-label text-black" style="font-weight: bold">Site
                        Name</label>
                    @error('site_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <select name="rtpo" id="rtpo" class="form-select" required>
                        <option hidden value="">Choose RTPO...</option>
                        <option {{ $rectifier->rtpo === 'Banjarnegara' ? 'selected' : '' }}>Banjarnegara
                        </option>
                        <option {{ $rectifier->rtpo === 'Demak' ? 'selected' : '' }}>Demak</option>
                        <option {{ $rectifier->rtpo === 'Magelang' ? 'selected' : '' }}>Magelang</option>
                        <option {{ $rectifier->rtpo === 'Pati' ? 'selected' : '' }}>Pati</option>
                        <option {{ $rectifier->rtpo === 'Pekalongan' ? 'selected' : '' }}>Pekalongan</option>
                        <option {{ $rectifier->rtpo === 'Purwokerto' ? 'selected' : '' }}>Purwokerto</option>
                        <option {{ $rectifier->rtpo === 'Semarang' ? 'selected' : '' }}>Semarang</option>
                        <option {{ $rectifier->rtpo === 'Sragen' ? 'selected' : '' }}>Sragen</option>
                        <option {{ $rectifier->rtpo === 'Surakarta' ? 'selected' : '' }}>Surakarta</option>
                        <option {{ $rectifier->rtpo === 'Tegal' ? 'selected' : '' }}>Tegal</option>
                        <option {{ $rectifier->rtpo === 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                    </select>
                    <label for="rtpo" class="form-label text-black" style="font-weight: bold">RTPO</label>
                </div>

                <div class="form-floating mb-4">
                    <select name="nsa" id="nsa" class="form-select" required>
                        <option hidden value="">Choose NSA...</option>
                        <option {{ $rectifier->nsa === 'Pekalongan' ? 'selected' : '' }}>Pekalongan</option>
                        <option {{ $rectifier->nsa === 'Purwokerto' ? 'selected' : '' }}>Purwokerto</option>
                        <option {{ $rectifier->nsa === 'Semarang' ? 'selected' : '' }}>Semarang</option>
                        <option {{ $rectifier->nsa === 'Solo' ? 'selected' : '' }}>Solo</option>
                        <option {{ $rectifier->nsa === 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                    </select>
                    <label for="nsa" class="form-label text-black" style="font-weight: bold">NSA</label>
                </div>

                <div class="form-floating mb-4">
                    <select name="type" id="type" class="form-select" required>
                        <option hidden value="">Choose type...</option>
                        <option {{ $rectifier->type === 'Inner' ? 'selected' : '' }}>Inner</option>
                        <option {{ $rectifier->type === 'Outer' ? 'selected' : '' }}>Outer</option>
                        <option {{ $rectifier->type === 'TTC' ? 'selected' : '' }}>TTC</option>
                    </select>
                    <label for="type" class="form-label text-black" style="font-weight: bold">Type</label>
                </div>

                <div class="form-floating mb-4">
                    <select name="port" id="port" class="form-select" required>
                        <option hidden value="">Choose port...</option>
                        <option {{ $rectifier->port === 161 ? 'selected' : '' }}>161</option>
                        <option {{ $rectifier->port === 162 ? 'selected' : '' }}>162</option>
                    </select>
                    <label for="port" class="form-label text-black" style="font-weight: bold">Port</label>
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input name="ip_recti" type="text" class="form-control @error('ip_recti') is-invalid @enderror"
                        id="ip_recti" required value="{{ $rectifier->ip_recti }}">
                    <label for="ip_recti" class="form-label text-black" style="font-weight: bold">IP
                        Rectifier</label>
                    @error('ip_recti')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input name="community" type="text" class="form-control @error('community') is-invalid @enderror"
                        id="community" required value="{{ $rectifier->community }}">
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
                        <option {{ $rectifier->version === 1 ? 'selected' : '' }}>1</option>
                        <option {{ $rectifier->version === 2 ? 'selected' : '' }}>2</option>
                    </select>
                    <label for="version" class="form-label text-black" style="font-weight: bold">Version</label>
                </div>

                <div class="form-floating mb-4">
                    <input name="oid_voltage" type="text"
                        class="form-control @error('oid_voltage') is-invalid @enderror" id="oid_voltage" required
                        value="{{ $rectifier->oid_voltage }}">
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
                        class="form-control @error('oid_current') is-invalid @enderror" id="oid_current" required
                        value="{{ $rectifier->oid_current }}">
                    <label for="oid_current" class="form-label text-black" style="font-weight: bold">OID
                        (Total
                        Current)</label>
                    @error('oid_current')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input name="oid_temp" type="text"
                        class="form-control @error('oid_temp') is-invalid @enderror" id="oid_temp" required
                        value="{{ $rectifier->oid_temp }}">
                    <label for="oid_temp" class="form-label text-black" style="font-weight: bold">OID
                        (Temperature)</label>
                    @error('oid_temp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <button id="update-btn" type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>
