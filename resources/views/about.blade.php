@extends('layouts.main')

@section('container')

    <div class="container bg-white rounded p-5">
        <h1 class="text-center mb-">About Us</h1>
        <div class="d-flex align-items-center justify-content-center mt-20">
            <div class="d-flex flex-column align-items-center justify-content-center me-5">
                <h3>{{ $name[0] }}</h3>
                <p>{{ $email[0] }}</p>
                <img src="img/{{ $image }}" alt="nana" width="200" class="image-thumbnail rounded-circle">
            </div>
                        
            <div class="d-flex flex-column align-items-center justify-content-center ms-5">
                <h3>{{ $name[1] }}</h3>
                <p>{{ $email[1] }}</p>
                <img src="img/{{ $image }}" alt="nana" width="200" class="image-thumbnail rounded-circle">
            </div>          
        </div>
    </div>
    
@endsection