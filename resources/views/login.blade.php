{{-- @extends('layouts.main')

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

@endsection --}}



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
    <link href="/css/login.css" rel="stylesheet">
    <title>NOS PORTAL</title>
  </head>
  <body>
    <section class="container-login shadow-lg">
    <div class="row" style="height: 100vh">

      <div class="col-lg-8 login-img rounded-left" style="padding: 0px; margin: 0px">
        
      </div>

      <div class="col-lg-4 form-signin" style="height: 100vh">
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
          {{-- <small class="d-block text-center mt-1">Not registered? <a href="/register">Register Now</a></small> --}}
      </main>
      </div>
  </div>
</section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>