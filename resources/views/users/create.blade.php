@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6" style="margin: 0 auto;">
            <div class="card mt-5">
                <h5 class="card-title text-center mt-2 mb-0">Add User</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="name">NAME</label>
                                <input 
                                 type="text" 
                                 class="form-control @error('name') is-invalid @enderror" 
                                 id="name" 
                                 name="name"
                                 value="{{ old('name') }}" 
                                 placeholder="Masukan Name"
                                >
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">EMAIL</label>
                                <input 
                                 type="text" 
                                 class="form-control @error('email') is-invalid @enderror" 
                                 id="email"
                                 name="email" 
                                 value="{{ old('email') }}" 
                                 placeholder="Masukan Email"
                                 required 
                                >
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="password">PASSWORD</label>
                                <input 
                                 type="password" 
                                 class="form-control @error('password') is-invalid @enderror" 
                                 id="password"
                                 name="password" 
                                 value="{{ old('password') }}" 
                                 placeholder="Masukan Password"
                                 required
                                >
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer mb-0">
                            <a href="/admin/user" class="btn btn-secondary">Back</a>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection