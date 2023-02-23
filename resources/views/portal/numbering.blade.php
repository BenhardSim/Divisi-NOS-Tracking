@extends('portal.layouts.main')

@section('container')

    {{-- title section  --}}
    <div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
        <div class="header-title">
            <h4 class="" style="font-weight: normal;">NOS Portal | Numbering Document</h4>
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
                <form id="form-import" enctype="multipart/form-data" method="POST" action="/numbereddocuments">
                    @csrf
                    <div class="form-group">
                        <label for="tipe_file" class="form-label">Jenis Dokumen</label>
                        <select id="tipe_file" name="tipe_file" class="form-select" aria-label="Default select example">
                            <option value="">Pilih Jenis Dokumen </option>
                            <option @if (old('tipe_file') == "/BAST") selected @endif value="/BAST">Berita Acara Serah Terima</option>
                            <option @if (old('tipe_file') == "/BAK") selected @endif value="/BAK">Berita Acara Kesepakatan</option>
                            <option @if (old('tipe_file') == "/BAKN") selected @endif value="/BAKN">Berita Acara Kesepakatan Negosiasi</option>
                            <option @if (old('tipe_file') == "/BAUT") selected @endif value="/BAUT">Berita Acara Uji Terima</option>
                            <option @if (old('tipe_file') == "/BAN") selected @endif value="/BAN">Berita Acara Negosiasi</option>
                            <option @if (old('tipe_file') == "/JTF") selected @endif value="/JTF">Justifikasi</option>
                            <option @if (old('tipe_file') == "/RAB") selected @endif value="/RAB">Rencana Anggaran Biaya</option>
                            <option @if (old('tipe_file') == "/MOM") selected @endif value="/MOM">Minute of Meeting</option>
                            <option @if (old('tipe_file') == "/TA") selected @endif value="/TA">Technical Assesment</option>
                            <option @if (old('tipe_file') == "/OTH") selected @endif value="/OTH">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="departemen" class="form-label">Departemen</label>
                        <select id="departemen" name="departemen" class="form-select" aria-label="Default select example">
                            <option  value="">Pilih Departemen </option>
                            <option @if (old('departemen') == "-41") selected @endif value="-41">Network Service Semarang</option>
                            <option @if (old('departemen') == "-42") selected @endif value="-42">Network Service Purwokerto</option>
                            <option @if (old('departemen') == "-43") selected @endif value="-43">Network Service Pekalongan</option>
                            <option @if (old('departemen') == "-44") selected @endif value="-44">Network Service Yogyakarta</option>
                            <option @if (old('departemen') == "-45") selected @endif value="-45">Network Service Surakarta</option>
                            <option @if (old('departemen') == "-46") selected @endif value="-46">RTSO Jateng & DIY</option>
                            <option @if (old('departemen') == "-47") selected @endif value="-47">CDPO Jateng & DIY</option>
                            <option @if (old('departemen') == "-48") selected @endif value="-48">NOS Jateng & DIY</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="uraian">Uraian Dokumen</label>
                        <textarea  class="form-control  @error('uraian') is-invalid @enderror" id="uraian" name="uraian" rows="3" placeholder="Masukkan Uraian Dokumen">{{ old('uraian') }}</textarea>
                        @error('uraian')
                            <div class="invalid-feedback">
                              Invalid
                            </div> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="vendor">Nama Vendor</label>
                        <input value="{{ old('vendor') }}" class="form-control  @error('vendor') is-invalid @enderror" id="vendor" name="vendor" type="text" placeholder="Masukkan Nama Vendor">
                        @error('vendor')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input value="{{ old('amount') }}" class="form-control  @error('amount') is-invalid @enderror" id="amount" name="amount" type="text" placeholder="Masukkan Amount">
                        @error('amount')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div> 
                        @enderror
                      </div>
                    <div class="mb-3">
                      <label for="dokumen" class="form-label">Upload Dokumen</label>
                      <input type="file" class="form-control" id="dokumen" name="dokumen" required>
                      @error('dokumen')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div> 
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-4">
            <div class="container shadow-lg" style="padding: 12px;border-radius:10px;background-color:#FCE22A">
                <h5>Catatan Penting !!</h5>
                <h6>Mohon Baca petunjuk berikut sebelum mengupload dokumen.</h6>
                <br>
                <ol>
                    <li>Pastikan Dokumen yang Dimasukkan sudah ditandatangani sampai approval level 4 (General Manager)</li>
                    <li>Pilih Tipe Dokumen yang akan di masukkan </li>
                </ol>
            </div>
        </div>

    </div>

    <div class="container con-tbl px-2 my-3">
        <table class="table table-hover" >
            <thead>
              <tr class="text-white text-left rounded" style="background-color: #144272">
                <th scope="col" style="border-radius: 10px 0 0 0">Kode</th>
                <th scope="col">Tipe File</th>
                <th scope="col">Nama File</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Vendor</th>
                <th scope="col">Amount</th>
                <th scope="col" style="border-radius: 0 10px 0 0" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if ($documents->count() == 0)
                <tr class="text-center text-danger">
                    <th colspan="7">There isn't any data yet</th>
                </tr>
              @endif
              @foreach ($documents as $document)
              <tr class="text-left">
                <th scope="row">{{ $document->kode }}</th>
                <td>{{ $document->tipe_file }}</td>
                <td><a class="links" href="/numbereddocuments/{{ $document->id }}">{{ $document->dokumen }}</a></td>
                <td>{{ $document->tanggal->format('d M Y') }}</td>
                <td>{{ $document->vendor }}</td>
                <td>{{ $document->amount }}</td>
                <td class="text-center">
                    <button id="delbtn" onclick="get_idnumber({{ $document->id }})" value="{{ $document->id }}" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#delNumber">
                        <span data-feather="delete"></span>
                    </button>
                </td>
              </tr>  
              @endforeach
              
            </tbody>
        </table>
    </div>
    {{ $documents->links() }}
    <!-- Modal Confirm notif-->
    <div class="modal fade" id="delNumber" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data numbered document ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form class="d-inline" method="POST" id="confirmContract" onsubmit="get_action_number(this)">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus Data !</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <script>
        let target_idnumber;
        function get_idnumber(id){
            target_idnumber = id;
        }
        function get_action_number(form){
            form.action = '/numbereddocuments/' + target_idnumber;
        }
    </script>


@endsection