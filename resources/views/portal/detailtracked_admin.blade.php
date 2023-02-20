@extends('portal.layouts.main')

@section('container')
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h4>
    </div>
    @include('portal.component.userProfile')
</div>
@php
    if(isset($kedua)){
      $history2 = App\Models\DocumentHistory::where("document_id", $document->id)->where("user_id", $kedua->id)->first();
    }
    if(isset($ketiga)){
      $history3 = App\Models\DocumentHistory::where("document_id", $document->id)->where("user_id", $ketiga->id)->first();
    }
    if(isset($keempat)){
      $history4 = App\Models\DocumentHistory::where("document_id", $document->id)->where("user_id", $keempat->id)->first();
    }
@endphp

<div class="col-lg-10  shadow">
  <h6 class="ms-3 pt-2">Detail Document</h6>
  <div>
    <table class="table table-hover">
      <tbody>  
        <tr>
          <td>
              <p class="ms-3">
                <b>Status:         </b>{{ $document->status }}<br>
                <b>Level Approval: </b>{{ $document->level_approval }}<br>
                <b>Pengirim:       </b>{{ $pengirim->name }}<br>
                <b>Judul:          </b><a class="links" href="/file-tracked/{{ $document->id }}">{{ $document->file }}</a><br>
                <b>Deskripsi:      </b>{{ $document->deskripsi }} <br>
                <b>Tanggal Kirim:  </b>{{ $document->tanggal->format('D, d M Y H:i') }} <br>
              </p>  
          </td>
        </tr>
        
        <tr>
          <td>
            <ul>
              <li>
                Level Approval 2 <br>
                <b>Tujuan User</b> : @isset($kedua){{ $kedua->name }} @else - @endisset<br>
                <b>Status: </b>
                @if($document->level_approval >= 2) 
                  <b class="text-success">Approved</b>  
                @elseif($document->level_approval == 0) 
                  <b class="text-danger">Rejected</b> 
                @else 
                  <b class="text-warning">Pending</b> 
                @endif
                <br>
                <b>Waktu Approval/Rejection</b> :@isset($history2) {{ $history2->waktu->format('D, d M Y H:i')  }} @else - @endisset<br>
              </li>
              <li>
                Level Approval 3<br>
                <b>Tujuan User</b> : @isset($ketiga){{ $ketiga->name }} @else - @endisset<br>
                <b>Status: </b>
                @if($document->level_approval >= 3) 
                  <b class="text-success">Approved</b>  
                @elseif($document->level_approval == 0) 
                  <b class="text-danger">Rejected</b> 
                @else 
                  <b class="text-warning">Pending</b> 
                @endif
                <br>
                <b>Waktu Approval/Rejection</b> :@isset($history3) {{ $history3->waktu->format('D, d M Y H:i')  }} @else - @endisset<br>
              </li>
              <li>
                Level Approval 4<br>
                <b>Tujuan User</b> : @isset($keempat){{ $keempat->name }} @else - @endisset<br>
                <b>Status: </b>
                @if($document->level_approval == 4) 
                  <b class="text-success">Approved</b>  
                @elseif($document->level_approval == 0) 
                  <b class="text-danger">Rejected</b> 
                @else 
                  <b class="text-warning">Pending</b> 
                @endif
                <br>
                <b>Waktu Approval/Rejection</b> :@isset($history4) {{ $history4->waktu->format('D, d M Y H:i')  }} @else - @endisset<br>
              </li>
            </ul> 
          </td>
        </tr> 
      </tbody>
    </table>
  </div>
</div>
{{-- <table class="table table-hover">
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
        <td class="d-flex justify-content-between">
          @isset($kedua)
          {{ $kedua->name }}
          @if ($document->level_approval < 2 && auth()->user()->id == $document->id_pengirim)         
            <button onclick="get_id({{ $document->id }})" style="" type="submit" class="badge px-3 py-2 bg-primary border-0 me-1"  data-bs-toggle="modal" data-bs-target="#tujuanUpdate">
              <span  data-feather="repeat"></span> Change
            </button>
          @endif
          @else
          -
          @endisset
        </td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Tujuan Level Tiga</th>
        <td class="d-flex justify-content-between">
          @isset($ketiga)
          {{ $ketiga->name }}
          @if ($document->level_approval < 3 && auth()->user()->id == $document->id_pengirim)         
            <button onclick="get_id({{ $document->id }})" style="" type="submit" class="badge px-3 py-2 bg-primary border-0 me-1"  data-bs-toggle="modal" data-bs-target="#tujuanUpdate">
              <span  data-feather="repeat"></span> Change
            </button>
          @endif
              
          @else
              -
          @endisset
        </td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Tujuan Level Empat</th>
        <td class="d-flex justify-content-between">
          {{ $keempat->name }}
          @if ($document->level_approval < 4 && auth()->user()->id == $document->id_pengirim)         
            <button onclick="get_id({{ $document->id }})" style="" type="submit" class="badge px-3 py-2 bg-primary border-0 me-1"  data-bs-toggle="modal" data-bs-target="#tujuanUpdate">
              <span  data-feather="repeat"></span> Change
            </button>
          @endif
        </td>
      </tr>
      <tr>
        <th class="table-info" scope="row">Waktu dan Tanggal</th>
        <td>{{ $document->tanggal->format('D, d M Y H:i') }}</td>
      </tr>
    </tbody>
  </table>
  <div class="modal fade" id="tujuanUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Tujuan</h5>
        </div>
        <form class="d-inline" method="POST" id="confirmContract" onsubmit="get_action_ganti(this)">
            @csrf
            @method('put')
            <div class="modal-body">
              @if ($document->level_approval < 2)
                <div class="form-group">
                  <label for="id_level_dua">Tujuan Level Dua</label>
                  <select class="form-control @error('id_level_dua') is-invalid @enderror " id="id_level_dua" name="id_level_dua">
                    <option  selected>Pilih User</option>
                    @foreach($users_lvl_2 as $user_lvl_2)
                      <option @if ($user_lvl_2->id == $document->id_level_dua) {{ "selected" }} @endif value="{{ $user_lvl_2->id }}">{{ $user_lvl_2->name }}</option>
                    @endforeach
                  </select>
                </div>
                @error('id_level_dua')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div> 
                @enderror
              @endif

              @if ($document->level_approval < 3)
                <div class="form-group">
                  <label for="id_level_tiga">Tujuan Level Tiga</label>
                  <select class="form-control @error('id_level_tiga') is-invalid @enderror " id="id_level_tiga" name="id_level_tiga">
                    <option  selected>Pilih User</option>
                    @foreach($users_lvl_3 as $user_lvl_3)
                      <option @if ($user_lvl_3->id == $document->id_level_tiga) {{ "selected" }} @endif value="{{ $user_lvl_3->id }}">{{ $user_lvl_3->name }}</option>
                    @endforeach
                  </select>
                </div>
                @error('id_level_tiga')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div> 
                @enderror
              @endif

              @if ($document->level_approval < 4)
                <div class="form-group">
                  <label for="id_level_empat">Tujuan Level Empat</label>
                  <select class="form-control @error('id_level_empat') is-invalid @enderror " id="id_level_empat" name="id_level_empat">
                    <option  selected>Pilih User</option>
                    @foreach($users_lvl_4 as $user_lvl_4)
                      <option @if ($user_lvl_4->id == $document->id_level_empat) {{ "selected" }} @endif value="{{ $user_lvl_4->id }}">{{ $user_lvl_4->name }}</option>
                    @endforeach
                  </select>
                </div>
                @error('id_level_empat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div> 
                @enderror
              @endif
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ganti</button>
            </div>
        </form>
    </div>
    </div>
</div>--}}
@endsection