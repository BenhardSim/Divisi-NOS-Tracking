@extends('portal.layouts.main')

@section('container')
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h4>
    </div>
    @include('portal.component.userProfile')
</div>

<div class="list-group col-lg-8 shadow">
    @foreach ($histories as $history)
    @php
        $user = App\Models\User::where("id", $history->user_id)->first();
        $document = App\Models\tracked_document::where("file", $history->document_name)->first();
    @endphp
    <a href="tracked_document/{{ $document->id }}" class="list-group-item list-group-item-action" aria-current="true">
        <div class="d-flex w-100 justify-content-between">
          @if ($history->action == "Created and Approved" || $history->action == "Approved")
            <h5 class="mb-1 text-success">{{ $history->action }}</h5>
          @endif
          @if ($history->action == "Rejected")
            <h5 class="mb-1 text-danger">{{ $history->action }}</h5>
          @endif
          @if ($history->action == "Created")
            <h5 class="mb-1 text-primary">{{ $history->action }}</h5>
          @endif
          <small>{{ $history->waktu->format('D, d M Y H:i') }}</small>
        </div>
        <p class="mb-1">{{ $history->document_name }}</p>
        <small>{{ $user->name }}</small>
    </a>
    @endforeach   
</div>
    
@endsection