@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="col-left">
       
    </div>
    <div class="col-right">
      <img src="./Assets/img/wave.svg" alt="Bg Wave" class="background-up" />
      <div class="content-right">
        <div class="content-header">
          <h1>Register</h1>
          <h3>Pleas Register Now</h3>
        </div>
        
        @if($errors->any())
            @foreach($errors->all() as $err)
                <p style="color: red; font-size: 1.3rem; text-align: center;" >{{ $err }}</p>
            @endforeach       
        @endif

        <form action="{{ route('register.action') }}" method="POST">
           @csrf 
          <div class="content-body">
            <div class="input-group">
              <label for="name" class="form-label">Name :</label>
              <input type="text" name="name" class="form-input" id="name" placeholder="exp: john@example.com" value="{{ old('name') }}" />
            </div>
            <div class="input-group">
              <label for="email" class="form-label">Email :</label>
              <input type="text" name="email" class="form-input" id="email" placeholder="exp: john@example.com" value="{{ old('email') }}" />
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
            <div class="input-group">
              <label for="password_confirm" class="form-label">Confirm Password :</label>
              <div class="password-group">
                <input type="password" name="password_confirm" class="form-input" id="password_confirm" placeholder="*******" />
                <button type="button" id="btnPassword">
                  <i class="fa fa-eye"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="content-footer">
            <button id="btnLogin" type="submit">Register</button>
          </div>
        </form>

        <div class="line">or</div>

        <div class="signup">Already have an account <a href="/login">Sign in</a></div>
      </div>
    </div>
  </div>
@endsection()

