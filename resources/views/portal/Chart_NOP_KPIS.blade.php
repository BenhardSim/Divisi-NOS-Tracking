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
                    <a href="/kpis" class="links text-white"><h5>KPI Supporting Regional</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_regional"></canvas>
                </div>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpis" class="links text-white"><h5>KPI Supporting Semarang</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_semarang"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpis" class="links text-white"><h5>KPI Supporting Surakarta</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_surakarta"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpis" class="links text-white"><h5>KPI Supporting Yogyakarta</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_yogyakarta"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpis" class="links text-white"><h5>KPI Supporting Purwokerto</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_purwokerto"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpis" class="links text-white"><h5>KPI Supporting Pekalongan</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_pekalongan"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpis" class="links text-white"><h5>KPI Supporting Salatiga</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpis_salatiga"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    
 @endsection    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 <script type="module">
    const kpis_regional = document.getElementById('kpis_regional').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_regionalData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
            {
            type: 'line',
            label: 'Activ KPI Supporting',
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
            label: 'KPI Supporting',
            data: [20, 50, 60 ,110 ,90, 100, 70, 50, 75, 110, 100, 110, 100],
            backgroundColor: '#22aa99'
        },
        
        ]
    };
    const kpis_regionalConfig = {
        type: "bar",
        data: kpis_regionalData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_regional, kpis_regionalConfig);

    const kpis_semarang = document.getElementById('kpis_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_semarangData = {
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
    const kpis_semarangConfig = {
        type: "bar",
        data: kpis_semarangData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_semarang, kpis_semarangConfig);

    const kpis_surakarta = document.getElementById('kpis_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_surakartaData = {
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
    const kpis_surakartaConfig = {
        type: "bar",
        data: kpis_surakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_surakarta, kpis_surakartaConfig);

    const kpis_yogyakarta = document.getElementById('kpis_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_yogyakartaData = {
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
    const kpis_yogyakartaConfig = {
        type: "bar",
        data: kpis_yogyakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_yogyakarta, kpis_yogyakartaConfig);

    const kpis_purwokerto = document.getElementById('kpis_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_purwokertoData = {
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
    const kpis_purwokertoConfig = {
        type: "bar",
        data: kpis_purwokertoData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_purwokerto, kpis_purwokertoConfig);

    const kpis_pekalongan = document.getElementById('kpis_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_pekalonganData = {
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
    const kpis_pekalonganConfig = {
        type: "bar",
        data: kpis_pekalonganData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_pekalongan, kpis_pekalonganConfig);

    const kpis_salatiga = document.getElementById('kpis_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpis_salatigaData = {
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
    const kpis_salatigaConfig = {
        type: "bar",
        data: kpis_salatigaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpis_salatiga, kpis_salatigaConfig);
</script>