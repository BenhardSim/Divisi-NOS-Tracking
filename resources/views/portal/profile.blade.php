@extends('portal.layouts.main')

@section('container')

{{-- title section  --}}
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h4>
    </div>
    @include('portal.component.userProfile')
</div>

{{-- search bar --}}

<div class="form-group container">
    <form action="{{ url('/search') }}" method="GET" role="search" >
        <input value="" name="search" class="form-control" id="exampleFormControlInput1" placeholder="Search By Site ID">
    </form>
</div>
<br>

{{-- profile box --}}
<div class="row container">
    <div class="col-lg-3">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Profile</h5></a>
            </div>
            <div class="rvc-graph">
                <p>SITE ID : <b> SITE {{ $id }} </b></p>
                <p>SITE NAME : <b> {{ $nama }}</b></p>
                <p>Alamat : <b> {{ $alamat }}</b></p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Document Sertificate</h5></a>
            </div>
            <div class="rvc-graph">
                @if ($latest_cer)
                    <p>NO Sertifikat : {{ $latest_cer->no_ser }}</p>
                    <p>See Latest Document : <a href="/file-certificate/{{ $latest_cer->id }}">View Document</a></p>
                @endif
                @if (!$latest_cer)
                    <p>NO Sertifikat : - </p>
                    <p>See Latest Document : -</p>
                @endif
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_doc_imb">
                   Upload Document
                </button>
            </div>
        </div>
    </div>

   <!-- Modal Dokumen Sertifikat -->
    <div class="modal fade" id="modal_doc_imb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Document Sertificate</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-6">
                    <h6>Document List</h6>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">No Sertif</th>
                            <th scope="col">Dokumen</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($certi_docs as $certi_doc)
                          <tr>
                            @if ($certi_doc)
                                <td scope="row">{{ $certi_doc->no_ser }}</td>
                                <td><a href="/file-certificate/{{ $certi_doc->id }}">View Document</a></td>
                            @endif
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="col-6">
                    <h6>Upload Document</h6>
                    <form method="POST" action="/certificate_documents" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site Id</label>
                            <input value="{{ $id }}" type="text" class="form-control" name="SITEID" id="SITEID" aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Sertifikat</label>
                            <input type="text" class="form-control" name="no_ser" id="no_ser" aria-describedby="emailHelp" placeholder="Masukkan Nomor sertifikat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Upload Dokumen</label>
                            <input type="file" class="form-control" name="file_ser" id="file_ser" placeholder="Password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Document Lainnya</h5></a>
            </div>
            <div class="rvc-graph">
                <p>See Latest Document : <a href="">View Document</a></p>
                <p>File Name</p>
            </div>
        </div>
    </div>

        <div class="col-lg-3">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Document IMB</h5></a>
            </div>
            <div class="rvc-graph">
                <p>NO IMB : - </p>
                <p>See Latest Document : -</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_doc_certi">
                    Upload Document
                 </button>
            </div>
        </div>
    </div>

     <!-- Modal Dokumen IMB -->
     <div class="modal fade" id="modal_doc_certi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Document IMB</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-6">
                    <h6>Document List</h6>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">No IMB</th>
                            <th scope="col">Dokumen</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($imb_docs as $imb_doc)
                          <tr>
                            @if ($imb_doc)
                                <td scope="row">{{ $imb_doc->no_imb }}</td>
                                <td><a href="">View Document</a></td>
                            @endif
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="col-6">
                    <h6>Upload Document</h6>
                    <form method="POST" action="/certificate_imbs" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site Id</label>
                            <input value="{{ $id }}" type="text" class="form-control" name="SITEID" id="SITEID" aria-describedby="emailHelp" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No IMB</label>
                            <input type="text" class="form-control" name="no_imb" id="no_imb" aria-describedby="emailHelp" placeholder="Masukkan Nomor IMB">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Upload Dokumen</label>
                            <input type="file" class="form-control" name="file_imb" id="file_imb" placeholder="Password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>




    {{-- notification --}}
    @if (session()->has('success'))
    <div class="alert alert-success container col-lg-12" role="alert">
      {{ session('success') }}
    </div>
    @endif
    
    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title title-box">
                <div class="title-cont">
                    <a href="/rvc" class="links text-white"><h5>Contract SITE</h5></a>
                </div>
                <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span> View All</span>
                    </button>

                    <!-- Insert Data Button -->
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#addeditkontrak">
                        <span data-feather="plus-circle" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span> Add Data </span>
                    </button>

                </div>       
            </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nomor PKS</th>
                    <th scope="col">Awal Sewa</th>
                    <th scope="col">Akhir Sewa</th>
                    <th scope="col">Harga Sewa</th>
                    <th scope="col">Remark</th>
                    <th scope="col">File PKS</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($contracts as $contract)
                    <tr scope="row">
                      <td >{{ $contract->no_pks }}</td>
                      <td>{{ $contract->awal_sewa }}</td>
                      <td>{{ $contract->akhir_sewa }}</td>
                      <td>{{ $contract->harga_sewa }}</td>
                      <td>{{ $contract->remark }}</td>
                      <td><a href="/file-kontrak/{{ $contract->id }}">View File</a></td>
                      <td>
                            <button id="delbtn-1" onclick="get_kontrak({{ $contract }})" value="{{ $contract->id }}" class="badge bg-warning border-0" data-bs-toggle="modal" data-bs-target="#editkontrak">
                                <span data-feather="edit-2"></span>
                            </button>
                            <!-- Button trigger modal -->
                            <button id="delbtn-1" onclick="get_id({{ json_encode(['id' => $contract->id, 'data' => 'kontrak']) }})" value="{{ $contract->id }}" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#confirmdel">
                                <span data-feather="delete"></span>
                            </button>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

    <!-- Modal Confirm notif-->
    <div class="modal fade" id="confirmdel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form class="d-inline" method="POST" id="confirmContract" onsubmit="get_action_kontrak(this)">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus Data !</button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal Form Contract Site -->
    <div class="modal fade" id="addeditkontrak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Contract for SITE {{ $id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form style="margin: 0" method="POST" action="/kontrak_site_histories" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site ID</label>
                            <input value="{{ $id }}" name="SITEID" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor PKS" readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nomor PKS</label>
                          <input name="no_pks" type="text" class="form-control" id="no_pks" placeholder="Masukkan Nomor PKS">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Awal Sewa</label>
                            <input name="awal_sewa" type="date" class="form-control" id="awal_sewa" placeholder="Masukkan Awal Sewa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Akhir Sewa</label>
                            <input name="akhir_sewa" type="date" class="form-control" id="akhir_sewa" placeholder="Masukkan Awal Sewa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Sewa</label>
                            <input name="harga_sewa" type="text" class="form-control" id="harga_sewa" placeholder="Masukkan Harga Sewa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Remark</label>
                            <input name="remark" type="text" class="form-control" id="remark" placeholder="Masukkan Remark">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Upload File</label>
                            <input name="file_pks" type="file" class="form-control" id="file_pks" placeholder="Upload File">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Form Contract Site -->
    <div class="modal fade" id="editkontrak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Contract for SITE {{ $id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form style="margin: 0" method="POST" onsubmit="edit_kontrak_site(this)" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site ID</label>
                            <input value="{{ $id }}" name="SITEID" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor PKS" readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nomor PKS</label>
                          <input name="no_pks" type="text" class="form-control" id="no_pks_edit" placeholder="Masukkan Nomor PKS">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Awal Sewa</label>
                            <input name="awal_sewa" type="date" class="form-control" id="awal_sewa_edit" placeholder="Masukkan Awal Sewa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Akhir Sewa</label>
                            <input name="akhir_sewa" type="date" class="form-control" id="akhir_sewa_edit" placeholder="Masukkan Awal Sewa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Sewa</label>
                            <input name="harga_sewa" type="text" class="form-control" id="harga_sewa_edit" placeholder="Masukkan Harga Sewa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Remark</label>
                            <input name="remark" type="text" class="form-control" id="remark_edit" placeholder="Masukkan Remark">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let target_data;
        let target_kontrak;
        function get_id(data){
            target_data = data
        }
        function get_action_kontrak(form){
            if(target_data['data'] === 'kontrak'){
                form.action = '/kontrak_site_histories/' + target_data['id'];
            }else if(target_data['data'] === 'commIssue'){
                form.action = '/commissues/' + target_data['id'];
            }
        }

        function get_kontrak(kontrak){
            target_kontrak = kontrak;
            document.getElementById('no_pks_edit').value = kontrak['no_pks'];
            document.getElementById('awal_sewa_edit').value = kontrak['awal_sewa'];
            document.getElementById('akhir_sewa_edit').value = kontrak['akhir_sewa'];
            document.getElementById('harga_sewa_edit').value = kontrak['harga_sewa'];
            document.getElementById('remark_edit').value = kontrak['remark'];
        }

        function edit_kontrak_site(form){
            form.action = '/kontrak_site_histories/' + target_kontrak['id'];
        }
    </script>

    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/rvc" class="links text-white"><h5>Comm issue</h5></a>
                    </div>
                    <div class="addicon">
                        <!-- Button trigger modal -->
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalcommissue">
                            <span data-feather="plus-circle" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span> Add Data </span>
                        </button>
                    </div>
                </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Revenue</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Action</th>
                    <th scope="col">PIC</th>
                    <th scope="col">STATS SITE</th>
                    <th scope="col">Kompensasi</th>
                    <th scope="col">Realisasi</th>
                    <th scope="col">Stats Case</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($issues as $issue)
                    <tr>
                      <td scope="row">{{ $issue->REVENUE }}</td>
                      <td>{{ $issue->DETAIL }}</td>
                      <td>{{ $issue->ACTION }}</td>
                      <td>{{ $issue->PIC }}</td>
                      <td>{{ $issue->STATSSITE }}</td>
                      <td>{{ $issue->KOMPENSASI }}</td>
                      <td>{{ $issue->REALISASI }}</td>
                      <td>{{ $issue->STATSCASE }}</td>
                      <td>
                        {{-- edit button --}}
                        <button id="delbtn-1" onclick="get_comm({{ $issue }})" value="{{ $issue->idComm }}" class="badge bg-warning border-0" data-bs-toggle="modal" data-bs-target="#modalcommissueedit">
                            <span data-feather="edit-2"></span>
                        </button>
                        <!-- Button trigger modal -->
                        <button id="delbtn-1" onclick="get_id({{ json_encode(['id' => $issue->idComm, 'data' => 'commIssue']) }})" value="{{ $issue->idComm }}" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#confirmdel">
                            <span data-feather="delete"></span>
                        </button>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

    <!-- Modal Form Comm Issue -->
    <div class="modal fade" id="modalcommissue" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Comm Issue for SITE {{ $id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form style="margin: 0" method="POST" action="/commissues" enctype="multipart/form-data">
                @csrf
                <div class="modal-body row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">SITE ID</label>
                            <input value="{{ $id }}" name="SITEID" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan SITEID" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SITE NAME</label>
                            <input value="{{ $nama }}" name="SITENAME" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan SITE NAME" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Revenue</label>
                            <input name="REVENUE" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Revenue" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Detail</label>
                          <input name="DETAIL" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Detail">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Action</label>
                            <input name="ACTION" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Action">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pic</label>
                            <input name="PIC" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Pic">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status Site</label>
                            <input name="STATSSITE" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Status Site">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kompensasi</label>
                            <input name="KOMPENSASI" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Kompensasi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Realisasi</label>
                            <input name="REALISASI" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Realisasi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stat Case</label>
                            <input name="STATSCASE" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Status Case">
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Form Edit Comm Issue -->
    <div class="modal fade" id="modalcommissueedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Comm Issue for SITE {{ $id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form style="margin: 0" method="POST" enctype="multipart/form-data" onsubmit="edit_comm_issue(this)">
                    @method('put')
                    @csrf
                <div class="modal-body row">
                    <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">SITE ID</label>
                        <input value="{{ $id }}" name="SITEID" type="text" class="form-control" id="SITEID" placeholder="Masukkan SITEID" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SITE NAME</label>
                        <input value="{{ $nama }}" name="SITENAME" type="text" class="form-control" id="SITENAME" placeholder="Masukkan SITE NAME" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Revenue</label>
                        <input name="REVENUE" type="text" class="form-control" id="REVENUE" placeholder="Masukkan Revenue" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Detail</label>
                      <input name="DETAIL" type="text" class="form-control" id="DETAIL" placeholder="Masukkan Detail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Action</label>
                        <input name="ACTION" type="text" class="form-control" id="ACTION" placeholder="Masukkan Action">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pic</label>
                        <input name="PIC" type="text" class="form-control" id="PIC" placeholder="Masukkan Pic">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status Site</label>
                        <input name="STATSSITE" type="text" class="form-control" id="STATSSITE" placeholder="Masukkan Status Site">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kompensasi</label>
                        <input name="KOMPENSASI" type="text" class="form-control" id="KOMPENSASI" placeholder="Masukkan Kompensasi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Realisasi</label>
                        <input name="REALISASI" type="text" class="form-control" id="REALISASI" placeholder="Masukkan Realisasi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stat Case</label>
                        <input name="STATSCASE" type="text" class="form-control" id="STATSCASE" placeholder="Masukkan Status Case">
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let target_comm;
        function get_comm(comm){
            target_comm = comm;
            document.getElementById('REVENUE').value = comm['REVENUE'];
            document.getElementById('DETAIL').value = comm['DETAIL'];
            document.getElementById('ACTION').value = comm['ACTION'];
            document.getElementById('PIC').value = comm['PIC'];
            document.getElementById('STATSSITE').value = comm['STATSSITE'];
            document.getElementById('KOMPENSASI').value = comm['KOMPENSASI'];
            document.getElementById('REALISASI').value = comm['REALISASI'];
            document.getElementById('STATSCASE').value = comm['STATSCASE'];
        }

        function edit_comm_issue(form){
            form.action = '/commissues/' + target_comm['idComm'];
        }

    </script>


    {{-- imbas petir --}}
    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title title-box">
                <div class="title-cont">
                    <a href="/rvc" class="links text-white"><h5>Imbas Petir</h5></a>
                </div>
                <div class="addicon">
                    <!-- Button trigger modal -->
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#imbasModal">
                        <span data-feather="plus-circle" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span> Add Data </span>
                    </button>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Claim ID</th>
                    <th scope="col">Claim</th>
                    <th scope="col">Vendor Name</th>
                    <th scope="col">Damage Notes</th>
                    {{-- <th scope="col">Polis Number</th> --}}
                    <th scope="col">Event Date</th>
                    <th scope="col">Report Date</th>
                    <th scope="col">Cost Claim</th>
                    <th scope="col">Early status</th>
                    <th scope="col">Final Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($imbas as $petir)
                    <tr class="text-left">
                      <td>{{ $petir->ClaimID }}</td>
                      <td>{{ $petir->claim }}</td>
                      <td>{{ $petir->VendorName }}</td>
                      <td>{{ $petir->DamageNotes }}</td>
                      {{-- <td>{{ $petir->PolisNumber }}</td> --}}
                      <td>{{ $petir->EventDate }}</td>
                      <td>{{ $petir->ReportDate }}</td>
                      <td>{{ $petir->CostClaim }}</td>
                      <td>{{ $petir->EarlyStatus }}</td>
                      <td>{{ $petir->FinalStatus }}</td>
                      <td class="">
                        <button onclick="get_petir({{ $petir }})" style="" type="submit" class="badge bg-warning border-0"  data-bs-toggle="modal" data-bs-target="#imbasUpdate">
                            <span data-feather="edit-2" class="" style=""></span> 
                        </button>
                        <button id="delbtnImbas" onclick="get_idimbas({{ $petir->idimbas }})" value="{{ $petir->idimbas }}" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#delImbas">
                            <span data-feather="delete"></span>
                        </button>
                      </td>
                    </tr>  
                    @endforeach
                    
                </tbody>
              </table>
        </div>
    </div>

    <!-- Modal Confirm notif-->
    <div class="modal fade" id="delImbas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data imbas petir ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form class="d-inline" method="POST" id="confirmContract" onsubmit="get_action_imbas(this)">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus Data !</button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="imbasModal" tabindex="-1" aria-labelledby="imbasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imbasModalLabel">Insert Imbas Petir for SITE {{ $id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form style="margin: 0" method="POST" action="/imbas_petirs">
                @csrf
                <div class="modal-body row">
                    <div class="col-6">
                        <div class="form-group">
                          <label for="petir_siteid">Site ID</label>
                          <input type="text" class="form-control" id="petir_siteid" name="Siteid" placeholder="Masukkan Site ID" value="{{ $id }}" readonly>
                        </div>
                        <div class="form-group">
                          <label for="petir_sitename">Site Name</label>
                          <input type="text" class="form-control" id="petir_sitename" name="SiteName" placeholder="Masukkan SiteName" value="{{ $nama }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="petir_claimid">Claim ID</label>
                            <input type="text" class="form-control" id="petir_claimid" name="ClaimID" placeholder="Claim ID">
                        </div>
                        <div class="form-group">
                            <label for="petir_claim">Claim</label>
                            <input type="text" class="form-control" id="petir_claim" name="claim" placeholder="Masukkan Claim">
                        </div>
                        <div class="form-group">
                            <label for="petir_vendorname">Vendor Name</label>
                            <input type="text" class="form-control" id="petir_vendorname" name="VendorName" placeholder="Masukkan Vendor Name">
                        </div>
                        <div class="form-group">
                            <label for="petir_damagenotes">Damage Notes</label>
                            <input type="text" class="form-control" id="petir_damagenotes" name="DamageNotes" placeholder="Masukkan Damage Notes">
                        </div>
                        <div class="form-group">
                            <label for="petir_polisnumber">Polis Number</label>
                            <input type="text" class="form-control" id="petir_polisnumber" name="PolisNumber" placeholder="Polis Number">
                        </div>
                    </div>
                    <div class="col-6">
                        
                        <div class="form-group">
                            <label for="petir_eventdate">Event Date</label>
                            <input type="date" class="form-control" id="petir_eventdate" name="EventDate" placeholder="Masukkan Event Date">
                        </div>
                        <div class="form-group">
                            <label for="petir_reportdate">Report Date</label>
                            <input type="date" class="form-control" id="petir_reportdate" name="ReportDate" placeholder="Masukkan Report Date">
                        </div>
                        <div class="form-group">
                            <label for="petir_costclaim">Cost Claim</label>
                            <input type="text" class="form-control" id="petir_costclaim" name="CostClaim" placeholder="Masukkan Cost Claim">
                        </div>
                        <div class="form-group">
                            <label for="petir_earlystatus">Early Status</label>
                            <input type="text" class="form-control" id="petir_earlystatus" name="EarlyStatus" placeholder="Masukkan Early Status">
                        </div>
                        <div class="form-group">
                            <label for="petir_finalstatus">Final Status</label>
                            <input type="text" class="form-control" id="petir_finalstatus" name="FinalStatus" placeholder="Masukkan Final Status">
                        </div>
                        <div class="form-group">
                            <label for="petir_rtpo">RTPO</label>
                            <input type="text" class="form-control" id="petir_rtpo" name="RTPO" placeholder="Masukkan RTPO">
                        </div>
                        <div class="form-group">
                            <label for="petir_regional">Regional</label>
                            <input type="text" class="form-control" id="petir_regional" name="Regional" placeholder="Masukkan Regional">
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   

    <div class="modal fade" id="imbasUpdate" tabindex="-1" aria-labelledby="imbasUpdateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imbasUpdateLabel">Update Imbas Petir for SITE {{ $id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form style="margin: 0" method="POST" onsubmit="edit_imbas_petir(this)">
                @method('put')
                @csrf
                <div class="modal-body row">
                    <div class="col-6">
                        <div class="form-group">
                          <label for="petir_siteid">Site ID</label>
                          <input type="text" class="form-control" id="petir_siteid_edit" name="Siteid" placeholder="Masukkan Site ID" value="{{ $id }}" readonly>
                        </div>
                        <div class="form-group">
                          <label for="petir_sitename">Site Name</label>
                          <input type="text" class="form-control" id="petir_sitename_edit" name="SiteName" placeholder="Masukkan SiteName" value="{{ $nama }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="petir_claimid">Claim ID</label>
                            <input type="text" class="form-control" id="petir_claimid_edit" name="ClaimID" placeholder="Claim ID" >
                        </div>
                        <div class="form-group">
                            <label for="petir_claim">Claim</label>
                            <input type="text" class="form-control" id="petir_claim_edit" name="claim" placeholder="Masukkan Claim" >
                        </div>
                        <div class="form-group">
                            <label for="petir_vendorname">Vendor Name</label>
                            <input type="text" class="form-control" id="petir_vendorname_edit" name="VendorName" placeholder="Masukkan Vendor Name" >
                        </div>
                        <div class="form-group">
                            <label for="petir_damagenotes">Damage Notes</label>
                            <input type="text" class="form-control" id="petir_damagenotes_edit" name="DamageNotes" placeholder="Masukkan Damage Notes" >
                        </div>
                        <div class="form-group">
                            <label for="petir_polisnumber">Polis Number</label>
                            <input type="text" class="form-control" id="petir_polisnumber_edit" name="PolisNumber" placeholder="Polis Number" >
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="petir_eventdate">Event Date</label>
                            <input type="date" class="form-control" id="petir_eventdate_edit" name="EventDate" placeholder="Masukkan Event Date">
                        </div>
                        <div class="form-group">
                            <label for="petir_reportdate">Report Date</label>
                            <input type="date" class="form-control" id="petir_reportdate_edit" name="ReportDate" placeholder="Masukkan Report Date" >
                        </div>
                        <div class="form-group">
                            <label for="petir_costclaim">Cost Claim</label>
                            <input type="text" class="form-control" id="petir_costclaim_edit" name="CostClaim" placeholder="Masukkan Cost Claim" >
                        </div>
                        <div class="form-group">
                            <label for="petir_earlystatus">Early Status</label>
                            <input type="text" class="form-control" id="petir_earlystatus_edit" name="EarlyStatus" placeholder="Masukkan Early Status" >
                        </div>
                        <div class="form-group">
                            <label for="petir_finalstatus">Final Status</label>
                            <input type="text" class="form-control" id="petir_finalstatus_edit" name="FinalStatus" placeholder="Masukkan Final Status">
                        </div>
                        <div class="form-group">
                            <label for="petir_rtpo">RTPO</label>
                            <input type="text" class="form-control" id="petir_rtpo_edit" name="RTPO" placeholder="Masukkan RTPO" >
                        </div>
                        <div class="form-group">
                            <label for="petir_regional">Regional</label>
                            <input type="text" class="form-control" id="petir_regional_edit" name="Regional" placeholder="Masukkan Regional" >
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
    
    <script>
        let target_petir;
        let target_idimbas;
        function get_petir(petir){
            console.log(petir);
            target_petir = petir;
            document.getElementById('petir_claimid_edit').value = petir['ClaimID'];
            document.getElementById('petir_claim_edit').value = petir['claim'];
            document.getElementById('petir_vendorname_edit').value = petir['VendorName'];
            document.getElementById('petir_damagenotes_edit').value = petir['DamageNotes'];
            document.getElementById('petir_polisnumber_edit').value = petir['PolisNumber'];
            document.getElementById('petir_eventdate_edit').value = petir['EventDate'];
            document.getElementById('petir_reportdate_edit').value = petir['ReportDate'];
            document.getElementById('petir_costclaim_edit').value = petir['CostClaim'];
            document.getElementById('petir_earlystatus_edit').value = petir['EarlyStatus'];
            document.getElementById('petir_finalstatus_edit').value = petir['FinalStatus'];
            document.getElementById('petir_rtpo_edit').value = petir['RTPO'];
            document.getElementById('petir_regional_edit').value = petir['Regional'];
        }

        function edit_imbas_petir(form){
            form.action = '/imbas_petirs/' + target_petir['idimbas'];
        }
        
        function get_idimbas(id){
            target_idimbas = id;
        }
        function get_action_imbas(form){
            form.action = '/imbas_petirs/' + target_idimbas;
        }
    </script>

    {{-- claim asset --}}
    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title title-box">
                <div class="title-cont">
                    <a href="/rvc" class="links text-white"><h5>Claim Asset</h5></a>
                </div>
                <div class="addicon">
                    <!-- Button trigger modal -->
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#claimModal">
                        <span data-feather="plus-circle" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span> Add Data </span>
                    </button>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">SITE ID</th>
                    <th scope="col">SITE Name</th>
                    <th scope="col">Report Date</th>
                    <th scope="col">Claim Number</th>
                    <th scope="col">Lost Status</th>
                    <th scope="col">Damage Cause</th>
                    <th scope="col">Early Report</th>
                    {{-- <th scope="col">Asset Category</th> --}}
                    <th scope="col">Item Type</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($claims as $claim)
                    <tr class="text-left">
                      <th scope="row">{{ $claim->SiteIDClaim }}</th>
                      <td>{{ $claim->SiteNameClaim }}</td>
                      <td>{{ $claim->Reportdate }}</td>
                      <td>{{ $claim->ClaimNumber }}</td>
                      <td>{{ $claim->LostStatus }}</td>
                      <td>{{ $claim->DamageCause }}</td>
                      <td>{{ $claim->Earlyreport }}</td>
                      {{-- <td>{{ $claim->AssetCatagory }}</td> --}}
                      <td>{{ $claim->ItemType }}</td>
                      <td>{{ $claim->Quantity }}</td>
                      <td class="">
                        <button onclick="get_claim({{ $claim }})" style="" type="submit" class="badge bg-warning border-0"  data-bs-toggle="modal" data-bs-target="#claimUpdate">
                            <span data-feather="edit-2" class="" style=""></span> 
                        </button>
                        <button id="delbtnClaim" onclick="get_idclaim({{ $claim->idclaim }})" value="{{ $claim->idclaim }}" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#delClaim">
                            <span data-feather="delete"></span>
                        </button>
                      </td>
                    </tr>  
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

    <!-- Modal Confirm notif-->
    <div class="modal fade" id="delClaim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data claim asset ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form class="d-inline" method="POST" id="confirmClaim" onsubmit="get_action_claim(this)">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus Data !</button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="claimModal" tabindex="-1" aria-labelledby="claimModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="claimModalLabel">Insert Claim Asset for SITE {{ $id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form style="margin: 0" method="POST" action="/claim_assets">
                @csrf
                <div class="modal-body row">
                        <div class="col-6">
                            <div class="form-group col">
                                <label for="claim_siteid">Site ID</label>
                                <input type="text" class="form-control" id="claim_siteid" name="SiteIDClaim" placeholder="Masukkan Site ID" value="{{ $id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="claim_itemmerk">Item Merk</label>
                                <input type="text" class="form-control" id="claim_itemmerk" name="ItemMerk" placeholder="Masukkan Item Merk">
                            </div>
                            <div class="form-group">
                                <label for="claim_itemunit">Item Unit</label>
                                <input type="text" class="form-control" id="claim_itemunit" name="ItemUnit" placeholder="Masukkan Item Unit">
                            </div>
                            <div class="form-group">
                                <label for="claim_regional">Regional</label>
                                <input type="text" class="form-control" id="claim_regional" name="Regional" placeholder="Masukkan Regional">
                            </div>
                            <div class="form-group">
                                <label for="claim_reportdate">Report Date</label>
                                <input type="date" class="form-control" id="claim_reportdate" name="Reportdate" placeholder="Masukkan Report Date">
                            </div>
                            <div class="form-group">
                                <label for="claim_claimnumber">Claim Number</label>
                                <input type="text" class="form-control" id="claim_claimnumber" name="ClaimNumber" placeholder="Masukkan Claim Number">
                            </div>
                            <div class="form-group">
                                <label for="claim_loststatus">Lost Status</label>
                                <input type="text" class="form-control" id="claim_loststatus" name="LostStatus" placeholder="Masukkan Lost Status">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group col">
                                <label for="claim_sitename">Site Name</label>
                                <input type="text" class="form-control" id="claim_sitename" name="SiteNameClaim" placeholder="Masukkan SiteName" value="{{ $nama }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="claim_damagecause">Damage Cause</label>
                                <input type="text" class="form-control" id="claim_damagecause" name="DamageCause" placeholder="Masukkan Damage Cause">
                            </div>
                            <div class="form-group">
                                <label for="claim_earlyreport">Early Report</label>
                                <input type="text" class="form-control" id="claim_earlyreport" name="Earlyreport" placeholder="Early Report">
                            </div>
                            <div class="form-group">
                                <label for="claim_assetcategory">Asset Category</label>
                                <input type="text" class="form-control" id="claim_assetcategory" name="AssetCatagory" placeholder="Masukkan Asset Category">
                            </div>
                            <div class="form-group">
                                <label for="claim_itemtype">Item Type</label>
                                <input type="text" class="form-control" id="claim_itemtype" name="ItemType" placeholder="Masukkan Item Type">
                            </div>
                            <div class="form-group">
                                <label for="claim_rtpo">RTPO</label>
                                <input type="text" class="form-control" id="claim_rtpo" name="rtpo" placeholder="Masukkan RTPO">
                            </div>
                            <div class="form-group">
                                <label for="claim_quantity">Quantity</label>
                                <input type="text" class="form-control" id="claim_quantity" name="Quantity" placeholder="Masukkan Quantity">
                            </div>
                        </div>             
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @isset($claim)
    <div class="modal fade" id="claimUpdate" tabindex="-1" aria-labelledby="claimUpdateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="claimModalLabel">Update Claim Asset for SITE {{ $id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form style="margin: 0" method="POST" onsubmit="edit_claim_asset(this)">
                @method('put')
                @csrf
                <div class="modal-body row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="claim_siteid">Site ID</label>
                                <input type="text" class="form-control" id="claim_siteid_edit" name="SiteIDClaim" placeholder="Masukkan Site ID" value="{{ $id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="claim_itemmerk">Item Merk</label>
                                <input type="text" class="form-control" id="claim_itemmerk_edit" name="ItemMerk" placeholder="Masukkan Item Merk">
                            </div>
                            <div class="form-group">
                                <label for="claim_itemunit">Item Unit</label>
                                <input type="text" class="form-control" id="claim_itemunit_edit" name="ItemUnit" placeholder="Masukkan Item Unit">
                            </div>
                            <div class="form-group">
                                <label for="claim_regional">Regional</label>
                                <input type="text" class="form-control" id="claim_regional_edit" name="Regional" placeholder="Masukkan Regional">
                            </div>
                            <div class="form-group">
                                <label for="claim_reportdate">Report Date</label>
                                <input type="date" class="form-control" id="claim_reportdate_edit" name="Reportdate" placeholder="Masukkan Report Date">
                            </div>
                            <div class="form-group">
                                <label for="claim_claimnumber">Claim Number</label>
                                <input type="text" class="form-control" id="claim_claimnumber_edit" name="ClaimNumber" placeholder="Masukkan Claim Number">
                            </div>
                            <div class="form-group">
                                <label for="claim_loststatus">Lost Status</label>
                                <input type="text" class="form-control" id="claim_loststatus_edit" name="LostStatus" placeholder="Masukkan Lost Status">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="claim_sitename">Site Name</label>
                                <input type="text" class="form-control" id="claim_sitename_edit" name="SiteNameClaim" placeholder="Masukkan SiteName" value="{{ $nama }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="claim_damagecause">Damage Cause</label>
                                <input type="text" class="form-control" id="claim_damagecause_edit" name="DamageCause" placeholder="Masukkan Damage Cause">
                            </div>
                            <div class="form-group">
                                <label for="claim_earlyreport">Early Report</label>
                                <input type="text" class="form-control" id="claim_earlyreport_edit" name="Earlyreport" placeholder="Early Report">
                            </div>
                            <div class="form-group">
                                <label for="claim_assetcategory">Asset Category</label>
                                <input type="text" class="form-control" id="claim_assetcategory_edit" name="AssetCatagory" placeholder="Masukkan Asset Category">
                            </div>
                            <div class="form-group">
                                <label for="claim_itemtype">Item Type</label>
                                <input type="text" class="form-control" id="claim_itemtype_edit" name="ItemType" placeholder="Masukkan Item Type">
                            </div>
                            <div class="form-group">
                                <label for="claim_rtpo">RTPO</label>
                                <input type="text" class="form-control" id="claim_rtpo_edit" name="rtpo" placeholder="Masukkan RTPO">
                            </div>
                            <div class="form-group">
                                <label for="claim_quantity">Quantity</label>
                                <input type="text" class="form-control" id="claim_quantity_edit" name="Quantity" placeholder="Masukkan Quantity">
                            </div>
                        </div>             
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endisset

    <script>
        let target_claim;
        let target_idclaim;
        function get_claim(claim){
            console.log(claim);
            target_claim = claim;
            document.getElementById('claim_itemmerk_edit').value = claim['ItemMerk'];
            document.getElementById('claim_itemunit_edit').value = claim['ItemUnit'];
            document.getElementById('claim_siteid_edit').value = claim['SiteIDClaim'];
            document.getElementById('claim_sitename_edit').value = claim['SiteNameClaim'];
            document.getElementById('claim_regional_edit').value = claim['Regional'];
            document.getElementById('claim_claimnumber_edit').value = claim['ClaimNumber'];
            document.getElementById('claim_reportdate_edit').value = claim['Reportdate'];
            document.getElementById('claim_loststatus_edit').value = claim['LostStatus'];
            document.getElementById('claim_damagecause_edit').value = claim['DamageCause'];
            document.getElementById('claim_earlyreport_edit').value = claim['Earlyreport'];
            document.getElementById('claim_rtpo_edit').value = claim['rtpo'];
            document.getElementById('claim_assetcategory_edit').value = claim['AssetCatagory'];
            document.getElementById('claim_itemtype_edit').value = claim['ItemType'];
            document.getElementById('claim_quantity_edit').value = claim['Quantity'];
        }

        function edit_claim_asset(form){
            form.action = '/claim_assets/' + target_claim['idclaim'];
        }
        
        function get_idclaim(id){
            target_idclaim = id;
        }
        function get_action_claim(form){
            form.action = '/claim_assets/' + target_idclaim;
        }
    </script>
    


    {{-- PBB --}}
    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title title-box">
                <div class="title-cont">
                    <a href="/rvc" class="links text-white"><h5>PBB</h5></a>
                </div>
                <div class="addicon">
                    <!-- Button trigger modal -->
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#pbbModal">
                        <span data-feather="plus-circle" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span> Add Data </span>
                    </button>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">SITE Name</th>
                    <th scope="col">NOP</th>
                    <th scope="col">NAMA WP</th>
                    <th scope="col">NPWP</th>
                    <th scope="col">KPP</th>
                    {{-- <th scope="col">Kelurahan</th>
                    <th scope="col">Kecamatan</th> --}}
                    <th scope="col">Kabupaten</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pebebe as $pbb)
                    <tr class="text-left">
                      <th scope="row">{{ $pbb->SITENAME }}</th>
                      <td>{{ $pbb->NOP }}</td>
                      <td>{{ $pbb->NAMAWP }}</td>
                      <td>{{ $pbb->NPWP }}</td>
                      <td>{{ $pbb->KPP }}</td>
                      {{-- <td>{{ $pbb->KELURAHAN }}</td>
                      <td>{{ $pbb->KECAMATAN }}</td> --}}
                      <td>{{ $pbb->KAB }}</td>
                      <td>{{ $pbb->PROVINSI }}</td>
                      <td>
                        <button onclick="get_pbb({{ $pbb }})" style="" type="submit" class="badge bg-warning border-0"  data-bs-toggle="modal" data-bs-target="#pbbUpdate">
                            <span data-feather="edit-2" class="" style=""></span> 
                        </button>
                        <button id="delbtnPbb" onclick="get_idPBB({{ $pbb->idPBB }})" value="{{ $pbb->idPBB }}" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#delPbb">
                            <span data-feather="delete"></span>
                        </button>
                      </td>
                    </tr>  
                    @endforeach
                    
                </tbody>
              </table>
        </div>
    </div>
    <!-- Modal Confirm notif-->
    <div class="modal fade" id="delPbb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data PBB ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form class="d-inline" method="POST" id="confirmContract" onsubmit="get_action_pbb(this)">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus Data !</button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="pbbModal" tabindex="-1" aria-labelledby="pbbModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pbbModalLabel">Insert PBB for SITE {{ $id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form style="margin: 0" method="POST" action="/pbbs">
                @csrf
                <div class="modal-body row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pbb_siteid">Site ID</label>
                            <input type="text" class="form-control" id="pbb_siteid" name="SITEID" placeholder="Masukkan Site ID" value="{{ $id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pbb_sitename">Site Name</label>
                            <input type="text" class="form-control" id="pbb_sitename" name="SITENAME" placeholder="Masukkan SiteName" value="{{ $nama }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pbb_nop">NOP</label>
                            <input type="text" class="form-control" id="pbb_nop" name="NOP" placeholder="Masukkan NOP">
                        </div>
                        <div class="form-group">
                            <label for="pbb_namawp">Nama WP</label>
                            <input type="text" class="form-control" id="pbb_namawp" name="NAMAWP" placeholder="Masukkan Nama WP">
                        </div>
                        <div class="form-group">
                            <label for="pbb_npwp">NPWP</label>
                            <input type="text" class="form-control" id="pbb_npwp" name="NPWP" placeholder="Masukkan NPWP">
                        </div> 
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pbb_kpp">KPP</label>
                            <input type="text" class="form-control" id="pbb_kpp" name="KPP" placeholder="Masukkan KPP">
                        </div>
                        <div class="form-group">
                            <label for="pbb_kelurahan">Kelurahan</label>
                            <input type="text" class="form-control" id="pbb_kelurahan" name="KELURAHAN" placeholder="Masukkan Kelurahan">
                        </div>
                        <div class="form-group">
                            <label for="pbb_kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="pbb_kecamatan" name="KECAMATAN" placeholder="Masukkan Kecamatan">
                        </div>
                        <div class="form-group">
                            <label for="pbb_kab">Kabupaten</label>
                            <input type="text" class="form-control" id="pbb_kab" name="KAB" placeholder="Masukkan Kabupaten">
                        </div>
                        <div class="form-group">
                            <label for="pbb_provinsi">Provinsi</label>
                            <input type="text" class="form-control" id="pbb_provinsi" name="PROVINSI" placeholder="Masukkan Provinsi">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    

    <div class="modal fade" id="pbbUpdate" tabindex="-1" aria-labelledby="pbbUpdateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imbasUpdateLabel">Update PBB for SITE {{ $id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form style="margin: 0" method="POST" onsubmit="edit_pbb(this)">
                @method('put')
                @csrf
                <div class="modal-body row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pbb_siteid">Site ID</label>
                            <input type="text" class="form-control" id="pbb_siteid_edit" name="SITEID" placeholder="Masukkan Site ID" value="{{ $id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pbb_sitename">Site Name</label>
                            <input type="text" class="form-control" id="pbb_sitename_edit" name="SITENAME" placeholder="Masukkan SiteName" value="{{ $nama }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pbb_nop">NOP</label>
                            <input type="text" class="form-control" id="pbb_nop_edit" name="NOP" placeholder="Masukkan NOP">
                        </div>
                        <div class="form-group">
                            <label for="pbb_namawp">Nama WP</label>
                            <input type="text" class="form-control" id="pbb_namawp_edit" name="NAMAWP" placeholder="Masukkan Nama WP">
                        </div>
                        <div class="form-group">
                            <label for="pbb_npwp">NPWP</label>
                            <input type="text" class="form-control" id="pbb_npwp_edit" name="NPWP" placeholder="Masukkan NPWP">
                        </div> 
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pbb_kpp">KPP</label>
                            <input type="text" class="form-control" id="pbb_kpp_edit" name="KPP" placeholder="Masukkan KPP">
                        </div>
                        <div class="form-group">
                            <label for="pbb_kelurahan">Kelurahan</label>
                            <input type="text" class="form-control" id="pbb_kelurahan_edit" name="KELURAHAN" placeholder="Masukkan Kelurahan">
                        </div>
                        <div class="form-group">
                            <label for="pbb_kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="pbb_kecamatan_edit" name="KECAMATAN" placeholder="Masukkan Kecamatan">
                        </div>
                        <div class="form-group">
                            <label for="pbb_kab">Kabupaten</label>
                            <input type="text" class="form-control" id="pbb_kab_edit" name="KAB" placeholder="Masukkan Kabupaten">
                        </div>
                        <div class="form-group">
                            <label for="pbb_provinsi">Provinsi</label>
                            <input type="text" class="form-control" id="pbb_provinsi_edit" name="PROVINSI" placeholder="Masukkan Provinsi">
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
        
    <script>
        let target_pbb;
        let target_idPBB;
        function get_pbb(pbb){
            console.log(pbb);
            target_pbb = pbb;
            document.getElementById('pbb_siteid_edit').value = pbb['SITEID'];
            document.getElementById('pbb_sitename_edit').value = pbb['SITENAME'];
            document.getElementById('pbb_nop_edit').value = pbb['NOP'];
            document.getElementById('pbb_namawp_edit').value = pbb['NAMAWP'];
            document.getElementById('pbb_npwp_edit').value = pbb['NPWP'];
            document.getElementById('pbb_kpp_edit').value = pbb['KPP'];
            document.getElementById('pbb_kelurahan_edit').value = pbb['KELURAHAN'];
            document.getElementById('pbb_kecamatan_edit').value = pbb['KECAMATAN'];
            document.getElementById('pbb_kab_edit').value = pbb['KAB'];
            document.getElementById('pbb_provinsi_edit').value = pbb['PROVINSI'];
        }

        function edit_pbb(form){
            form.action = '/pbbs/' + target_pbb['idPBB'];
        }
        
        function get_idPBB(id){
            target_idPBB = id;
        }
        function get_action_pbb(form){
            form.action = '/pbbs/' + target_idPBB;
        }
    </script>

    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Revenue VS Cost SITE {{ $id }}</h5></a>
            </div>
            <div class="rvc-graph">
                <canvas id="revenue_main"></canvas>
            </div>
        </div>
    </div>


</div>


@endsection
<script>
    var $editing
    function editImbas(){
        $editing = $petir;
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script type="module">

    // grafik revenue vs cost

    const revvcost_main = document.getElementById('revenue_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
        {
        label: ['Depre BTS'],
        data: [120000, 122000, 123000, 123000, 122000, 124000, 160000, 130000, 122000, 124000, 123000, 123000],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Depre_TowerOwn'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(100, 100, 0)',
        tension: 0.1
        },
        {
        label: ['Opex_Isr'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(0, 100, 100)',
        tension: 0.1
        },
        {
        label: ['Cost_Nsr'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(200, 100, 200)',
        tension: 0.1
        },
        {
        label: ['Depre_Combat'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(200, 200, 192)',
        tension: 0.1
        },
        {
        label: ['Depre_Power'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(50, 50, 50)',
        tension: 0.1
        },
        {
        label: ['Opex_Transmission'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(0, 200, 50)',
        tension: 0.1
        },
        {
        label: ['Cost_Tower'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(255, 255, 50)',
        tension: 0.1
        },
        {
        label: ['Depre_Uso'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(255, 150, 150)',
        tension: 0.1
        },
        {
        label: ['Depre_SiteSupport'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(255, 0, 0)',
        tension: 0.1
        },
        {
        label: ['Opex_Power'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(0, 192, 0)',
        tension: 0.1
        },
        {
        label: ['Depre_AccessLink'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(0, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Opex_Frequency'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(255, 0, 192)',
        tension: 0.1
        },
        {
        label: ['Opex_RM'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(255, 192, 0)',
        tension: 0.1
        },
    ]
    };
    const revvcost_mainConfig = {
        type: 'line',
        data: revvcost_mainData,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main, revvcost_mainConfig);

</script>