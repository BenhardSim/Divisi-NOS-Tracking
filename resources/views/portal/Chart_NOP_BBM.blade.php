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

