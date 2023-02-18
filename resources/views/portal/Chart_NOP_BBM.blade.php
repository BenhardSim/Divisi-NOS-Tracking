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
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM">
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
        <div class="modal fade" id="modalDetailBBM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <canvas id="costbbm_main_toast"></canvas>
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
                                        <input id="in_awal_BBM" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-BBM" class="btn btn-primary" >Search</button>
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
                        <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Semarang</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM-semarang">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_semarang"></canvas>
                </div>
            </div>
        </div>

        {{-- MODAL MAGNIFY BBM NOP semarang --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM-semarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM NOP Semarang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_main_toast_semarang"></canvas>
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
                                        <input id="in_awal_BBM_semarang" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_semarang" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
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
                        <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Surakarta</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM-surakarta">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_surakarta"></canvas>
                </div>
            </div>
        </div>
    </div>

     {{-- MODAL MAGNIFY BBM NOP surakarta --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM-surakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM NOP surakarta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_main_toast_surakarta"></canvas>
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
                                        <input id="in_awal_BBM_surakarta" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_surakarta" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
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
     
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Yogyakarta</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM-yogyakarta">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_yogyakarta"></canvas>
                </div>
            </div>
        </div>

         {{-- MODAL MAGNIFY BBM NOP yogyakarta --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM-yogyakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM NOP yogyakarta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_main_toast_yogyakarta"></canvas>
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
                                        <input id="in_awal_BBM_yogyakarta" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_yogyakarta" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
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
                        <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Purwokerto</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM-purwokerto">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_purwokerto"></canvas>
                </div>
            </div>
        </div>
    </div>

     {{-- MODAL MAGNIFY BBM NOP purwokerto --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM-purwokerto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM NOP purwokerto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_main_toast_purwokerto"></canvas>
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
                                        <input id="in_awal_BBM_purwokerto" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_purwokerto" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
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
     
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Pekalongan</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM-pekalongan">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_pekalongan"></canvas>
                </div>
            </div>
        </div> 

         {{-- MODAL MAGNIFY BBM NOP pekalongan --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM-pekalongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM NOP pekalongan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_main_toast_pekalongan"></canvas>
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
                                        <input id="in_awal_BBM_pekalongan" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_pekalongan" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
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
                        <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Salatiga</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailBBM-salatiga">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_salatiga"></canvas>
                </div>
            </div>
        </div>
    </div>

     {{-- MODAL MAGNIFY BBM NOP salatiga --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailBBM-salatiga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA BBM NOP salatiga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="costbbm_main_toast_salatiga"></canvas>
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
                                        <input id="in_awal_BBM_salatiga" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_BBM_salatiga" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
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

     // cost BBM TOAST

    const costbbm_mainToast = document.getElementById('costbbm_main_toast').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_mainToastdata = {
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
     const costbbm_mainToastconfig = {
         type: 'line',
         data: costbbm_mainToastdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast = new Chart(costbbm_mainToast, costbbm_mainToastconfig);

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

     // cost BBM TOAST NOP semarang

    const costbbm_mainToast_semarang = document.getElementById('costbbm_main_toast_semarang').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_mainToast_semarangdata = {
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
     const costbbm_mainToast_semarangconfig = {
         type: 'line',
         data: costbbm_mainToast_semarangdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_semarang = new Chart(costbbm_mainToast_semarang, costbbm_mainToast_semarangconfig);

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

     // cost BBM TOAST NOP surakarta

    const costbbm_mainToast_surakarta = document.getElementById('costbbm_main_toast_surakarta').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_mainToast_surakartadata = {
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
     const costbbm_mainToast_surakartaconfig = {
         type: 'line',
         data: costbbm_mainToast_surakartadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_surakarta = new Chart(costbbm_mainToast_surakarta, costbbm_mainToast_surakartaconfig);

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

     // cost BBM TOAST NOP yogyakarta

    const costbbm_mainToast_yogyakarta = document.getElementById('costbbm_main_toast_yogyakarta').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_mainToast_yogyakartadata = {
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
     const costbbm_mainToast_yogyakartaconfig = {
         type: 'line',
         data: costbbm_mainToast_yogyakartadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_yogyakarta = new Chart(costbbm_mainToast_yogyakarta, costbbm_mainToast_yogyakartaconfig);

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

     // cost BBM TOAST NOP purwokerto

    const costbbm_mainToast_purwokerto = document.getElementById('costbbm_main_toast_purwokerto').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_mainToast_purwokertodata = {
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
     const costbbm_mainToast_purwokertoconfig = {
         type: 'line',
         data: costbbm_mainToast_purwokertodata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_purwokerto = new Chart(costbbm_mainToast_purwokerto, costbbm_mainToast_purwokertoconfig);

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

     // cost BBM TOAST NOP pekalongan

    const costbbm_mainToast_pekalongan = document.getElementById('costbbm_main_toast_pekalongan').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_mainToast_pekalongandata = {
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
     const costbbm_mainToast_pekalonganconfig = {
         type: 'line',
         data: costbbm_mainToast_pekalongandata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_pekalongan = new Chart(costbbm_mainToast_pekalongan, costbbm_mainToast_pekalonganconfig);

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

     // cost BBM TOAST NOP salatiga

    const costbbm_mainToast_salatiga = document.getElementById('costbbm_main_toast_salatiga').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_mainToast_salatigadata = {
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
     const costbbm_mainToast_salatigaconfig = {
         type: 'line',
         data: costbbm_mainToast_salatigadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

    let BBM_toast_salatiga = new Chart(costbbm_mainToast_salatiga, costbbm_mainToast_salatigaconfig);

    let updateChart = function(start_date,end_date,type){
        $.ajax({
            url: "/filter-data",
                    type: "GET",
                    dataType: "json",
                    data: {
                        start_date: start_date,
                        end_date: end_date,
                        type:type,
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function(dataOutput) {
                        if(type === 'kpi_utama'){
                            // labels
                            kpiu_main_toastData.labels = dataOutput.val_month
                            // data
                            kpiu_main_toastData.datasets[0].data = dataOutput.val_x_1;
                            kpiu_main_toastData.datasets[1].data = dataOutput.val_x_2;
                            kpiu_main_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIU_toast.update();
                        }else if(type === 'kpi_activity'){
                            // labels
                            kpia_main_toastData.labels = dataOutput.val_month
                            // data
                            kpia_main_toastData.datasets[0].data = dataOutput.val_x_1;
                            kpia_main_toastData.datasets[1].data = dataOutput.val_x_2;
                            kpia_main_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIA_toast.update();
                        }else if(type === 'kpi_support'){
                            // labels
                            kpis_mainToastData.labels = dataOutput.val_month
                            // data
                            kpis_mainToastData.datasets[0].data = dataOutput.val_x_1;
                            kpis_mainToastData.datasets[1].data = dataOutput.val_x_2;
                            kpis_mainToastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIS_toast.update();
                        }else if(type === 'profit_loss'){
                            // labels
                            profitloss_main_toastData.labels = dataOutput.val_month
                            // data
                            profitloss_main_toastData.datasets[0].data = dataOutput.val_x_1;
                            profitloss_main_toastData.datasets[1].data = dataOutput.val_x_2;
                            profitloss_main_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            PL_toast.update();
                        }else if(type === 'var_cost'){
                            // labels
                            varcost_main_toastdata.labels = dataOutput.val_month
                            // data
                            varcost_main_toastdata.datasets[0].data = dataOutput.val_x_1;
                            varcost_main_toastdata.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RCOST_toast.update();
                        }else if(type === 'rvc'){
                            // labels
                            revvcost_mainToastData.labels = dataOutput.val_month
                            // data
                            revvcost_mainToastData.datasets[0].data = dataOutput.val_x_1;
                            revvcost_mainToastData.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RVC_toast.update();
                        }else if(type === 'bbm'){
                            // labels
                            costbbm_mainToastdata.labels = dataOutput.val_month
                            // data
                            costbbm_mainToastdata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_mainToastdata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_mainToastdata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast.update();
                        }else if(type === 'bbm_semarang'){
                            // labels
                            costbbm_mainToast_semarangdata.labels = dataOutput.val_month
                            // data
                            costbbm_mainToast_semarangdata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_mainToast_semarangdata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_mainToast_semarangdata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_semarang.update();
                        }else if(type === 'bbm_surakarta'){
                            // labels
                            costbbm_mainToast_surakartadata.labels = dataOutput.val_month
                            // data
                            costbbm_mainToast_surakartadata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_mainToast_surakartadata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_mainToast_surakartadata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_surakarta.update();
                        }else if(type === 'bbm_yogyakarta'){
                            // labels
                            costbbm_mainToast_yogyakartadata.labels = dataOutput.val_month
                            // data
                            costbbm_mainToast_yogyakartadata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_mainToast_yogyakartadata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_mainToast_yogyakartadata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_yogyakarta.update();
                        }else if(type === 'bbm_purwokerto'){
                            // labels
                            costbbm_mainToast_purwokertodata.labels = dataOutput.val_month
                            // data
                            costbbm_mainToast_purwokertodata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_mainToast_purwokertodata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_mainToast_purwokertodata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_purwokerto.update();
                        }else if(type === 'bbm_pekalongan'){
                            // labels
                            costbbm_mainToast_pekalongandata.labels = dataOutput.val_month
                            // data
                            costbbm_mainToast_pekalongandata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_mainToast_pekalongandata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_mainToast_pekalongandata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_pekalongan.update();
                        }else if(type === 'bbm_salatiga'){
                            // labels
                            costbbm_mainToast_salatigadata.labels = dataOutput.val_month
                            // data
                            costbbm_mainToast_salatigadata.datasets[0].data = dataOutput.val_x_1;
                            costbbm_mainToast_salatigadata.datasets[1].data = dataOutput.val_x_2;
                            costbbm_mainToast_salatigadata.datasets[2].data = dataOutput.val_x_3;
                            // update
                            BBM_toast_salatiga.update();
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    },           
            });
        
    }

    $('#search-filter-BBM').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_BBM = $('#in_awal_BBM').val();
            let interval_akhir_BBM = $('#in_akhir_BBM').val();
            updateChart(interval_awal_BBM,interval_akhir_BBM,'bbm');

    })

    $('#search-filter-BBM-semarang').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_BBM_semarang = $('#in_awal_BBM_semarang').val();
            let in_akhir_BBM_semarang = $('#in_akhir_BBM_semarang').val();
            updateChart(in_awal_BBM_semarang,in_akhir_BBM_semarang,'bbm_semarang');

    })

    $('#search-filter-BBM-surakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_BBM_surakarta = $('#in_awal_BBM_surakarta').val();
            let in_akhir_BBM_surakarta = $('#in_akhir_BBM_surakarta').val();
            updateChart(in_awal_BBM_surakarta,in_akhir_BBM_surakarta,'bbm_surakarta');

    })

    $('#search-filter-BBM-yogyakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_BBM_yogyakarta = $('#in_awal_BBM_yogyakarta').val();
            let in_akhir_BBM_yogyakarta = $('#in_akhir_BBM_yogyakarta').val();
            updateChart(in_awal_BBM_yogyakarta,in_akhir_BBM_yogyakarta,'bbm_yogyakarta');

    })

    $('#search-filter-BBM-purwokerto').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_BBM_purwokerto = $('#in_awal_BBM_purwokerto').val();
            let in_akhir_BBM_purwokerto = $('#in_akhir_BBM_purwokerto').val();
            updateChart(in_awal_BBM_purwokerto,in_akhir_BBM_purwokerto,'bbm_purwokerto');

    })

    $('#search-filter-BBM-pekalongan').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_BBM_pekalongan = $('#in_awal_BBM_pekalongan').val();
            let in_akhir_BBM_pekalongan = $('#in_akhir_BBM_pekalongan').val();
            updateChart(in_awal_BBM_pekalongan,in_akhir_BBM_pekalongan,'bbm_pekalongan');

    })

    $('#search-filter-BBM-salatiga').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_BBM_salatiga = $('#in_awal_BBM_salatiga').val();
            let in_akhir_BBM_salatiga = $('#in_akhir_BBM_salatiga').val();
            updateChart(in_awal_BBM_salatiga,in_akhir_BBM_salatiga,'bbm_salatiga');

    })


     
 </script>

