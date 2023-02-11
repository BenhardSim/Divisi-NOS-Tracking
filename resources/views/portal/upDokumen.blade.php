@extends('portal.layouts.main')

@section('container')

{{-- title section  --}}
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | Upload Dokumen</h4>
    </div>
    @include('portal.component.userProfile')
</div>
@if (session()->has('success'))
<div class="alert alert-success container col-lg-12" role="alert">
  {{ session('success') }}
</div>
@endif
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
            <label for="file">Upload Dokumen</label>
            <input class="form-control  @error('file') is-invalid @enderror" id="file" name="file" type="file">
            @error('file')
                <div class="invalid-feedback">
                  {{ $message }}
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
              @endphp
              <tr>
                <td>
                  <div>
                    <p style="padding: 0%">
                      <b>Pengirim</b> : {{ $document->nama_pengirim }} <br>
                      <b>Tanggal Kirim</b> : {{ $document->tanggal->format('D, d M Y H:i') }} <br>
                      <b>Status</b> : {{ $document->status }} <br>
                      <b>Level Approval</b> : {{ $document->level_approval }} <br>
                      <b>Tujuan User Level 2</b> : {{ $kedua->name }} <br>
                      <b>Tujuan User Level 3</b> : {{ $ketiga->name }} <br>
                      <b>Tujuan User Level 4</b> : {{ $keempat->name }}</p>
                  </div>
                </td>
              </tr> 
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    
</div>



@endsection