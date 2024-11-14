@extends('layouts.subadmin')
@section('title')
    <title>Total Collection | Nurjahan Bazar</title>
@endsection
@section('main')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">All Collection List</h4>
                    </div>

                    <!-- Data Table -->
                    <div class="table-wrapper">
                        <div class="card-body">
                            <div class="filter-date mb-3">
                                <label for="start-date">Start Date:</label>
                                <input type="date" id="start-date" class="form-control" style="display: inline; width: auto;" />

                                <label for="end-date">End Date:</label>
                                <input type="date" id="end-date" class="form-control" style="display: inline; width: auto;" />

                                <button id="filter-button" class="btn btn-primary mt-2">Filter</button>
                            </div>

                            <div class="table-responsive">
                                <table id="warehouseTable" class="table table-hover" cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Date</th>
                                        <th>Payment Amount</th>
                                        <th>Shop Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $payments = \App\Models\Payment::where('user_id', Auth::id())->get();
// Fetch Payment model data
                                    @endphp

                                    @foreach($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->payment_date }}</td> <!-- Payment date -->

                                            <td>{{ $payment->amount }}</td> <!-- Payment amount -->
                                            <td>{{ \App\Models\SrShop::where('id',$payment->shop_id)->first()->shopName }}</td> <!-- Payment amount -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th id="totalOrderAmount">0</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    var table = $('#warehouseTable').DataTable({
                                        "order": [[ 0, "asc" ]] // Sort by the first column (Date)
                                    });

                                    // Filter by date range
                                    $('#filter-button').on('click', function() {
                                        var startDate = new Date($('#start-date').val());
                                        var endDate = new Date($('#end-date').val());

                                        // Clear any previous search
                                        table.search('').draw();

                                        // Apply the date filter
                                        $.fn.dataTable.ext.search.push(
                                            function(settings, data, dataIndex) {
                                                var date = new Date(data[0]); // Date is in the first column
                                                if (
                                                    (isNaN(startDate) && isNaN(endDate)) || // No filter
                                                    (isNaN(startDate) && date <= endDate) || // Start date not set, but end date is set
                                                    (startDate <= date && isNaN(endDate)) || // End date not set, but start date is set
                                                    (startDate <= date && date <= endDate) // Both dates are set
                                                ) {
                                                    return true;
                                                }
                                                return false;
                                            }
                                        );

                                        // Redraw the table with the new filter
                                        table.draw();

                                        // Calculate totals based on filtered rows
                                        calculateTotals();
                                    });

                                    function calculateTotals() {
                                        var totalOrderAmount = 0;

                                        // Iterate through the filtered rows
                                        table.rows({ filter: 'applied' }).every(function() {
                                            var data = this.data();
                                            var paymentAmount = parseFloat(data[1]) || 0; // Payment Amount is in the second column (index 1)
                                            totalOrderAmount += paymentAmount;
                                        });

                                        // Update the totals in the footer
                                        $('#totalOrderAmount').text(totalOrderAmount.toFixed(2));
                                    }

                                    // Initial calculation
                                    calculateTotals();
                                });
                            </script>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
