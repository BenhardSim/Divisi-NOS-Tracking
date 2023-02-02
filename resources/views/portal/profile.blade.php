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
    <div class="col-lg-3">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Profile</h5></a>
            </div>
            <div class="rvc-graph">
                <p>SITE ID : <b> SITE {{ $id }} </b></p>
                <p>SITE NAME : <b> {{ $nama }}</b></p>
                <p>Alamat : <b> {{ $alamat }}</b></p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Document Sertificate</h5></a>
            </div>
            <div class="rvc-graph">
                <p>NO Sertifikat :</p>
                <p>File Name</p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Document HO</h5></a>
            </div>
            <div class="rvc-graph">
                <p>NO HO : </p>
                <p>File Name</p>
            </div>
        </div>
    </div>

        <div class="col-lg-3">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Document IMB</h5></a>
            </div>
            <div class="rvc-graph">
                <p>NO IMB : </p>
                <p>File Name</p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Contract SITE</h5></a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nomor PKS</th>
                    <th scope="col">Awal Sewa</th>
                    <th scope="col">Akhir Sewa</th>
                    <th scope="col">Harga Sewa</th>
                    <th scope="col">Remark</th>
                    <th scope="col">PKS</th>
                  </tr>
                </thead>
              </table>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Comm issue</h5></a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Revenue</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Action</th>
                    <th scope="col">PIC</th>
                    <th scope="col">STATS SITE</th>
                    <th scope="col">Kompensasi</th>
                    <th scope="col">Realisasi</th>
                    <th scope="col">Stats Case</th>
                  </tr>
                </thead>
              </table>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Contract SITE</h5></a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nomor PKS</th>
                    <th scope="col">Awal Sewa</th>
                    <th scope="col">Akhir Sewa</th>
                    <th scope="col">Harga Sewa</th>
                    <th scope="col">Remark</th>
                    <th scope="col">PKS</th>
                  </tr>
                </thead>
              </table>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Imbas Petir</h5></a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SITE ID</th>
                    <th scope="col">Claim ID</th>
                    <th scope="col">Claim</th>
                    <th scope="col">Vendor Name</th>
                    <th scope="col">Demage Notes</th>
                    <th scope="col">Poles Number</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Report Date</th>
                    <th scope="col">Cost Claim</th>
                    <th scope="col">Early status</th>
                    <th scope="col">Final Status</th>
                  </tr>
                </thead>
              </table>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Claim Asset</h5></a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SITE ID</th>
                    <th scope="col">SITE Name</th>
                    <th scope="col">Report Date</th>
                    <th scope="col">Claim Number</th>
                    <th scope="col">Lost Status</th>
                    <th scope="col">Demage Cause</th>
                    <th scope="col">Early Report</th>
                    <th scope="col">Asset Category</th>
                    <th scope="col">Item Type</th>
                    <th scope="col">Quantity</th>
                  </tr>
                </thead>
              </table>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>PBB</h5></a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SITE Name</th>
                    <th scope="col">NOP</th>
                    <th scope="col">NAMA WP</th>
                    <th scope="col">NPWP</th>
                    <th scope="col">KPP</th>
                    <th scope="col">Kelurahan</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Kabupaten</th>
                    <th scope="col">Provinsi</th>
                  </tr>
                </thead>
              </table>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rvc" class="links text-white"><h5>Revenue VS Cost SITE {{ $id }}</h5></a>
            </div>
            <div class="rvc-graph">
                <canvas id="revenue_main"></canvas>
            </div>
        </div>
    </div>


    {{-- profit loss regional   --}}
    <div class="col-lg-6">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/pl" class="links text-white"><h5>Profit Loss SITE {{ $id }}</h5></a>
            </div>
            <div class="rvc-graph">
                <canvas id="profitloss_main"></canvas>
            </div>
        </div>
    </div>

    {{-- Reserved Varcost   --}}
    <div class="col-lg-6">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/rv" class="links text-white"><h5>Reserved Varcost SITE {{ $id }}</h5></a>
            </div>
            <div class="rvc-graph">
                <canvas id="varcost_main"></canvas>
            </div>
        </div>
    </div>

    {{-- Cost BBM --}}
    <div class="col-lg-6">
        <div class="container rvc-stat shadow">
            <div class="rvc-title">
                <a href="/bbm" class="links text-white"><h5>Cost BBM SITE {{ $id }}</h5></a>
            </div>
            <div class="rvc-graph">
                <canvas id="costbbm_main"></canvas>
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

    // varcost graph

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

    // cost BBM

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

    // OPEX

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

    new Chart(opex_main, opex_mainconfig);
</script>