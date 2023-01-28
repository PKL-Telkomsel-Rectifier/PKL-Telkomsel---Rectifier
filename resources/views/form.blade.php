@extends('layouts.main')

@section('container')
    <div class="container mb-3">
        <div class="container text-center mb-3">
            <h1>Form Rectifier</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <form action="/form" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="rectiname">Rectifier Name</label>
                        <input class="form-control" type="text" name="rectiname" id="rectiname">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="sitename">Site Name</label>
                        <input class="form-control" type="text" name="sitename" id="sitename">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="rectiname">Rectifier Name</label>
                        <input class="form-control" type="text" name="rectiname" id="rectiname">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="rectiname">Rectifier Name</label>
                        <input class="form-control" type="text" name="rectiname" id="rectiname">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
