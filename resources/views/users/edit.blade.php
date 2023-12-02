@extends('layouts.main')

@section('content')
<div class="col-md-5" style="margin: 0 auto;">
    <div class="card mt-5">
        <h5 class="card-title text-center mt-3">Edit Jurusan</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">NAME :</label>
                    <input 
                     type="text" 
                     class="form-control @error('name') is-invalid @enderror" 
                     name="name" 
                     id="name"
                     value="{{old('name', $user->name)}}"
                     required
                    >
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">EMAIL :</label>
                    <input 
                     type="email" 
                     class="form-control @error('email') is-invalid @enderror" 
                     name="email" 
                     id="email"
                     value="{{old('email', $user->email)}}"
                     required
                    >
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm mr-2">Save</button>
                <a href="/admin/user" class="card-link">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection