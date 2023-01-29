@extends('portal.layouts.main')

@section('container')

    {{-- title section  --}}
    <div class="mt-4 navbar d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        {{-- <h1 class="h2 mt-4">Welcome back, {{ auth()->user()->name }}</h1> --}}
        <div class="header-title">
            <h3 class="" style="font-weight: normal;">NOS Portal | Dashboard</h3>
        </div>
        <div class="profile-pic">
            <h6>{{ auth()->user()->name }}</h6>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger"><span data-feather="log-out" class="align-text-bottom"></span> Logout</button>
            </form>
        </div>
    </div>
    <div>
        <canvas id="myCharts"></canvas>
    </div>
    <div>
        <canvas id="myCharts2"></canvas>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module">
        const ctx = document.getElementById('myCharts').getContext('2d');
        //const labels = Utils.months({count: 7});
        const data = {
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
        const config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        new Chart(ctx, config);

        const ctx2 = document.getElementById('myCharts2').getContext('2d');
        //const labels = Utils.months({count: 7});
        const data2 = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [
            {
            label: ['My First Dataset'],
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
            },
            {
            label: ['My Second Dataset'],
            data: [65, 59, 85, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(255, 192, 192)',
            tension: 0.1
            }
        ]
        };
        const config2 = {
            type: 'line',
            data: data2,
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        };

        new Chart(ctx2, config);
    </script>
    {{-- site box --}}
    <div class="row">
        <div class="col-lg col-sm">
            <div class="sites">
                <div class="site-title">
                    <h4>SITE ALL</h4>
                </div>
                <div class="site-total">
                    <h1>100</h1>
                </div>
            </div>
        </div>
        <div class="col-lg col-sm">
            <div class="sites">
                <div class="site-title">
                    <h4>SITE TP</h4>
                </div>
                <div class="site-total">
                    <h1>100</h1>
                </div>
            </div>
        </div>
        <div class="col-lg col-sm">
            <div class="sites">
                <div class="site-title">
                    <h4>SITE TELKOM</h4>
                </div>
                <div class="site-total">
                    <h1>100</h1>
                </div>
            </div>
        </div>
        <div class="col-lg col-sm">
            <div class="sites">
                <div class="site-title">
                    <h4>SITE TELKOMSEL</h4>
                </div>
                <div class="site-total">
                    <h1>100</h1>
                </div>
            </div>
        </div>
        <div class="col-lg col-sm">
            <div class="sites">
                <div class="site-title">
                    <h4>SITE RESELLER</h4>
                </div>
                <div class="site-total">
                    <h1>100</h1>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>

    {{-- chart revenue vs cost regional  --}}

    <div class="container rvc-stat">
        <div class="rvc-title">
            <h5>Revenue Vs Cost Regional</h5>
        </div>
        <div class="rvc-graph">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
    <script>
        let ctx = document.getElementById('myChart');
        let labels = Utils.months({count: 7});
        let data = {
        labels: labels,
        datasets: [{
            label: 'My First Dataset',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
        };

        let config = {
            type: 'line',
            data: data,
            options: {
                maintainAspectRatio: false,

            }
        };
        new Chart(ctx, config);
    </script>

    <br><br><br>
    
    {{-- chart revenue vs cost regional  --}}

    <div class="container rvc-stat">
        <div class="rvc-title">
            <h5>Revenue Vs Cost Regional</h5>
        </div>
        <div class="rvc-graph">
            <canvas id="myChart-2"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
    <script>
        let ctx2 = document.getElementById('myChart-2');
        let labels = Utils.months({count: 7});
        let data = {
        labels: labels,
        datasets: [{
            label: 'My First Dataset',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
        };

        let config = {
            type: 'line',
            data: data,
            options: {
                maintainAspectRatio: false,

            }
        };
        new Chart(ctx2, config);
    </script>

    <br><br><br>

@endsection