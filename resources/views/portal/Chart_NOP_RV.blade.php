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
                        <a href="/rv" class="links text-white"><h5>Reserved Varcost Regional</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRCOST">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_regional"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL MAGNIFY RESERVED VARCOST --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailRCOST" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA RESERVED VAR COST</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="varcost_main_toast"></canvas>
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
                                        <input id="in_awal_RCOST" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_RCOST" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-RCOST" class="btn btn-primary" >Search</button>
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
     <br>
     <div class="col-lg-12 pt-5" style="text-align: center">
         <h5>Reserved Var Cost NOP</h5>
     </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP semarang</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRCOST-semarang">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_semarang"></canvas>
                </div>
            </div>
        </div>

        {{-- MODAL MAGNIFY RESERVED VARCOST NOP semarang --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailRCOST-semarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA RESERVED VAR COST NOP semarang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="varcost_main_toast_semarang"></canvas>
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
                                        <input id="in_awal_RCOST_semarang" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_RCOST_semarang" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-RCOST-semarang" class="btn btn-primary" >Search</button>
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
                        <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Surakarta</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRCOST-surakarta">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_surakarta"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL MAGNIFY RESERVED VARCOST NOP surakarta --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailRCOST-surakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA RESERVED VAR COST NOP surakarta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="varcost_main_toast_surakarta"></canvas>
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
                                        <input id="in_awal_RCOST_surakarta" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_RCOST_surakarta" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-RCOST-surakarta" class="btn btn-primary" >Search</button>
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
                        <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Yogyakarta</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRCOST-yogyakarta">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_yogyakarta"></canvas>
                </div>
            </div>
        </div>

        {{-- MODAL MAGNIFY RESERVED VARCOST NOP yogyakarta --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailRCOST-yogyakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA RESERVED VAR COST NOP yogyakarta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="varcost_main_toast_yogyakarta"></canvas>
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
                                        <input id="in_awal_RCOST_yogyakarta" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_RCOST_yogyakarta" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-RCOST-yogyakarta" class="btn btn-primary" >Search</button>
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
                        <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Purwokerto</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRCOST-purwokerto">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_purwokerto"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL MAGNIFY RESERVED VARCOST NOP purwokerto --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailRCOST-purwokerto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA RESERVED VAR COST NOP purwokerto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="varcost_main_toast_purwokerto"></canvas>
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
                                        <input id="in_awal_RCOST_purwokerto" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_RCOST_purwokerto" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-RCOST-purwokerto" class="btn btn-primary" >Search</button>
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
                        <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Pekalongan</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRCOST-pekalongan">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_pekalongan"></canvas>
                </div>
            </div>
        </div> 

        {{-- MODAL MAGNIFY RESERVED VARCOST NOP pekalongan --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailRCOST-pekalongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA RESERVED VAR COST NOP pekalongan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="varcost_main_toast_pekalongan"></canvas>
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
                                        <input id="in_awal_RCOST_pekalongan" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_RCOST_pekalongan" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-RCOST-pekalongan" class="btn btn-primary" >Search</button>
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
                        <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Salatiga</h5></a>
                    </div>
                    {{-- view All Data Button --}}
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRCOST-salatiga">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_salatiga"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL MAGNIFY RESERVED VARCOST NOP salatiga --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailRCOST-salatiga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA RESERVED VAR COST NOP salatiga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="varcost_main_toast_salatiga"></canvas>
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
                                        <input id="in_awal_RCOST_salatiga" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_RCOST_salatiga" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-RCOST-salatiga" class="btn btn-primary" >Search</button>
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
        const varcost_regional = document.getElementById('varcost_regional').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_regionaldata = {
            labels: @json($monthList_ReservedCost),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
    ]
        };
        const varcost_regionalconfig = {
            type: 'line',
            data: varcost_regionaldata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        new Chart(varcost_regional, varcost_regionalconfig);

        // varcost graph TOAST

        const varcost_main_toast = document.getElementById('varcost_main_toast').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_main_toastdata = {
            labels: @json($monthList_ReservedCost),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_main_toastconfig = {
            type: 'line',
            data: varcost_main_toastdata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        let RCOST_toast = new Chart(varcost_main_toast, varcost_main_toastconfig);

        const varcost_semarang = document.getElementById('varcost_semarang').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_semarangdata = {
            labels: @json($monthList_ReservedCost_semarang),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_semarang),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_semarang),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_semarangconfig = {
            type: 'line',
            data: varcost_semarangdata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        new Chart(varcost_semarang, varcost_semarangconfig);

         // varcost graph TOAST NOP semarang

         const varcost_main_toast_semarang = document.getElementById('varcost_main_toast_semarang').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_main_toast_semarangdata = {
            labels: @json($monthList_ReservedCost_semarang),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_semarang),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_semarang),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_main_toast_semarangconfig = {
            type: 'line',
            data: varcost_main_toast_semarangdata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        let RCOST_toast_semarang = new Chart(varcost_main_toast_semarang, varcost_main_toast_semarangconfig);

        const varcost_surakarta = document.getElementById('varcost_surakarta').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_surakartadata = {
            labels: @json($monthList_ReservedCost_surakarta),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_surakarta),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_surakarta),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_surakartaconfig = {
            type: 'line',
            data: varcost_surakartadata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        new Chart(varcost_surakarta, varcost_surakartaconfig);

        // varcost graph TOAST NOP surakarta

        const varcost_main_toast_surakarta = document.getElementById('varcost_main_toast_surakarta').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_main_toast_surakartadata = {
            labels: @json($monthList_ReservedCost_surakarta),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_surakarta),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_surakarta),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_main_toast_surakartaconfig = {
            type: 'line',
            data: varcost_main_toast_surakartadata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        let RCOST_toast_surakarta = new Chart(varcost_main_toast_surakarta, varcost_main_toast_surakartaconfig);

        const varcost_yogyakarta = document.getElementById('varcost_yogyakarta').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_yogyakartadata = {
            labels: @json($monthList_ReservedCost_yogyakarta),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_yogyakarta),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_yogyakarta),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_yogyakartaconfig = {
            type: 'line',
            data: varcost_yogyakartadata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        new Chart(varcost_yogyakarta, varcost_yogyakartaconfig);

        // varcost graph TOAST NOP yogyakarta

        const varcost_main_toast_yogyakarta = document.getElementById('varcost_main_toast_yogyakarta').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_main_toast_yogyakartadata = {
            labels: @json($monthList_ReservedCost_yogyakarta),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_yogyakarta),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_yogyakarta),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_main_toast_yogyakartaconfig = {
            type: 'line',
            data: varcost_main_toast_yogyakartadata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        let RCOST_toast_yogyakarta = new Chart(varcost_main_toast_yogyakarta, varcost_main_toast_yogyakartaconfig);

        const varcost_purwokerto = document.getElementById('varcost_purwokerto').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_purwokertodata = {
            labels: @json($monthList_ReservedCost_purwokerto),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_purwokerto),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_purwokerto),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_purwokertoconfig = {
            type: 'line',
            data: varcost_purwokertodata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        new Chart(varcost_purwokerto, varcost_purwokertoconfig);

        // varcost graph TOAST NOP purwokerto

        const varcost_main_toast_purwokerto = document.getElementById('varcost_main_toast_purwokerto').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_main_toast_purwokertodata = {
             labels: @json($monthList_ReservedCost_purwokerto),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_purwokerto),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_purwokerto),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_main_toast_purwokertoconfig = {
            type: 'line',
            data: varcost_main_toast_purwokertodata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        let RCOST_toast_purwokerto = new Chart(varcost_main_toast_purwokerto, varcost_main_toast_purwokertoconfig);

        const varcost_pekalongan = document.getElementById('varcost_pekalongan').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_pekalongandata = {
            labels: @json($monthList_ReservedCost_pekalongan),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_pekalongan),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_pekalongan),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_pekalonganconfig = {
            type: 'line',
            data: varcost_pekalongandata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        new Chart(varcost_pekalongan, varcost_pekalonganconfig);

         // varcost graph TOAST NOP pekalongan

         const varcost_main_toast_pekalongan = document.getElementById('varcost_main_toast_pekalongan').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_main_toast_pekalongandata = {
             labels: @json($monthList_ReservedCost_pekalongan),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_pekalongan),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_pekalongan),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_main_toast_pekalonganconfig = {
            type: 'line',
            data: varcost_main_toast_pekalongandata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        let RCOST_toast_pekalongan = new Chart(varcost_main_toast_pekalongan, varcost_main_toast_pekalonganconfig);


        const varcost_salatiga = document.getElementById('varcost_salatiga').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_salatigadata = {
            labels: @json($monthList_ReservedCost_salatiga),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_salatiga),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_salatiga),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_salatigaconfig = {
            type: 'line',
            data: varcost_salatigadata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        new Chart(varcost_salatiga, varcost_salatigaconfig);

        // varcost graph TOAST NOP salatiga

        const varcost_main_toast_salatiga = document.getElementById('varcost_main_toast_salatiga').getContext('2d');
        //const labels = Utils.months({count: 7});
        const varcost_main_toast_salatigadata = {
            labels: @json($monthList_ReservedCost_salatiga),
            datasets: [
            {
            label: ['PS'],
            data: @json($value_RCOST_PS_salatiga),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['RM'],
            data: @json($value_RCOST_RM_salatiga),
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const varcost_main_toast_salatigaconfig = {
            type: 'line',
            data: varcost_main_toast_salatigadata,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        let RCOST_toast_salatiga = new Chart(varcost_main_toast_salatiga, varcost_main_toast_salatigaconfig);

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
                        }else if(type === 'var_cost_semarang'){
                            // labels
                            varcost_main_toast_semarangdata.labels = dataOutput.val_month
                            // data
                            varcost_main_toast_semarangdata.datasets[0].data = dataOutput.val_x_1;
                            varcost_main_toast_semarangdata.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RCOST_toast_semarang.update();
                        }else if(type === 'var_cost_surakarta'){
                            // labels
                            varcost_main_toast_surakartadata.labels = dataOutput.val_month
                            // data
                            varcost_main_toast_surakartadata.datasets[0].data = dataOutput.val_x_1;
                            varcost_main_toast_surakartadata.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RCOST_toast_surakarta.update();
                        }else if(type === 'var_cost_yogyakarta'){
                            // labels
                            varcost_main_toast_yogyakartadata.labels = dataOutput.val_month
                            // data
                            varcost_main_toast_yogyakartadata.datasets[0].data = dataOutput.val_x_1;
                            varcost_main_toast_yogyakartadata.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RCOST_toast_yogyakarta.update();
                        }else if(type === 'var_cost_purwokerto'){
                            // labels
                            varcost_main_toast_purwokertodata.labels = dataOutput.val_month
                            // data
                            varcost_main_toast_purwokertodata.datasets[0].data = dataOutput.val_x_1;
                            varcost_main_toast_purwokertodata.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RCOST_toast_purwokerto.update();
                        }else if(type === 'var_cost_pekalongan'){
                            // labels
                            varcost_main_toast_pekalongandata.labels = dataOutput.val_month
                            // data
                            varcost_main_toast_pekalongandata.datasets[0].data = dataOutput.val_x_1;
                            varcost_main_toast_pekalongandata.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RCOST_toast_pekalongan.update();
                        }else if(type === 'var_cost_salatiga'){
                            // labels
                            varcost_main_toast_salatigadata.labels = dataOutput.val_month
                            // data
                            varcost_main_toast_salatigadata.datasets[0].data = dataOutput.val_x_1;
                            varcost_main_toast_salatigadata.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RCOST_toast_salatiga.update();
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
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    },           
            });
        
    }

    $('#search-filter-RCOST').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_PL = $('#in_awal_RCOST').val();
            let interval_akhir_PL = $('#in_akhir_RCOST').val();
            updateChart(interval_awal_PL,interval_akhir_PL,'var_cost');

    })

    $('#search-filter-RCOST-semarang').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_RCOST_semarang = $('#in_awal_RCOST_semarang').val();
            let in_akhir_RCOST_semarang = $('#in_akhir_RCOST_semarang').val();
            updateChart(in_awal_RCOST_semarang,in_akhir_RCOST_semarang,'var_cost_semarang');

    })

    $('#search-filter-RCOST-surakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_RCOST_surakarta = $('#in_awal_RCOST_surakarta').val();
            let in_akhir_RCOST_surakarta = $('#in_akhir_RCOST_surakarta').val();
            updateChart(in_awal_RCOST_surakarta,in_akhir_RCOST_surakarta,'var_cost_surakarta');

    })

    $('#search-filter-RCOST-yogyakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_RCOST_yogyakarta = $('#in_awal_RCOST_yogyakarta').val();
            let in_akhir_RCOST_yogyakarta = $('#in_akhir_RCOST_yogyakarta').val();
            updateChart(in_awal_RCOST_yogyakarta,in_akhir_RCOST_yogyakarta,'var_cost_yogyakarta');

    })

    $('#search-filter-RCOST-purwokerto').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_RCOST_purwokerto = $('#in_awal_RCOST_purwokerto').val();
            let in_akhir_RCOST_purwokerto = $('#in_akhir_RCOST_purwokerto').val();
            updateChart(in_awal_RCOST_purwokerto,in_akhir_RCOST_purwokerto,'var_cost_purwokerto');

    })

    $('#search-filter-RCOST-pekalongan').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_RCOST_pekalongan = $('#in_awal_RCOST_pekalongan').val();
            let in_akhir_RCOST_pekalongan = $('#in_akhir_RCOST_pekalongan').val();
            updateChart(in_awal_RCOST_pekalongan,in_akhir_RCOST_pekalongan,'var_cost_pekalongan');

    })

    $('#search-filter-RCOST-salatiga').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_RCOST_salatiga = $('#in_awal_RCOST_salatiga').val();
            let in_akhir_RCOST_salatiga = $('#in_akhir_RCOST_salatiga').val();
            updateChart(in_awal_RCOST_salatiga,in_akhir_RCOST_salatiga,'var_cost_salatiga');

    })


    </script>

