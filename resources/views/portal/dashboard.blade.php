@extends('portal.layouts.main')

@section('container')

    <div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
        <div class="header-title">
            <h3 class="" style="font-weight: normal;">NOS Portal | Dashboard</h3>
        </div>
        <div class="profile-pic">
            <span style="width:36px;height:36px;" data-feather="circle" class="align-text-bottom"></span>
            <h6>{{ auth()->user()->name }}</h6>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger"><span data-feather="log-out" class="align-text-bottom"></span> Logout</button>
            </form>
        </div>
    </div>

    

@endsection