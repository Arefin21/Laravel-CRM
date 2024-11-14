@extends('layouts.subscriber')
@section('title')
    <title>Payment | Subscriber | Women & e-Commerce</title>
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
                        <h4 class="card-title">Payment</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>


                    <div class="card-body">
                      <h3>Dear {{Auth::user()->name}}, You have paid successfully.</h3>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection