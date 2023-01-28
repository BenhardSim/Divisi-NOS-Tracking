<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Divisi NOS | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
   <!-- Background image -->
    <div
    class="bg-image mask"
    style="
      background-image: url('img/black-pattern.jpg');
      height: 100vh;
    "
    >
    <div style="background-color: rgba(0, 0, 0, 0.6);">
      @include('partials.navbar')
    </div>
      <div class="d-flex">
        <div class="container mt-4">
          @yield('container')
        </div>
      </div>
    </div>
   <!-- Background image -->
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>