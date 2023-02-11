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
                    <a href="/kpia" class="links text-white"><h5>KPI Activity Regional</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_regional"></canvas>
                </div>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpia" class="links text-white"><h5>KPI Activity Semarang</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_semarang"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpia" class="links text-white"><h5>KPI Activity Surakarta</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_surakarta"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpia" class="links text-white"><h5>KPI Activity Yogyakarta</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_yogyakarta"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpia" class="links text-white"><h5>KPI Activity Purwokerto</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_purwokerto"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpia" class="links text-white"><h5>KPI Activity Pekalongan</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_pekalongan"></canvas>
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/kpia" class="links text-white"><h5>KPI Activity Salatiga</h5></a>
                </div>
                <div class="rvc-graph d-flex justify-content-center">
                        <canvas id="kpia_salatiga"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    
 @endsection    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 <script type="module">
    const kpia_regional = document.getElementById('kpia_regional').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_regionalData = {
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
    const kpia_regionalConfig = {
        type: "bar",
        data: kpia_regionalData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_regional, kpia_regionalConfig);

    const kpia_semarang = document.getElementById('kpia_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_semarangData = {
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
    const kpia_semarangConfig = {
        type: "bar",
        data: kpia_semarangData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_semarang, kpia_semarangConfig);

    const kpia_surakarta = document.getElementById('kpia_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_surakartaData = {
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
    const kpia_surakartaConfig = {
        type: "bar",
        data: kpia_surakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_surakarta, kpia_surakartaConfig);

    const kpia_yogyakarta = document.getElementById('kpia_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_yogyakartaData = {
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
    const kpia_yogyakartaConfig = {
        type: "bar",
        data: kpia_yogyakartaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_yogyakarta, kpia_yogyakartaConfig);

    const kpia_purwokerto = document.getElementById('kpia_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_purwokertoData = {
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
    const kpia_purwokertoConfig = {
        type: "bar",
        data: kpia_purwokertoData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_purwokerto, kpia_purwokertoConfig);

    const kpia_pekalongan = document.getElementById('kpia_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_pekalonganData = {
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
    const kpia_pekalonganConfig = {
        type: "bar",
        data: kpia_pekalonganData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_pekalongan, kpia_pekalonganConfig);

    const kpia_salatiga = document.getElementById('kpia_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const kpia_salatigaData = {
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
    const kpia_salatigaConfig = {
        type: "bar",
        data: kpia_salatigaData,
        options: {
            legend: {
                position: 'top' // place legend on the right side of chart
            },
             scales: {
            }
        }
    };

    new Chart(kpia_salatiga, kpia_salatigaConfig);
</script>
