@extends('layouts.superadmin')
@section('title')
    <title>CRM | Client List</title>
@endsection
@section('main')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Client List</h4>
                    </div>

                    <!-- Data Table -->
                    <div class="table-wrapper">
                        <div class="card-body">
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
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        
                                        <th>Location</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adminlead as $key=>$list)
                                        <tr>
                                            <td> {{ $key+1 }} </td>
                                            <td> {{ $list->name }} </td>
                                            <td> {{ $list->company_name }} </td>
                                            <td> {{ $list->email }} </td>
                                            <td> {{ $list->phone }} </td>
                                            <td> {{ $list->location }} </td>
                                            <td class="td-actions text-right">
                                                {{-- <button type="button" onclick="window.location='{{ route('super.payment.shop', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="View Payment Details">
                                                    <i class="material-icons">credit_card</i>
                                                </button>

                                                <button type="button" rel="tooltip" title="Add Payment" class="btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#paymentModal" data-shop-id="{{ $list->id }}" data-sr-id="{{ $list->srId }}" data-shop-name="{{ $list->shopName }}">
                                                    <i class="material-icons">attach_money</i>
                                                </button>

                                                <button type="button" rel="tooltip" title="Add Opening Account" class="btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#OpeningAccountModal" data-shop-id="{{ $list->id }}" data-sr-id="{{ $list->srId }}" data-shop-name="{{ $list->shopName }}">
                                                    <i class="material-icons">add</i>
                                                </button> --}}

                                                <button type="button" onclick="window.location='{{ route('super.list.shop', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="View Order List">
                                                    <i class="material-icons">visibility</i>
                                                </button>
                                                
                                                    <button type="button" onclick="window.location='{{ route('admin.comment.show', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="Track Customer Interaction">
                                                        <i class="material-icons">comment</i>
                                                    </button>
                                                
                                            </td>
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

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Add Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf
                        <input name="shop_id" id="paymentShopId" type="hidden">
                        <input name="sr_id" id="paymentSrId" type="hidden">

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <label>Date</label>
                                <span class="required-star"></span>
                                <input type="date" name="payment_date" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="payment-amount">Amount</label>
                                <span class="required-star"></span>
                                <input type="number" name="amount" class="form-control" required placeholder="Enter Amount">
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"><span>Submit</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Opening Account Modal -->
    <div class="modal fade" id="OpeningAccountModal" tabindex="-1" role="dialog" aria-labelledby="OpeningAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="OpeningAccountModalLabel">Add Opening Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('opneing.ballance') }}" method="POST">
                        @csrf
                        <input name="shop_id" id="openingShopId" type="hidden">
                        <input name="sr_id" id="openingSrId" type="hidden">
                        <input name="status" value="Opening" type="hidden">

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <label>Date</label>
                                <span class="required-star"></span>
                                <input type="date" name="payment_date" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="payment-amount">Opening Ballance Amount</label>
                                <span class="required-star"></span>
                                <input type="number" name="amount" class="form-control" required placeholder="Enter Amount">
                            </div>
                        </div>

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
            // Trigger Payment Modal and populate data
            $('#paymentModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var shopId = button.data('shop-id');
                var srId = button.data('sr-id');
                var shopName = button.data('shop-name');

                var modal = $(this);
                modal.find('.modal-title').text('Add Payment for ' + shopName);
                modal.find('#paymentShopId').val(shopId);
                modal.find('#paymentSrId').val(srId);
            });

            // Trigger Opening Account Modal and populate data
            $('#OpeningAccountModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var shopId = button.data('shop-id');
                var srId = button.data('sr-id');
                var shopName = button.data('shop-name');

                var modal = $(this);
                modal.find('.modal-title').text('Add Opening Account for ' + shopName);
                modal.find('#openingShopId').val(shopId);
                modal.find('#openingSrId').val(srId);
            });
        });
    </script>

@endsection
