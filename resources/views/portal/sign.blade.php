@extends('portal.layouts.main')

@section('container')
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h4>
    </div>
    @include('portal.component.userProfile')
</div>

<div class="container con-tbl px-2">
    <table class="table table-hover" >
        <thead>
          <tr class="text-white text-left rounded" style="background-color: #144272">
            <th scope="col" style="border-radius: 10px 0 0 0">ID</th>
            <th scope="col">Pengirim</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Status</th>
            <th scope="col" style="border-radius: 0 10px 0 0" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          {{-- @foreach ($site_all as $site) --}}
          <tr class="text-left">
            <th scope="row">1</th>
            <td>Julius Adrian</td>
            <td>Persetujuan Pembelian Battery Supply</td>
            <td>01-01-2023</td>
            <td>Pending</td>
            <td class="d-flex justify-content-center">
                <button onclick="get_approve()" style="" type="submit" class="badge bg-success border-0"  data-bs-toggle="modal" data-bs-target="#approveUpdate">
                    <span data-feather="check-circle" class="" style=""></span> Approve
                </button>
                <a href="/sign-document/id" class="badge bg-info links px-3 py-2 ms-1"><span data-feather="eye" class="" style=""></span> View</a>
            </td>
          </tr>  
          {{-- @endforeach --}}
        
        <!-- Modal Confirm notif-->
    <div class="modal fade" id="approveUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin mengkonfirmasi dokumen ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form class="d-inline" method="POST" id="confirmContract" onsubmit="get_action_approve(this)">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
            </div>
        </div>
        </div>
    </div>
        </tbody>
    </table>
</div>
@endsection