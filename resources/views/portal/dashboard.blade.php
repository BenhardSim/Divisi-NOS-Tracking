@extends('portal.layouts.main')

@section('container')

    {{-- title section  --}}
    <div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
        <div class="header-title">
            <h4 class="" style="font-weight: normal;">NOS Portal | Dashboard</h4>
        </div>
        @include('portal.component.userProfile')
    </div>

    {{-- site box --}}
    <div class="row">
        <div class="col-lg col-sm">
            <a href="/site-all" style="text-decoration: none;">
                <div class="sites">
                    <div class="site-title">
                        <h4>SITE ALL</h4>
                    </div>
                    <div class="site-total">
                        <h1 style="font-weight: normal;">{{ $site_all }}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg col-sm">
            <a href="/site-tp" style="text-decoration: none;">
                <div class="sites">
                    <div class="site-title">
                        <h4>SITE TP</h4>
                    </div>
                    <div class="site-total">
                        <h1 style="font-weight: normal;">{{ $site_tp }}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg col-sm">
            <a href="/site-telkom" style="text-decoration: none;">
                <div class="sites">
                    <div class="site-title">
                        <h4>SITE TELKOM</h4>
                    </div>
                    <div class="site-total">
                        <h1 style="font-weight: normal;">{{ $site_telkom }}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg col-sm">
            <a href="/site-telkomsel" style="text-decoration: none;">
            <div class="sites">
                <div class="site-title">
                    <h4>SITE TELKOMSEL</h4>
                </div>
                <div class="site-total">
                    <h1 style="font-weight: normal;">{{ $site_telkomsel }}</h1>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg col-sm">
            <div class="sites">
                <div class="site-title">
                    <h4>SITE RESELLER</h4>
                </div>
                <div class="site-total">
                    <h1 style="font-weight: normal;">{{ $site_reseller }}</h1>
                </div>
            </div>
        </div>
    </div>

    <br>
    
    {{-- search bar --}}

    <div class="form-group container">
        <form action="{{ url('/search') }}" method="GET" role="search" >
            <input value="" name="search" class="form-control" id="exampleFormControlInput1" placeholder="Search By Site ID">
        </form>
    </div>


    <section class="row">
        {{-- chart revenue vs cost regional  --}}

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/rvc" class="links text-white"><h5>Revenue VS Cost Regional</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="revenue_main"></canvas>
                </div>
            </div>
        </div>
    

        {{-- profit loss regional   --}}
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/pl" class="links text-white"><h5>Profit Loss Regional</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailPL">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph">
                    <canvas id="profitloss_main"></canvas>
                </div>
            </div>
        </div>

        {{-- MODAL MAGNIFY PROFIT LOSS --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailPL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER DATA PROFIT LOSS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container row">
                    <div class="col-12">
                        <div class="container rvc-stat shadow">
                            <div class="rvc-graph">
                                <canvas id="profitloss_main_toast"></canvas>
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
                                        <input id="in_awal_PL" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_PL" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-PL" class="btn btn-primary" >Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>



        {{-- Reserved Varcost   --}}
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/rv" class="links text-white"><h5>Reserved Varcost</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailRCOST">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_main"></canvas>
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

        {{-- Cost BBM --}}
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>Cost BBM</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_main"></canvas>
                </div>
            </div>
        </div>

        {{-- opex donut chart --}}
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/opex" class="links text-white"><h5>OPEX</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                    <div style="width: 50%">
                        <canvas id="opex_main"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/tirr" class="links text-white"><h5>Tren IRR VS Revenue VS Komitmen</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="tirr_main"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/iirr" class="links text-white"><h5>Infra IRR</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="iirr_main"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/kpiu" class="links text-white"><h5>KPI Utama</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIU">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph">
                    <canvas id="kpiu_main"></canvas>
                </div>
            </div>
        </div>

        {{-- MODAL MAGNIFY KPI UTAMA --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <canvas id="kpiu_main_toast"></canvas>
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
                                        <input id="in_awal" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter" class="btn btn-primary" >Search</button>
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
                        <a href="/kpia" class="links text-white"><h5>KPI Activity</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIA">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph">
                    <canvas id="kpia_main"></canvas>
                </div>
            </div>
        </div>

        {{-- MODAL MAGNIFY KPI ACTIVITY --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <canvas id="kpia_main_toast"></canvas>
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
                                        <input id="in_awal_kpia" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpia" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpia" class="btn btn-primary" >Search</button>
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
                        <a href="/kpis" class="links text-white"><h5>KPI Supporting</h5></a>
                    </div>
                    <div class="addicon" style="vertical-align: middle;display: flex;align-items:center;flex-direction:row">
                        {{-- view All Data Button --}}
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIS">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                </div>
                <div class="rvc-graph">
                    <canvas id="kpis_main"></canvas>
                </div>
            </div>
        </div>

        {{-- MODAL MAGNIFY KPI SUPPORTING --}}

        <!-- Modal -->
        <div class="modal fade" id="modalDetailKPIS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <canvas id="kpis_mainToast"></canvas>
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
                                        <input id="in_awal_kpis" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                    </div>
                                    <div class="col-5">
                                        <label for="filter akhir">End Date</label>
                                        <input id="in_akhir_kpis" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" id="search-filter-kpis" class="btn btn-primary" >Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    
    

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script type="module">

    // grafik revenue vs cost

    const revvcost_main = document.getElementById('revenue_main');
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
        labels: @json($monthList_PL),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS),
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

    // site profit loss regional TOAST

    const profitloss_main_toast = document.getElementById('profitloss_main_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_main_toastData = {
        labels: @json($monthList_PL),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_main_toastConfig = {
        type: 'bar',
        data: profitloss_main_toastData,
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

    let PL_toast = new Chart(profitloss_main_toast, profitloss_main_toastConfig);

    // varcost graph

    const varcost_main = document.getElementById('varcost_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const varcost_maindata = {
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

    // cost BBM

    const costbbm_main = document.getElementById('costbbm_main').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_maindata = {
         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: [65, 59, 80, 81, 56, 55, 40, 42, 45, 44, 80, 90],
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: [12, 10, 32, 30, 12, 11, 10, 11, 12, 13, 14, 15],
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: [10, 12, 34, 77, 34, 21, 22, 20, 10, 30, 23, 12],
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
        type: 'doughnut',
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

    // tren IRR
    const tirr_main = document.getElementById('tirr_main').getContext('2d');
     //const labels = Utils.months({count: 7});
     const tirr_maindata = {
         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
         datasets: [
         {
         label: ['B2S'],
         data: [28, 55.3, 61.7, 66.6, 74.2, 84.6, 89.4, 90, 89.9, 91.2, 93.1, 91.2],
         fill: false,
         borderColor: 'rgb(250, 120, 100)',
         tension: 0.1
         },
         {
         label: ['Collo TP'],
         data: [13.1, 35.2, 39.3, 43, 46.1, 47.5, 50.4, 57.3, 60.4, 60.7, 64.5, 67.7],
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['Target IRR Collo'],
         data: [51.6, 51.2, 51.2, 51.2, 51.2, 51.2, 51.2, 51.2, 51.2, 51.2, 51.2, 51.2],
         fill: false,
         borderColor: 'rgb(0, 0, 100)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Target IRR B2S'],
         data: [61.3, 60.4, 60.4, 60.4, 60.4, 60.4, 60.4, 60.4, 60.4, 60.4, 60.4, 60.4],
         fill: false,
         borderColor: 'rgb(255, 125, 0)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Komitmen Collo'],
         data: [79.1, 79.1, 79.1, 79.1, 79.1, 79.1, 79.1, 79.1, 79.1, 79.1, 79.1, 79.1],
         fill: false,
         borderColor: 'rgb(28, 115, 102)',
         tension: 0.1
         },
         {
         label: ['Komitmen B2S'],
         data: [79.3, 79.2, 79.2, 79.2, 79.2, 79.2, 79.2, 79.2, 79.2, 79.2, 79.2, 79.2],
         fill: false,
         borderColor: 'rgb(200, 100, 100)',
         tension: 0.1
         },
     ]
     };
     const tirr_mainconfig = {
         type: 'line',
         data: tirr_maindata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(tirr_main, tirr_mainconfig);

     // infra irr
     const iirr_main = document.getElementById('iirr_main').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const iirr_mainData = {
        labels: ['Not IRR; Komitmen Not Achieved; >6 Bulan; Single Band',
        'Not IRR; Komitmen Not Achieved; <6 Bulan; Single Band',
        'Not IRR; Komitmen Not Achieved; <6 Bulan; Dual Band',
        'IRR; Komitmen Achieved; >6 Bulan; Dual Band',
        'IRR; Komitmen Achieved; >6 Bulan; Triple Band',
        'IRR; Komitmen Achieved; <6 Bulan; Single Band',
        'IRR; Komitmen Achieved; <6 Bulan; Dual Band',
        'IRR; Komitmen Achieved; <6 Bulan; Triple Band',
        'IRR; Komitmen Not Achieved; >6 Bulan; Dual Band',
        'IRR; Komitmen Not Achieved; <6 Bulan; Single Band',
        'IRR; Komitmen Not Achieved; <6 Bulan; Dual Band'
        ],
        datasets: [
        {
            axis: 'y',
            label: 'B2S',
            data: [2, 4, 0, 2, 1, 1, 10, 2, 5, 7, 11],
            fill: false,
            backgroundColor: '#22aa99'
        },
        {
            axis: 'y',
            label: 'Collo TP',
            data: [0, 0, 1, 1, 1, 1, 2, 1, 0, 10, 1],
            fill: false,
            backgroundColor: '#994499'
        },
        ]
    };
    const iirr_mainConfig = {
        type: 'horizontalBar',
        data: iirr_mainData,
        options: {
            scales: {
                xAxes: [{
                  stacked: true // this should be set to make the bars stacked
                }],
                 yAxes: [{
                   stacked: true, // this also..
                   ticks: {
                    fontSize: 10
                   }  
                }]
            },
            legend: {
            labels: {
                // This more specific font property overrides the global property
                fontSize: 10
            }
        }
        }
    };

    new Chart(iirr_main, iirr_mainConfig);

    // KPI Utama
    const kpiu_main = document.getElementById('kpiu_main').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_mainData = {
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
    const kpiu_mainConfig = {
        type: "bar",
        data: kpiu_mainData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_main, kpiu_mainConfig);

     // KPI Utama Toast
    const kpiu_main_toast = document.getElementById('kpiu_main_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_main_toastData = {
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
    const kpiu_main_toastConfig = {
        type: "bar",
        data: kpiu_main_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIU_toast = new Chart(kpiu_main_toast, kpiu_main_toastConfig);

    // KPI Supporting
    const kpis_main = document.getElementById('kpis_main').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_mainData = {
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
    const kpis_mainConfig = {
        type: "bar",
        data: kpis_mainData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_main, kpis_mainConfig);

    // KPI Supporting toast
    const kpis_mainToast = document.getElementById('kpis_mainToast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_mainToastData = {
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
    const kpis_mainToastConfig = {
        type: "bar",
        data: kpis_mainToastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIS_toast = new Chart(kpis_mainToast, kpis_mainToastConfig);

    // KPI Activity
    const kpia_main = document.getElementById('kpia_main').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_mainData = {
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
    const kpia_mainConfig = {
        type: "bar",
        data: kpia_mainData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_main, kpia_mainConfig);

    // KPI Activity toast
    const kpia_main_toast = document.getElementById('kpia_main_toast').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_main_toastData = {
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
    const kpia_main_toastConfig = {
        type: "bar",
        data: kpia_main_toastData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    let KPIA_toast = new Chart(kpia_main_toast, kpia_main_toastConfig);

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
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    },           
            });
        
    }

    $('#search-filter').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal').val();
            let interval_akhir_KPIU = $('#in_akhir').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_utama');

    })

    $('#search-filter-kpia').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpia').val();
            let interval_akhir_KPIU = $('#in_akhir_kpia').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_activity');

    })

    $('#search-filter-kpis').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_KPIU = $('#in_awal_kpis').val();
            let interval_akhir_KPIU = $('#in_akhir_kpis').val();
            updateChart(interval_awal_KPIU,interval_akhir_KPIU,'kpi_support');

    })

    $('#search-filter-PL').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_PL = $('#in_awal_PL').val();
            let interval_akhir_PL = $('#in_akhir_PL').val();
            updateChart(interval_awal_PL,interval_akhir_PL,'profit_loss');

    })

    $('#search-filter-RCOST').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_PL = $('#in_awal_RCOST').val();
            let interval_akhir_PL = $('#in_akhir_RCOST').val();
            updateChart(interval_awal_PL,interval_akhir_PL,'var_cost');

    })
</script>