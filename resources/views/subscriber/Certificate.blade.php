@extends('layouts.subscriber')
@section('title')
    <title>Certificate | Subscriber | Women & e-Commerce</title>
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
                        <h4 class="card-title">Certificate</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>


                    <div class="card-body">
                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                            <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold "> </small></legend>

                            <div class="form-row">


                                @foreach($subscription_paid_subscriber as $subscription_paid_subscriber)

                                        @if((isset($subscription_fees_submit->userid) and (Auth::user()->id == $subscription_fees_submit->userid)))
                                        <div class="col-md-12 mb-12 mb-6">
                                            <div class="alert alert-info alert-info-custom">
                                                <a href="{{route('Subscription_certificate_details',$subscription_paid_subscriber->subscriptionid)}}" class="btn btn-xs danger pull-right btn-custom-payment">View</a>

                                                {{--{{ \App\Models\SubscriptionFeess::where(['id' => $subscription_fees_submit->subscriptionid])->pluck('title')->first() }} --}}

                                                Subscription Certificate for {{ $subscription_paid_subscriber->year }}

                                                <strong style="color: #8e24aa; float: right; padding-right: 25px"> Certificate </strong>
                                            </div>
                                         @endif
                                        </div>

                                @endforeach

                                @foreach($seminar_paid_subscriber as $seminar_paid_subscriber)
                                    @if(date('Y-m-d') > (\App\Models\Seminar::where(['id' => $seminar_paid_subscriber->seminar_id])->pluck('eventdate')->first()))

                                    {{--@if((isset($subscription_fees_submit->userid) and (Auth::user()->id == $subscription_fees_submit->userid)))--}}
                                    <div class="col-md-12 mb-12 mb-6">
                                        <div class="alert alert-info alert-info-custom">
                                            <a href="{{route('Seminar_certificate_details',$seminar_paid_subscriber->seminar_id)}}" class="btn btn-xs danger pull-right btn-custom-payment">View</a>
                                             {{ \App\Models\Seminar::where(['id' => $seminar_paid_subscriber->seminar_id])->pluck('title')->first() }} <strong style="color: #8e24aa; float: right; padding-right: 25px">   Certificate </strong>
                                        </div>


                                    </div>
                                    @endif
                                @endforeach
                                {{--<div class="col-md-12 mb-12 mb-6">--}}
                                    {{--<div class="alert alert-info alert-info-custom">--}}
                                        {{--<a href="#" class="btn btn-xs danger pull-right btn-custom-payment">Pay Now</a>--}}
                                        {{--2. Seminar On Big Data <strong style="color: #8e24aa; float: right; padding-right: 25px">  (2000 Tk.)</strong>--}}

                                    {{--</div>--}}
                                {{--</div>--}}



                            </div>
                        </fieldset>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection