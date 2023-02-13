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

    {{-- notification --}}
    @if (session()->has('success'))
    <div class="row">
        <div class="col-8">
            <div class="alert alert-success container alert-dismissible fade show" role="alert">
                {{ session('fail') }}
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    @endif

    @if (session()->has('fail'))
    <div class="row">
        <div class="col-8">
            <div class="alert alert-danger container alert-dismissible fade show" role="alert">
                {{ session('fail') }}
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    @endif

    
    <div class="row">
        <div class="col-8">
            <div class="container up-data shadow-lg">                
                <form id="form-import" enctype="multipart/form-data" method="POST" action="/fileImport">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pilih Jenis Dokumen Yang Akan di Upload</label>
                        <select id="templates" class="form-select" aria-label="Default select example" onchange="getType()" name="tipe-template">
                            <option selected>Pilih Dokumen</option>
                            <option value="KPI_utama">KPI Utama</option>
                            <option value="KPI_aktif">KPI Activity</option>
                            <option value="KPI_support">KPI Support</option>
                            <option value="RCOST">Reserved Var Cost</option>
                            <option value="ProfitLoss">Profit Loss</option>
                            <option value="BBM">Cost BBM</option>
                            <option value="OPEX">OPEX</option>
                            <option value="5">Three</option>
                        </select>
                    </div>
                    <a id="download-template" class="btn btn-dark">Download Template</a>
                    <br><br>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Upload Data</label>
                      <input type="file" class="form-control" id="exampleInputPassword1" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-4">
            <div class="container shadow-lg" style="padding: 12px;border-radius:10px">
                <h5>Catatan Penting !!</h5>
                <h6>Mohon Baca petunjuk berikut sebelum mengupload data.</h6>
                <br>
                <ol>
                    <li>Pastikan Dokumen yang Dimasukkan merupakan dokumen dengan format .CSV</li>
                    <li>Pilih Tipe Dokumen yang akan di masukkan </li>
                    <li>pastikan format dari table sesuai dengan template yang telah di sediakan</li>
                    <li>Jangan mengubah/menambahkan/menghapus kolom dari template table</li>
                    <li>Bila terdapat kolom yang memiliki tipe data tanggal (date) masukkan tanggal dengan format <b>M-d-Y</b></li>
                </ol>
            </div>
        </div>

    </div>

    <script>
        function getType(){
            let e = document.getElementById('templates');
            let type = e.options[e.selectedIndex].value;
            // mengarahkan template dokumen 
            document.getElementById('download-template').href = 'download/?type=' + type;
            // mengarahkan action form ke import data
            // document.getElementById('form-import').action = '/file-import';
            console.log( document.getElementById('form-import').action);
            console.log(document.getElementById('download-template').href);
        }

    </script>


@endsection