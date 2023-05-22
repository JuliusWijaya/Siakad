@extends('layouts.main')

@section('content')
<div class="col-md-5" style="margin: 0 auto;">
    <div class="card mt-5">
        <h5 class="card-title text-center mt-3">Edit Jurusan</h5>
        <div class="card-body">
            <form method="POST" action="/user/{{ $user->id }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">NAME :</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        value="{{old('name', $user->name)}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">EMAIL :</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                        value="{{old('email', $user->email)}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" name="save" class="btn btn-primary btn-sm">Save</button>
                <a href="/user" class="card-link">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection