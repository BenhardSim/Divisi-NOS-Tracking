@extends('portal.layouts.main')

@section('container')

{{-- title section  --}}
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | Upload Dokumen</h4>
    </div>
    @include('portal.component.userProfile')
</div>

{{-- upload file  --}}
<div>
    <h6>Document Approval</h6>
    <div class="row">
      <div class="col-8">
        <form>
          <div class="form-group">
            <label for="pengirim">Pengirim</label>
            <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Masukkan nama pengirim">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Sign Level 1</label>
            <select class="form-control " id="exampleFormControlSelect1">
            </select>
          </div>
          <div class="form-group">
              <label for="exampleFormControlSelect1">Sign Level 2</label>
              <select class="form-control " id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Sign Level 3</label>
              <select class="form-control " id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Sign Level 4</label>
              <select class="form-control " id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
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
    </div>
    
</div>



@endsection