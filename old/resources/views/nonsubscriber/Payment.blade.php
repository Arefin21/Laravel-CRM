@extends('layouts.nonsubscriber')
@section('title')
    <title>Payment | Non Subscriber | Women & e-Commerce</title>
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
                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                            <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold "> </small></legend>

                            <div class="form-row">

                                {{--@foreach($subscription_fees as $subscription_fees)--}}
                                    {{--<div class="col-md-12 mb-12 mb-12">--}}
                                        {{--<a href="{{route('nonSubscriber_subscription_details',$subscription_fees->id)}}">--}}


                                            {{--<div class="alert alert-info alert-info-custom">--}}

                                                {{--@foreach($subscriber_fees_submit as $subscription_fee)--}}
                                                    {{--@if($subscription_fees->id == $subscription_fee->subscriptionid)--}}
                                                        {{--<a class="btn btn-xs danger pull-right btn-custom-seminar">--}}
                                                            {{--Paid--}}
                                                        {{--</a>--}}
                                                    {{--@else--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}

                                                {{--{{$subscription_fees->title}} <strong style="color: #8e24aa; float: right; padding-right: 25px">  ({{$subscription_fees->fees}} Tk.) </strong>--}}

                                            {{--</div>--}}


                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}




                                {{--@foreach($seminar as $seminar)--}}
                                    {{--<div class="col-md-12 mb-12 mb-12">--}}
                                        {{--<a href="{{route('nonSubscriber_seminar_details',$seminar->id)}}">--}}


                                            {{--<div class="alert alert-info alert-info-custom">--}}
                                                {{--@foreach($seminar_fees_submit as $seminarfee)--}}
                                                    {{--@if($seminar->id == $seminarfee->seminar_id)--}}
                                                        {{--<a class="btn btn-xs danger pull-right btn-custom-seminar">--}}
                                                            {{--Paid--}}
                                                        {{--</a>--}}
                                                    {{--@else--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                                {{--{{$seminar->title}} <strong style="color: #8e24aa; float: right; padding-right: 25px">  ({{$seminar->feegeneral}} Tk.) </strong>--}}

                                            {{--</div>--}}


                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                                @foreach($seminar_paid_subscriber as $seminar_paid_subscriber)
                                    <div class="col-md-12 mb-12 mb-12">
                                        <a href="#">


                                            <div class="alert alert-info alert-info-custom">

                                                <a class="btn btn-xs danger pull-right btn-custom-seminar">
                                                    Paid
                                                </a>
                                                {{ \App\Models\Seminar::where(['id' => $seminar_paid_subscriber->seminar_id])->pluck('title')->first() }} <strong style="color: #8e24aa; float: right; padding-right: 25px">  ({{$seminar_paid_subscriber->amount}} Tk.) </strong>

                                            </div>


                                        </a>
                                    </div>
                                @endforeach


                            </div>
                        </fieldset>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection