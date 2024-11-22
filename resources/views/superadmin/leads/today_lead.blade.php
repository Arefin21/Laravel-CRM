@extends('layouts.superadmin')

@section('title')
    <title>Leads List | CRM</title>
@endsection

@section('main')

<div class="container">
    <h1>Today's Leads</h1>

    @if(isset($message))
        <p>{{ $message }}</p>
    @elseif($todayLeads->isEmpty())
        <p>No leads found for today.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todayLeads as $lead)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->phone }}</td>
                        <td>{{ $lead->company_name }}</td>
                        <td>{{ $lead->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
