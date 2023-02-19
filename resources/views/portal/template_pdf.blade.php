<!DOCTYPE html>
<html>
<head>
    <title>{{ $document->file }}</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
</head>
<body>
    <h1>{{ $document->file }}</h1>
    
    <p>Downloaded On : {{ $downloaded_time->format('D, d M Y H:i') }}</p>
    <div style="text-align: justify">
        {!! $document->body !!}
    </div>
    
    <br><br><br>

    @isset($ttd)
        <div style="position: ">
            <h4>{{ $ttd->name }}</h4>
            <h5>General Manager</h5>
        </div>
    @endisset
    
</body>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}
</html>