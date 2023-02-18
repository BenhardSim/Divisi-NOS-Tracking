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
                        <a href="/kpia" class="links text-white"><h5>KPI Activity Regional</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIA_regional">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_regional"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI ACTIVITY --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIA_regional" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI ACTIVITY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpia_regional_toast"></canvas>
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
                                        <input id="in_awal_kpia_regional" name='interval_awal_regional' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpia_regional" name="interval_akhir_regional" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpia-regional" class="btn btn-primary" >Search</button>
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
                        <a href="/kpia" class="links text-white"><h5>KPI Activity Semarang</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIA_semarang">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_semarang"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI ACTIVITY --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIA_semarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI ACTIVITY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpia_semarang_toast"></canvas>
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
                                        <input id="in_awal_kpia_semarang" name='interval_awal_semarang' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpia_semarang" name="interval_akhir_semarang" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpia-semarang" class="btn btn-primary" >Search</button>
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
                        <a href="/kpia" class="links text-white"><h5>KPI Activity Surakarta</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIA_surakarta">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_surakarta"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI ACTIVITY --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIA_surakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI ACTIVITY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpia_surakarta_toast"></canvas>
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
                                        <input id="in_awal_kpia_surakarta" name='interval_awal_surakarta' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpia_surakarta" name="interval_akhir_surakarta" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpia-surakarta" class="btn btn-primary" >Search</button>
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
                        <a href="/kpia" class="links text-white"><h5>KPI Activity Yogyakarta</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIA_yogyakarta">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_yogyakarta"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI ACTIVITY --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIA_yogyakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI ACTIVITY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpia_yogyakarta_toast"></canvas>
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
                                        <input id="in_awal_kpia_yogyakarta" name='interval_awal_yogyakarta' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpia_yogyakarta" name="interval_akhir_yogyakarta" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpia-yogyakarta" class="btn btn-primary" >Search</button>
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
                        <a href="/kpia" class="links text-white"><h5>KPI Activity Purwokerto</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIA_purwokerto">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_purwokerto"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI ACTIVITY --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIA_purwokerto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI ACTIVITY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpia_purwokerto_toast"></canvas>
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
                                        <input id="in_awal_kpia_purwokerto" name='interval_awal_purwokerto' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpia_purwokerto" name="interval_akhir_purwokerto" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpia-purwokerto" class="btn btn-primary" >Search</button>
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
                        <a href="/kpia" class="links text-white"><h5>KPI Activity Pekalongan</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIA_pekalongan">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_pekalongan"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI ACTIVITY --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIA_pekalongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI ACTIVITY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpia_pekalongan_toast"></canvas>
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
                                        <input id="in_awal_kpia_pekalongan" name='interval_awal_pekalongan' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpia_pekalongan" name="interval_akhir_pekalongan" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpia-pekalongan" class="btn btn-primary" >Search</button>
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
                        <a href="/kpia" class="links text-white"><h5>KPI Activity Salatiga</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIA_salatiga">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_salatiga"></canvas>
                </div>
            </div>
        </div>
        {{-- MODAL MAGNIFY KPI ACTIVITY --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIA_salatiga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA KPI ACTIVITY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="kpia_salatiga_toast"></canvas>
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
                                        <input id="in_awal_kpia_salatiga" name='interval_awal_salatiga' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpia_salatiga" name="interval_akhir_salatiga" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpia-salatiga" class="btn btn-primary" >Search</button>
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
    const kpia_regional = document.getElementById('kpia_regional').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_regionalData = {
        labels: @json($monthList_KPI_activity),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_activity),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_activity_target),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_activity),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_regionalConfig = {
        type: "bar",
        data: kpia_regionalData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_regional, kpia_regionalConfig);

    const kpia_semarang = document.getElementById('kpia_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_semarangData = {
        labels: @json($monthList_KPI_aktif_semarang),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_semarang),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_semarang),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_semarang),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_semarangConfig = {
        type: "bar",
        data: kpia_semarangData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_semarang, kpia_semarangConfig);

    const kpia_surakarta = document.getElementById('kpia_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_surakartaData = {
        labels: @json($monthList_KPI_aktif_surakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_surakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_surakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_surakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_surakartaConfig = {
        type: "bar",
        data: kpia_surakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_surakarta, kpia_surakartaConfig);

    const kpia_yogyakarta = document.getElementById('kpia_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_yogyakartaData = {
        labels: @json($monthList_KPI_aktif_yogyakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_yogyakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_yogyakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_yogyakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_yogyakartaConfig = {
        type: "bar",
        data: kpia_yogyakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_yogyakarta, kpia_yogyakartaConfig);

    const kpia_purwokerto = document.getElementById('kpia_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_purwokertoData = {
        labels: @json($monthList_KPI_aktif_purwokerto),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_purwokerto),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_purwokerto),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_purwokerto),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_purwokertoConfig = {
        type: "bar",
        data: kpia_purwokertoData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_purwokerto, kpia_purwokertoConfig);

    const kpia_pekalongan = document.getElementById('kpia_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_pekalonganData = {
        labels: @json($monthList_KPI_aktif_pekalongan),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_pekalongan),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_pekalongan),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_pekalongan),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_pekalonganConfig = {
        type: "bar",
        data: kpia_pekalonganData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_pekalongan, kpia_pekalonganConfig);

    const kpia_salatiga = document.getElementById('kpia_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_salatigaData = {
        labels: @json($monthList_KPI_aktif_salatiga),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_salatiga),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_salatiga),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_salatiga),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_salatigaConfig = {
        type: "bar",
        data: kpia_salatigaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_salatiga, kpia_salatigaConfig);

    // KPI Activity toast
    const kpia_regional_toast = document.getElementById('kpia_regional_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_regional_toastData = {
        labels: @json($monthList_KPI_activity),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_activity),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_activity_target),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_activity),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_regional_toastConfig = {
        type: "bar",
        data: kpia_regional_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIA_toast_regional = new Chart(kpia_regional_toast, kpia_regional_toastConfig);

    // KPI Activity toast
    const kpia_semarang_toast = document.getElementById('kpia_semarang_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_semarang_toastData = {
        labels: @json($monthList_KPI_aktif_semarang),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_semarang),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_semarang),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_semarang),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_semarang_toastConfig = {
        type: "bar",
        data: kpia_semarang_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIA_toast_semarang = new Chart(kpia_semarang_toast, kpia_semarang_toastConfig);

    // KPI Activity toast
    const kpia_surakarta_toast = document.getElementById('kpia_surakarta_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_surakarta_toastData = {
        labels: @json($monthList_KPI_aktif_surakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_surakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_surakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_surakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_surakarta_toastConfig = {
        type: "bar",
        data: kpia_surakarta_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIA_toast_surakarta = new Chart(kpia_surakarta_toast, kpia_surakarta_toastConfig);

    // KPI Activity toast
    const kpia_yogyakarta_toast = document.getElementById('kpia_yogyakarta_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_yogyakarta_toastData = {
        labels: @json($monthList_KPI_aktif_yogyakarta),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_yogyakarta),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_yogyakarta),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_yogyakarta),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_yogyakarta_toastConfig = {
        type: "bar",
        data: kpia_yogyakarta_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIA_toast_yogyakarta = new Chart(kpia_yogyakarta_toast, kpia_yogyakarta_toastConfig);

    // KPI Activity toast
    const kpia_purwokerto_toast = document.getElementById('kpia_purwokerto_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_purwokerto_toastData = {
        labels: @json($monthList_KPI_aktif_purwokerto),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_purwokerto),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_purwokerto),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_purwokerto),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_purwokerto_toastConfig = {
        type: "bar",
        data: kpia_purwokerto_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIA_toast_purwokerto = new Chart(kpia_purwokerto_toast, kpia_purwokerto_toastConfig);

    // KPI Activity toast
    const kpia_pekalongan_toast = document.getElementById('kpia_pekalongan_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_pekalongan_toastData = {
        labels: @json($monthList_KPI_aktif_pekalongan),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_pekalongan),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_pekalongan),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_pekalongan),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_pekalongan_toastConfig = {
        type: "bar",
        data: kpia_pekalongan_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIA_toast_pekalongan = new Chart(kpia_pekalongan_toast, kpia_pekalongan_toastConfig);

    // KPI Activity toast
    const kpia_salatiga_toast = document.getElementById('kpia_salatiga_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_salatiga_toastData = {
        labels: @json($monthList_KPI_aktif_salatiga),
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Activity',
            data: @json($value_KPI_active_aktif_salatiga),
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: @json($value_KPI_aktif_target_salatiga),
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Activity',
            data: @json($value_KPI_aktif_salatiga),
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpia_salatiga_toastConfig = {
        type: "bar",
        data: kpia_salatiga_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIA_toast_salatiga = new Chart(kpia_salatiga_toast, kpia_salatiga_toastConfig);

    $('#search-filter-kpia-regional').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpia_regional').val();
            let interval_akhir_KPIU = $('#in_akhir_kpia_regional').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_activity', 'regional');

    })
    $('#search-filter-kpia-semarang').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpia_semarang').val();
            let interval_akhir_KPIU = $('#in_akhir_kpia_semarang').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_activity', 'semarang');

    })
    $('#search-filter-kpia-surakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpia_surakarta').val();
            let interval_akhir_KPIU = $('#in_akhir_kpia_surakarta').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_activity', 'surakarta');

    })
    $('#search-filter-kpia-yogyakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpia_yogyakarta').val();
            let interval_akhir_KPIU = $('#in_akhir_kpia_yogyakarta').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_activity', 'yogyakarta');

    })
    $('#search-filter-kpia-purwokerto').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpia_purwokerto').val();
            let interval_akhir_KPIU = $('#in_akhir_kpia_purwokerto').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_activity', 'purwokerto');

    })
    $('#search-filter-kpia-pekalongan').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpia_pekalongan').val();
            let interval_akhir_KPIU = $('#in_akhir_kpia_pekalongan').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_activity', 'pekalongan');

    })
    $('#search-filter-kpia-salatiga').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpia_salatiga').val();
            let interval_akhir_KPIU = $('#in_akhir_kpia_salatiga').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_activity', 'salatiga');

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
                            kpia_regional_toastData.labels = dataOutput.val_month
                            // data
                            kpia_regional_toastData.datasets[0].data = dataOutput.val_x_1;
                            kpia_regional_toastData.datasets[1].data = dataOutput.val_x_2;
                            kpia_regional_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIA_toast_regional.update();
                        }
                        else if(NOP === 'semarang'){
                            // labels
                            kpia_semarang_toastData.labels = dataOutput.val_month
                            // data
                            kpia_semarang_toastData.datasets[0].data = dataOutput.val_x_1;
                            kpia_semarang_toastData.datasets[1].data = dataOutput.val_x_2;
                            kpia_semarang_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIA_toast_semarang.update();
                        }
                        else if(NOP === 'surakarta'){
                            // labels
                            kpia_surakarta_toastData.labels = dataOutput.val_month
                            // data
                            kpia_surakarta_toastData.datasets[0].data = dataOutput.val_x_1;
                            kpia_surakarta_toastData.datasets[1].data = dataOutput.val_x_2;
                            kpia_surakarta_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIA_toast_surakarta.update();
                        }
                        else if(NOP === 'yogyakarta'){
                            // labels
                            kpia_yogyakarta_toastData.labels = dataOutput.val_month
                            // data
                            kpia_yogyakarta_toastData.datasets[0].data = dataOutput.val_x_1;
                            kpia_yogyakarta_toastData.datasets[1].data = dataOutput.val_x_2;
                            kpia_yogyakarta_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIA_toast_yogyakarta.update();
                        }
                        else if(NOP === 'purwokerto'){
                            // labels
                            kpia_purwokerto_toastData.labels = dataOutput.val_month
                            // data
                            kpia_purwokerto_toastData.datasets[0].data = dataOutput.val_x_1;
                            kpia_purwokerto_toastData.datasets[1].data = dataOutput.val_x_2;
                            kpia_purwokerto_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIA_toast_purwokerto.update();
                        }
                        else if(NOP === 'pekalongan'){
                            // labels
                            kpia_pekalongan_toastData.labels = dataOutput.val_month
                            // data
                            kpia_pekalongan_toastData.datasets[0].data = dataOutput.val_x_1;
                            kpia_pekalongan_toastData.datasets[1].data = dataOutput.val_x_2;
                            kpia_pekalongan_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIA_toast_pekalongan.update();
                        }
                        else if(NOP === 'salatiga'){
                            // labels
                            kpia_salatiga_toastData.labels = dataOutput.val_month
                            // data
                            kpia_salatiga_toastData.datasets[0].data = dataOutput.val_x_1;
                            kpia_salatiga_toastData.datasets[1].data = dataOutput.val_x_2;
                            kpia_salatiga_toastData.datasets[2].data = dataOutput.val_x_3;
                            // update
                            KPIA_toast_salatiga.update();
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    },           
            });
        
    }
</script>
