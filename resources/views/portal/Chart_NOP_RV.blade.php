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
                <div class="rvc-title">
                    <a href="/rv" class="links text-white"><h5>Reserved Varcost Regional</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_regional"></canvas>
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
                <div class="rvc-title">
                    <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Semarang</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_semarang"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Surakarta</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_surakarta"></canvas>
                </div>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Yogyakarta</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_yogyakarta"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Purwokerto</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_purwokerto"></canvas>
                </div>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Pekalongan</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_pekalongan"></canvas>
                </div>
            </div>
        </div> 

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/rv" class="links text-white"><h5>Reserved Varcost NOP Salatiga</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_salatiga"></canvas>
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
    </script>

