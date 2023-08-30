@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5">
                <h5 class="card-title text-center mb-0 mt-3">Add Ormawa</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('ormawa.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">NAME</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" placeholder="Masukan Nama Ormawa" required autofocus>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/ormawa" class="btn btn-secondary me-3">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection