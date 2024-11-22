@extends('layouts.superadmin')
@section('title')
    <title>CRM | Client Issue Details</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Issue Details</h4>
                    </div>

                    <!-- data table -->

                    <div class="table-wrapper">
                        <div class="card-body">



{{--                            <div class="add-button text-right">--}}
{{--                                <a href="{{ route('sr.category') }}" class="btn btn-primary text-capitalize"><span>New Order</span></a>--}}
{{--                            </div>--}}

                            <div class="table-responsive">

                                <table id="warehouseTable" class="table table-hover" cellspacing="0" width="100%">
                                    {{-- @foreach($adminlead as $list) --}}
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><strong>Date:</strong></td>
                                            <td>{{ $adminlead->created_at->format('m/d/Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Name:</strong></td>
                                            <td>{{ $adminlead->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Company:</strong></td>
                                            <td>{{ $adminlead->company_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Designation:</strong></td>
                                            <td>{{ $adminlead->designation }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mobile:</strong></td>
                                            <td>{{ $adminlead->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong></td>
                                            <td>{{ $adminlead->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Location:</strong></td>
                                            <td>{{ $adminlead->location }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Service:</strong></td>
                                            <td>{{ \App\Models\Warehouse::find($adminlead->service)->name ?? 'No service found' }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td><strong>Assign For:</strong></td>
                                            <td>
                                              
                                                    {{ $adminlead->assign_for }}
                                                
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td><strong>Assign For:</strong></td>
                                            <td>
                                                @if($adminlead->assignedUser)
                                                    {{ $adminlead->assignedUser->name }}
                                                @else
                                                    Not Assigned
                                                @endif
                                            </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td><strong>Comments:</strong></td>
                                            <td>{{ $adminlead->comments }}</td>
                                        </tr>
                                    </table>
                                    <br> <!-- Adds spacing between tables -->
                                {{-- @endforeach --}}
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