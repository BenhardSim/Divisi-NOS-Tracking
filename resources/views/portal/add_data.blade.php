@extends('portal.layouts.main')

@section('container')

    {{-- title section  --}}
    <div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
        <div class="header-title">
            <h4 class="" style="font-weight: normal;">NOS Portal | Upload Data</h4>
        </div>
        @include('portal.component.userProfile')
    </div>

    <div class="row">
        <div class="col-8">
            <div class="container up-data shadow-lg">                
                <form>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pilih Jenis Dokumen Yang Akan di Upload</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Pilih Dokumen</option>
                            <option value="1">Revenue dan Cost</option>
                            <option value="2">Reserved Var Cost</option>
                            <option value="3">Cost BBM</option>
                            <option value="4">OPEX</option>
                            <option value="5">Three</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark">Download Template</button>
                    <br><br>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Upload Data</label>
                      <input type="file" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
        <div class="col-4"></div>

    </div>


@endsection