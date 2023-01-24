@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="container text-center mb-5">
            <h1>Form Rectifier</h1>
        </div>
        <form>
            <div class="mb-3">
              <label for="address" class="form-label">IP Address</label>
              <input type="text" class="form-control" id="address">
            </div>
            <div class="mb-3">
              <label for="community" class="form-label">Community</label>
              <input type="text" class="form-control" id="community">
            </div>
            <div class="mb-3">
                <label for="version" class="form-label">Version</label>
                <select id="version" class="form-select">
                  <option>1</option>
                  <option>2</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="oid-n" class="form-label">OID (Nama Rectifier)</label>
                <input type="text" class="form-control" id="oid-n">
            </div>
            <div class="mb-3">
                <label for="oid-v" class="form-label">OID (Voltage)</label>
                <input type="text" class="form-control" id="oid-v">
            </div>
            <div class="mb-3">
                <label for="oid-c" class="form-label">OID (Total Current)</label>
                <input type="text" class="form-control" id="oid-c">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </form>
    </div>
@endsection