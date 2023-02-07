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
            {{-- profit loss regional   --}}
            <div class="col-lg-6">
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

             {{-- profit loss NOP   --}}
             <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/pl" class="links text-white"><h5>Profit Loss NOP Semarang</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_1"></canvas>
                    </div>
                </div>
            </div>      

             {{-- profit loss NOP   --}}
             <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/pl" class="links text-white"><h5>Profit Loss NOP Surakarta</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_2"></canvas>
                    </div>
                </div>
            </div>      

             {{-- profit loss NOP   --}}
            <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/pl" class="links text-white"><h5>Profit Loss NOP Yogyakarta</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_3"></canvas>
                    </div>
                </div>
            </div>      

             {{-- NOP-Row-2 --}}
             {{-- profit loss NOP   --}}
             <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/pl" class="links text-white"><h5>Profit Loss NOP Purwokerto</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_4"></canvas>
                    </div>
                </div>
            </div>      

             {{-- profit loss NOP   --}}
             <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/pl" class="links text-white"><h5>Profit Loss NOP Pekalongan</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_5"></canvas>
                    </div>
                </div>
            </div>      

            {{-- profit loss NOP   --}}
            <div class="col-lg-6">
                <div class="container rvc-stat shadow">
                    <div class="rvc-title">
                        <a href="/pl" class="links text-white"><h5>Profit Loss NOP Salatiga</h5></a>
                    </div>
                    <div class="rvc-graph">
                        <canvas id="profitloss_main_NOP_6"></canvas>
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

    // site profit loss NOP 

    const profitloss_main_NOP_1 = document.getElementById('profitloss_main_NOP_1').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_1 = {
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
    const profitloss_mainConfig_NOP_1 = {
        type: 'bar',
        data: profitloss_mainData_NOP_1,
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

    new Chart(profitloss_main_NOP_1, profitloss_mainConfig_NOP_1);

    // site profit loss NOP 

    const profitloss_main_NOP_2 = document.getElementById('profitloss_main_NOP_2').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_2 = {
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
    const profitloss_mainConfig_NOP_2 = {
        type: 'bar',
        data: profitloss_mainData_NOP_2,
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

    new Chart(profitloss_main_NOP_2, profitloss_mainConfig_NOP_2);

    // site profit loss NOP 

    const profitloss_main_NOP_3 = document.getElementById('profitloss_main_NOP_3').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_3 = {
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
    const profitloss_mainConfig_NOP_3 = {
        type: 'bar',
        data: profitloss_mainData_NOP_3,
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

    new Chart(profitloss_main_NOP_3, profitloss_mainConfig_NOP_3);

    // site profit loss NOP 

    const profitloss_main_NOP_4 = document.getElementById('profitloss_main_NOP_4').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_4 = {
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
    const profitloss_mainConfig_NOP_4 = {
        type: 'bar',
        data: profitloss_mainData_NOP_4,
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

    new Chart(profitloss_main_NOP_4, profitloss_mainConfig_NOP_4);

    // site profit loss NOP 

    const profitloss_main_NOP_5 = document.getElementById('profitloss_main_NOP_5').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_5 = {
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
    const profitloss_mainConfig_NOP_5 = {
        type: 'bar',
        data: profitloss_mainData_NOP_5,
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

    new Chart(profitloss_main_NOP_5, profitloss_mainConfig_NOP_5);

    // site profit loss NOP 

    const profitloss_main_NOP_6 = document.getElementById('profitloss_main_NOP_6').getContext('2d');
    //const labels = Utils.months({count: 7});  
    const profitloss_mainData_NOP_6 = {
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
    const profitloss_mainConfig_NOP_6 = {
        type: 'bar',
        data: profitloss_mainData_NOP_6,
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

    new Chart(profitloss_main_NOP_6, profitloss_mainConfig_NOP_6);
    

</script>