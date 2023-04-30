@extends('layouts.utils')

@section('content')
<div class="container">
    <div class="card" style="width: 25rem;margin: 60px auto;">
        <div class="card-body">
            <div class="row">
                @if(session('status'))
                <p class="alert alert-success text-center ">
                    {{ session('status') }}
                </p>
                @endif

                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif

                <h3 class="card-title text-center">Login</h3>
                <div class="col-md-12">
                    <form action="{{ route('login.action') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email"><strong>Email</strong></label>
                            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="password"><strong>Password</strong></label>
                            <input class="form-control" type="password" id="password" name="password" />
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Login</button>
                            <a class="btn btn-danger ml-2" href="/">Back</a>
                        </div>
                    </form>
                    <p class="text-center">
                        Create New <a href="/register" style="text-decoration:none; font-size: 14px;">Account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection