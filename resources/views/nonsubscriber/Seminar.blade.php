@extends('layouts.nonsubscriber')
@section('title')
    <title>Seminar | Non-Subscriber | Women & e-Commerce</title>
@endsection

@include('nonsubscriber.redirection')

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
                        <h4 class="card-title">All Seminar/Workshop/Training</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>


                    <div class="card-body">
                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                            <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold "> </small></legend>

                            {{--<div class="form-row">--}}

                            {{--@foreach($seminar as $seminar)--}}
                            {{--<div class="col-md-12 mb-12 mb-6">--}}
                            {{--@if (isset($seminar_fees_submit->userid))--}}
                            {{--@if($seminar_fees_submit->userid === Auth::user()->id)--}}
                            {{--<div class="alert alert-info alert-info-custom">--}}
                            {{--<a href="#" class="btn btn-xs success pull-right btn-custom-payment">You have already paid</a>--}}
                            {{--{{ $loop->iteration  }} {{$seminar->title}} <strong style="color: #8e24aa; float: right; padding-right: 25px">  ({{$seminar->fee}} Tk.)</strong>--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            {{--@else--}}
                            {{--<div class="alert alert-info alert-info-custom">--}}
                            {{--<a href="{{route('Subscriber_payment_details','subscribe_details')}}" class="btn btn-xs danger pull-right btn-custom-payment">Pay Now</a>--}}
                            {{--{{ $loop->iteration }} {{$seminar->title}} <strong style="color: #8e24aa; float: right; padding-right: 25px">  ({{$seminar->fee}} Tk.)</strong>--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--@endforeach--}}

                            {{--</div>--}}

                            @foreach($seminar as $seminar)
                            @if(($seminar->eventdate) > (date('Y-m-d')))
                                <a href="{{route('non-Subscriber_seminar_details',$seminar->id)}}">
                                    <div class="col-md-12 mb-12 mb-6">
                                        <div class="alert alert-info alert-info-custom">
                                            @foreach($seminar_fees_submit as $seminarfee)
                                                @if($seminar->id == $seminarfee->seminar_id)
                                                    <a class="btn btn-xs danger pull-right btn-custom-seminar">
                                                        Paid
                                                    </a>
                                                @else
                                                @endif
                                            @endforeach
                                            {{$seminar->title}} <strong style="color: #8e24aa; float: right; padding-right: 25px">  ({{$seminar->feegeneral}} Tk.) </strong>

                                        </div>
                                    </div>
                                </a>
                                @endif
                            @endforeach

                            <div class="form-row">


                                {{--@foreach($seminar as $seminar)--}}

                                {{--<div class="col-md-12 mb-12 mb-6">--}}
                                {{--<div class="alert alert-info alert-info-custom">--}}
                                {{--<a href="{{route('Subscriber_seminar_details',$seminar->id)}}" class="btn btn-xs danger pull-right btn-custom-payment">--}}
                                {{--Pay Now--}}
                                {{--</a>--}}
                                {{--{{ $loop->iteration }} {{$seminar->title}} <strong style="color: #8e24aa; float: right; padding-right: 25px">  ({{$seminar->fee}} Tk.)</strong>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                {{--@endforeach--}}


                            </div>

                        </fieldset>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection