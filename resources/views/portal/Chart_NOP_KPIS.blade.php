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
    {{-- <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>OPEX Regional</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="opex_regional"></canvas>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/kpis" class="links text-white"><h5>KPI Supporting Regional</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIS_regional">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_regional"></canvas>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL MAGNIFY KPI SUPPORTING --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIS_regional" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI SUPPORTING</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpis_regionalToast"></canvas>
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
                                        <input id="in_awal_kpis_regional" name='interval_awal_regional' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpis_regional" name="interval_akhir_regional" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpis-regional" class="btn btn-primary" >Search</button>
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
        <h5>KPI Support NOP</h5>
    </div>
    

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/kpis" class="links text-white"><h5>KPI Supporting Semarang</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIS_semarang">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_semarang"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI SUPPORTING --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIS_semarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI SUPPORTING</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpis_semarangToast"></canvas>
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
                                        <input id="in_awal_kpis_semarang" name='interval_awal_semarang' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpis_semarang" name="interval_akhir_semarang" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpis-semarang" class="btn btn-primary" >Search</button>
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
                        <a href="/kpis" class="links text-white"><h5>KPI Supporting Surakarta</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIS_surakarta">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_surakarta"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI SUPPORTING --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIS_surakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI SUPPORTING</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpis_surakartaToast"></canvas>
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
                                        <input id="in_awal_kpis_surakarta" name='interval_awal_surakarta' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpis_surakarta" name="interval_akhir_surakarta" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpis-surakarta" class="btn btn-primary" >Search</button>
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
                        <a href="/kpis" class="links text-white"><h5>KPI Supporting Yogyakarta</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIS_yogyakarta">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_yogyakarta"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI SUPPORTING --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIS_yogyakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI SUPPORTING</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpis_yogyakartaToast"></canvas>
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
                                        <input id="in_awal_kpis_yogyakarta" name='interval_awal_yogyakarta' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpis_yogyakarta" name="interval_akhir_yogyakarta" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpis-yogyakarta" class="btn btn-primary" >Search</button>
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
                        <a href="/kpis" class="links text-white"><h5>KPI Supporting Purwokerto</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIS_purwokerto">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_purwokerto"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI SUPPORTING --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIS_purwokerto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI SUPPORTING</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpis_purwokertoToast"></canvas>
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
                                        <input id="in_awal_kpis_purwokerto" name='interval_awal_purwokerto' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpis_purwokerto" name="interval_akhir_purwokerto" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpis-purwokerto" class="btn btn-primary" >Search</button>
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
                        <a href="/kpis" class="links text-white"><h5>KPI Supporting Pekalongan</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIS_pekalongan">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_pekalongan"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI SUPPORTING --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIS_pekalongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI SUPPORTING</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpis_pekalonganToast"></canvas>
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
                                        <input id="in_awal_kpis_pekalongan" name='interval_awal_pekalongan' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpis_pekalongan" name="interval_akhir_pekalongan" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpis-pekalongan" class="btn btn-primary" >Search</button>
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
                        <a href="/kpis" class="links text-white"><h5>KPI Supporting Salatiga</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIS_salatiga">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_salatiga"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI SUPPORTING --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIS_salatiga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI SUPPORTING</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpis_salatigaToast"></canvas>
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
                                        <input id="in_awal_kpis_salatiga" name='interval_awal_salatiga' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpis_salatiga" name="interval_akhir_salatiga" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpis-salatiga" class="btn btn-primary" >Search</button>
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
    const kpis_regional = document.getElementById('kpis_regional').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_regionalData = {
        labels: @json($monthList_KPI_support),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Supporting',
            data: @json($value_KPI_active_support),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_support_target),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Supporting',
            data: @json($value_KPI_support),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_regionalConfig = {
        type: "bar",
        data: kpis_regionalData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_regional, kpis_regionalConfig);

    const kpis_semarang = document.getElementById('kpis_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_semarangData = {
        labels:  @json($monthList_KPI_support_semarang),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data:  @json($value_KPI_active_support_semarang),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data:  @json($value_KPI_support_target_semarang),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data:  @json($value_KPI_support_semarang),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_semarangConfig = {
        type: "bar",
        data: kpis_semarangData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_semarang, kpis_semarangConfig);

    const kpis_surakarta = document.getElementById('kpis_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_surakartaData = {
        labels:  @json($monthList_KPI_support_surakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI support',
            data:  @json($value_KPI_active_support_surakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data:  @json($value_KPI_support_target_surakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI support',
            data:  @json($value_KPI_support_surakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_surakartaConfig = {
        type: "bar",
        data: kpis_surakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_surakarta, kpis_surakartaConfig);

    const kpis_yogyakarta = document.getElementById('kpis_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_yogyakartaData = {
        labels:  @json($monthList_KPI_support_yogyakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data:  @json($value_KPI_active_support_yogyakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data:  @json($value_KPI_support_target_yogyakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data:  @json($value_KPI_support_yogyakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_yogyakartaConfig = {
        type: "bar",
        data: kpis_yogyakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_yogyakarta, kpis_yogyakartaConfig);

    const kpis_purwokerto = document.getElementById('kpis_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_purwokertoData = {
        labels:  @json($monthList_KPI_support_purwokerto),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data:  @json($value_KPI_active_support_purwokerto),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data:  @json($value_KPI_support_target_purwokerto),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data:  @json($value_KPI_support_purwokerto),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_purwokertoConfig = {
        type: "bar",
        data: kpis_purwokertoData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_purwokerto, kpis_purwokertoConfig);

    const kpis_pekalongan = document.getElementById('kpis_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_pekalonganData = {
        labels:  @json($monthList_KPI_support_pekalongan),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data:  @json($value_KPI_active_support_pekalongan),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data:  @json($value_KPI_support_target_pekalongan),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data:  @json($value_KPI_support_pekalongan),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_pekalonganConfig = {
        type: "bar",
        data: kpis_pekalonganData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_pekalongan, kpis_pekalonganConfig);

    const kpis_salatiga = document.getElementById('kpis_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_salatigaData = {
        labels:  @json($monthList_KPI_support_salatiga),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data:  @json($value_KPI_active_support_salatiga),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data:  @json($value_KPI_support_target_salatiga),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data:  @json($value_KPI_support_salatiga),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_salatigaConfig = {
        type: "bar",
        data: kpis_salatigaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_salatiga, kpis_salatigaConfig);



    // KPI Supporting toast
    const kpis_regionalToast = document.getElementById('kpis_regionalToast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_regionalToastData = {
        labels: @json($monthList_KPI_support),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Supporting',
            data: @json($value_KPI_active_support),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_support_target),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Supporting',
            data: @json($value_KPI_support),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_regionalToastConfig = {
        type: "bar",
        data: kpis_regionalToastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIS_toast_regional = new Chart(kpis_regionalToast, kpis_regionalToastConfig);

    // KPI Supporting toast
    const kpis_semarangToast = document.getElementById('kpis_semarangToast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_semarangToastData = {
        labels: @json($monthList_KPI_support_semarang),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Supporting',
            data: @json($value_KPI_active_support_semarang),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_support_target_semarang),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Supporting',
            data: @json($value_KPI_support_semarang),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_semarangToastConfig = {
        type: "bar",
        data: kpis_semarangToastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIS_toast_semarang = new Chart(kpis_semarangToast, kpis_semarangToastConfig);

    // KPI Supporting toast
    const kpis_surakartaToast = document.getElementById('kpis_surakartaToast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_surakartaToastData = {
        labels: @json($monthList_KPI_support_surakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Supporting',
            data: @json($value_KPI_active_support_surakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_support_target_surakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Supporting',
            data: @json($value_KPI_support_surakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_surakartaToastConfig = {
        type: "bar",
        data: kpis_surakartaToastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIS_toast_surakarta = new Chart(kpis_surakartaToast, kpis_surakartaToastConfig);

    // KPI Supporting toast
    const kpis_yogyakartaToast = document.getElementById('kpis_yogyakartaToast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_yogyakartaToastData = {
        labels: @json($monthList_KPI_support_yogyakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Supporting',
            data: @json($value_KPI_active_support_yogyakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_support_target_yogyakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Supporting',
            data: @json($value_KPI_support_yogyakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_yogyakartaToastConfig = {
        type: "bar",
        data: kpis_yogyakartaToastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIS_toast_yogyakarta = new Chart(kpis_yogyakartaToast, kpis_yogyakartaToastConfig);

    // KPI Supporting toast
    const kpis_purwokertoToast = document.getElementById('kpis_purwokertoToast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_purwokertoToastData = {
        labels: @json($monthList_KPI_support_purwokerto),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Supporting',
            data: @json($value_KPI_active_support_purwokerto),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_support_target_purwokerto),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Supporting',
            data: @json($value_KPI_support_purwokerto),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_purwokertoToastConfig = {
        type: "bar",
        data: kpis_purwokertoToastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIS_toast_purwokerto = new Chart(kpis_purwokertoToast, kpis_purwokertoToastConfig);

    // KPI Supporting toast
    const kpis_pekalonganToast = document.getElementById('kpis_pekalonganToast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_pekalonganToastData = {
        labels: @json($monthList_KPI_support_pekalongan),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Supporting',
            data: @json($value_KPI_active_support_pekalongan),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_support_target_pekalongan),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Supporting',
            data: @json($value_KPI_support_pekalongan),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_pekalonganToastConfig = {
        type: "bar",
        data: kpis_pekalonganToastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIS_toast_pekalongan = new Chart(kpis_pekalonganToast, kpis_pekalonganToastConfig);

    // KPI Supporting toast
    const kpis_salatigaToast = document.getElementById('kpis_salatigaToast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_salatigaToastData = {
        labels: @json($monthList_KPI_support_salatiga),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Supporting',
            data: @json($value_KPI_active_support_salatiga),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_support_target_salatiga),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Supporting',
            data: @json($value_KPI_support_salatiga),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_salatigaToastConfig = {
        type: "bar",
        data: kpis_salatigaToastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIS_toast_salatiga = new Chart(kpis_salatigaToast, kpis_salatigaToastConfig);

    $('#search-filter-kpis-regional').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpis_regional').val();
            let interval_akhir_KPIU = $('#in_akhir_kpis_regional').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_support', 'regional');

    })
    $('#search-filter-kpis-semarang').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpis_semarang').val();
            let interval_akhir_KPIU = $('#in_akhir_kpis_semarang').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_support', 'semarang');

    })
    $('#search-filter-kpis-surakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpis_surakarta').val();
            let interval_akhir_KPIU = $('#in_akhir_kpis_surakarta').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_support', 'surakarta');

    })
    $('#search-filter-kpis-yogyakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpis_yogyakarta').val();
            let interval_akhir_KPIU = $('#in_akhir_kpis_yogyakarta').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_support', 'yogyakarta');

    })
    $('#search-filter-kpis-purwokerto').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpis_purwokerto').val();
            let interval_akhir_KPIU = $('#in_akhir_kpis_purwokerto').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_support', 'purwokerto');

    })
    $('#search-filter-kpis-pekalongan').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpis_pekalongan').val();
            let interval_akhir_KPIU = $('#in_akhir_kpis_pekalongan').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_support', 'pekalongan');

    })
    $('#search-filter-kpis-salatiga').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpis_salatiga').val();
            let interval_akhir_KPIU = $('#in_akhir_kpis_salatiga').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_support', 'salatiga');

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
                            kpis_regionalToastData.labels = dataOutput.val_month
                            // data
                            kpis_regionalToastData.datasets[0].data = dataOutput.val_x_1;
                            kpis_regionalToastData.datasets[1].data = dataOutput.val_x_2;
                            kpis_regionalToastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIS_toast_regional.update();
                        }
                        else if(NOP === 'semarang'){
                            // labels
                            kpis_semarangToastData.labels = dataOutput.val_month
                            // data
                            kpis_semarangToastData.datasets[0].data = dataOutput.val_x_1;
                            kpis_semarangToastData.datasets[1].data = dataOutput.val_x_2;
                            kpis_semarangToastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIS_toast_semarang.update();
                        }
                        else if(NOP === 'surakarta'){
                            // labels
                            kpis_surakartaToastData.labels = dataOutput.val_month
                            // data
                            kpis_surakartaToastData.datasets[0].data = dataOutput.val_x_1;
                            kpis_surakartaToastData.datasets[1].data = dataOutput.val_x_2;
                            kpis_surakartaToastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIS_toast_surakarta.update();
                        }
                        else if(NOP === 'yogyakarta'){
                            // labels
                            kpis_yogyakartaToastData.labels = dataOutput.val_month
                            // data
                            kpis_yogyakartaToastData.datasets[0].data = dataOutput.val_x_1;
                            kpis_yogyakartaToastData.datasets[1].data = dataOutput.val_x_2;
                            kpis_yogyakartaToastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIS_toast_yogyakarta.update();
                        }
                        else if(NOP === 'purwokerto'){
                            // labels
                            kpis_purwokertoToastData.labels = dataOutput.val_month
                            // data
                            kpis_purwokertoToastData.datasets[0].data = dataOutput.val_x_1;
                            kpis_purwokertoToastData.datasets[1].data = dataOutput.val_x_2;
                            kpis_purwokertoToastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIS_toast_purwokerto.update();
                        }
                        else if(NOP === 'pekalongan'){
                            // labels
                            kpis_pekalonganToastData.labels = dataOutput.val_month
                            // data
                            kpis_pekalonganToastData.datasets[0].data = dataOutput.val_x_1;
                            kpis_pekalonganToastData.datasets[1].data = dataOutput.val_x_2;
                            kpis_pekalonganToastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIS_toast_pekalongan.update();
                        }
                        else if(NOP === 'salatiga'){
                            // labels
                            kpis_salatigaToastData.labels = dataOutput.val_month
                            // data
                            kpis_salatigaToastData.datasets[0].data = dataOutput.val_x_1;
                            kpis_salatigaToastData.datasets[1].data = dataOutput.val_x_2;
                            kpis_salatigaToastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIS_toast_salatiga.update();
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    },           
            });
        
    }
</script>
