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
                        <a href="/opex" class="links text-white"><h5>OPEX Regional</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailOPEX">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                    <div style="width: 50%">
                        <canvas id="opex_regional"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL MAGNIFY OPEX --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailOPEX" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA OPEX</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="opex_main_toast"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_OPEX" name='interval_awal' type="month" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_OPEX" name="interval_akhir" type="month" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-OPEX" class="btn btn-primary" >Search</button>
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
        <h5>OPEX NOP</h5>
    </div>
    

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/opex" class="links text-white"><h5>OPEX Semarang</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailOPEX-semarang">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                    <div style="width: 50%">
                        <canvas id="opex_semarang"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL MAGNIFY OPEX NOP semarang--}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailOPEX-semarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA OPEX SEMARANG</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="opex_main_toast_semarang"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_OPEX_semarang" name='interval_awal' type="month" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_OPEX_semarang" name="interval_akhir" type="month" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-OPEX-semarang" class="btn btn-primary" >Search</button>
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
                        <a href="/opex" class="links text-white"><h5>OPEX surakarta</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailOPEX-surakarta">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                    <div style="width: 50%">
                        <canvas id="opex_surakarta"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL MAGNIFY OPEX NOP surakarta--}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailOPEX-surakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA OPEX surakarta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="opex_main_toast_surakarta"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_OPEX_surakarta" name='interval_awal' type="month" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_OPEX_surakarta" name="interval_akhir" type="month" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-OPEX-surakarta" class="btn btn-primary" >Search</button>
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
                        <a href="/opex" class="links text-white"><h5>OPEX yogyakarta</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailOPEX-yogyakarta">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                    <div style="width: 50%">
                        <canvas id="opex_yogyakarta"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL MAGNIFY OPEX NOP yogyakarta--}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailOPEX-yogyakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA OPEX yogyakarta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="opex_main_toast_yogyakarta"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_OPEX_yogyakarta" name='interval_awal' type="month" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_OPEX_yogyakarta" name="interval_akhir" type="month" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-OPEX-yogyakarta" class="btn btn-primary" >Search</button>
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
                        <a href="/opex" class="links text-white"><h5>OPEX purwokerto</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailOPEX-purwokerto">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                    <div style="width: 50%">
                        <canvas id="opex_purwokerto"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL MAGNIFY OPEX NOP purwokerto--}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailOPEX-purwokerto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA OPEX purwokerto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="opex_main_toast_purwokerto"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_OPEX_purwokerto" name='interval_awal' type="month" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_OPEX_purwokerto" name="interval_akhir" type="month" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-OPEX-purwokerto" class="btn btn-primary" >Search</button>
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
                        <a href="/opex" class="links text-white"><h5>OPEX pekalongan</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailOPEX-pekalongan">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                    <div style="width: 50%">
                        <canvas id="opex_pekalongan"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL MAGNIFY OPEX NOP pekalongan--}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailOPEX-pekalongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA OPEX pekalongan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="opex_main_toast_pekalongan"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_OPEX_pekalongan" name='interval_awal' type="month" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_OPEX_pekalongan" name="interval_akhir" type="month" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-OPEX-pekalongan" class="btn btn-primary" >Search</button>
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
                        <a href="/opex" class="links text-white"><h5>OPEX salatiga</h5></a>
                    </div>
                    <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailOPEX-salatiga">
                        <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                        <span>Magnify</span>
                    </button>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                    <div style="width: 50%">
                        <canvas id="opex_salatiga"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL MAGNIFY OPEX NOP salatiga--}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailOPEX-salatiga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA OPEX salatiga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="opex_main_toast_salatiga"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-12">
                        <div class="container rvc-stat shadow" style="padding: 10px" >
                            <form method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter awal">Starting Date</label>
                                        <input id="in_awal_OPEX_salatiga" name='interval_awal' type="month" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_OPEX_salatiga" name="interval_akhir" type="month" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-OPEX-salatiga" class="btn btn-primary" >Search</button>
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
 const opex_regional = document.getElementById('opex_regional').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_regionaldata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [@json($absorbtion), @json($accure), @json($available)],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_regionalconfig = {
        type: 'pie',
        data: opex_regionaldata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_regional, opex_regionalconfig);

    const opex_regional_toast = document.getElementById('opex_main_toast').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_regional_toastdata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [@json($absorbtion), @json($accure), @json($available)],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_regional_toastconfig = {
        type: 'pie',
        data: opex_regional_toastdata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    let opex_toast = new Chart(opex_regional_toast, opex_regional_toastconfig);


    const opex_semarang = document.getElementById('opex_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_semarangdata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [@json($absorbtion_semarang), @json($accure_semarang), @json($available_semarang) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_semarangconfig = {
        type: 'pie',
        data: opex_semarangdata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_semarang, opex_semarangconfig);

    // NOP semarang toast

    const opex_main_toast_semarang = document.getElementById('opex_main_toast_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_main_toast_semarangdata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [@json($absorbtion_semarang), @json($accure_semarang), @json($available_semarang) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_main_toast_semarangconfig = {
        type: 'pie',
        data: opex_main_toast_semarangdata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    let opex_toast_semarang = new Chart(opex_main_toast_semarang, opex_main_toast_semarangconfig);

    const opex_surakarta = document.getElementById('opex_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_surakartadata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [@json($absorbtion_surakarta), @json($accure_surakarta), @json($available_surakarta) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_surakartaconfig = {
        type: 'pie',
        data: opex_surakartadata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_surakarta, opex_surakartaconfig);

     // NOP surakarta toast

     const opex_main_toast_surakarta = document.getElementById('opex_main_toast_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_main_toast_surakartadata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [@json($absorbtion_surakarta), @json($accure_surakarta), @json($available_surakarta) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_main_toast_surakartaconfig = {
        type: 'pie',
        data: opex_main_toast_surakartadata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    let opex_toast_surakarta = new Chart(opex_main_toast_surakarta, opex_main_toast_surakartaconfig);

    const opex_yogyakarta = document.getElementById('opex_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_yogyakartadata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data:  [@json($absorbtion_yogyakarta), @json($accure_yogyakarta), @json($available_yogyakarta) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_yogyakartaconfig = {
        type: 'pie',
        data: opex_yogyakartadata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_yogyakarta, opex_yogyakartaconfig);

     // NOP yogyakarta toast

     const opex_main_toast_yogyakarta = document.getElementById('opex_main_toast_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_main_toast_yogyakartadata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [@json($absorbtion_yogyakarta), @json($accure_yogyakarta), @json($available_yogyakarta) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_main_toast_yogyakartaconfig = {
        type: 'pie',
        data: opex_main_toast_yogyakartadata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    let opex_toast_yogyakarta = new Chart(opex_main_toast_yogyakarta, opex_main_toast_yogyakartaconfig);

    const opex_purwokerto = document.getElementById('opex_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_purwokertodata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data:  [@json($absorbtion_purwokerto), @json($accure_purwokerto), @json($available_purwokerto) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_purwokertoconfig = {
        type: 'pie',
        data: opex_purwokertodata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_purwokerto, opex_purwokertoconfig);

     // NOP purwokerto toast

     const opex_main_toast_purwokerto = document.getElementById('opex_main_toast_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_main_toast_purwokertodata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [@json($absorbtion_purwokerto), @json($accure_purwokerto), @json($available_purwokerto) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_main_toast_purwokertoconfig = {
        type: 'pie',
        data: opex_main_toast_purwokertodata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    let opex_toast_purwokerto = new Chart(opex_main_toast_purwokerto, opex_main_toast_purwokertoconfig);

    const opex_pekalongan = document.getElementById('opex_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_pekalongandata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data:  [@json($absorbtion_pekalongan), @json($accure_pekalongan), @json($available_pekalongan) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_pekalonganconfig = {
        type: 'pie',
        data: opex_pekalongandata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_pekalongan, opex_pekalonganconfig);

     // NOP pekalongan toast

     const opex_main_toast_pekalongan = document.getElementById('opex_main_toast_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_main_toast_pekalongandata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [@json($absorbtion_pekalongan), @json($accure_pekalongan), @json($available_pekalongan) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_main_toast_pekalonganconfig = {
        type: 'pie',
        data: opex_main_toast_pekalongandata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    let opex_toast_pekalongan = new Chart(opex_main_toast_pekalongan, opex_main_toast_pekalonganconfig);

    const opex_salatiga = document.getElementById('opex_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_salatigadata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data:  [@json($absorbtion_salatiga), @json($accure_salatiga), @json($available_salatiga) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_salatigaconfig = {
        type: 'pie',
        data: opex_salatigadata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_salatiga, opex_salatigaconfig);

     // NOP salatiga toast

     const opex_main_toast_salatiga = document.getElementById('opex_main_toast_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_main_toast_salatigadata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [@json($absorbtion_salatiga), @json($accure_salatiga), @json($available_salatiga) ],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_main_toast_salatigaconfig = {
        type: 'pie',
        data: opex_main_toast_salatigadata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    let opex_toast_salatiga = new Chart(opex_main_toast_salatiga, opex_main_toast_salatigaconfig);

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
                        }else if(type === 'opex'){
                            // label
                            opex_regional_toastdata.labels = ['Absorption', 'Accrue', 'Available'],
                            // data
                            opex_regional_toastdata.datasets[0].data[0] = dataOutput.absorption;
                            opex_regional_toastdata.datasets[0].data[1] = dataOutput.accure;
                            opex_regional_toastdata.datasets[0].data[2] = dataOutput.available;
                            console.log(dataOutput.absorption);
                            // update
                            opex_toast.update();
                        }else if(type === 'opex_semarang'){
                            // label
                            opex_main_toast_semarangdata.labels = ['Absorption', 'Accrue', 'Available'],
                            // data
                            opex_main_toast_semarangdata.datasets[0].data[0] = dataOutput.absorption;
                            opex_main_toast_semarangdata.datasets[0].data[1] = dataOutput.accure;
                            opex_main_toast_semarangdata.datasets[0].data[2] = dataOutput.available;
                            console.log(dataOutput.absorption);
                            // update
                            opex_toast_semarang.update();
                        }else if(type === 'opex_surakarta'){
                            // label
                            opex_main_toast_surakartadata.labels = ['Absorption', 'Accrue', 'Available'],
                            // data
                            opex_main_toast_surakartadata.datasets[0].data[0] = dataOutput.absorption;
                            opex_main_toast_surakartadata.datasets[0].data[1] = dataOutput.accure;
                            opex_main_toast_surakartadata.datasets[0].data[2] = dataOutput.available;
                            console.log(dataOutput.absorption);
                            // update
                            opex_toast_surakarta.update();
                        }else if(type === 'opex_yogyakarta'){
                            // label
                            opex_main_toast_yogyakartadata.labels = ['Absorption', 'Accrue', 'Available'],
                            // data
                            opex_main_toast_yogyakartadata.datasets[0].data[0] = dataOutput.absorption;
                            opex_main_toast_yogyakartadata.datasets[0].data[1] = dataOutput.accure;
                            opex_main_toast_yogyakartadata.datasets[0].data[2] = dataOutput.available;
                            console.log(dataOutput.absorption);
                            // update
                            opex_toast_yogyakarta.update();
                        }else if(type === 'opex_purwokerto'){
                            // label
                            opex_main_toast_purwokertodata.labels = ['Absorption', 'Accrue', 'Available'],
                            // data
                            opex_main_toast_purwokertodata.datasets[0].data[0] = dataOutput.absorption;
                            opex_main_toast_purwokertodata.datasets[0].data[1] = dataOutput.accure;
                            opex_main_toast_purwokertodata.datasets[0].data[2] = dataOutput.available;
                            console.log(dataOutput.absorption);
                            // update
                            opex_toast_purwokerto.update();
                        }else if(type === 'opex_pekalongan'){
                            // label
                            opex_main_toast_pekalongandata.labels = ['Absorption', 'Accrue', 'Available'],
                            // data
                            opex_main_toast_pekalongandata.datasets[0].data[0] = dataOutput.absorption;
                            opex_main_toast_pekalongandata.datasets[0].data[1] = dataOutput.accure;
                            opex_main_toast_pekalongandata.datasets[0].data[2] = dataOutput.available;
                            console.log(dataOutput.absorption);
                            // update
                            opex_toast_pekalongan.update();
                        }else if(type === 'opex_salatiga'){
                            // label
                            opex_main_toast_salatigadata.labels = ['Absorption', 'Accrue', 'Available'],
                            // data
                            opex_main_toast_salatigadata.datasets[0].data[0] = dataOutput.absorption;
                            opex_main_toast_salatigadata.datasets[0].data[1] = dataOutput.accure;
                            opex_main_toast_salatigadata.datasets[0].data[2] = dataOutput.available;
                            console.log(dataOutput.absorption);
                            // update
                            opex_toast_salatiga.update();
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    },           
            });
        
    }

    $('#search-filter-OPEX').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_OPEX = $('#in_awal_OPEX').val();
            let in_akhir_OPEX = $('#in_akhir_OPEX').val();
            updateChart(in_awal_OPEX,in_akhir_OPEX,'opex');

    })

    $('#search-filter-OPEX-semarang').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_OPEX_semarang = $('#in_awal_OPEX_semarang').val();
            let in_akhir_OPEX_semarang = $('#in_akhir_OPEX_semarang').val();
            updateChart(in_awal_OPEX_semarang,in_akhir_OPEX_semarang,'opex_semarang');

    })

    $('#search-filter-OPEX-surakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_OPEX_surakarta = $('#in_awal_OPEX_surakarta').val();
            let in_akhir_OPEX_surakarta = $('#in_akhir_OPEX_surakarta').val();
            updateChart(in_awal_OPEX_surakarta,in_akhir_OPEX_surakarta,'opex_surakarta');

    })

    $('#search-filter-OPEX-yogyakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_OPEX_yogyakarta = $('#in_awal_OPEX_yogyakarta').val();
            let in_akhir_OPEX_yogyakarta = $('#in_akhir_OPEX_yogyakarta').val();
            updateChart(in_awal_OPEX_yogyakarta,in_akhir_OPEX_yogyakarta,'opex_yogyakarta');

    })

    $('#search-filter-OPEX-purwokerto').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_OPEX_purwokerto = $('#in_awal_OPEX_purwokerto').val();
            let in_akhir_OPEX_purwokerto = $('#in_akhir_OPEX_purwokerto').val();
            updateChart(in_awal_OPEX_purwokerto,in_akhir_OPEX_purwokerto,'opex_purwokerto');

    })

    $('#search-filter-OPEX-pekalongan').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_OPEX_pekalongan = $('#in_awal_OPEX_pekalongan').val();
            let in_akhir_OPEX_pekalongan = $('#in_akhir_OPEX_pekalongan').val();
            updateChart(in_awal_OPEX_pekalongan,in_akhir_OPEX_pekalongan,'opex_pekalongan');

    })

    $('#search-filter-OPEX-salatiga').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_OPEX_salatiga = $('#in_awal_OPEX_salatiga').val();
            let in_akhir_OPEX_salatiga = $('#in_akhir_OPEX_salatiga').val();
            updateChart(in_awal_OPEX_salatiga,in_akhir_OPEX_salatiga,'opex_salatiga');

    })



</script>
