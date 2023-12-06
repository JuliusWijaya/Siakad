@extends('layouts.utils')

@section('content')
<div class="container">
    @if(session('status'))
    <p class="alert alert-success text-center col-lg-8">{{ session('status') }}</p>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-4 col-lg-5">
            @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger text-center" style="position:absolute;z-index:15;top:0;right:0;left:0;">
                    {{ $err }}
                </p>
                @endforeach
            @endif
        </div>
    </div>

    <div class="col-12">
        <div class="row d-flex justify-content-center" >
            <div class="card " style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Change Password</h5>
                    <form action="{{ route('password.action') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Password</label>
                            <input class="form-control" type="password" name="old_password" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label>New Password</label>
                            <input class="form-control" type="password" name="password" required />
                        </div>
                        <div class="mb-3">
                            <label>New Password Confirmation</label>
                            <input class="form-control" type="password" name="password_confirmation" />
                        </div>
                        <div>
                            <button class="btn btn-primary w-100">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
