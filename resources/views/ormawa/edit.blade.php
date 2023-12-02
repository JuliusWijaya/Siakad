@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6" style="margin: 0 auto;">
            <div class="card mt-5">
                <h5 class="card-title text-center mb-0 mt-3">Edit  Ormawa {{ $ormawa->name }}</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('ormawa.update', $ormawa->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">NAME</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $ormawa->name) }}"
                                placeholder="Masukan Nama Ormawa" required autofocus>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/admin/ormawa" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection