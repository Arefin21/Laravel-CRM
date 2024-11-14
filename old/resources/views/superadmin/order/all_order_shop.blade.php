@extends('layouts.superadmin')
@section('title')
    <title>All Order List | Nurjahan Bazar</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">All Order List</h4>
                    </div>

                    <!-- data table -->

                    <div class="table-wrapper">
                        <div class="card-body">



                            <!--<div class="add-button text-right">-->
                            <!--    <a href="{{ route('sr.category') }}" class="btn btn-primary text-capitalize"><span>New Order</span></a>-->
                            <!--</div>-->

                            <div class="table-responsive">

                                <table id="warehouseTable" class="table table-hover" cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Serial </th>
                                        <th>Order Number </th>
                                        <th> Date </th>
                                        <th> Shop Name </th>
                                        <th> Total Amount </th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order as $key=>$list)
                                        <tr>
                                            <td> {{ $key }} </td>
                                            <td> #{{ $list->id }} </td>
                                            <td> {{ $list->created_at->format('F d, Y') }} </td>
                                            <td> {{ \App\Models\SrShop::where('id', $list->shop_id)->first()->shopName }} </td>
                                            <td> {{ $list->final_total }} </td>
                                            <td class="td-actions text-right">


                                                <button type="button" onclick="window.location='{{ route('admin.order.success', $list->id) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="View Order Details">
                                                    <i class="fas fa-eye"></i>
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
                    {{--                    <script>--}}
                    {{--                        $(document).ready(function() {--}}
                    {{--                            $('#warehouseTable').DataTable();--}}
                    {{--                        });--}}
                    {{--                    </script>--}}
                    <script>
                        $(document).ready(function() {
                            $('#warehouseTable').DataTable({
                                "order": [[ 1, "desc" ]] // Change '1' to the appropriate column index for sorting
                            });
                        });
                    </script>

                </div>
            </div>







        </div>
    </div>

@endsection