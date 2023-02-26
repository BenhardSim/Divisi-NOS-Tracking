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
        font-family: Arial, Helvetica, sans-serif;
    }

    table, td{
        border: 1px solid;
        text-align: center;
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-weight: normal;
    }


    td{
        padding-right: 20px;
        padding-left: 20px;
    }


</style>
<body>
    <img src="{{ public_path("/img/logo-telkomsel-baru.png") }}" width="160", height="75">
    <div class="title">
        <h4>{{ $document->tipe_file }}</h4>
        <h5>Nama File: {{ $document->file }}</h5>
        <h5>Tanggal: {{ $document->tanggal->format('d M Y') }}</h5>
    </div>
    <div class="body-text">
        {!! $document->body !!}
    </div>
    
    <br><br><br>
    @isset($pengirim)
        <div class="tabel">
            <table>
                <tr>
                    @if ($document->level_pengirim == 1)
                        <td>
                            <h6>Dibuat oleh,</h6>
                            <h5>{{ $pengirim->name }}</h5>
                            <h4>Staff</h4>
                        </td>
                        <td>
                            <h6>Mengetahui,</h6>
                            <h5>{{ $kedua->name }}</h5>
                            <h4>Supervisor</h4>
                        </td>
                        <td>
                            <h6>Mengetahui,</h6>
                            <h5>{{ $ketiga->name }}</h5>
                            <h4>Manager</h4>
                        </td>
                    @elseif($document->level_pengirim == 2)
                        <td>
                            <h6>Dibuat oleh,</h6>
                            <h5>{{ $kedua->name }}</h5>
                            <h4>Supervisor</h4>
                        </td>
                        <td>
                            <h6>Mengetahui,</h6>
                            <h5>{{ $ketiga->name }}</h5>
                            <h4>Manager</h4>
                        </td>
                    @elseif($document->level_pengirim == 3)
                        <td>
                            <h6>Dibuat oleh,</h6>
                            <h5>{{ $ketiga->name }}</h5>
                            <h4>Manager</h4>
                        </td>
                    @endif
                    <td>
                        <h6>Menyetujui,</h6>
                        <h5>{{ $keempat->name }}</h5>
                        <h4>General Manager</h4>
                    </td>
                </tr>
            </table>
        </div>
        
        
    @endisset
    
</body>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}
</html>