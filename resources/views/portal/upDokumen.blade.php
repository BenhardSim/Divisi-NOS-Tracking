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

{{-- upload file  --}}
<div>
  <div class="row">
    <div class="col-7 shadow up-docs-sign">
        <h6>Document Approval</h6>
        <form>
          <div class="form-group">
            <label for="pengirim">Pengirim</label>
            <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Masukkan nama pengirim">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Sign Level 1</label>
            <select class="form-control " id="exampleFormControlSelect1">
              <option value="" selected>Pilih User</option>
              @foreach($users_lvl_1 as $user_lvl_1)
                <option value="">{{ $user_lvl_1->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="exampleFormControlSelect1">Sign Level 2</label> 
              <select class="form-control " id="exampleFormControlSelect1">
                <option value="" selected>Pilih User</option>
                @foreach($users_lvl_2 as $user_lvl_2)
                  <option value="">{{ $user_lvl_2->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Sign Level 3</label>
              <select class="form-control " id="exampleFormControlSelect1">
                <option value="" selected>Pilih User</option>
                @foreach($users_lvl_3 as $user_lvl_3)
                  <option value="">{{ $user_lvl_3->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Sign Level 4</label>
              <select class="form-control " id="exampleFormControlSelect1">
                <option value="" selected>Pilih User</option>
                @foreach($users_lvl_4 as $user_lvl_4)
                  <option value="">{{ $user_lvl_4->name }}</option>
                @endforeach
              </select>
            </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi Dokumen</label>
            <textarea class="form-control " id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Deskripsi Dokumen"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Upload Dokumen</label>
            <input class="form-control " id="exampleFormControlTextarea1" type="file">
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
              <tr>
                <td>
                  <div>
                    <p style="padding: 0%">
                      <b>Pengirim</b> : Benhard Simanullang <br>
                      <b>Tanggal Kirim</b> : 11 Januari 2023 12.10 A.M <br>
                      <b>Tujuan User Level 1</b> : Julius Adrian<br>
                      <b>Tujuan User Level 2</b> : Eko Satriyo <br>
                      <b>Tujuan User Level 3</b> : Endang Siburian <br>
                      <b>Tujuan User Level 4</b> : Yusuf Sutrisno Putra</p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>
                    <p style="padding: 0%">
                      <b>Pengirim</b> : Benhard Simanullang <br>
                      <b>Tanggal Kirim</b> : 11 Januari 2023 12.10 A.M <br>
                      <b>Tujuan User Level 1</b> : Julius Adrian<br>
                      <b>Tujuan User Level 2</b> : Eko Satriyo <br>
                      <b>Tujuan User Level 3</b> : Endang Siburian <br>
                      <b>Tujuan User Level 4</b> : Yusuf Sutrisno Putra</p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>
                    <p style="padding: 0%">
                      <b>Pengirim</b> : Benhard Simanullang <br>
                      <b>Tanggal Kirim</b> : 11 Januari 2023 12.10 A.M <br>
                      <b>Tujuan User Level 1</b> : Julius Adrian<br>
                      <b>Tujuan User Level 2</b> : Eko Satriyo <br>
                      <b>Tujuan User Level 3</b> : Endang Siburian <br>
                      <b>Tujuan User Level 4</b> : Yusuf Sutrisno Putra</p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>
                    <p style="padding: 0%">
                      <b>Pengirim</b> : Benhard Simanullang <br>
                      <b>Tanggal Kirim</b> : 11 Januari 2023 12.10 A.M <br>
                      <b>Tujuan User Level 1</b> : Julius Adrian<br>
                      <b>Tujuan User Level 2</b> : Eko Satriyo <br>
                      <b>Tujuan User Level 3</b> : Endang Siburian <br>
                      <b>Tujuan User Level 4</b> : Yusuf Sutrisno Putra</p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    
</div>



@endsection