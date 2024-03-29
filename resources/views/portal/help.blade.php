@extends('portal.layouts.main')

@section('container')
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h4>
    </div>
    @include('portal.component.userProfile')
</div>

<div class="menu row  border-bottom pb-2 mb-3">
    <div class="col-12 display-flex px-4">
        <a href="#import_data" class="text-decoration-none" style="color:gray">Import Data | </a>
        <a href="#doc_tracking" class="text-decoration-none" style="color:gray">Document Tracking | </a>
        <a href="#doc_number" class="text-decoration-none" style="color:gray">Document Numbering | </a>
        <a href="#dev_contact" class="text-decoration-none" style="color:gray">Developer Contact </a>
    </div>
</div>
<div class="row">
    <div id="import_data" class="container col-7 border-bottom pb-2 mb-3">
        <h6>Import Data</h6>
        <p>Fitur Import Data merupakan fitur yang digunakkan untuk melakukan query ke dalam database dengan cara menggunakan file spreadsheet yang telah di sesuaikan dengan template yang ada</p>
        <p>Berikut Cara Melakukan Import Data : </p>
        <ol>
            <li>Pastikan Anda Login dengan tingkat authorisasi level admin</li>
            <li>Masuk Kedalam Menu sidebar Upload Data</li>
            <li>Apabila belum mempunyai File yang sesuai dengan template, anda bisa mendownload template terlebih dahulu dengan memilikih jenis document yang akan di masukkan  </li>
            <li>isi dokumen template sesuai dengan format data yang ada</li>
            <li>pastikan tidak ada cell yang kosong pada file yang akan di import</li>
            <li>Apabila File yang akan di import sudah sesuai dengan format yang dinginkan klik upload file dan masukkan file tersebut</li>
            <li>Apabila File berhasil di masukkan maka akan muncul notifikasi bahwa file berhasil dimasukkan</li>
        </ol>
        <p>apabila file tidak dapat di import berikut beberapa pesan error yang mungkin muncul :</p>
        <ul>
            <li style="color:red">masukkan dokumen dengan tipe data .csv atau .xlsx dan pastikan file tidak kosong</li>
            <p>Format Extension dari data yang dimasukkan ke dalam aplikasi tidak sesuai dengan kriteria yang diminta, pastikan file yang anda import memiliki extension .csv atau .xlsx</p>
            <li style="color:red">pilih jenis Dokumen yang akan di masukkan !</li>
            <p>Anda Melakukan import file tanpa memilih jenis dokumen yang akan di upload, pastikan anda memilih jenis dokumen yang diupload lalu memasukkan file sebelum mengsubmit file</p>
            <li style="color:red">Data Pada File Tidak Boleh Kosong !</li>
            <p>Anda Mengimport File kosong kedalam database, pastikan anda mengupload file yang benar</p>
            <li style="color:red">Terdapat <b>n</b> cell kosong pada colomn <b>col</b></li>
            <p>File yang anda import memiliki cell kosong di dalam nya <br> ( <b>n</b> menandakan jumlah cell yang kosong, dan <b>col</b> merupakan nama cell yang kosong ), pastikan tidak ada cell kosong dalam table spreadsheet yang anda import, secara default apabila terdapat cell kosong pada file yang anda import maka, <b>seluruh</b> data tidak akan dimasukkan ke dalam database</p>
            <li style="color:red">Data Gagal Dimasukkan.</li>
            <p>Kemungkinan besar data yang anda masukkan tidak sesuai dengan aturan template yang telah diberikan, pastikan data yang dimasukkan sesuai dengan template yang anda download</p>
        </ul>
    </div>
    <div class="col-5"></div>

    <div id="doc_tracking" class="container col-7 border-bottom pb-2 mb-3">
        <h6>Document Tracking</h6>
        <p>Fitur Document Tracking adalah fitur yang dibuat untuk melihat progress approval dokumen yang terkirim melalui persetujuan multi-level</p>
        <p>Berikut cara mengirim dokumen bagi user non-admin : </p>
        <ol>
            <li>Pastikan anda login dengan tingkat authorisasi level non-admin</li>
            <li>Masuk Kedalam menu sidebar <b>Send Document</b></li>
            <li>Isi data dan body dokumen sesuai form yang diberi</li>
            <li>Tentukan tujuan dokumen untuk level-level di atas level anda</li>
            <li>Pastikan tidak ada inputan yang kosong</li>
            <li>Dokumen akan dikirim ketika menekan tombol submit</li>
            <li>Atasan anda akan menerima email notifikasi</li>
        </ol>
        <p>Berikut cara melihat progress dari document tracking <b>(per dokumen)</b> :</p>
        <ul>
            <li style="color:red">Untuk Admin:</li>
            <p>Buka menu sidebar <b>Document Tracking</b>, klik dokumen yang ingin dilihat detailnya</p>
            <li style="color:red">Untuk User lain</li>
            <p>Buka menu sidebar <b>Send Document</b>, di bagian kanan akan terlihat menu log pengiriman dokumen, buka dokumen yang anda inginkan</p>
        </ul>
        <p>Berikut cara melihat history dari document tracking <b>(per aksi)</b> :</p>
        <ul>
            <p>Buka menu sidebar <b>History</b>, anda akan melihat history log yang sudah dipecah untuk setiap action yang dilakukan. Klik salah satu log untuk membuka menu detail</p>
        </ul>
    </div>
    <div class="col-5"></div>

    <div id="doc_number" class="container col-7 border-bottom pb-2 mb-3">
        <h6>Document Numbering</h6>
        <p>Document Numbering merupakan fitur yang digunakan untuk mengenerate nomer dokumen berdasarkan jenis dokumen, jenis departemen serta jumlah dokumen yang telah ada di dalam database</p>
        <p>Berikut cara mengenerate nomer dokumen : </p>
        <ol>
            <li>Pastikan Anda telah login, fitur ini bisa diakses oleh semua user yang sudah terauthorisasi</li>
            <li>Masuk ke Halaman Menu <b>Numbering Document</b> pada sidebar aplikasi</li>
            <li>Isi Form <b>Document Form</b> sesuai dengan kriteria yang dinginkan, pastikan tidak ada field yang dibiarkan kosong</li>
            <li>pilih dokumen yang akan diberikan penomoran</li>
            <li>bila data berhasil dimasukkan maka nomer yang di generate akan muncul pada bagian bawah form di tabel <b>Numbered Document List</b></li>
        </ol>
    
    </div>
    <div class="col-5"></div>

    <div id="dev_contact" class="container col-7">
        <h6>Developer Contact</h6>
        <ul>
            <li>Dev 1 : +6182139322043 (Benhard Simanullang)</li>
            <li>Dev 2 : +6182114384818 (Julius Adrian)</li>
        </ul>
    </div>
    <div class="col-5"></div>    
</div>



@endsection