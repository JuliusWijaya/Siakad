@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="col-left">
    </div>

    <div class="col-right">
      <img src="/Assets/img/wave.svg" alt="Bg Wave" class="background-up" />
      <div class="content-right">
        <div class="content-header">
          <h1>Welcome Back</h1>
          <h3>Login to your account</h3>
        </div>
        @if($errors->any())
          @foreach($errors->all() as $err)
              <p class="alert">{{ $err }}</p>
          @endforeach
        @endif
        @if (Session::has('status'))
            <div class="alert-success">
              {{ Session::get('status') }}
            </div>
        @endif
        <form action="{{ route('login.action') }}" method="POST">
          @csrf
          <div class="content-body">
            <div class="input-group">
              <label for="email" class="form-label">Email :</label>
              <input type="email" name="email" class="form-input" id="email" value="{{ old('email') }}" placeholder="exp: john@example.com" />
            </div>
            <div class="input-group">
              <label for="password" class="form-label">Password :</label>
              <div class="password-group">
                <input type="password" name="password" class="form-input" id="password" placeholder="*******" />
                <button type="button" id="btnShowPassword">
                  <i class="fa fa-eye"></i>
                </button>
              </div>
            </div>
            <a href="#" class="forget">Forget Password</a>
          </div>
          <div class="content-footer">
            <button id="btnLogin">Login</button>
          </div>
        </form>

        <div class="line">or</div>

        <a href="#" id="btnGoogle">
          <img src="/Assets/img/119930_google_512x512.png" alt="Google Logo" />
          Sign in with Google
        </a>

        <div class="signup">Don't have an account <a href="/register">Signup</a></div>
      </div>
    </div>
  </div>
@endsection

