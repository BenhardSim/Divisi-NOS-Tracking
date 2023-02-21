@extends('portal.layouts.main')

@section('container')

{{-- title section  --}}
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | Send Document</h4>
    </div>
    @include('portal.component.userProfile')
</div>
{{-- upload file  --}}
<div>
  <div class="row">

    <div class="col-7 shadow up-docs-sign">
        <h6>Document Approval</h6>
        <form method="POST" action="/tracked_document" enctype="multipart/form-data">
          @csrf
            @can('staff')
            <div class="form-group">
              <label for="id_level_dua">Sign Level 2</label> 
              <select class="form-control @error('id_level_dua') is-invalid @enderror " id="id_level_dua" name="id_level_dua">
                <option  selected>Pilih User</option>
                @foreach($users_lvl_2 as $user_lvl_2)
                  <option value="{{ $user_lvl_2->id }}">{{ $user_lvl_2->name }}</option>
                @endforeach
              </select>
              @error('id_level_dua')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
              @enderror
            </div>
            @endcan
            
            @canany(['staff', 'supervisor'])
            <div class="form-group">
              <label for="id_level_tiga">Sign Level 3</label>
              <select class="form-control @error('id_level_tiga') is-invalid @enderror " id="id_level_tiga" name="id_level_tiga">
                <option  selected>Pilih User</option>
                @foreach($users_lvl_3 as $user_lvl_3)
                  <option value="{{ $user_lvl_3->id }}">{{ $user_lvl_3->name }}</option>
                @endforeach
              </select>
              @error('id_level_tiga')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
              @enderror
            </div>
            @endcanany
            
            @canany(['staff', 'supervisor', 'manager'])
            <div class="form-group">
              <label for="id_level_empat">Sign Level 4</label>
              <select class="form-control  @error('id_level_empat') is-invalid @enderror" id="id_level_empat" name="id_level_empat">
                <option selected>Pilih User</option>
                @foreach($users_lvl_4 as $user_lvl_4)
                  <option value="{{ $user_lvl_4->id }}">{{ $user_lvl_4->name }}</option>
                @endforeach
              </select>
              @error('id_level_4')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
              @enderror
            </div>
            @endcanany
            
          <div class="form-group">
            <label for="deskripsi">Deskripsi Dokumen</label>
            <textarea class="form-control  @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi Dokumen"></textarea>
            @error('deskripsi')
                <div class="invalid-feedback">
                  Invalid
                </div> 
            @enderror
          </div>
          <div class="form-group">
            <label for="file">Nama File</label>
            <input class="form-control  @error('file') is-invalid @enderror" id="file" name="file" type="text">
            @error('file')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
            @enderror
          </div>
          <div class="form-group">
            <label for="body">Body Dokumen</label>
            <input id="body" type="hidden" name="body">
            <trix-editor input="body"></trix-editor>
            @error('body')
                <div class="invalid-feedback">
                  Invalid
                </div> 
            @enderror
          </div>
          <br>
          <button class="btn btn-primary">Submit</button>
        </form>
      </div>

      <div class="col-4 up-docs-sign shadow">
        <h6>History Pengiriman</h6>
        <div>
          <table class="table table-hover">
            <tbody>
              @foreach ($documents as $document)
              @php
                  $kedua = App\Models\User::where("id", $document->id_level_dua)->first();
                  $ketiga = App\Models\User::where("id", $document->id_level_tiga)->first();
                  $keempat = App\Models\User::where("id", $document->id_level_empat)->first();
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
                
              <tr>
                <td>
                  {{-- <a href="tracked_document/{{ $document->id }}" class="links text-dark">
                    <p style="padding: 0%">
                      <b>Pengirim</b> : {{ $document->nama_pengirim }} <br>
                      <b>Nama Dokumen</b> : {{ $document->file }} <br>
                      <b>Tanggal Kirim</b> : {{ $document->tanggal->format('D, d M Y H:i') }} <br>
                      <b>Status</b> : {{ $document->status }} <br>
                      <b>Level Approval</b> : {{ $document->level_approval }} <br>
                      <b>Tujuan User Level 2</b> : @isset($kedua){{ $kedua->name }} @else - @endisset<br>
                      <b>Tujuan User Level 3</b> : @isset($ketiga){{ $ketiga->name }} @else - @endisset<br>
                      <b>Tujuan User Level 4</b> : @isset($keempat){{ $keempat->name }} @else - @endisset<br>
                      <b>Approval/Rejection Level 2</b> :@isset($history2) {{ $history2->waktu->format('D, d M Y H:i')  }} @else - @endisset<br>
                      <b>Approval/Rejection Level 3</b> :@isset($history3) {{ $history3->waktu->format('D, d M Y H:i')  }} @else - @endisset<br>
                      <b>Approval/Rejection Level 4</b> :@isset($history4) {{ $history4->waktu->format('D, d M Y H:i')  }} @else - @endisset<br>
                    </p>  
                  </a> --}}
  
                  <a href="tracked_document/{{ $document->id }}" class="links text-dark">
                    <div class="row">
                      <div id='initial' class="rounded-circle shadow-sm col-2" style="background-color: #eb3223;color:white;width:30px;height:30px;display:flex;justify-content:center;align-items:center;vertical-align:middle">
                          {{ $document->file[0] }}{{ $document->file[1] }}
                      </div>
                      <div class="col-8">
                        <h6 style="margin:0">{{ $document->file }}</h6>
                        <p style="color:#3F979B;margin:0">pengirim : {{ $document->nama_pengirim }}</p>
                        <p style="margin:0;width: 30ch;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ $document->deskripsi }}</p>
                      </div>
                      <div class="col-2" style="padding:0"><span style="font-size: 10px;padding:0">{{ $document->tanggal->format('d M Y') }}</span></div>
                    </div>
                  </a> 
                </td>
              </tr> 
            
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>
    
<br><br><br>  

    {{-- <h2 class="mt-4 mb-3">Log History</h2>
    <div class="list-group col-lg-8 shadow">
      @foreach ($histories as $history)
      @php
          $user = App\Models\User::where("id", $history->user_id)->first();
          $document = App\Models\tracked_document::where("id", $history->document_id)->first();
      @endphp
      <div class="list-group-item list-group-item-action" aria-current="true">
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
        </div>
      @endforeach   
  </div> --}}

  




@endsection




