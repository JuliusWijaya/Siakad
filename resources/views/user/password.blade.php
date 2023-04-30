@extends('layouts.utils')
@section('title')

@section('content')
<div class="container">
    @if(session('status'))
    <p class="alert alert-success text-center col-lg-8">{{ session('status') }}</p>
    @endif

    @if($errors->any())

    @foreach($errors->all() as $err)
    <p class="alert alert-danger text-center">
        {{ $err }}
    </p>
    @endforeach

    @endif

    <div class="row mt-5">
        <div class="col">
            <div class="card" style="width: 38rem;margin: 10px auto;">
                <div class="card-body">
                    <h3 class="card-title text-center">Change Password</h3>
                    <form action="{{ route('password.action') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Password</label>
                            <input class="form-control" type="password" name="old_password" />
                        </div>
                        <div class="mb-3">
                            <label>New Password</label>
                            <input class="form-control" type="password" name="new_password" />
                        </div>
                        <div class="mb-3">
                            <label>New Password Confirmation</label>
                            <input class="form-control" type="password" name="new_password_confirmation" />
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Change</button>
                            <a class="btn btn-danger" href="/dashboard">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection