@extends('layouts.subadmin')
@section('title')
    <title>Non Subscriber List | Admin | Women & e-Commerce</title>
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
                        <h4 class="card-title">Non Subscriber List</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>

                    <div class="card-body">
                        <a style="float: right; margin: 0px 0 20px 0" href="{{route('sub.userlistexport')}}" class="btn btn-xs danger  btn-custom-payment">Export .xlx</a>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>District</th>
                                {{--<th>Action</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nonsubscriberlist as $key=>$nonsubscriberlist)
                                <tr>
                                    <td>{{$nonsubscriberlist->name}}</td>
                                    <td>{{$nonsubscriberlist->email}}</td>
                                    <td>{{$nonsubscriberlist->mobile}}</td>
                                    <td>{{$nonsubscriberlist->district}}</td>
                                    {{--<td><a href="{{route('user.edit',$userlist->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a></td>--}}
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