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
                    <a href="/tirr" class="links text-white"><h5>Tren IRR Regional</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="tirr_regional"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- NOP-Row-1 --}}
    <br><br>
    <div class="col-lg-12 pt-5" style="text-align: center">
        <h5>Tren IRR NOP</h5>
    </div>
    

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/tirr" class="links text-white"><h5>Tren IRR Semarang</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="tirr_semarang"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/tirr" class="links text-white"><h5>Tren IRR Surakarta</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="tirr_surakarta"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/tirr" class="links text-white"><h5>Tren IRR Yogyakarta</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="tirr_yogyakarta"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/tirr" class="links text-white"><h5>Tren IRR Purwokerto</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="tirr_purwokerto"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/tirr" class="links text-white"><h5>Tren IRR Pekalongan</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="tirr_pekalongan"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/tirr" class="links text-white"><h5>Tren IRR Salatiga</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="tirr_salatiga"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    
 @endsection    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 <script type="module">
    const tirr_regional = document.getElementById('tirr_regional').getContext('2d');
     //const labels = Utils.months({count: 7});
     const tirr_regionaldata = {
         labels: @json($monthList_IRR),
         datasets: [
         {
         label: ['B2S'],
         data: @json($b2s),
         fill: false,
         borderColor: 'rgb(250, 120, 100)',
         tension: 0.1
         },
         {
         label: ['Collo TP'],
         data: @json($collo_tp),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['Target IRR Collo'],
         data: @json($target_irr_collo),
         fill: false,
         borderColor: 'rgb(0, 0, 100)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Target IRR B2S'],
         data: @json($target_irr_b2s),
         fill: false,
         borderColor: 'rgb(255, 125, 0)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Komitmen Collo'],
         data: @json($komitmen_collo),
         fill: false,
         borderColor: 'rgb(28, 115, 102)',
         tension: 0.1
         },
         {
         label: ['Komitmen B2S'],
         data: @json($komitmen_b2s),
         fill: false,
         borderColor: 'rgb(200, 100, 100)',
         tension: 0.1
         },
     ]
     };
     const tirr_regionalconfig = {
         type: 'line',
         data: tirr_regionaldata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(tirr_regional, tirr_regionalconfig);

     const tirr_semarang = document.getElementById('tirr_semarang').getContext('2d');
     //const labels = Utils.months({count: 7});
     const tirr_semarangdata = {
        labels: @json($monthList_IRR_semarang),
         datasets: [
         {
         label: ['B2S'],
         data: @json($b2s_semarang),
         fill: false,
         borderColor: 'rgb(250, 120, 100)',
         tension: 0.1
         },
         {
         label: ['Collo TP'],
         data: @json($collo_tp_semarang),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['Target IRR Collo'],
         data: @json($target_irr_collo_semarang),
         fill: false,
         borderColor: 'rgb(0, 0, 100)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Target IRR B2S'],
         data: @json($target_irr_b2s_semarang),
         fill: false,
         borderColor: 'rgb(255, 125, 0)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Komitmen Collo'],
         data: @json($komitmen_collo_semarang),
         fill: false,
         borderColor: 'rgb(28, 115, 102)',
         tension: 0.1
         },
         {
         label: ['Komitmen B2S'],
         data: @json($komitmen_b2s_semarang),
         fill: false,
         borderColor: 'rgb(200, 100, 100)',
         tension: 0.1
         },
     ]
     };
     const tirr_semarangconfig = {
         type: 'line',
         data: tirr_semarangdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(tirr_semarang, tirr_semarangconfig);

     const tirr_surakarta = document.getElementById('tirr_surakarta').getContext('2d');
     //const labels = Utils.months({count: 7});
     const tirr_surakartadata = {
        labels: @json($monthList_IRR_surakarta),
         datasets: [
         {
         label: ['B2S'],
         data: @json($b2s_surakarta),
         fill: false,
         borderColor: 'rgb(250, 120, 100)',
         tension: 0.1
         },
         {
         label: ['Collo TP'],
         data: @json($collo_tp_surakarta),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['Target IRR Collo'],
         data: @json($target_irr_collo_surakarta),
         fill: false,
         borderColor: 'rgb(0, 0, 100)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Target IRR B2S'],
         data: @json($target_irr_b2s_surakarta),
         fill: false,
         borderColor: 'rgb(255, 125, 0)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Komitmen Collo'],
         data: @json($komitmen_collo_surakarta),
         fill: false,
         borderColor: 'rgb(28, 115, 102)',
         tension: 0.1
         },
         {
         label: ['Komitmen B2S'],
         data: @json($komitmen_b2s_surakarta),
         fill: false,
         borderColor: 'rgb(200, 100, 100)',
         tension: 0.1
         },
     ]
     };
     const tirr_surakartaconfig = {
         type: 'line',
         data: tirr_surakartadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(tirr_surakarta, tirr_surakartaconfig);

     const tirr_yogyakarta = document.getElementById('tirr_yogyakarta').getContext('2d');
     //const labels = Utils.months({count: 7});
     const tirr_yogyakartadata = {
        labels: @json($monthList_IRR_yogyakarta),
         datasets: [
         {
         label: ['B2S'],
         data: @json($b2s_yogyakarta),
         fill: false,
         borderColor: 'rgb(250, 120, 100)',
         tension: 0.1
         },
         {
         label: ['Collo TP'],
         data: @json($collo_tp_yogyakarta),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['Target IRR Collo'],
         data: @json($target_irr_collo_yogyakarta),
         fill: false,
         borderColor: 'rgb(0, 0, 100)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Target IRR B2S'],
         data: @json($target_irr_b2s_yogyakarta),
         fill: false,
         borderColor: 'rgb(255, 125, 0)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Komitmen Collo'],
         data: @json($komitmen_collo_yogyakarta),
         fill: false,
         borderColor: 'rgb(28, 115, 102)',
         tension: 0.1
         },
         {
         label: ['Komitmen B2S'],
         data: @json($komitmen_b2s_yogyakarta),
         fill: false,
         borderColor: 'rgb(200, 100, 100)',
         tension: 0.1
         },
     ]
     };
     const tirr_yogyakartaconfig = {
         type: 'line',
         data: tirr_yogyakartadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(tirr_yogyakarta, tirr_yogyakartaconfig);

     const tirr_purwokerto = document.getElementById('tirr_purwokerto').getContext('2d');
     //const labels = Utils.months({count: 7});
     const tirr_purwokertodata = {
        labels: @json($monthList_IRR_purwokerto),
         datasets: [
         {
         label: ['B2S'],
         data: @json($b2s_purwokerto),
         fill: false,
         borderColor: 'rgb(250, 120, 100)',
         tension: 0.1
         },
         {
         label: ['Collo TP'],
         data: @json($collo_tp_purwokerto),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['Target IRR Collo'],
         data: @json($target_irr_collo_purwokerto),
         fill: false,
         borderColor: 'rgb(0, 0, 100)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Target IRR B2S'],
         data: @json($target_irr_b2s_purwokerto),
         fill: false,
         borderColor: 'rgb(255, 125, 0)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Komitmen Collo'],
         data: @json($komitmen_collo_purwokerto),
         fill: false,
         borderColor: 'rgb(28, 115, 102)',
         tension: 0.1
         },
         {
         label: ['Komitmen B2S'],
         data: @json($komitmen_b2s_purwokerto),
         fill: false,
         borderColor: 'rgb(200, 100, 100)',
         tension: 0.1
         },
     ]
     };
     const tirr_purwokertoconfig = {
         type: 'line',
         data: tirr_purwokertodata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(tirr_purwokerto, tirr_purwokertoconfig);

     const tirr_pekalongan = document.getElementById('tirr_pekalongan').getContext('2d');
     //const labels = Utils.months({count: 7});
     const tirr_pekalongandata = {
        labels: @json($monthList_IRR_pekalongan),
         datasets: [
         {
         label: ['B2S'],
         data: @json($b2s_pekalongan),
         fill: false,
         borderColor: 'rgb(250, 120, 100)',
         tension: 0.1
         },
         {
         label: ['Collo TP'],
         data: @json($collo_tp_pekalongan),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['Target IRR Collo'],
         data: @json($target_irr_collo_pekalongan),
         fill: false,
         borderColor: 'rgb(0, 0, 100)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Target IRR B2S'],
         data: @json($target_irr_b2s_pekalongan),
         fill: false,
         borderColor: 'rgb(255, 125, 0)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Komitmen Collo'],
         data: @json($komitmen_collo_pekalongan),
         fill: false,
         borderColor: 'rgb(28, 115, 102)',
         tension: 0.1
         },
         {
         label: ['Komitmen B2S'],
         data: @json($komitmen_b2s_pekalongan),
         fill: false,
         borderColor: 'rgb(200, 100, 100)',
         tension: 0.1
         },
     ]
     };
     const tirr_pekalonganconfig = {
         type: 'line',
         data: tirr_pekalongandata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(tirr_pekalongan, tirr_pekalonganconfig);

     const tirr_salatiga = document.getElementById('tirr_salatiga').getContext('2d');
     //const labels = Utils.months({count: 7});
     const tirr_salatigadata = {
        labels: @json($monthList_IRR_salatiga),
         datasets: [
         {
         label: ['B2S'],
         data: @json($b2s_salatiga),
         fill: false,
         borderColor: 'rgb(250, 120, 100)',
         tension: 0.1
         },
         {
         label: ['Collo TP'],
         data: @json($collo_tp_salatiga),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['Target IRR Collo'],
         data: @json($target_irr_collo_salatiga),
         fill: false,
         borderColor: 'rgb(0, 0, 100)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Target IRR B2S'],
         data: @json($target_irr_b2s_salatiga),
         fill: false,
         borderColor: 'rgb(255, 125, 0)',
         pointStyle: 'crossRot',
         radius: 7,
         tension: 0.1
         },
         {
         label: ['Komitmen Collo'],
         data: @json($komitmen_collo_salatiga),
         fill: false,
         borderColor: 'rgb(28, 115, 102)',
         tension: 0.1
         },
         {
         label: ['Komitmen B2S'],
         data: @json($komitmen_b2s_salatiga),
         fill: false,
         borderColor: 'rgb(200, 100, 100)',
         tension: 0.1
         },
     ]
     };
     const tirr_salatigaconfig = {
         type: 'line',
         data: tirr_salatigadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(tirr_salatiga, tirr_salatigaconfig);
</script>
