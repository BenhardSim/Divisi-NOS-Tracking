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
            <div class="col-lg-3">
            
            </div>
            <div class="col-lg-6">
                {{-- chart revenue vs cost regional  --}}
                <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost Regional</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main"></canvas>
                    </div>
                </div>
            </div>                    

            <div class="col-lg-3">
                
            </div>

            {{-- NOP-Row-1 --}}
            <br><br>
            <div class="col-lg-12 pt-5" style="text-align: center">
                <h5>Revenue Vs Cost SITE NOP</h5>
            </div>

            <div class="col-lg-6">
                 {{-- chart revenue vs cost regional  --}}
                 <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Semarang</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_1"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                 {{-- chart revenue vs cost regional  --}}
                 <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Surakarta</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6">
                 {{-- chart revenue vs cost regional  --}}
                 <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Yogyakarta</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_3"></canvas>
                    </div>
                </div>
            </div>
             {{-- NOP-Row-2 --}}
            <div class="col-lg-6">
                {{-- chart revenue vs cost regional  --}}
                <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Purwokerto</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_4"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                {{-- chart revenue vs cost regional  --}}
                <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Pekalongan</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_5"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                {{-- chart revenue vs cost regional  --}}
                <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/rvc" class="links text-white"><h5>Revenue VS Cost NOP Salatiga</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="revenue_main_nop_6"></canvas>
                    </div> 
                </div>
            </div>
        </div>
 
    
    
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script type="module">

    // grafik revenue vs cost

    const revvcost_main = document.getElementById('revenue_main').getContext('2d');
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

    // grafik revenue vs cost

    const revvcost_main_nop_1 = document.getElementById('revenue_main_nop_1').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_1 = {
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
    const revvcost_mainConfig_nop_1 = {
        type: 'line',
        data: revvcost_mainData_nop_1,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_1, revvcost_mainConfig_nop_1);

    // grafik revenue vs cost

    const revvcost_main_nop_2 = document.getElementById('revenue_main_nop_2').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_2 = {
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
    const revvcost_mainConfig_nop_2 = {
        type: 'line',
        data: revvcost_mainData_nop_2,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_2, revvcost_mainConfig_nop_2);

    // grafik revenue vs cost

    const revvcost_main_nop_3 = document.getElementById('revenue_main_nop_3').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_3 = {
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
    const revvcost_mainConfig_nop_3 = {
        type: 'line',
        data: revvcost_mainData_nop_3,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_3, revvcost_mainConfig_nop_3);

    // grafik revenue vs cost

    const revvcost_main_nop_4 = document.getElementById('revenue_main_nop_4').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_4 = {
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
    const revvcost_mainConfig_nop_4 = {
        type: 'line',
        data: revvcost_mainData_nop_4,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_4, revvcost_mainConfig_nop_4);

    // grafik revenue vs cost

    const revvcost_main_nop_5 = document.getElementById('revenue_main_nop_5').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_5 = {
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
    const revvcost_mainConfig_nop_5 = {
        type: 'line',
        data: revvcost_mainData_nop_5,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_5, revvcost_mainConfig_nop_5);

    // grafik revenue vs cost

    const revvcost_main_nop_6 = document.getElementById('revenue_main_nop_6').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData_nop_6 = {
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
    const revvcost_mainConfig_nop_6 = {
        type: 'line',
        data: revvcost_mainData_nop_6,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main_nop_6, revvcost_mainConfig_nop_6);

</script>