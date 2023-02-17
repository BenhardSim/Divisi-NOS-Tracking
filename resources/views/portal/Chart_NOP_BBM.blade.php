@extends('portal.layouts.main')

@section('container')
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h4 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h4>
    </div>
    @include('portal.component.userProfile')
</div>
    {{-- @include('portal.component.tablechart') --}}
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/bbm" class="links text-white"><h5>Cost BBM Regional</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM_regional">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_regional"></canvas>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL MAGNIFY BBM --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM_regional" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_regional_toast"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_BBM_regional" name='interval_awal_regional' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_regional" name="interval_akhir_regional" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-BBM-regional" class="btn btn-primary" >Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    {{-- NOP-Row-1 --}}
    <br><br>
    <div class="col-lg-12 pt-5" style="text-align: center">
        <h5>COST BBM NOP</h5>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/bbm" class="links text-white"><h5>Cost BBM Semarang</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM_semarang">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_semarang"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY BBM --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM_semarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_semarang_toast"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_BBM_semarang" name='interval_awal_semarang' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_semarang" name="interval_akhir_semarang" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-BBM-semarang" class="btn btn-primary" >Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/bbm" class="links text-white"><h5>Cost BBM Surakarta</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM_surakarta">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_surakarta"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY BBM --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM_surakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_surakarta_toast"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_BBM_surakarta" name='interval_awal_surakarta' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_surakarta" name="interval_akhir_surakarta" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-BBM-surakarta" class="btn btn-primary" >Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/bbm" class="links text-white"><h5>Cost BBM Yogyakarta</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM_yogyakarta">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_yogyakarta"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY BBM --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM_yogyakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_yogyakarta_toast"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_BBM_yogyakarta" name='interval_awal_yogyakarta' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_yogyakarta" name="interval_akhir_yogyakarta" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-BBM-yogyakarta" class="btn btn-primary" >Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/bbm" class="links text-white"><h5>Cost BBM Purwokerto</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM_purwokerto">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_purwokerto"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY BBM --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM_purwokerto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_purwokerto_toast"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_BBM_purwokerto" name='interval_awal_purwokerto' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_purwokerto" name="interval_akhir_purwokerto" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-BBM-purwokerto" class="btn btn-primary" >Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/bbm" class="links text-white"><h5>Cost BBM Pekalongan</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM_pekalongan">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_pekalongan"></canvas>
                </div>
            </div>
        </div> 
        {{-- MODAL MAGNIFY BBM --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM_pekalongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_pekalongan_toast"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_BBM_pekalongan" name='interval_awal_pekalongan' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_pekalongan" name="interval_akhir_pekalongan" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-BBM-pekalongan" class="btn btn-primary" >Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/bbm" class="links text-white"><h5>Cost BBM Salatiga</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM_salatiga">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_salatiga"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY BBM --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM_salatiga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_salatiga_toast"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_BBM_salatiga" name='interval_awal_salatiga' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_salatiga" name="interval_akhir_salatiga" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-BBM-salatiga" class="btn btn-primary" >Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
 @endsection    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 <script type="module">
     const costbbm_regional = document.getElementById('costbbm_regional').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_regionaldata = {
        labels: @json($monthList_BBM),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_regionalconfig = {
         type: 'line',
         data: costbbm_regionaldata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_regional, costbbm_regionalconfig);

     const costbbm_semarang = document.getElementById('costbbm_semarang').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_semarangdata = {
        labels: @json($monthList_BBM_semarang),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_semarang),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_semarang),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_semarang),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_semarangconfig = {
         type: 'line',
         data: costbbm_semarangdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_semarang, costbbm_semarangconfig);

     const costbbm_surakarta = document.getElementById('costbbm_surakarta').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_surakartadata = {
        labels: @json($monthList_BBM_surakarta),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_surakarta),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_surakarta),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_surakarta),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_surakartaconfig = {
         type: 'line',
         data: costbbm_surakartadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_surakarta, costbbm_surakartaconfig);

     const costbbm_yogyakarta = document.getElementById('costbbm_yogyakarta').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_yogyakartadata = {
        labels: @json($monthList_BBM_yogyakarta),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_yogyakarta),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_yogyakarta),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_yogyakarta),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_yogyakartaconfig = {
         type: 'line',
         data: costbbm_yogyakartadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_yogyakarta, costbbm_yogyakartaconfig);

     const costbbm_purwokerto = document.getElementById('costbbm_purwokerto').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_purwokertodata = {
        labels: @json($monthList_BBM_purwokerto),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_purwokerto),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_purwokerto),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_purwokerto),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_purwokertoconfig = {
         type: 'line',
         data: costbbm_purwokertodata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_purwokerto, costbbm_purwokertoconfig);

     const costbbm_pekalongan = document.getElementById('costbbm_pekalongan').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_pekalongandata = {
        labels: @json($monthList_BBM_pekalongan),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_pekalongan),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_pekalongan),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_pekalongan),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_pekalonganconfig = {
         type: 'line',
         data: costbbm_pekalongandata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_pekalongan, costbbm_pekalonganconfig);

     const costbbm_salatiga = document.getElementById('costbbm_salatiga').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_salatigadata = {
        labels: @json($monthList_BBM_salatiga),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_salatiga),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_salatiga),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_salatiga),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_salatigaconfig = {
         type: 'line',
         data: costbbm_salatigadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_salatiga, costbbm_salatigaconfig);

     const costbbm_regionalToast = document.getElementById('costbbm_regional_toast').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_regionalToastdata = {
         labels: @json($monthList_BBM),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_regionalToastconfig = {
         type: 'line',
         data: costbbm_regionalToastdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_regional = new Chart(costbbm_regionalToast, costbbm_regionalToastconfig);

    const costbbm_semarangToast = document.getElementById('costbbm_semarang_toast').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_semarangToastdata = {
         labels: @json($monthList_BBM_semarang),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_semarang),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_semarang),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_semarang),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_semarangToastconfig = {
         type: 'line',
         data: costbbm_semarangToastdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_semarang = new Chart(costbbm_semarangToast, costbbm_semarangToastconfig);

    const costbbm_surakartaToast = document.getElementById('costbbm_surakarta_toast').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_surakartaToastdata = {
         labels: @json($monthList_BBM_surakarta),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_surakarta),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_surakarta),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_surakarta),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_surakartaToastconfig = {
         type: 'line',
         data: costbbm_surakartaToastdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_surakarta = new Chart(costbbm_surakartaToast, costbbm_surakartaToastconfig);

    const costbbm_yogyakartaToast = document.getElementById('costbbm_yogyakarta_toast').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_yogyakartaToastdata = {
         labels: @json($monthList_BBM_yogyakarta),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_yogyakarta),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_yogyakarta),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_yogyakarta),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_yogyakartaToastconfig = {
         type: 'line',
         data: costbbm_yogyakartaToastdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_yogyakarta = new Chart(costbbm_yogyakartaToast, costbbm_yogyakartaToastconfig);

    const costbbm_purwokertoToast = document.getElementById('costbbm_purwokerto_toast').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_purwokertoToastdata = {
         labels: @json($monthList_BBM_purwokerto),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_purwokerto),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_purwokerto),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_purwokerto),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_purwokertoToastconfig = {
         type: 'line',
         data: costbbm_purwokertoToastdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_purwokerto = new Chart(costbbm_purwokertoToast, costbbm_purwokertoToastconfig);

    const costbbm_pekalonganToast = document.getElementById('costbbm_pekalongan_toast').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_pekalonganToastdata = {
         labels: @json($monthList_BBM_pekalongan),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_pekalongan),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_pekalongan),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_pekalongan),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_pekalonganToastconfig = {
         type: 'line',
         data: costbbm_pekalonganToastdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_pekalongan = new Chart(costbbm_pekalonganToast, costbbm_pekalonganToastconfig);

    const costbbm_salatigaToast = document.getElementById('costbbm_salatiga_toast').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_salatigaToastdata = {
         labels: @json($monthList_BBM_salatiga),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_salatiga),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_salatiga),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_salatiga),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_salatigaToastconfig = {
         type: 'line',
         data: costbbm_salatigaToastdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_salatiga = new Chart(costbbm_salatigaToast, costbbm_salatigaToastconfig);

    $('#search-filter-BBM-regional').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_BBM = $('#in_awal_BBM-regional').val();
            let interval_akhir_BBM = $('#in_akhir_BBM-regional').val();
            updateChart(interval_awal_BBM,interval_akhir_BBM,'bbm', 'regional');

    })
    $('#search-filter-BBM-semarang').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_BBM = $('#in_awal_BBM-semarang').val();
            let interval_akhir_BBM = $('#in_akhir_BBM-semarang').val();
            updateChart(interval_awal_BBM,interval_akhir_BBM,'bbm', 'semarang');

    })
    $('#search-filter-BBM-surakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_BBM = $('#in_awal_BBM-surakarta').val();
            let interval_akhir_BBM = $('#in_akhir_BBM-surakarta').val();
            updateChart(interval_awal_BBM,interval_akhir_BBM,'bbm', 'surakarta');

    })
    $('#search-filter-BBM-yogyakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_BBM = $('#in_awal_BBM-yogyakarta').val();
            let interval_akhir_BBM = $('#in_akhir_BBM-yogyakarta').val();
            updateChart(interval_awal_BBM,interval_akhir_BBM,'bbm', 'yogyakarta');

    })
    $('#search-filter-BBM-purwokerto').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_BBM = $('#in_awal_BBM-purwokerto').val();
            let interval_akhir_BBM = $('#in_akhir_BBM-purwokerto').val();
            updateChart(interval_awal_BBM,interval_akhir_BBM,'bbm', 'purwokerto');

    })
    $('#search-filter-BBM-pekalongan').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_BBM = $('#in_awal_BBM-pekalongan').val();
            let interval_akhir_BBM = $('#in_akhir_BBM-pekalongan').val();
            updateChart(interval_awal_BBM,interval_akhir_BBM,'bbm', 'pekalongan');

    })
    $('#search-filter-BBM-salatiga').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_BBM = $('#in_awal_BBM-salatiga').val();
            let interval_akhir_BBM = $('#in_akhir_BBM-salatiga').val();
            updateChart(interval_awal_BBM,interval_akhir_BBM,'bbm', 'salatiga');

    })

    let updateChart = function(start_date,end_date,type, NOP){
        $.ajax({
            url: "/filter-data",
                    type: "GET",
                    dataType: "json",
                    data: {
                        start_date: start_date,
                        end_date: end_date,
                        type:type,
                        NOP:NOP,
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function(dataOutput) {
                        if(NOP === 'regional'){
                            // labels
                            costbbm_regionalToastdata.labels = dataOutput.val_month
                            // data
                            costbbm_regionalToastdata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_regionalToastdata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_regionalToastdata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_regional.update();
                        }
                        else if(NOP === 'semarang'){
                            // labels
                            costbbm_semarangToastdata.labels = dataOutput.val_month
                            // data
                            costbbm_semarangToastdata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_semarangToastdata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_semarangToastdata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_semarang.update();
                        }
                        else if(NOP === 'surakarta'){
                            // labels
                            costbbm_surakartaToastdata.labels = dataOutput.val_month
                            // data
                            costbbm_surakartaToastdata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_surakartaToastdata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_surakartaToastdata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_surakarta.update();
                        }
                        else if(NOP === 'yogyakarta'){
                            // labels
                            costbbm_yogyakartaToastdata.labels = dataOutput.val_month
                            // data
                            costbbm_yogyakartaToastdata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_yogyakartaToastdata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_yogyakartaToastdata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_yogyakarta.update();
                        }
                        else if(NOP === 'purwokerto'){
                            // labels
                            costbbm_purwokertoToastdata.labels = dataOutput.val_month
                            // data
                            costbbm_purwokertoToastdata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_purwokertoToastdata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_purwokertoToastdata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_purwokerto.update();
                        }
                        else if(NOP === 'pekalongan'){
                            // labels
                            costbbm_pekalonganToastdata.labels = dataOutput.val_month
                            // data
                            costbbm_pekalonganToastdata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_pekalonganToastdata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_pekalonganToastdata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_pekalongan.update();
                        }
                        else if(NOP === 'salatiga'){
                            // labels
                            costbbm_salatigaToastdata.labels = dataOutput.val_month
                            // data
                            costbbm_salatigaToastdata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_salatigaToastdata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_salatigaToastdata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_salatiga.update();
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    },           
            });
        
    }
     
 </script>

