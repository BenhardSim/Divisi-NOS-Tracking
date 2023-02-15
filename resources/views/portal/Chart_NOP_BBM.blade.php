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
                    <a href="/bbm" class="links text-white"><h5>Cost BBM Regional</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_regional"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- NOP-Row-1 --}}
    <br><br>
    <div class="col-lg-12 pt-5" style="text-align: center">
        <h5>COST BBM NOP</h5>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Semarang</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_semarang"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Surakarta</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_surakarta"></canvas>
                </div>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Yogyakarta</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_yogyakarta"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Purwokerto</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_purwokerto"></canvas>
                </div>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Pekalongan</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_pekalongan"></canvas>
                </div>
            </div>
        </div> 

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>Cost BBM NOP Salatiga</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_salatiga"></canvas>
                </div>
            </div>
        </div>
    </div>
 @endsection    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 <script type="module">
     const costbbm_regional = document.getElementById('costbbm_regional').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_regionaldata = {
        labels: @json($monthList_BBM),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_regionalconfig = {
         type: 'line',
         data: costbbm_regionaldata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_regional, costbbm_regionalconfig);

     const costbbm_semarang = document.getElementById('costbbm_semarang').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_semarangdata = {
        labels: @json($monthList_BBM_semarang),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_semarang),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_semarang),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_semarang),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_semarangconfig = {
         type: 'line',
         data: costbbm_semarangdata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_semarang, costbbm_semarangconfig);

     const costbbm_surakarta = document.getElementById('costbbm_surakarta').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_surakartadata = {
        labels: @json($monthList_BBM_surakarta),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_surakarta),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_surakarta),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_surakarta),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_surakartaconfig = {
         type: 'line',
         data: costbbm_surakartadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_surakarta, costbbm_surakartaconfig);

     const costbbm_yogyakarta = document.getElementById('costbbm_yogyakarta').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_yogyakartadata = {
        labels: @json($monthList_BBM_yogyakarta),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_yogyakarta),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_yogyakarta),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_yogyakarta),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_yogyakartaconfig = {
         type: 'line',
         data: costbbm_yogyakartadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_yogyakarta, costbbm_yogyakartaconfig);

     const costbbm_purwokerto = document.getElementById('costbbm_purwokerto').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_purwokertodata = {
        labels: @json($monthList_BBM_purwokerto),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_purwokerto),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_purwokerto),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_purwokerto),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_purwokertoconfig = {
         type: 'line',
         data: costbbm_purwokertodata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_purwokerto, costbbm_purwokertoconfig);

     const costbbm_pekalongan = document.getElementById('costbbm_pekalongan').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_pekalongandata = {
        labels: @json($monthList_BBM_pekalongan),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_pekalongan),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_pekalongan),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_pekalongan),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_pekalonganconfig = {
         type: 'line',
         data: costbbm_pekalongandata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_pekalongan, costbbm_pekalonganconfig);

     const costbbm_salatiga = document.getElementById('costbbm_salatiga').getContext('2d');
     //const labels = Utils.months({count: 7});
     const costbbm_salatigadata = {
        labels: @json($monthList_BBM_salatiga),
         datasets: [
         {
         label: ['Cost (dalam ribuan rupiah)'],
         data: @json($value_BBM_total_salatiga),
         fill: false,
         borderColor: 'rgb(100, 100, 255)',
         tension: 0.1
         },
         {
         label: ['Lama Pemakaian (jam)'],
         data: @json($value_BBM_RH_salatiga),
         fill: false,
         borderColor: 'rgb(100, 255, 100)',
         tension: 0.1
         },
         {
         label: ['BBM (Liter)'],
         data: @json($value_BBM_BBM_salatiga),
         fill: false,
         borderColor: 'rgb(255, 100, 100)',
         tension: 0.1
         }
     ]
     };
     const costbbm_salatigaconfig = {
         type: 'line',
         data: costbbm_salatigadata,
         options: {
             scales: {
                 y: {
                 beginAtZero: true
                 }
             }
         }
     };

     new Chart(costbbm_salatiga, costbbm_salatigaconfig);
     
 </script>

