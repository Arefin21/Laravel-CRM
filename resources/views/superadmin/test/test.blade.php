

@extends('layouts.superadmin')
@section('title')
    <title>Leads List | CRM</title>
@endsection
@section('main')




    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary" style="background-color: #f0f0f0; text-align: center;">
                        <h4 class="card-title" style="color: red; font-weight: bold;">Today Client Issue Reported</h4>
                    </div>
                    
                    
                    
                    
                    
                    

                    <!-- data table -->

                    <div class="table-wrapper">
                        <div class="card-body">

                            {{-- <div class="filter-date mb-3">
                                <form method="GET" action="{{ route('admin.leads.index') }}">
                                    <label for="start-date">Start Date:</label>
                                    <input type="date" name="start_date" id="start-date" class="form-control" style="display: inline; width: auto;" value="{{ request('start_date') }}" />
                            
                                    <label for="end-date">End Date:</label>
                                    <input type="date" name="end_date" id="end-date" class="form-control" style="display: inline; width: auto;" value="{{ request('end_date') }}" />
                            
                                    <button type="submit" class="btn btn-primary mt-2">Filter</button>
                                </form>
                            </div> --}}
                            

                            {{-- <div class="add-button text-right">
                                <a href="{{ route('admin.leads.create') }}" class="btn btn-primary text-capitalize"><span>Add Lead</span></a>
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
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Company</th>
                                        <th>Assign By </th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($todayLeads as $key=>$lead)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->phone }}</td>
                                        <td>{{ $lead->company_name }}</td>
                                        <td> {{ \App\Models\User::find($lead->assign_for)->name ?? 'Not Assigned' }} </td> 
                                        <td> Date: {{ formatToBdTime($lead->created_at)['long_date'] }}<br>
                                            Time: {{ formatToBdTime($lead->created_at)['time'] }}
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
