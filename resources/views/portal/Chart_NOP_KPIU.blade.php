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
                        <a href="/kpiu" class="links text-white"><h5>KPI Utama Regional</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIU_regional">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_regional"></canvas>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL MAGNIFY KPI UTAMA --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIU_regional" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI UTAMA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpiu_regional_toast"></canvas>
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
                                        <input id="in_awal_regional" name='interval_awal_regional' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_regional" name="interval_akhir_regional" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpiu-regional" class="btn btn-primary" >Search</button>
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
        <h5>KPI Utama NOP</h5>
    </div>
    

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/kpiu" class="links text-white"><h5>KPI Utama Semarang</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIU_semarang">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_semarang"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI UTAMA --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIU_semarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI UTAMA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpiu_semarang_toast"></canvas>
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
                                        <input id="in_awal_semarang" name='interval_awal_semarang' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_semarang" name="interval_akhir_semarang" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpiu-semarang" class="btn btn-primary" >Search</button>
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
                        <a href="/kpiu" class="links text-white"><h5>KPI Utama Surakarta</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIU_surakarta">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_surakarta"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI UTAMA --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIU_surakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI UTAMA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpiu_surakarta_toast"></canvas>
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
                                        <input id="in_awal_surakarta" name='interval_awal_surakarta' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_surakarta" name="interval_akhir_surakarta" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpiu-surakarta" class="btn btn-primary" >Search</button>
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
                        <a href="/kpiu" class="links text-white"><h5>KPI Utama Yogyakarta</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIU_yogyakarta">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_yogyakarta"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI UTAMA --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIU_yogyakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI UTAMA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpiu_yogyakarta_toast"></canvas>
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
                                        <input id="in_awal_yogyakarta" name='interval_awal_yogyakarta' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_yogyakarta" name="interval_akhir_yogyakarta" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpiu-yogyakarta" class="btn btn-primary" >Search</button>
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
                        <a href="/kpiu" class="links text-white"><h5>KPI Utama Purwokerto</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIU_purwokerto">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_purwokerto"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI UTAMA --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIU_purwokerto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI UTAMA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpiu_purwokerto_toast"></canvas>
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
                                        <input id="in_awal_purwokerto" name='interval_awal_purwokerto' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_purwokerto" name="interval_akhir_purwokerto" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpiu-purwokerto" class="btn btn-primary" >Search</button>
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
                        <a href="/kpiu" class="links text-white"><h5>KPI Utama Pekalongan</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIU_pekalongan">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_pekalongan"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI UTAMA --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIU_pekalongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI UTAMA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpiu_pekalongan_toast"></canvas>
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
                                        <input id="in_awal_pekalongan" name='interval_awal_pekalongan' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_pekalongan" name="interval_akhir_pekalongan" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpiu-pekalongan" class="btn btn-primary" >Search</button>
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
                        <a href="/kpiu" class="links text-white"><h5>KPI Utama Salatiga</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIU_salatiga">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_salatiga"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI UTAMA --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIU_salatiga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI UTAMA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpiu_salatiga_toast"></canvas>
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
                                        <input id="in_awal_salatiga" name='interval_awal_salatiga' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_salatiga" name="interval_akhir_salatiga" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpiu-salatiga" class="btn btn-primary" >Search</button>
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
    const kpiu_regional = document.getElementById('kpiu_regional').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_regionalData = {
        labels: @json($monthList_KPI_Utama),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_target),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_regionalConfig = {
        type: "bar",
        data: kpiu_regionalData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_regional, kpiu_regionalConfig);

    const kpiu_semarang = document.getElementById('kpiu_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_semarangData = {
        labels: @json($monthList_KPI_utama_semarang),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_semarang),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_semarang),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_semarang),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_semarangConfig = {
        type: "bar",
        data: kpiu_semarangData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_semarang, kpiu_semarangConfig);

    const kpiu_surakarta = document.getElementById('kpiu_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_surakartaData = {
        labels: @json($monthList_KPI_utama_surakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_surakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_surakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_surakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_surakartaConfig = {
        type: "bar",
        data: kpiu_surakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_surakarta, kpiu_surakartaConfig);

    const kpiu_yogyakarta = document.getElementById('kpiu_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_yogyakartaData = {
        labels: @json($monthList_KPI_utama_yogyakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_yogyakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_yogyakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_yogyakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_yogyakartaConfig = {
        type: "bar",
        data: kpiu_yogyakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_yogyakarta, kpiu_yogyakartaConfig);

    const kpiu_purwokerto = document.getElementById('kpiu_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_purwokertoData = {
        labels: @json($monthList_KPI_utama_purwokerto),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_purwokerto),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_purwokerto),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_purwokerto),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_purwokertoConfig = {
        type: "bar",
        data: kpiu_purwokertoData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_purwokerto, kpiu_purwokertoConfig);

    const kpiu_pekalongan = document.getElementById('kpiu_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_pekalonganData = {
        labels: @json($monthList_KPI_utama_pekalongan),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_pekalongan),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_pekalongan),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_pekalongan),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_pekalonganConfig = {
        type: "bar",
        data: kpiu_pekalonganData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_pekalongan, kpiu_pekalonganConfig);

    const kpiu_salatiga = document.getElementById('kpiu_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_salatigaData = {
        labels: @json($monthList_KPI_utama_salatiga),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_salatiga),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_salatiga),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_salatiga),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_salatigaConfig = {
        type: "bar",
        data: kpiu_salatigaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_salatiga, kpiu_salatigaConfig);


    // KPI Utama Toast
    const kpiu_regional_toast = document.getElementById('kpiu_regional_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_regional_toastData = {
        labels: @json($monthList_KPI_Utama),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_target),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_regional_toastConfig = {
        type: "bar",
        data: kpiu_regional_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIU_toast_regional = new Chart(kpiu_regional_toast, kpiu_regional_toastConfig);

    $('#search-filter-kpiu-regional').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_regional').val();
            let interval_akhir_KPIU = $('#in_akhir_regional').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_utama', 'regional');

    })

    // KPI Utama Toast
    const kpiu_semarang_toast = document.getElementById('kpiu_semarang_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_semarang_toastData = {
        labels: @json($monthList_KPI_utama_semarang),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_semarang),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_semarang),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_semarang),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_semarang_toastConfig = {
        type: "bar",
        data: kpiu_semarang_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIU_toast_semarang = new Chart(kpiu_semarang_toast, kpiu_semarang_toastConfig);

    $('#search-filter-kpiu-semarang').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_semarang').val();
            let interval_akhir_KPIU = $('#in_akhir_semarang').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_utama', 'semarang');

    })

    // KPI Utama Toast
    const kpiu_surakarta_toast = document.getElementById('kpiu_surakarta_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_surakarta_toastData = {
        labels: @json($monthList_KPI_utama_surakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_surakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_surakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_surakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_surakarta_toastConfig = {
        type: "bar",
        data: kpiu_surakarta_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIU_toast_surakarta = new Chart(kpiu_surakarta_toast, kpiu_surakarta_toastConfig);

    $('#search-filter-kpiu-surakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_surakarta').val();
            let interval_akhir_KPIU = $('#in_akhir_surakarta').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_utama', 'surakarta');

    })

    // KPI Utama Toast
    const kpiu_yogyakarta_toast = document.getElementById('kpiu_yogyakarta_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_yogyakarta_toastData = {
        labels: @json($monthList_KPI_utama_yogyakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_yogyakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_yogyakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_yogyakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_yogyakarta_toastConfig = {
        type: "bar",
        data: kpiu_yogyakarta_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIU_toast_yogyakarta = new Chart(kpiu_yogyakarta_toast, kpiu_yogyakarta_toastConfig);

    $('#search-filter-kpiu-yogyakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_yogyakarta').val();
            let interval_akhir_KPIU = $('#in_akhir_yogyakarta').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_utama', 'yogyakarta');

    })

    // KPI Utama Toast
    const kpiu_purwokerto_toast = document.getElementById('kpiu_purwokerto_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_purwokerto_toastData = {
        labels: @json($monthList_KPI_utama_purwokerto),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_purwokerto),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_purwokerto),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_purwokerto),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_purwokerto_toastConfig = {
        type: "bar",
        data: kpiu_purwokerto_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIU_toast_purwokerto = new Chart(kpiu_purwokerto_toast, kpiu_purwokerto_toastConfig);

    $('#search-filter-kpiu-purwokerto').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_purwokerto').val();
            let interval_akhir_KPIU = $('#in_akhir_purwokerto').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_utama', 'purwokerto');

    })

    // KPI Utama Toast
    const kpiu_pekalongan_toast = document.getElementById('kpiu_pekalongan_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_pekalongan_toastData = {
        labels: @json($monthList_KPI_utama_pekalongan),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_pekalongan),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_pekalongan),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_pekalongan),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_pekalongan_toastConfig = {
        type: "bar",
        data: kpiu_pekalongan_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIU_toast_pekalongan = new Chart(kpiu_pekalongan_toast, kpiu_pekalongan_toastConfig);

    $('#search-filter-kpiu-pekalongan').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_pekalongan').val();
            let interval_akhir_KPIU = $('#in_akhir_pekalongan').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_utama', 'pekalongan');

    })

    // KPI Utama Toast
    const kpiu_salatiga_toast = document.getElementById('kpiu_salatiga_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_salatiga_toastData = {
        labels: @json($monthList_KPI_utama_salatiga),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: @json($value_KPI_active_utama_salatiga),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_utama_target_salatiga),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: @json($value_KPI_utama_salatiga),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_salatiga_toastConfig = {
        type: "bar",
        data: kpiu_salatiga_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIU_toast_salatiga = new Chart(kpiu_salatiga_toast, kpiu_salatiga_toastConfig);

    $('#search-filter-kpiu-salatiga').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_salatiga').val();
            let interval_akhir_KPIU = $('#in_akhir_salatiga').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_utama', 'salatiga');

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
                            kpiu_main_toastData.labels = dataOutput.val_month
                            // data
                            kpiu_main_toastData.datasets[0].data = dataOutput.val_x_1;
                            kpiu_main_toastData.datasets[1].data = dataOutput.val_x_2;
                            kpiu_main_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIU_toast.update();
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    },           
            });
        
    }
</script>
