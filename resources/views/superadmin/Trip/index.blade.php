@extends('layouts.superadmin')
@section('title')
    <title>Trip List | Nurjahan Bazar</title>
@endsection

@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">All Trip List</h4>
                    </div>

                    <!-- Data Table -->
                    <div class="table-wrapper">
                        <div class="card-body">
                            <div class="add-button text-right">
                                <a href="{{ route('trip.create') }}" class="btn btn-primary text-capitalize"><span>Add Trip</span></a>
                            </div>

                            <div class="table-responsive">
                                @if(session('successMsg') || session('dangerMsg'))
                                    <div class="alert @if(session('successMsg')) alert-success @else alert-danger @endif alert-dismissible fade show" role="alert">
                                        {{ session('successMsg') ?? session('dangerMsg') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <table id="warehouseTable" class="table table-hover" cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Sl.</th>
                                        <th>
                                            Date to Date
                                            <input type="text" id="startDate" class="form-control" placeholder="Start Date" style="width: 100%;">
                                            <input type="text" id="endDate" class="form-control" placeholder="End Date" style="width: 100%;">
                                        </th>
                                        <th>
                                            Customer Name
                                            <input type="text" id="customerFilter" class="form-control" placeholder="Filter Customer" style="width: 100%;">
                                        </th>
                                        <th>
                                            Driver Name
                                            <input type="text" id="driverFilter" class="form-control" placeholder="Filter Driver" style="width: 100%;">
                                        </th>
                                        <th>
                                            Route Name
                                            <input type="text" id="routeFilter" class="form-control" placeholder="Filter Route" style="width: 100%;">
                                        </th>
                                        <th>Description</th>
                                        <th>Fare</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($driver as $key => $list)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $list->daTe }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ \App\Models\Driver::find($list->driver)->name ?? 'N/A' }}</td>
                                            <td>{{ \App\Models\Route::find($list->route)->name ?? 'N/A' }}</td>
                                            <td>{{ $list->description }}</td>
                                            <td>{{ $list->fare }}</td>
                                            <td class="td-actions text-right">
                                                 <button type="button" onclick="window.location='{{ route('trip.show', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="Print Details">
                                                    <i class="material-icons">print</i>
                                                </button>

                                                <form id="delete-form-{{ $list->id }}" action="{{ route('trip.destroy', $list->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm" title="Remove"
                                                        onclick="if(confirm('Are you sure you want to delete this item?')) {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $list->id }}').submit();
                                                                }">
                                                    <i class="material-icons">close</i>
                                                </button>

                                                <button type="button" onclick="window.location='{{ route('trip.edit', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="Edit list">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="6" class="text-right">Total Fare:</th>
                                        <th class="text-left"><span id="totalFare"></span></th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTable Initialization Script -->
                    <script>
                        $(document).ready(function() {
                            var table = $('#warehouseTable').DataTable({
                                "order": [[1, "desc"]], // Order by the `daTe` column (second column) in descending order
                                "footerCallback": function(row, data, start, end, display) {
                                    var api = this.api();
                                    var totalFare = api
                                        .column(6, { page: 'current' })
                                        .data()
                                        .reduce(function(total, fare) {
                                            return total + parseFloat(fare) || 0;
                                        }, 0);
                                    $('#totalFare').html(totalFare.toFixed(2));
                                },
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                                        extend: 'excelHtml5',
                                        title: 'Trip List',
                                        exportOptions: {
                                            columns: ':visible:not(:last-child)' // Exclude the Action column
                                        },
                                        footer: true,
                                        action: function(e, dt, button, config) {
                                            // Trigger sorting and wait for it to complete
                                            dt.order([[1, 'desc']]).draw();

                                            // Use a slight delay to ensure the order is applied before exporting
                                            setTimeout(function() {
                                                $.fn.dataTable.ext.buttons.excelHtml5.action.call(dt.button(button), e, dt, button, config);
                                            }, 500);
                                        }
                                    }
                                ]

                            });

                            // Date range filtering
                            $.fn.dataTable.ext.search.push(
                                function(settings, data, dataIndex) {
                                    var min = $('#startDate').val();
                                    var max = $('#endDate').val();
                                    var date = data[1]; // Use data for the Date column

                                    if (
                                        (min === '' && max === '') ||
                                        (min === '' && date <= max) ||
                                        (min <= date && max === '') ||
                                        (min <= date && max >= date)
                                    ) {
                                        return true;
                                    }
                                    return false;
                                }
                            );

                            // Event listeners for date range filters
                            $('#startDate, #endDate').on('change', function() {
                                table.draw();
                            });

                            // Other filters
                            $('#customerFilter').on('keyup change', function() {
                                table.columns(2).search(this.value).draw();
                            });

                            $('#driverFilter').on('keyup change', function() {
                                table.columns(3).search(this.value).draw();
                            });

                            $('#routeFilter').on('keyup change', function() {
                                table.columns(4).search(this.value).draw();
                            });
                        });

                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
