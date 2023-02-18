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
        {{-- regional --}}
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                {{-- chart revenue vs cost regional  --}}
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                        <div class="title-cont">
                            <a href="/rvc" class="links text-white"><h5>Revenue VS Cost Regional</h5></a>
                        </div>
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRVC">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main"></canvas>
                    </div>
                </div>
            </div>                    

            <div class="col-lg-3"></div>

            {{-- MODAL MAGNIFY REVENUE VS COST --}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailRVC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA REVENUE VS COST</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="revenue_main_toast"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="container rvc-stat shadow" style="padding: 10px" >
                                <form method="GET   ">
                                    @csrf
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="filter awal">Starting Date</label>
                                            <input id="in_awal_RVC" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_RVC" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-RVC" class="btn btn-primary" >Search</button>
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
                <h5>Revenue Vs Cost SITE NOP</h5>
            </div>

            <div class="col-lg-6">
                 {{-- chart revenue vs cost regional  --}}
                 <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                        <div class="title-cont">
                            <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Semarang</h5></a>
                        </div>
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRVC_semarang">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_1"></canvas>
                    </div>
                </div>
            </div>

            {{-- MODAL MAGNIFY REVENUE VS COST NOP SEMARANG--}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailRVC_semarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA REVENUE VS COST NOP SEMARANG</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="revenue_main_toast_semarang"></canvas>
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
                                            <input id="in_awal_RVC_semarang" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_RVC_semarang" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-RVC-semarang" class="btn btn-primary" >Search</button>
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
                 {{-- chart revenue vs cost regional  --}}
                 <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                        <div class="title-cont">
                            <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Surakarta</h5></a>
                        </div>
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRVC_surakarta">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_2"></canvas>
                    </div>
                </div>
            </div>

            {{-- MODAL MAGNIFY REVENUE VS COST NOP SURAKARTA --}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailRVC_surakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA REVENUE VS COST NOP SURAKARTA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="revenue_main_toast_surakarta"></canvas>
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
                                            <input id="in_awal_RVC_surakarta" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_RVC_surakarta" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-RVC-surakarta" class="btn btn-primary" >Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-6">
                 {{-- chart revenue vs cost regional  --}}
                 <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Yogyakarta</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRVC_yogyakarta">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_3"></canvas>
                    </div>
                </div>
            </div>

             {{-- MODAL MAGNIFY REVENUE VS COST NOP YOGYAKARTA --}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailRVC_yogyakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA REVENUE VS COST NOP YOGYAKARTA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="revenue_main_toast_yogyakarta"></canvas>
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
                                            <input id="in_awal_RVC_yogyakarta" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_RVC_yogyakarta" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-RVC-yogyakarta" class="btn btn-primary" >Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

             {{-- NOP-Row-2 --}}
            <div class="col-lg-6">
                {{-- chart revenue vs cost regional  --}}
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Purwokerto</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRVC_purwokerto">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_4"></canvas>
                    </div>
                </div>
            </div>

             {{-- MODAL MAGNIFY REVENUE VS COST NOP PURWOKERTO --}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailRVC_purwokerto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA REVENUE VS COST NOP PURWOKERTO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="revenue_main_toast_purwokerto"></canvas>
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
                                            <input id="in_awal_RVC_purwokerto" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_RVC_purwokerto" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-RVC-purwokerto" class="btn btn-primary" >Search</button>
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
                {{-- chart revenue vs cost regional  --}}
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Pekalongan</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRVC_pekalongan">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_5"></canvas>
                    </div>
                </div>
            </div>

             {{-- MODAL MAGNIFY REVENUE VS COST NOP PEKALONGAN --}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailRVC_pekalongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA REVENUE VS COST NOP PEKALONGAN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="revenue_main_toast_pekalongan"></canvas>
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
                                            <input id="in_awal_RVC_pekalongan" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_RVC_pekalongan" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-RVC-pekalongan" class="btn btn-primary" >Search</button>
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
                {{-- chart revenue vs cost regional  --}}
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP SALATIGA</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRVC_salatiga">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_6"></canvas>
                    </div> 
                </div>
            </div>
        </div>

         {{-- MODAL MAGNIFY REVENUE VS COST NOP salatiga --}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailRVC_salatiga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA REVENUE VS COST NOP salatiga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="revenue_main_toast_salatiga"></canvas>
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
                                            <input id="in_awal_RVC_salatiga" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_RVC_salatiga" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-RVC-salatiga" class="btn btn-primary" >Search</button>
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

    // grafik revenue vs cost

    const revvcost_main = document.getElementById('revenue_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData = {
        labels: @json($monthList_RVC),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost),
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

    // grafik revenue vs cost TOAST

    const revvcost_mainToast = document.getElementById('revenue_main_toast');
    //const labels = Utils.months({count: 7});
    const revvcost_mainToastData = {
        labels: @json($monthList_RVC),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainToastConfig = {
        type: 'line',
        data: revvcost_mainToastData,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    let RVC_toast = new Chart(revvcost_mainToast, revvcost_mainToastConfig);

    // grafik revenue vs cost

    const revvcost_main_nop_1 = document.getElementById('revenue_main_nop_1').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_1 = {
        labels: @json($monthList_RVC_semarang),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_semarang),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_semarang),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainConfig_nop_1 = {
        type: 'line',
        data: revvcost_mainData_nop_1,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_1, revvcost_mainConfig_nop_1);

    // grafik revenue vs cost TOAST semarang

    const revvcost_mainToast_semarang = document.getElementById('revenue_main_toast_semarang');
    //const labels = Utils.months({count: 7});
    const revvcost_mainToast_semarangData = {
        labels: @json($monthList_RVC_semarang),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_semarang),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_semarang),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainToast_semarangConfig = {
        type: 'line',
        data: revvcost_mainToast_semarangData,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    let RVC_toast_semarang = new Chart(revvcost_mainToast_semarang, revvcost_mainToast_semarangConfig);

    // grafik revenue vs cost

    const revvcost_main_nop_2 = document.getElementById('revenue_main_nop_2').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_2 = {
        labels: @json($monthList_RVC_surakarta),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_surakarta),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_surakarta),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainConfig_nop_2 = {
        type: 'line',
        data: revvcost_mainData_nop_2,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_2, revvcost_mainConfig_nop_2);

    // grafik revenue vs cost TOAST surakarta

    const revvcost_mainToast_surakarta = document.getElementById('revenue_main_toast_surakarta');
    //const labels = Utils.months({count: 7});
    const revvcost_mainToast_surakartaData = {
        labels: @json($monthList_RVC_surakarta),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_surakarta),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_surakarta),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainToast_surakartaConfig = {
        type: 'line',
        data: revvcost_mainToast_surakartaData,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    let RVC_toast_surakarta = new Chart(revvcost_mainToast_surakarta, revvcost_mainToast_surakartaConfig);

    // grafik revenue vs cost

    const revvcost_main_nop_3 = document.getElementById('revenue_main_nop_3').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_3 = {
        labels: @json($monthList_RVC_yogyakarta),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_yogyakarta),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_yogyakarta),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainConfig_nop_3 = {
        type: 'line',
        data: revvcost_mainData_nop_3,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_3, revvcost_mainConfig_nop_3);

    // grafik revenue vs cost TOAST yogyakarta

    const revvcost_mainToast_yogyakarta = document.getElementById('revenue_main_toast_yogyakarta');
    //const labels = Utils.months({count: 7});
    const revvcost_mainToast_yogyakartaData = {
        labels: @json($monthList_RVC_yogyakarta),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_yogyakarta),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_yogyakarta),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainToast_yogyakartaConfig = {
        type: 'line',
        data: revvcost_mainToast_yogyakartaData,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    let RVC_toast_yogyakarta = new Chart(revvcost_mainToast_yogyakarta, revvcost_mainToast_yogyakartaConfig);

    // grafik revenue vs cost

    const revvcost_main_nop_4 = document.getElementById('revenue_main_nop_4').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_4 = {
        labels: @json($monthList_RVC_purwokerto),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_purwokerto),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_purwokerto),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainConfig_nop_4 = {
        type: 'line',
        data: revvcost_mainData_nop_4,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_4, revvcost_mainConfig_nop_4);

    // grafik revenue vs cost TOAST purwokerto

    const revvcost_mainToast_purwokerto = document.getElementById('revenue_main_toast_purwokerto');
    //const labels = Utils.months({count: 7});
    const revvcost_mainToast_purwokertoData = {
        labels: @json($monthList_RVC_purwokerto),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_purwokerto),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_purwokerto),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainToast_purwokertoConfig = {
        type: 'line',
        data: revvcost_mainToast_purwokertoData,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    let RVC_toast_purwokerto = new Chart(revvcost_mainToast_purwokerto, revvcost_mainToast_purwokertoConfig);

    // grafik revenue vs cost

    const revvcost_main_nop_5 = document.getElementById('revenue_main_nop_5').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_5 = {
        labels: @json($monthList_RVC_pekalongan),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_pekalongan),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_pekalongan),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainConfig_nop_5 = {
        type: 'line',
        data: revvcost_mainData_nop_5,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_5, revvcost_mainConfig_nop_5);

    // grafik revenue vs cost TOAST pekalongan

    const revvcost_mainToast_pekalongan = document.getElementById('revenue_main_toast_pekalongan');
    //const labels = Utils.months({count: 7});
    const revvcost_mainToast_pekalonganData = {
        labels: @json($monthList_RVC_pekalongan),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_pekalongan),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_pekalongan),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainToast_pekalonganConfig = {
        type: 'line',
        data: revvcost_mainToast_pekalonganData,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    let RVC_toast_pekalongan = new Chart(revvcost_mainToast_pekalongan, revvcost_mainToast_pekalonganConfig);

    // grafik revenue vs cost

    const revvcost_main_nop_6 = document.getElementById('revenue_main_nop_6').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_6 = {
        labels: @json($monthList_RVC_salatiga),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_salatiga),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_salatiga),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainConfig_nop_6 = {
        type: 'line',
        data: revvcost_mainData_nop_6,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_6, revvcost_mainConfig_nop_6);

    // grafik revenue vs cost TOAST salatiga

    const revvcost_mainToast_salatiga = document.getElementById('revenue_main_toast_salatiga');
    //const labels = Utils.months({count: 7});
    const revvcost_mainToast_salatigaData = {
        labels: @json($monthList_RVC_salatiga),
        datasets: [
        {
        label: ['Revenue'],
        data: @json($value_RVC_rev_salatiga),
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['Cost'],
        data: @json($value_RVC_cost_salatiga),
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainToast_salatigaConfig = {
        type: 'line',
        data: revvcost_mainToast_salatigaData,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    let RVC_toast_salatiga = new Chart(revvcost_mainToast_salatiga, revvcost_mainToast_salatigaConfig);

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
                        }else if(type === 'rvc_semarang'){
                            // labels
                            revvcost_mainToast_semarangData.labels = dataOutput.val_month
                            // data
                            revvcost_mainToast_semarangData.datasets[0].data = dataOutput.val_x_1;
                            revvcost_mainToast_semarangData.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RVC_toast_semarang.update();
                        }else if(type === 'rvc_surakarta'){
                            // labels
                            revvcost_mainToast_surakartaData.labels = dataOutput.val_month
                            // data
                            revvcost_mainToast_surakartaData.datasets[0].data = dataOutput.val_x_1;
                            revvcost_mainToast_surakartaData.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RVC_toast_surakarta.update();
                        }else if(type === 'rvc_yogyakarta'){
                            // labels
                            revvcost_mainToast_yogyakartaData.labels = dataOutput.val_month
                            // data
                            revvcost_mainToast_yogyakartaData.datasets[0].data = dataOutput.val_x_1;
                            revvcost_mainToast_yogyakartaData.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RVC_toast_yogyakarta.update();
                        }else if(type === 'rvc_purwokerto'){
                            // labels
                            revvcost_mainToast_purwokertoData.labels = dataOutput.val_month
                            // data
                            revvcost_mainToast_purwokertoData.datasets[0].data = dataOutput.val_x_1;
                            revvcost_mainToast_purwokertoData.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RVC_toast_purwokerto.update();
                        }else if(type === 'rvc_pekalongan'){
                            // labels
                            revvcost_mainToast_pekalonganData.labels = dataOutput.val_month
                            // data
                            revvcost_mainToast_pekalonganData.datasets[0].data = dataOutput.val_x_1;
                            revvcost_mainToast_pekalonganData.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RVC_toast_pekalongan.update();
                        }else if(type === 'rvc_salatiga'){
                            // labels
                            revvcost_mainToast_salatigaData.labels = dataOutput.val_month
                            // data
                            revvcost_mainToast_salatigaData.datasets[0].data = dataOutput.val_x_1;
                            revvcost_mainToast_salatigaData.datasets[1].data = dataOutput.val_x_2;
                            // update
                            RVC_toast_salatiga.update();
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

    $('#search-filter-RVC').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_RVC = $('#in_awal_RVC').val();
            let interval_akhir_RVC = $('#in_akhir_RVC').val();
            updateChart(interval_awal_RVC,interval_akhir_RVC,'rvc');

    })

    $('#search-filter-RVC-semarang').click(function(e) {
            // console.log('test');
            e.preventDefault();
            console.log('test');
            let in_awal_RVC_semarang = $('#in_awal_RVC_semarang').val();
            let in_akhir_RVC_semarang = $('#in_akhir_RVC_semarang').val();
            updateChart(in_awal_RVC_semarang,in_akhir_RVC_semarang,'rvc_semarang');

    })

    $('#search-filter-RVC-surakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            console.log('test');
            let in_awal_RVC_surakarta = $('#in_awal_RVC_surakarta').val();
            let in_akhir_RVC_surakarta = $('#in_akhir_RVC_surakarta').val();
            updateChart(in_awal_RVC_surakarta,in_akhir_RVC_surakarta,'rvc_surakarta');

    })

    $('#search-filter-RVC-yogyakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            console.log('test');
            let in_awal_RVC_yogyakarta = $('#in_awal_RVC_yogyakarta').val();
            let in_akhir_RVC_yogyakarta = $('#in_akhir_RVC_yogyakarta').val();
            updateChart(in_awal_RVC_yogyakarta,in_akhir_RVC_yogyakarta,'rvc_yogyakarta');

    })

    $('#search-filter-RVC-purwokerto').click(function(e) {
            // console.log('test');
            e.preventDefault();
            console.log('test');
            let in_awal_RVC_purwokerto = $('#in_awal_RVC_purwokerto').val();
            let in_akhir_RVC_purwokerto = $('#in_akhir_RVC_purwokerto').val();
            updateChart(in_awal_RVC_purwokerto,in_akhir_RVC_purwokerto,'rvc_purwokerto');

    })

    $('#search-filter-RVC-pekalongan').click(function(e) {
            // console.log('test');
            e.preventDefault();
            console.log('test');
            let in_awal_RVC_pekalongan = $('#in_awal_RVC_pekalongan').val();
            let in_akhir_RVC_pekalongan = $('#in_akhir_RVC_pekalongan').val();
            updateChart(in_awal_RVC_pekalongan,in_akhir_RVC_pekalongan,'rvc_pekalongan');

    })

    $('#search-filter-RVC-salatiga').click(function(e) {
            // console.log('test');
            e.preventDefault();
            console.log('test');
            let in_awal_RVC_salatiga = $('#in_awal_RVC_salatiga').val();
            let in_akhir_RVC_salatiga = $('#in_akhir_RVC_salatiga').val();
            updateChart(in_awal_RVC_salatiga,in_akhir_RVC_salatiga,'rvc_salatiga');

    })

</script>