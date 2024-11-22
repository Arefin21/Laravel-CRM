@extends('layouts.supportadmin')
@section('title')
    <title>Support Dashboard | CRM | </title>
@endsection

@section('main')
    <div class="content">
        <div class="container-fluid">
            <!-- Summary Cards -->
            <div class="row">
                
            </div>

            <!-- Charts -->
            <div class="row">
                <!-- Daily Sales Chart -->
               <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title text-center">Support Admin</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="dailySalesChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Daily Collections Chart -->
                {{-- <div class="col-md-6"> 
                   <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Daily Collections</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="dailyCollectionsChart"></canvas>
                        </div>
                    </div> 
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- <script>
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
