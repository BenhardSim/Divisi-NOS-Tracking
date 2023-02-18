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
            {{-- profit loss regional   --}}
            <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                        <div class="title-cont">
                            <a href="/pl" class="links text-white"><h5>Profit Loss Regional</h5></a>
                        </div>
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailPL">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main"></canvas>
                    </div>
                </div>
            </div>               

            <div class="col-lg-3"> </div>

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

            {{-- NOP-Row-1 --}}
            <br><br>
            <div class="col-lg-12 pt-5" style="text-align: center">
                <h5>Revenue Vs Cost SITE NOP</h5>
            </div>

             {{-- profit loss NOP   --}}
             <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                        <div class="title-cont">
                            <a href="/pl" class="links text-white"><h5>Profit Loss NOP semarang</h5></a>
                        </div>
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailPL-semarang">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_1"></canvas>
                    </div>
                </div>
            </div>      

            {{-- MODAL MAGNIFY PROFIT LOSS NOP SEMARANG--}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailPL-semarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA PROFIT LOSS NOP SEMARANG</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="profitloss_main_toast_semarang"></canvas>
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
                                            <input id="in_awal_PL_semarang" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_PL_semarang" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-PL-semarang" class="btn btn-primary" >Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

             {{-- profit loss NOP   --}}
             <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                        <div class="title-cont">
                            <a href="/pl" class="links text-white"><h5>Profit Loss NOP Surakarta</h5></a>
                        </div>
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailPL-surakarta">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_2"></canvas>
                    </div>
                </div>
            </div> 
            
            {{-- MODAL MAGNIFY PROFIT LOSS NOP surakarta--}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailPL-surakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA PROFIT LOSS NOP surakarta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="profitloss_main_toast_surakarta"></canvas>
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
                                            <input id="in_awal_PL_surakarta" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_PL_surakarta" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-PL-surakarta" class="btn btn-primary" >Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

             {{-- profit loss NOP  Yogyakarta --}}
            <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                        <div class="title-cont">
                            <a href="/pl" class="links text-white"><h5>Profit Loss NOP Yogyakarta</h5></a>
                        </div>
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailPL-yogyakarta">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_3"></canvas>
                    </div>
                </div>
            </div>      

            {{-- MODAL MAGNIFY PROFIT LOSS NOP yogyakarta--}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailPL-yogyakarta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA PROFIT LOSS NOP yogyakarta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="profitloss_main_toast_yogyakarta"></canvas>
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
                                            <input id="in_awal_PL_yogyakarta" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_PL_yogyakarta" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-PL-yogyakarta" class="btn btn-primary" >Search</button>
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
             {{-- profit loss NOP Purwokerto  --}}
             <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                        <div class="title-cont">
                            <a href="/pl" class="links text-white"><h5>Profit Loss NOP Purwokerto</h5></a>
                        </div>
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailPL-purwokerto">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_4"></canvas>
                    </div>
                </div>
            </div>      

            {{-- MODAL MAGNIFY PROFIT LOSS NOP purwokerto--}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailPL-purwokerto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA PROFIT LOSS NOP purwokerto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="profitloss_main_toast_purwokerto"></canvas>
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
                                            <input id="in_awal_PL_purwokerto" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_PL_purwokerto" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-PL-purwokerto" class="btn btn-primary" >Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

             {{-- profit loss NOP Pekalongan  --}}
             <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                        <div class="title-cont">
                            <a href="/pl" class="links text-white"><h5>Profit Loss NOP Pekalongan</h5></a>
                        </div>
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailPL-pekalongan">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_5"></canvas>
                    </div>
                </div>
            </div>      

            {{-- MODAL MAGNIFY PROFIT LOSS NOP pekalongan--}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailPL-pekalongan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA PROFIT LOSS NOP pekalongan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="profitloss_main_toast_pekalongan"></canvas>
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
                                            <input id="in_awal_PL_pekalongan" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_PL_pekalongan" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-PL-pekalongan" class="btn btn-primary" >Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            {{-- profit loss NOP Salatiga  --}}
            <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title title-box">
                        <div class="title-cont">
                            <a href="/pl" class="links text-white"><h5>Profit Loss NOP salatiga</h5></a>
                        </div>
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailPL-salatiga">
                            <span data-feather="eye" class="align-text-bottom" style="margin-right: 5px"></span> 
                            <span>Magnify</span>
                        </button>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_6"></canvas>
                    </div>
                </div>
            </div>      
        </div>

        {{-- MODAL MAGNIFY PROFIT LOSS NOP salatiga--}}

            <!-- Modal -->
            <div class="modal fade" id="modalDetailPL-salatiga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FILTER DATA PROFIT LOSS NOP salatiga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container row">
                        <div class="col-12">
                            <div class="container rvc-stat shadow">
                                <div class="rvc-graph">
                                    <canvas id="profitloss_main_toast_salatiga"></canvas>
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
                                            <input id="in_awal_PL_salatiga" name='interval_awal' type="date" class="form-control" placeholder="filter awal">
                                        </div>
                                        <div class="col-5">
                                            <label for="filter akhir">End Date</label>
                                            <input id="in_akhir_PL_salatiga" name="interval_akhir" type="date" class="form-control" placeholder="filter akhir">
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <button type="submit" id="search-filter-PL-salatiga" class="btn btn-primary" >Search</button>
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

    // site profit loss NOP 

    const profitloss_main_NOP_1 = document.getElementById('profitloss_main_NOP_1').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_1 = {
        labels: @json($monthList_PL_semarang),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_semarang),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_semarang),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_semarang),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_mainConfig_NOP_1 = {
        type: 'bar',
        data: profitloss_mainData_NOP_1,
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

    new Chart(profitloss_main_NOP_1, profitloss_mainConfig_NOP_1);

    // site profit loss Toast NOP semarang

    const profitloss_main_toast_NOP_semarang = document.getElementById('profitloss_main_toast_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_main_toastData_NOP_semarang = {
        labels: @json($monthList_PL_semarang),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_semarang),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_semarang),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_semarang),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_main_toastConfig_NOP_semarang = {
        type: 'bar',
        data: profitloss_main_toastData_NOP_semarang,
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

    let PL_toast_semarang = new Chart(profitloss_main_toast_NOP_semarang, profitloss_main_toastConfig_NOP_semarang);

    // site profit loss NOP 

    const profitloss_main_NOP_2 = document.getElementById('profitloss_main_NOP_2').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_2 = {
        labels: @json($monthList_PL_surakarta),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_surakarta),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_surakarta),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_surakarta),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_mainConfig_NOP_2 = {
        type: 'bar',
        data: profitloss_mainData_NOP_2,
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

    new Chart(profitloss_main_NOP_2, profitloss_mainConfig_NOP_2);

    // site profit loss Toast NOP surakarta

    const profitloss_main_toast_NOP_surakarta = document.getElementById('profitloss_main_toast_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_main_toastData_NOP_surakarta = {
        labels: @json($monthList_PL_surakarta),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_surakarta),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_surakarta),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_surakarta),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_main_toastConfig_NOP_surakarta = {
        type: 'bar',
        data: profitloss_main_toastData_NOP_surakarta,
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

    let PL_toast_surakarta = new Chart(profitloss_main_toast_NOP_surakarta, profitloss_main_toastConfig_NOP_surakarta);

    // site profit loss NOP 

    const profitloss_main_NOP_3 = document.getElementById('profitloss_main_NOP_3').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_3 = {
        labels: @json($monthList_PL_yogyakarta),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_yogyakarta),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_yogyakarta),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_yogyakarta),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_mainConfig_NOP_3 = {
        type: 'bar',
        data: profitloss_mainData_NOP_3,
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

    new Chart(profitloss_main_NOP_3, profitloss_mainConfig_NOP_3);

    // site profit loss Toast NOP yogyakarta

    const profitloss_main_toast_NOP_yogyakarta = document.getElementById('profitloss_main_toast_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_main_toastData_NOP_yogyakarta = {
        labels: @json($monthList_PL_yogyakarta),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_yogyakarta),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_yogyakarta),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_yogyakarta),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_main_toastConfig_NOP_yogyakarta = {
        type: 'bar',
        data: profitloss_main_toastData_NOP_yogyakarta,
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

    let PL_toast_yogyakarta = new Chart(profitloss_main_toast_NOP_yogyakarta, profitloss_main_toastConfig_NOP_yogyakarta);

    // site profit loss NOP purwokerto

    const profitloss_main_NOP_4 = document.getElementById('profitloss_main_NOP_4').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_4 = {
        labels: @json($monthList_PL_purwokerto),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_purwokerto),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_purwokerto),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_purwokerto),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_mainConfig_NOP_4 = {
        type: 'bar',
        data: profitloss_mainData_NOP_4,
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

    new Chart(profitloss_main_NOP_4, profitloss_mainConfig_NOP_4);

    // site profit loss Toast NOP purwokerto

    const profitloss_main_toast_NOP_purwokerto = document.getElementById('profitloss_main_toast_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_main_toastData_NOP_purwokerto = {
        labels: @json($monthList_PL_purwokerto),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_purwokerto),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_purwokerto),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_purwokerto),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_main_toastConfig_NOP_purwokerto = {
        type: 'bar',
        data: profitloss_main_toastData_NOP_purwokerto,
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

    let PL_toast_purwokerto = new Chart(profitloss_main_toast_NOP_purwokerto, profitloss_main_toastConfig_NOP_purwokerto);

    // site profit loss NOP pekalongan

    const profitloss_main_NOP_5 = document.getElementById('profitloss_main_NOP_5').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_5 = {
        labels: @json($monthList_PL_pekalongan),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_pekalongan),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_pekalongan),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_pekalongan),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_mainConfig_NOP_5 = {
        type: 'bar',
        data: profitloss_mainData_NOP_5,
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

    new Chart(profitloss_main_NOP_5, profitloss_mainConfig_NOP_5);

    // site profit loss Toast NOP pekalongan

    const profitloss_main_toast_NOP_pekalongan = document.getElementById('profitloss_main_toast_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_main_toastData_NOP_pekalongan = {
        labels: @json($monthList_PL_pekalongan),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_pekalongan),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_pekalongan),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_pekalongan),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_main_toastConfig_NOP_pekalongan = {
        type: 'bar',
        data: profitloss_main_toastData_NOP_pekalongan,
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

    let PL_toast_pekalongan = new Chart(profitloss_main_toast_NOP_pekalongan, profitloss_main_toastConfig_NOP_pekalongan);

    // site profit loss NOP 

    const profitloss_main_NOP_6 = document.getElementById('profitloss_main_NOP_6').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_6 = {
        labels: @json($monthList_PL_salatiga),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_salatiga),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_salatiga),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_salatiga),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_mainConfig_NOP_6 = {
        type: 'bar',
        data: profitloss_mainData_NOP_6,
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

    new Chart(profitloss_main_NOP_6, profitloss_mainConfig_NOP_6);

    // site profit loss Toast NOP salatiga

    const profitloss_main_toast_NOP_salatiga = document.getElementById('profitloss_main_toast_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_main_toastData_NOP_salatiga = {
        labels: @json($monthList_PL_salatiga),
        datasets: [
        {
            label: 'High Profit',
            data: @json($value_PL_HP_salatiga),
            backgroundColor: '#22aa99'
        },
        {
            label: 'Low Profit',
            data: @json($value_PL_LP_salatiga),
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: @json($value_PL_LOSS_salatiga),
            backgroundColor: '#316395'
        },
        ]
    };
    const profitloss_main_toastConfig_NOP_salatiga = {
        type: 'bar',
        data: profitloss_main_toastData_NOP_salatiga,
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

    let PL_toast_salatiga = new Chart(profitloss_main_toast_NOP_salatiga, profitloss_main_toastConfig_NOP_salatiga);

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
                        }else if(type === 'profit_loss_semarang'){
                            // labels
                            profitloss_main_toastData_NOP_semarang.labels = dataOutput.val_month
                            // data
                            profitloss_main_toastData_NOP_semarang.datasets[0].data = dataOutput.val_x_1;
                            profitloss_main_toastData_NOP_semarang.datasets[1].data = dataOutput.val_x_2;
                            profitloss_main_toastData_NOP_semarang.datasets[2].data = dataOutput.val_x_3;
                            // update
                            PL_toast_semarang.update();
                        }else if(type === 'profit_loss_surakarta'){
                            // labels
                            profitloss_main_toastData_NOP_surakarta.labels = dataOutput.val_month
                            // data
                            profitloss_main_toastData_NOP_surakarta.datasets[0].data = dataOutput.val_x_1;
                            profitloss_main_toastData_NOP_surakarta.datasets[1].data = dataOutput.val_x_2;
                            profitloss_main_toastData_NOP_surakarta.datasets[2].data = dataOutput.val_x_3;
                            // update
                            PL_toast_surakarta.update();
                        }else if(type === 'profit_loss_yogyakarta'){
                            // labels
                            profitloss_main_toastData_NOP_yogyakarta.labels = dataOutput.val_month
                            // data
                            profitloss_main_toastData_NOP_yogyakarta.datasets[0].data = dataOutput.val_x_1;
                            profitloss_main_toastData_NOP_yogyakarta.datasets[1].data = dataOutput.val_x_2;
                            profitloss_main_toastData_NOP_yogyakarta.datasets[2].data = dataOutput.val_x_3;
                            // update
                            PL_toast_yogyakarta.update();
                        }else if(type === 'profit_loss_purwokerto'){
                            // labels
                            profitloss_main_toastData_NOP_purwokerto.labels = dataOutput.val_month
                            // data
                            profitloss_main_toastData_NOP_purwokerto.datasets[0].data = dataOutput.val_x_1;
                            profitloss_main_toastData_NOP_purwokerto.datasets[1].data = dataOutput.val_x_2;
                            profitloss_main_toastData_NOP_purwokerto.datasets[2].data = dataOutput.val_x_3;
                            // update
                            PL_toast_purwokerto.update();
                        }else if(type === 'profit_loss_pekalongan'){
                            // labels
                            profitloss_main_toastData_NOP_pekalongan.labels = dataOutput.val_month
                            // data
                            profitloss_main_toastData_NOP_pekalongan.datasets[0].data = dataOutput.val_x_1;
                            profitloss_main_toastData_NOP_pekalongan.datasets[1].data = dataOutput.val_x_2;
                            profitloss_main_toastData_NOP_pekalongan.datasets[2].data = dataOutput.val_x_3;
                            // update
                            PL_toast_pekalongan.update();
                        }else if(type === 'profit_loss_salatiga'){
                            // labels
                            profitloss_main_toastData_NOP_salatiga.labels = dataOutput.val_month
                            // data
                            profitloss_main_toastData_NOP_salatiga.datasets[0].data = dataOutput.val_x_1;
                            profitloss_main_toastData_NOP_salatiga.datasets[1].data = dataOutput.val_x_2;
                            profitloss_main_toastData_NOP_salatiga.datasets[2].data = dataOutput.val_x_3;
                            // update
                            PL_toast_salatiga.update();
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
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    },           
            });
        
    }

    $('#search-filter-PL').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal_PL = $('#in_awal_PL').val();
            let interval_akhir_PL = $('#in_akhir_PL').val();
            updateChart(interval_awal_PL,interval_akhir_PL,'profit_loss');

    })

    $('#search-filter-PL-semarang').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_PL_semarang = $('#in_awal_PL_semarang').val();
            let in_akhir_PL_semarang = $('#in_akhir_PL_semarang').val();
            updateChart(in_awal_PL_semarang,in_akhir_PL_semarang,'profit_loss_semarang');

    })

    $('#search-filter-PL-surakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_PL_surakarta = $('#in_awal_PL_surakarta').val();
            let in_akhir_PL_surakarta = $('#in_akhir_PL_surakarta').val();
            updateChart(in_awal_PL_surakarta,in_akhir_PL_surakarta,'profit_loss_surakarta');

    })

    $('#search-filter-PL-yogyakarta').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_PL_yogyakarta = $('#in_awal_PL_yogyakarta').val();
            let in_akhir_PL_yogyakarta = $('#in_akhir_PL_yogyakarta').val();
            updateChart(in_awal_PL_yogyakarta,in_akhir_PL_yogyakarta,'profit_loss_yogyakarta');

    })

    $('#search-filter-PL-purwokerto').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_PL_purwokerto = $('#in_awal_PL_purwokerto').val();
            let in_akhir_PL_purwokerto = $('#in_akhir_PL_purwokerto').val();
            updateChart(in_awal_PL_purwokerto,in_akhir_PL_purwokerto,'profit_loss_purwokerto');

    })

    $('#search-filter-PL-pekalongan').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_PL_pekalongan = $('#in_awal_PL_pekalongan').val();
            let in_akhir_PL_pekalongan = $('#in_akhir_PL_pekalongan').val();
            updateChart(in_awal_PL_pekalongan,in_akhir_PL_pekalongan,'profit_loss_pekalongan');

    })

    $('#search-filter-PL-salatiga').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let in_awal_PL_salatiga = $('#in_awal_PL_salatiga').val();
            let in_akhir_PL_salatiga = $('#in_akhir_PL_salatiga').val();
            updateChart(in_awal_PL_salatiga,in_akhir_PL_salatiga,'profit_loss_salatiga');

    })
    

</script>