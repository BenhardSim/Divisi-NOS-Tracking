@extends('portal.layouts.main')

@section('container')
<div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
    <div class="header-title">
        <h3 class="" style="font-weight: normal;">NOS Portal | {{ $title }}</h3>
    </div>
    <div class="profile-pic">
        <h6>{{ auth()->user()->name }}</h6>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger"><span data-feather="log-out" class="align-text-bottom"></span> Logout</button>
        </form>
    </div>
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
                        <a href="/pl" class="links text-white"><h5>Profit Loss Regional</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main"></canvas>
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

   // site profit loss regional 

   const profitloss_main = document.getElementById('profitloss_main').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
        {
            label: 'High Profit',
            data: [1000, 1030, 1010 ,1010 ,1020, 1050, 1030, 1020, 1000, 1020, 1040, 1030, 1020],
            backgroundColor: '#22aa99'
        },
        {
            label: 'Profit',
            data: [110, 100, 105 ,110 ,90, 100, 90, 105, 110, 110, 100, 110, 100],
            backgroundColor: '#994499'
        },
        {
            label: 'Loss',
            data: [10, 13,12 ,11 ,10, 10, 13, 12, 10, 10, 140, 10, 10],
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