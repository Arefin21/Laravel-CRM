@extends('layouts.superadmin')
@section('title')
    <title>Shop List | Nurjahan Bazar</title>
@endsection
@section('main')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">All Shop List</h4>
                    </div>

                    <!-- data table -->

                    <div class="table-wrapper">
                        <div class="card-body">

                            <!--<div class="add-button text-right">-->
                            <!--    <a href="{{ route('shop.create') }}" class="btn btn-primary text-capitalize"><span>Add Sr Shop</span></a>-->
                            <!--</div>-->

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
                                        <th>Shop Name </th>
                                        <th>Owner Name </th>
                                        <th>Mobile </th>
                                        <th>Address </th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($srshop as $key=>$list)
                                        <tr>
                                            <td> {{ $key+1 }} </td>
                                            <td> {{ $list->shopName }} </td>
                                            <td> {{ $list->ownerName }} </td>
                                            <td> {{ $list->Mobile }} </td>
                                            <td> {{ $list->Adress }} </td>
                                            <td class="td-actions text-right">
                                                <form id="delete-form-{{ $list->id }}" action="{{ route('shop.destroy', $list->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" onclick="window.location='{{ route('super.payment.shop', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="View Payement Details">
                                                    <i class="material-icons">credit_card</i>
                                                </button>
                                                <button type="button"
                                                        rel="tooltip"
                                                        title="Add Payment"
                                                        class="btn btn-danger btn-link btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#paymentModal"
                                                        data-shop-id="{{ $list->id }}"
                                                        data-sr-id="{{ $list->srId }}"
                                                        data-shop-name="{{ $list->shopName }}">
                                                    <i class="material-icons">attach_money</i>
                                                </button>

                                                <button type="button" onclick="window.location='{{ route('super.list.shop', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="View Order list">
                                                    <i class="material-icons">visibility</i>
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

    <!-- Modal -->
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
                        <input name="shop_id" id="shopId" type="hidden">
                        <input name="sr_id" id="srId" type="hidden">

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <label>Date</label>
                                <span class="required-star"></span>
                                <input type="date" name="payment_date" class="form-control" id="payment_date" required>
                            </div>

                            <div class="col-md-6">
                                <label for="payment-amount">Amount</label>
                                <span class="required-star"></span>
                                <input type="number" name="amount" class="form-control" id="payment_amount" required placeholder="Enter Amount">
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
            // Trigger modal and populate it with shop data
            $('#paymentModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var shopId = button.data('shop-id'); // Extract shop ID
                var srId = button.data('sr-id'); // Extract sr ID
                var shopName = button.data('shop-name'); // Extract shop name

                var modal = $(this);
                modal.find('.modal-title').text('Add Payment for ' + shopName);
                modal.find('#shopId').val(shopId); // Set shop ID in the hidden input
                modal.find('#srId').val(srId); // Set sr ID in the hidden input
            });
        });
    </script>

@endsection
