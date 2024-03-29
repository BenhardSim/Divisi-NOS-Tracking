@extends('portal.layouts.main')

@section('container')

{{-- title section  --}}
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

{{-- search bar --}}

<div class="form-group container">
    <form action="{{ url('/search') }}" method="GET" role="search" >
        <input value="" name="search" class="form-control" id="exampleFormControlInput1" placeholder="Search By Site ID">
    </form>
</div>
<br>

{{-- profile box --}}
<div class="row container">
    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Profile</h5></a>
            </div>
            <div class="rvc-graph">
                <p>SITE ID   : <b> SITE {{ $site->SITEID }} </b></p>
                <p>SITE NAME : <b> {{ $site->SITENAME }}</b></p>
                <p>Alamat    : <b> {{ $site->ALAMAT }}</b></p>
            </div>
        </div>
    </div>
    

    @if (Request::is("rvc*"))
        <div class="col-lg-12">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/rvc" class="links text-white"><h5>Revenue VS Cost SITE {{ $site->SITEID }}</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="revenue_main"></canvas>
                </div>
            </div>
        </div>
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
        </script>
    @endif
    


    @if (Request::is("bbm*"))
        <div class="col-lg-12">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>Cost BBM SITE {{ $site->SITEID }}</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="costbbm_main"></canvas>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <script type="module">
            const costbbm_main = document.getElementById('costbbm_main').getContext('2d');
            //const labels = Utils.months({count: 7});
            const costbbm_maindata = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [
                {
                label: ['Cost (dalam ribuan rupiah)'],
                data: [65, 59, 80, 81, 56, 55, 40],
                fill: false,
                borderColor: 'rgb(100, 100, 255)',
                tension: 0.1
                },
                {
                label: ['Lama Pemakaian (bulan)'],
                data: [12, 10, 32, 30, 12, 11, 10],
                fill: false,
                borderColor: 'rgb(100, 255, 100)',
                tension: 0.1
                },
                {
                label: ['BBM (Liter)'],
                data: [10, 12, 34, 77, 34, 21, 22],
                fill: false,
                borderColor: 'rgb(255, 100, 100)',
                tension: 0.1
                }
            ]
            };
            const costbbm_mainconfig = {
                type: 'line',
                data: costbbm_maindata,
                options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                }
            };

            new Chart(costbbm_main, costbbm_mainconfig);
        </script>
    @endif

    @if (Request::is("pl*"))
        <div class="col-lg-12">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/pl" class="links text-white"><h5>Profit Loss SITE {{ $site->SITEID }}</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="profitloss_main"></canvas>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <script type="module">
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
        </script>
    @endif
    

    {{-- Reserved Varcost   --}}
    @if (Request::is("rv*"))
        <div class="col-lg-12">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/rv" class="links text-white"><h5>Reserved Varcost SITE {{ $site->SITEID }}</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="varcost_main"></canvas>
                </div>
            </div>
        </div> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <script type="module">
            const varcost_main = document.getElementById('varcost_main').getContext('2d');
            //const labels = Utils.months({count: 7});
            const varcost_maindata = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
                datasets: [
                {
                label: ['PS'],
                data: [120000, 50000, 75000, 22000, 12500, 55000, 40000, 100000, 110000, 120500, 140000, 125000],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
                },
                {
                label: ['RM'],
                data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
                fill: false,
                borderColor: 'rgb(255, 192, 192)',
                tension: 0.1
                }
            ]
            };
            const varcost_mainconfig = {
                type: 'line',
                data: varcost_maindata,
                options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                }
            };

            new Chart(varcost_main, varcost_mainconfig);
        </script>
    @endif

    @if (Request::is("opex*"))
        
    @endif
    

</div>

@endsection


    {{-- // OPEX

    const opex_main = document.getElementById('opex_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_maindata = {
        labels: ['Absorption', 'Accrue', 'Available'],
        datasets: [
        {
        label: ['Data OPEX'],
        data: [90, 50, 18],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        },
    ]
    };
    const opex_mainconfig = {
        type: 'pie',
        data: opex_maindata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_main, opex_mainconfig); --}}
