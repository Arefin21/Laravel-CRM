@extends('layouts.subadmin')
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



                            <div class="add-button text-right">
                                <a href="{{ route('shop.create') }}" class="btn btn-primary text-capitalize"><span>Add Sr Shop</span></a>
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

                                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm" title="Remove"
                                                        onclick="if(confirm('Are you sure you want to delete this item?')) {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $list->id }}').submit();
                                                                }">
                                                    <i class="material-icons">close</i>
                                                </button>

                                                <button type="button" onclick="window.location='{{ route('shop.edit', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="Edit list">
                                                    <i class="material-icons">edit</i>
                                                </button>

                                                <button type="button" onclick="window.location='{{ route('order.list.shop', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="View Order list">
                                                    <i class="material-icons">visibility</i>

                                                </button>
                                                <button type="button" onclick="window.location='{{ route('subadmin.payment.shop', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="View Payment Details">
                                                    <i class="material-icons">credit_card</i>
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

@endsection