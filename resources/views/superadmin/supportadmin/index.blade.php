@extends('layouts.superadmin')
@section('title')
    <title>Admin List | CRM</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Support Admin </h4>
                    </div>

                    <!-- data table -->

                    <div class="table-wrapper">
                        <div class="card-body">

                            

                            {{-- <div class="add-button text-right">
                                <a href="{{ route('sradd.settings') }}" class="btn btn-primary text-capitalize"><span>Add Admin</span></a>
                            </div> --}}

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
                                        <th> Sl. </th>
                                        <th>Name </th>
                                        <th>Designation </th>
                                        {{-- <th>Email </th> --}}
                                        {{-- <th>Phone </th>
                                        <th>Warehouse </th>
                                        <th>Address </th> --}}
                                        {{-- <th>Admin Photo </th> --}}
                                        {{-- <th>Certificate </th> --}}

                                        <th class="">Action</th>
                                        <th class="">Client List</th>
                                        {{-- <th class="">Issue Notes</th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($supportadmin as $key=>$list)
                                        <tr>
                                            <td> {{ $key+1 }} </td>
                                            <td> {{ $list->name }} </td>
                                            <td> {{ $list->srAddress }} </td>
                                            {{-- <td> {{ $list->eamil }} </td> --}}
                                            {{-- <td> {{ \App\Models\Warehouse::where('id',$list->warehouse)->first() }} </td>
                                            <td> {{ $list->srAddress }} </td>
                                            <td> <img style="height:80px;width: 80px;" src="{{ asset('/') }}{{ $list->image }}"> </td>
                                            <td> <img style="height:80px;width: 80px;" src="{{ asset('/') }}{{ $list->certificate }}"> </td> --}}

                                            <td class="td-actions text-left">
                                                <button type="button" onclick="window.location='{{ route('supportadmin.edit', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="Edit list">
                                                    <i class="material-icons">edit</i>
                                                </button>

{{-- 
                                                <form id="delete-form-{{ $list->id }}" action="{{ route('sr.delete', $list->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm" title="Remove"
                                                        onclick="if(confirm('Are you sure you want to delete this item?')) {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $list->id }}').submit();
                                                                }">
                                                    <i class="material-icons">close</i>
                                                </button> --}}
                                               



                                            </td>
                                            <td>
                                                <button type="button" onclick="window.location='{{ route('single.admin', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="See Client list">
                                                    <i class="material-icons">visibility</i>
                                                </button>
                                            </td>
                                            {{-- <td>
                                                <button type="button" onclick="window.location='{{ route('admin.comment.show', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="Track Customer Interaction">
                                                    <i class="material-icons">comment</i>
                                                </button>
                                            </td> --}}
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTable Initialization Script -->
                    <script>
                        $(document).ready(function() {
                            $('#warehouseTable').DataTable();
                        });
                    </script>


                </div>
            </div>


        </div>
    </div>

    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="priceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="priceModalLabel">Add Quantity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('stock.add') }}" method="POST">
                        @csrf
                        <input name="productId" id="productId" type="hidden">
                        @foreach(\App\Models\Warehouse::all() as $warehouse)
                            <div class="form-row mb-3">
                                <div class="col-md-6">
                                    <label for="warehouse-{{ $warehouse->id }}">Warehouse</label>
                                    <select class="form-control" name="warehouseId[]" id="warehouse-{{ $warehouse->id }}" required>
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="quantity-{{ $warehouse->id }}">Stock</label>
                                    <span class="required-star"></span>
                                    <input type="text" name="quantity[]" class="form-control" id="quantity-{{ $warehouse->id }}" required placeholder="Enter Stock Quantity">
                                </div>

                            </div>
                        @endforeach

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"><span>Submit</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            // Trigger modal and populate it with data from the button
            $('#priceModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var productId = button.data('product-id'); // Extract product ID from data-* attributes
                var productName = button.data('product-name'); // Extract product name

                var modal = $(this);
                modal.find('.modal-title').text('Add Quantity for ' + productName);
                modal.find('#productId').val(productId); // Set product ID in the hidden input
            });
        });
    </script>


@endsection