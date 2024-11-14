@extends('layouts.superadmin')
@section('title')
    <title>Rejected List | Sub Admin | Women & e-Commerce</title>
@endsection
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Rejected List</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">
                        <a style="float: right; margin: 0px 0 20px 0" href="{{route('reject.userlistexport')}}" class="btn btn-xs danger  btn-custom-payment">Export .xlx</a>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Entrepreneur Name</th>
                                <th>District</th>
                                <th>Email</th>
                                <th>Subscriber Since</th>
                                <th>Company Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rejectedlist as $key=>$pendinglist)
                                <tr>
                                    <td>{{$pendinglist->entrepreneur_name}}</td>
                                    <td>{{$pendinglist->district}}</td>
                                    <td>{{$pendinglist->email}}</td>
                                    <td>{{$pendinglist->since}}</td>
                                    <td>{{$pendinglist->company_name}}</td>
                                    <td><a href="{{route('sub.pending.details',$pendinglist->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a></td>
                                </tr>
                            @endforeach

                            </tfoot>
                        </table>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection