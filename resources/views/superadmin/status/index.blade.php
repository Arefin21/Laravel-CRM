@extends('layouts.superadmin')
@section('title')
    <title>Service List | CRM</title>
@endsection
@section('main')



    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">All Service List</h4>
                    </div>

                    <!-- data table -->

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
                                        <th>Service Type </th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($statuses as $key=>$list)
                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td> {{ $list->name }} </td>
                                        <td class="td-actions text-right">
                                            <form id="delete-form-{{ $list->id }}" action="{{ route('statuses.destroy', $list) }}" method="POST" style="display: none;">
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

                                            <button type="button" onclick="window.location='{{ route('statuses.edit', $list) }}'" rel="tooltip" class="btn btn-primary btn-link btn-sm" title="Edit list">
                                                <i class="material-icons">edit</i>
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







{{-- <a href="{{ route('statuses.create') }}">Add New Status</a>
<ul>
    @foreach ($statuses as $status)
        <li>
            {{ $status->name }}
            <a href="{{ route('statuses.edit', $status) }}">Edit</a>
            <form action="{{ route('statuses.destroy', $status) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul> --}}


