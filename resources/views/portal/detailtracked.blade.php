@extends('portal.layouts.main')

@section('container')
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h4>
    </div>
    @include('portal.component.userProfile')
</div>
<table class="table table-hover">
    <thead>
      <tr class="text-white" style="background-color: #144272">
        <th style="border-radius: 10px 0 0 0" scope="col">Nama Kolom</th>
        <th style="border-radius: 0 10px 0 0" scope="col">Detail</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="table-info" scope="row">ID</th>
        <td>{{ $document->id }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Nama File</th>
        <td class=""><a class="links" href="/file-tracked/{{ $document->id }}">{{ $document->file }}</a></td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Keterangan</th>
        <td class="{{ ($document->status == "Rejected") ? 'table-danger' : ''}}">{{ $document->keterangan }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Deskripsi</th>
        <td>{{ $document->deskripsi }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Status</th>
        <td>{{ $document->status }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Level Approval</th>
        <td>{{ $document->level_approval }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">ID Pengirim</th>
        <td>{{ $document->id_pengirim }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Nama Pengirim</th>
        <td>{{ $document->nama_pengirim }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Level Pengirim</th>
        <td>{{ $document->level_pengirim }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Tujuan Level Dua</th>
        <td>{{ $kedua->name }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Tujuan Level Tiga</th>
        <td>{{ $ketiga->name }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Tujuan Level Empat</th>
        <td>{{ $keempat->name }}</td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Waktu dan Tanggal</th>
        <td>{{ $document->tanggal->format('D, d M Y H:i') }}</td>
      </tr>
    </tbody>
  </table>
@endsection