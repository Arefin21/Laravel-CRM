@extends('layouts.subadmin')
@section('title')
    <title>Dashboard | CRM | </title>
@endsection

@section('main')
    <div class="content">
        <div class="container-fluid">
            <!-- Summary Cards -->
            <div class="row">
                <!-- Total Sale -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title text-center">{{ Auth::user()->name ?? 'Guest' }}</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="dailySalesChart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Total Collection -->
               {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">store</i>
                            </div>
                            <p class="card-category">Total Collection</p>
                            <h3 class="card-title">{{ number_format($totalCollection, 2) }} <small>tk</small></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('sub.total.collection') }}">View More...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Due -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <p class="card-category">Total Due</p>
                            <h3 class="card-title">{{ number_format($totalDue, 2) }} <small>tk</small></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('sub.total.due') }}">View More...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Stock -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Total Stock</p>
                            <h3 class="card-title">{{ $totalStock }} <small>items</small></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="{{ route('product.index') }}">View More...</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            {{-- </div> --}}

            <!-- Charts -->
            {{-- <div class="row"> --}}
                <!-- Daily Sales Chart -->
                {{-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Daily Sales</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="dailySalesChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Daily Collections Chart -->
                <div class="col-md-6"> --}}
                    {{-- <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Daily Collections</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="dailyCollectionsChart"></canvas>
                        </div>
                    </div> --}}
                {{-- </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Daily Sales Chart
        var dailySalesData = @json($dailySales->pluck('total'));
        var dailySalesLabels = @json($dailySales->pluck('date'));

        var dailySalesCtx = document.getElementById('dailySalesChart').getContext('2d');
        new Chart(dailySalesCtx, {
            type: 'line',
            data: {
                labels: dailySalesLabels,
                datasets: [{
                    label: 'Daily Sales (tk)',
                    data: dailySalesData,
                    backgroundColor: 'rgba(0, 200, 83, 0.2)',
                    borderColor: 'rgba(0, 200, 83, 1)',
                    borderWidth: 1
                }]
            }
        });

        // Daily Collections Chart
        var dailyCollectionsData = @json($dailyCollections->pluck('total'));
        var dailyCollectionsLabels = @json($dailyCollections->pluck('date'));

        var dailyCollectionsCtx = document.getElementById('dailyCollectionsChart').getContext('2d');
        new Chart(dailyCollectionsCtx, {
            type: 'line',
            data: {
                labels: dailyCollectionsLabels,
                datasets: [{
                    label: 'Daily Collections (tk)',
                    data: dailyCollectionsData,
                    backgroundColor: 'rgba(255, 193, 7, 0.2)',
                    borderColor: 'rgba(255, 193, 7, 1)',
                    borderWidth: 1
                }]
            }
        });
    </script> --}}
@endsection
