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
            </a>search
        </div>
        <div class="col-lg col-sm">
            <div class="sites">
                <div class="site-title">
                    <h4>SITE RESELLER</h4>
                </div>
                <div class="site-total">
                    <h1 style="font-weight: normal;">100</h1>
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
                <div class="rvc-title">
                    <a href="/pl" class="links text-white"><h5>Profit Loss Regional</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="profitloss_main"></canvas>
                </div>
            </div>
        </div>

        {{-- Reserved Varcost   --}}
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/rv" class="links text-white"><h5>Reserved Varcost</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_main"></canvas>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <script>
            // URL dari controller 
            let Route = '/filter-data';

            let dataIn = {
                "interval_awal" : document.getDocumentElementById('in_awal'),
                "interval_akhir" : document.getDocumentElementById('in_akhir'),
            }
            
            document.getDocumentElementById('search-filter').addEventListener('click',(e)=>{
                e.preventDefault();
                console.log('test');
            })

            // $('#search-filter').click(function(e) {
            //     console.log('test');
            //     e.preventDefault();
            //     interval_awal = $('#interval_awal').val();
            //     interval_akhir = $('#interval_akhir').val();
            //     console.log(`start date: ${interval_awal} | end date: ${interval_akhir}`);
            // })
            
            // function getData(e){
            //     e.preventDefault();
            //     let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            //     fetch(Route,{
            //         headers: {
            //             "Content-Type": "application/json",
            //             "Accept": "application/json, text-plain, */*",
            //             "X-Requested-With": "XMLHttpRequest",
            //             "X-CSRF-TOKEN": token
            //         },
            //         method: 'get',
            //         credentials: "same-origin",
            //         body : dataIn,
            //     }).then((data) => {
            //         console.log(data);
            //     })
            // }
        </script>





        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title title-box">
                    <div class="title-cont">
                        <a href="/kpia" class="links text-white"><h5>KPI Activity</h5></a>
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
                    <canvas id="kpia_main"></canvas>
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
                        <button style="display: flex;align-items:center;" type="submit" class="btn btn-outline-light btn-sm border-dark"  data-bs-toggle="modal" data-bs-target="#modalDetailKPIU">
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

    let updateChart = function(start_date, end_date){


        $.ajax({
                    url: "/filter-data",
                    type: "GET",
                    dataType: "json",
                    data: {
                        start_date: start_date,
                        end_date: end_date,
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function(dataOutput) {
                        // kpiu_main_toastData.labels = dataOutput.AllIds_KPI_activity
                        // for(int i=0;i<dataOutput.length();i++){
                        //     console.log(dataOutput.filteredData[0].date);
                        // }
                        
                        console.log(dataOutput.filteredData);
                        // console.log(dataOutput.filteredData);
                        // console.log(dataOutput.filteredData);
                        

                        // labels
                    },
                    error: function(data) {
                        console.log(data);
                    },
            });
        
    }

    $('#search-filter').click(function(e) {
            // console.log('test');
            e.preventDefault();
            let interval_awal = $('#in_awal').val();
            let interval_akhir = $('#in_akhir').val();
            updateChart(interval_awal,interval_akhir);
          
            

            // console.log(`start date: ${interval_awal} | end date: ${interval_akhir}`);

    })
</script>