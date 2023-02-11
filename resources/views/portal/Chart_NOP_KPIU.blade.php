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
                    <a href="/kpiu" class="links text-white"><h5>KPI Utama Regional</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_regional"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- NOP-Row-1 --}}
    <br>
    <div class="col-lg-12 pt-5" style="text-align: center">
        <h5>KPI Utama NOP</h5>
    </div>
    

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpiu" class="links text-white"><h5>KPI Utama Semarang</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_semarang"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpiu" class="links text-white"><h5>KPI Utama Surakarta</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_surakarta"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpiu" class="links text-white"><h5>KPI Utama Yogyakarta</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_yogyakarta"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpiu" class="links text-white"><h5>KPI Utama Purwokerto</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_purwokerto"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpiu" class="links text-white"><h5>KPI Utama Pekalongan</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_pekalongan"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpiu" class="links text-white"><h5>KPI Utama Salatiga</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpiu_salatiga"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    
 @endsection    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 <script type="module">
    const kpiu_regional = document.getElementById('kpiu_regional').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_regionalData = {
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
    const kpiu_regionalConfig = {
        type: "bar",
        data: kpiu_regionalData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_regional, kpiu_regionalConfig);

    const kpiu_semarang = document.getElementById('kpiu_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_semarangData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: [85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85],
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_semarangConfig = {
        type: "bar",
        data: kpiu_semarangData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_semarang, kpiu_semarangConfig);

    const kpiu_surakarta = document.getElementById('kpiu_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_surakartaData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: [85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85],
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_surakartaConfig = {
        type: "bar",
        data: kpiu_surakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_surakarta, kpiu_surakartaConfig);

    const kpiu_yogyakarta = document.getElementById('kpiu_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_yogyakartaData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: [85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85],
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_yogyakartaConfig = {
        type: "bar",
        data: kpiu_yogyakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_yogyakarta, kpiu_yogyakartaConfig);

    const kpiu_purwokerto = document.getElementById('kpiu_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_purwokertoData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: [85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85],
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_purwokertoConfig = {
        type: "bar",
        data: kpiu_purwokertoData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_purwokerto, kpiu_purwokertoConfig);

    const kpiu_pekalongan = document.getElementById('kpiu_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_pekalonganData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: [85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85],
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_pekalonganConfig = {
        type: "bar",
        data: kpiu_pekalonganData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_pekalongan, kpiu_pekalonganConfig);

    const kpiu_salatiga = document.getElementById('kpiu_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpiu_salatigaData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            borderColor: '#994499',

        },
        {
            type: 'line',
            label: 'target',
            data: [85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85],
            borderColor: '#316395',

        },
        {
            type: 'bar',
            label: 'KPI Utama',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpiu_salatigaConfig = {
        type: "bar",
        data: kpiu_salatigaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpiu_salatiga, kpiu_salatigaConfig);
</script>
