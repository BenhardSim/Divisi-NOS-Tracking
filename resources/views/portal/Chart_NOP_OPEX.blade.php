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
                    <a href="/bbm" class="links text-white"><h5>OPEX Regional</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="opex_regional"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>OPEX NOP Semarang</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="opex_semarang"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>OPEX NOP Surakarta</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="opex_surakarta"></canvas>
                </div>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>OPEX NOP Yogyakarta</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="opex_yogyakarta"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>OPEX NOP Purwokerto</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="opex_purwokerto"></canvas>
                </div>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>OPEX NOP Pekalongan</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="opex_pekalongan"></canvas>
                </div>
            </div>
        </div> 

        <div class="col-lg-6">
            <div class="container rvc-stat shadow">
                <div class="rvc-title">
                    <a href="/bbm" class="links text-white"><h5>OPEX NOP Salatiga</h5></a>
                </div>
                <div class="rvc-graph">
                    <canvas id="opex_salatiga"></canvas>
                </div>
            </div>
        </div>
    </div>
 @endsection    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 <script type="module">
 const opex_regional = document.getElementById('opex_regional').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_regionaldata = {
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
    const opex_regionalconfig = {
        type: 'pie',
        data: opex_regionaldata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_regional, opex_regionalconfig);


    const opex_semarang = document.getElementById('opex_semarang').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_semarangdata = {
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
    const opex_semarangconfig = {
        type: 'pie',
        data: opex_semarangdata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_semarang, opex_semarangconfig);

    const opex_surakarta = document.getElementById('opex_surakarta').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_surakartadata = {
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
    const opex_surakartaconfig = {
        type: 'pie',
        data: opex_surakartadata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_surakarta, opex_surakartaconfig);

    const opex_yogyakarta = document.getElementById('opex_yogyakarta').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_yogyakartadata = {
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
    const opex_yogyakartaconfig = {
        type: 'pie',
        data: opex_yogyakartadata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_yogyakarta, opex_yogyakartaconfig);

    const opex_purwokerto = document.getElementById('opex_purwokerto').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_purwokertodata = {
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
    const opex_purwokertoconfig = {
        type: 'pie',
        data: opex_purwokertodata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_purwokerto, opex_purwokertoconfig);

    const opex_pekalongan = document.getElementById('opex_pekalongan').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_pekalongandata = {
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
    const opex_pekalonganconfig = {
        type: 'pie',
        data: opex_pekalongandata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_pekalongan, opex_pekalonganconfig);

    const opex_salatiga = document.getElementById('opex_salatiga').getContext('2d');
    //const labels = Utils.months({count: 7});
    const opex_salatigadata = {
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
    const opex_salatigaconfig = {
        type: 'pie',
        data: opex_salatigadata,
        // options: {
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        // }
    };

    new Chart(opex_salatiga, opex_salatigaconfig);
</script>
