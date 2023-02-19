<!DOCTYPE html>
<html>
<head>
    <title>{{ $document->file }}</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
</head>
<style type="text/css">
    .body-text {
        text-align: justify;
        text-indent: 5em hanging;
    }

    .title{
        text-align: center;
    }

    .signed-area {
        text-align: right;
        margin-right: 40px
    }
</style>
<body>
    <img src="{{ public_path("/img/logo-telkomsel-baru.png") }}" width="160", height="75">
    <div class="title">
        <h1>{{ $document->file }}</h1>
    </div>
    
    <p>Accessed: {{ $downloaded_time->format('D, d M Y H:i') }}</p>
    <div class="body-text">
        {!! $document->body !!}
    </div>
    
    <br><br><br>

    @isset($ttd)
        <div class="signed-area">
            <h6>Signed by:</h6>
            <h4>{{ $ttd->name }}</h4>
            <h5>General Manager</h5>
        </div>
    @endisset
    
</body>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}
</html>