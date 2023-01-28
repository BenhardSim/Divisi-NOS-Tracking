@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
      @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

      @if (session()->has('loginError'))
        <div class="alert alert-danger" role="alert">
          {{ session('loginError') }}
        </div>
      @endif
      
      <main class="form-signin w-100 m-auto bg-white rounded p-5">
          <h1 class="h3 mb-3 fw-normal text-center">Please Log In</h1>
          <form method="POST" action="/login">
            @csrf
            <div class="d-flex justify-content-center">
              <img class="mb-4" src="img/logo-telkomsel-baru.png" alt="" width="136" height="57">
            </div>
        
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
              <label for="email">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
              <label for="password">Password</label>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
              @enderror
            </div>
            <button class="mt-3 w-100 btn btn-lg btn-primary" type="submit">Login</button>
            <p class="mt-2 mb-2 text-muted">&copy; 2023</p>
          </form>
          <small class="d-block text-center mt-1">Not registered? <a href="/register">Register Now</a></small>
      </main>
    </div>
</div>

@endsection