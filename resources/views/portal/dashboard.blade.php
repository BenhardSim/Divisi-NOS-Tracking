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