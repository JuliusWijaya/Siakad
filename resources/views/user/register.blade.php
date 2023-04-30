@extends('layouts.utils')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="card" style="width: 38rem;margin: 10px auto;">
            <div class="card-body">
                <h3 class="card-title text-center">Register</h3>
                <div class="col">
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                    @endif
                    <form action="{{ route('register.action') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name"><strong>Name</strong></label>
                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="email"><strong>Email</strong></label>
                            <input class="form-control" type="email" id="email" name="email"
                                value="{{ old('email') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="password"><strong>Password</strong></label>
                            <input class="form-control" type="password" id="password" name="password" />
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm"><strong>Password Confirmation</strong></label>
                            <input class="form-control" type="password" id="password_confirm" name="password_confirm" />
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Register</button>
                            <a class="btn btn-danger ml-2" href="/login">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection(content)