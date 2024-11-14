@extends('layouts.subscriber')
@section('title')
    <title>Seminar Details | Subscriber | Women & e-Commerce</title>
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
                        <h4 class="card-title"> {{$subscriptions->title}}</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>

                    <div class="card-body">
                        <div class="col-lg-12 col-md-12">
                            <div class="seminar-workshop-box">

                                <h4 class="seminar-fee"> Fee: {{$subscriptions->fees}} Tk.</h4>
                                {!! $subscriptions->description !!}
                                <br>


                            </div>
                        </div>

                        <div class="form-group col-lg-12 text-center">
                            {{--<form method="POST" action="{{route('seminar-payment-submission')}}">--}}
                            <form method="POST" action="{{route('sub_shurjopay-submission')}}">
                                @csrf
                                <input name="userid" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                                <input name="subscriptionid" type="hidden" value="{{$subscriptions->id}}" class="form-control">
                                <input name="name" type="hidden" value="{{{ Auth::user()->name}}}" class="form-control">
                                <input name="email" type="hidden" value="{{{ Auth::user()->email}}}" class="form-control">
                                <input name="amount" type="hidden" value="{{$subscriptions->fees}}" class="form-control">
                                <input name="subscriber_number" type="hidden" value="WE-SB-{{substr(Auth::user()->country,0,3)}}-{{{Auth::user()->id}}}" class="form-control">
                                <input name="year" type="hidden" value="{{$subscriptions->year}}" class="form-control">

                                    <button type="submit" class="btn btn-primary"><span>Pay Now</span></button>

                            </form>


                        </div>
                    </div>






                </div>
            </div>
        </div>

    </div>
@endsection