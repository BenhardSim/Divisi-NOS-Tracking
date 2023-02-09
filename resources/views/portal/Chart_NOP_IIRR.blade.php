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
                <div class="rvc-title">
                    <a href="/iirr" class="links text-white"><h5>Infra IRR Regional</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="iirr_regional"></canvas>
                </div>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/iirr" class="links text-white"><h5>Infra IRR Semarang</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="iirr_semarang"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/iirr" class="links text-white"><h5>Infra IRR Surakarta</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="iirr_surakarta"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/iirr" class="links text-white"><h5>Infra IRR Yogyakarta</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="iirr_yogyakarta"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/iirr" class="links text-white"><h5>Infra IRR Purwokerto</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="iirr_purwokerto"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/iirr" class="links text-white"><h5>Infra IRR Pekalongan</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="iirr_pekalongan"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/iirr" class="links text-white"><h5>Infra IRR Salatiga</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="iirr_salatiga"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    
 @endsection    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 <script type="module">
 const iirr_regional = document.getElementById('iirr_regional').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const iirr_regionalData = {
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
    const iirr_regionalConfig = {
        type: 'horizontalBar',
        data: iirr_regionalData,
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

    new Chart(iirr_regional, iirr_regionalConfig);

    const iirr_semarang = document.getElementById('iirr_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const iirr_semarangData = {
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
    const iirr_semarangConfig = {
        type: 'horizontalBar',
        data: iirr_semarangData,
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

    new Chart(iirr_semarang, iirr_semarangConfig);

    const iirr_surakarta = document.getElementById('iirr_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const iirr_surakartaData = {
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
    const iirr_surakartaConfig = {
        type: 'horizontalBar',
        data: iirr_surakartaData,
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

    new Chart(iirr_surakarta, iirr_surakartaConfig);

    const iirr_yogyakarta = document.getElementById('iirr_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const iirr_yogyakartaData = {
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
    const iirr_yogyakartaConfig = {
        type: 'horizontalBar',
        data: iirr_yogyakartaData,
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

    new Chart(iirr_yogyakarta, iirr_yogyakartaConfig);

    const iirr_purwokerto = document.getElementById('iirr_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const iirr_purwokertoData = {
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
    const iirr_purwokertoConfig = {
        type: 'horizontalBar',
        data: iirr_purwokertoData,
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

    new Chart(iirr_purwokerto, iirr_purwokertoConfig);

    const iirr_pekalongan = document.getElementById('iirr_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const iirr_pekalonganData = {
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
    const iirr_pekalonganConfig = {
        type: 'horizontalBar',
        data: iirr_pekalonganData,
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

    new Chart(iirr_pekalongan, iirr_pekalonganConfig);

    const iirr_salatiga = document.getElementById('iirr_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const iirr_salatigaData = {
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
    const iirr_salatigaConfig = {
        type: 'horizontalBar',
        data: iirr_salatigaData,
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

    new Chart(iirr_salatiga, iirr_salatigaConfig);
</script>
