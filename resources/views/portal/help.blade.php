@extends('portal.layouts.main')

@section('container')
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h4>
    </div>
    @include('portal.component.userProfile')
</div>
<div class="container">
    <h6>Developer Contact</h6>
    <ul>
        <li>Dev 1 : +6182139322043 (Benhard Simanullang)</li>
        <li>Dev 2 : +6182114384818 (Julius Adrian)</li>
    </ul>
</div>
@endsection