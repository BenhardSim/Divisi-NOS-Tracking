@extends('portal.layouts.main')

@section('container')

{{-- title section  --}}
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h3 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h3>
    </div>
    <div class="profile-pic">
        <h6>{{ auth()->user()->name }}</h6>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger"><span data-feather="log-out" class="align-text-bottom"></span> Logout</button>
        </form>
    </div>
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
                <p>NO Sertifikat : {{ $no_kon }}</p>
                <form class="form-inline">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Document Lainnya</h5></a>
            </div>
            <div class="rvc-graph">
                <p>NO HO : </p>
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
                <p>NO IMB : </p>
                <p>File Name</p>
            </div>
        </div>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success container" role="alert">
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
                            <input value="{{ $id }}" name="SITEID" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor PKS" >
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
                            <input value="{{ $id }}" name="SITEID" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor PKS" >
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
        <div class="modal-dialog modal-lg">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Comm Issue for SITE {{ $id }}</h5>
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
                        <form action="/imbas_petirs/{{ $petir->idimbas }}" class="d-inline" method="POST">
                          @csrf
                          @method('delete')
                          <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="delete"></span></button>
                        </form>
                      </td>
                    </tr>  
                    @endforeach
                    
                </tbody>
              </table>
        </div>
    </div>

    <div class="modal fade" id="imbasModal" tabindex="-1" aria-labelledby="imbasModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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

   

    {{-- @isset($petir) --}}
    <div class="modal fade" id="imbasUpdate" tabindex="-1" aria-labelledby="imbasUpdateLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
    {{-- @endisset --}}
    
    <script>
        let target_petir;
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
                        <button style="" type="submit" class="badge bg-warning border-0"  data-bs-toggle="modal" data-bs-target="#claimUpdate">
                            <span data-feather="edit-2" class="" style=""></span> 
                        </button>
                        <form action="/claim_assets/{{ $claim->idclaim }}" class="d-inline" method="POST">
                          @csrf
                          @method('delete')
                          <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="delete"></span></button>
                        </form>
                      </td>
                    </tr>  
                    @endforeach
                </tbody>
              </table>
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
                <div class="modal-body">
                        <div class="form-group">
                          <label for="claim_siteid">Site ID</label>
                          <input type="text" class="form-control" id="claim_siteid" name="SiteIDClaim" placeholder="Masukkan Site ID" value="{{ $id }}" readonly>
                        </div>
                        <div class="form-group">
                          <label for="claim_sitename">Site Name</label>
                          <input type="text" class="form-control" id="claim_sitename" name="SiteNameClaim" placeholder="Masukkan SiteName" value="{{ $nama }}" readonly>
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
                        <div class="form-group">
                            <label for="claim_itemmerk">Item Merk</label>
                            <input type="text" class="form-control" id="claim_itemmerk" name="ItemMerk" placeholder="Masukkan Item Merk">
                        </div>
                        <div class="form-group">
                            <label for="claim_itemunit">Item Unit</label>
                            <input type="text" class="form-control" id="claim_itemunit" name="ItemUnit" placeholder="Masukkan Item Unit">
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
                <form style="margin: 0" method="POST" action="/claim_assets/{{ $claim->idclaim }}">
                @method('put')
                @csrf
                <div class="modal-body">
                        <div class="form-group">
                          <label for="claim_siteid">Site ID</label>
                          <input type="text" class="form-control" id="claim_siteid" name="SiteIDClaim" placeholder="Masukkan Site ID" value="{{ $id }}" readonly>
                        </div>
                        <div class="form-group">
                          <label for="claim_sitename">Site Name</label>
                          <input type="text" class="form-control" id="claim_sitename" name="SiteNameClaim" placeholder="Masukkan SiteName" value="{{ $nama }}" readonly>
                        </div>
                        <div class="form-group">
                          <label for="claim_regional">Regional</label>
                          <input type="text" class="form-control" id="claim_regional" name="Regional" placeholder="Masukkan Regional"  value="{{ $claim->Regional }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_reportdate">Report Date</label>
                            <input type="date" class="form-control" id="claim_reportdate" name="Reportdate" placeholder="Masukkan Report Date" value="{{ $claim->Reportdate }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_claimnumber">Claim Number</label>
                            <input type="text" class="form-control" id="claim_claimnumber" name="ClaimNumber" placeholder="Masukkan Claim Number" value="{{ $claim->ClaimNumber }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_loststatus">Lost Status</label>
                            <input type="text" class="form-control" id="claim_loststatus" name="LostStatus" placeholder="Masukkan Lost Status" value="{{ $claim->LostStatus }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_damagecause">Damage Cause</label>
                            <input type="text" class="form-control" id="claim_damagecause" name="DamageCause" placeholder="Masukkan Damage Cause" value="{{ $claim->DamageCause }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_earlyreport">Early Report</label>
                            <input type="text" class="form-control" id="claim_earlyreport" name="Earlyreport" placeholder="Early Report" value="{{ $claim->Earlyreport }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_assetcategory">Asset Category</label>
                            <input type="text" class="form-control" id="claim_assetcategory" name="AssetCatagory" placeholder="Masukkan Asset Category" value="{{ $claim->AssetCatagory }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_itemtype">Item Type</label>
                            <input type="text" class="form-control" id="claim_itemtype" name="ItemType" placeholder="Masukkan Item Type" value="{{ $claim->ItemType }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_rtpo">RTPO</label>
                            <input type="text" class="form-control" id="claim_rtpo" name="rtpo" placeholder="Masukkan RTPO" value="{{ $claim->rtpo }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_quantity">Quantity</label>
                            <input type="text" class="form-control" id="claim_quantity" name="Quantity" placeholder="Masukkan Quantity" value="{{ $claim->Quantity }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_itemmerk">Item Merk</label>
                            <input type="text" class="form-control" id="claim_itemmerk" name="ItemMerk" placeholder="Masukkan Item Merk" value="{{ $claim->ItemMerk }}">
                        </div>
                        <div class="form-group">
                            <label for="claim_itemunit">Item Unit</label>
                            <input type="text" class="form-control" id="claim_itemunit" name="ItemUnit" placeholder="Masukkan Item Unit" value="{{ $claim->ItemUnit }}">
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
    


    {{-- PBB --}}
    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title title-box">
                <div class="title-cont">
                    <a href="/rvc" class="links text-white"><h5>PBB</h5></a>
                </div>
                <div class="addicon">
                    <!-- Button trigger modal -->
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                    <th scope="col">Kelurahan</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Kabupaten</th>
                    <th scope="col">Provinsi</th>
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
                      <td>{{ $pbb->KELURAHAN }}</td>
                      <td>{{ $pbb->KECAMATAN }}</td>
                      <td>{{ $pbb->KAB }}</td>
                      <td>{{ $pbb->PROVINSI }}</td>
                    </tr>  
                    @endforeach
                    
                </tbody>
              </table>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Revenue VS Cost SITE {{ $id }}</h5></a>
            </div>
            <div class="rvc-graph">
                <canvas id="revenue_main"></canvas>
            </div>
        </div>
    </div>


    {{-- profit loss regional   --}}
    <div class="col-lg-6">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/pl" class="links text-white"><h5>Profit Loss SITE {{ $id }}</h5></a>
            </div>
            <div class="rvc-graph">
                <canvas id="profitloss_main"></canvas>
            </div>
        </div>
    </div>

    {{-- Reserved Varcost   --}}
    <div class="col-lg-6">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rv" class="links text-white"><h5>Reserved Varcost SITE {{ $id }}</h5></a>
            </div>
            <div class="rvc-graph">
                <canvas id="varcost_main"></canvas>
            </div>
        </div>
    </div>

    {{-- Cost BBM --}}
    <div class="col-lg-6">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/bbm" class="links text-white"><h5>Cost BBM SITE {{ $id }}</h5></a>
            </div>
            <div class="rvc-graph">
                <canvas id="costbbm_main"></canvas>
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
        label: ['Revenue'],
        data: [120000, 122000, 123000, 123000, 122000, 124000, 160000, 130000, 122000, 124000, 123000, 123000],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
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

    // site profit loss regional 

    const profitloss_main = document.getElementById('profitloss_main').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
        {
            label: 'High Profit',
            data: [1000, 1030, 1010 ,1010 ,1020, 1050, 1030, 1020, 1000, 1020, 1040, 1030, 1020],
            backgroundColor: '#22aa99'
        },
        {
            label: 'Profit',
            data: [110, 100, 105 ,110 ,90, 100, 90, 105, 110, 110, 100, 110, 100],
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: [10, 13,12 ,11 ,10, 10, 13, 12, 10, 10, 140, 10, 10],
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_mainConfig = {
        type: 'bar',
        data: profitloss_mainData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
                xAxes: [{
                  stacked: true // this should be set to make the bars stacked
                }],
                 yAxes: [{
                   stacked: true // this also..
                }]
            }
        }
    };

    new Chart(profitloss_main, profitloss_mainConfig);

    // varcost graph

    const varcost_main = document.getElementById('varcost_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const varcost_maindata = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
        {
        label: ['PS'],
        data: [120000, 50000, 75000, 22000, 12500, 55000, 40000, 100000, 110000, 120500, 140000, 125000],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['RM'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const varcost_mainconfig = {
        type: 'line',
        data: varcost_maindata,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(varcost_main, varcost_mainconfig);

    // cost BBM

    const costbbm_main = document.getElementById('costbbm_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const costbbm_maindata = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [
        {
        label: ['Cost (dalam ribuan rupiah)'],
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(100, 100, 255)',
        tension: 0.1
        },
        {
        label: ['Lama Pemakaian (bulan)'],
        data: [12, 10, 32, 30, 12, 11, 10],
        fill: false,
        borderColor: 'rgb(100, 255, 100)',
        tension: 0.1
        },
        {
        label: ['BBM (Liter)'],
        data: [10, 12, 34, 77, 34, 21, 22],
        fill: false,
        borderColor: 'rgb(255, 100, 100)',
        tension: 0.1
        }
    ]
    };
    const costbbm_mainconfig = {
        type: 'line',
        data: costbbm_maindata,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(costbbm_main, costbbm_mainconfig);

    // OPEX

    const opex_main = document.getElementById('opex_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_maindata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [90, 50, 18],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_mainconfig = {
        type: 'pie',
        data: opex_maindata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_main, opex_mainconfig);
</script>