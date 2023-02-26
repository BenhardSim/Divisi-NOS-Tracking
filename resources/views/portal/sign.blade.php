@extends('portal.layouts.main')

@section('container')
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h4>
    </div>
    @include('portal.component.userProfile')
</div>
{{-- notification --}}
<div class="container con-tbl px-2">
    <table class="table table-hover" >
        <thead>
          <tr class="text-white text-left rounded" style="background-color: #144272">
            <th scope="col" style="border-radius: 10px 0 0 0">ID</th>
            <th scope="col">Pengirim</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Waktu dan Tanggal</th>
            <th scope="col">Status</th>
            <th scope="col" style="border-radius: 0 10px 0 0" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if ($documents->count() == 0)
            <tr class="text-center text-danger">
                <th colspan="6">There isn't any data yet</th>
            </tr>
          @endif
          @foreach ($documents as $document)
          <tr class="text-left">
            <th scope="row">{{ $document->id}}</th>
            <td>{{ $document->nama_pengirim }}</td>
            <td>{{ \Illuminate\Support\Str::limit($document->deskripsi, 50, $end='...') }}</td>
            <td>{{ $document->tanggal->format('D, d M Y H:i')}}</td>
            <td>{{ $document->status}}</td>
            <td class="d-flex justify-content-center">
                @if ($document->status == "Pending")
                <button onclick="get_id({{ $document->id }})" style="" type="submit" class="badge bg-success border-0 me-1"  data-bs-toggle="modal" data-bs-target="#approveUpdate">
                    <span data-feather="check-circle" class="" style=""></span> Approve
                </button>
                <button onclick="get_id({{ $document->id }})" style="" type="submit" class="badge bg-danger border-0 me-1 ms-1"  data-bs-toggle="modal" data-bs-target="#rejectUpdate">
                    <span data-feather="slash" class="" style=""></span> Reject
                </button>
                @endif
                
                <a href="/tracked_document/{{ $document->id }}" class="badge bg-info links px-3 py-2 ms-1"><span data-feather="eye" class="" style=""></span> View</a>
            </td>
          </tr>  
          @endforeach
        </tbody>
    </table>
        <!-- Modal Confirm notif-->
    <div class="modal fade" id="approveUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Approval</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin mengkonfirmasi dokumen ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form class="d-inline" method="POST" id="confirmContract" onsubmit="get_action_approve(this)">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="rejectUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form class="d-inline" method="POST" id="confirmContract" onsubmit="get_action_approve(this)">
                @csrf
                @method('put')
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Rejection</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" aria-describedby="emailHelp" placeholder="Masukkan alasan dokumen ditolak">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Reject</button>          
            </div>
            </form>
        </div>
        </div>
    </div>
{{ $documents->links() }}
</div>
@endsection
<script>
    let target_id; 
    function get_id(id){
        target_id = id;
    }
    function get_action_approve(form){
        form.action = '/tracked_document/' + target_id;
    }
</script>