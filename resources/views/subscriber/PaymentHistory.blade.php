@extends('layouts.subscriber')
@section('title')
    <title>Payment History | Subscriber | Women & e-Commerce</title>
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
                        <h4 class="card-title">Payment History</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>


                    <div class="card-body">
                        <div class="form-row">

                            {{--@if (isset($subscription_fees_submit->userid))--}}
                            {{--<div class="col-md-6 mb-12 mb-6">--}}
                                {{--<div class="card card-stats card-payment-custom">--}}
                                    {{--<div class="payment-history-box">--}}
                                        {{--<h2 class="main-title-history">Subscription Fee</h2>--}}
                                        {{--<h3 class="pay-titl-1"> #Success</h3>--}}
                                        {{--<h3 class="pay-titl-2"> {{ Carbon\Carbon::parse($subscription_fees_submit->created_at)->format('Y-m-d') }}</h3>--}}
                                        {{--<h3 class="pay-titl-2">Invoice: #SPF{{$subscription_fees_submit->id}}</h3>--}}
                                        {{--<h3 class="pay-titl-1"> {{$subscription_fees_submit->amount}} Tk.</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="history-button">--}}
                                        {{--<ul>--}}
                                            {{--<li><a href="{{route('Subscriber_payment_Receipt',$subscription_fees_submit->id)}}"> Recipt</a></li>--}}
                                            {{--<li><a href="{{route('Subscriber_payment_invoice',$subscription_fees_submit->id)}}"> Invoice</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                             {{--@endif--}}


                                @foreach($seminar_paid_subscriber as $seminar_paid_subscriber)
                                    <div class="col-md-6 mb-12 mb-6">
                                        <div class="card card-stats card-payment-custom">
                                            <div class="payment-history-box">
                                                <h2 class="main-title-history">{{ \App\Models\Seminar::where(['id' => $seminar_paid_subscriber->seminar_id])->pluck('title')->first() }}</h2>
                                                <h3 class="pay-titl-1"> #Success</h3>
                                                <h3 class="pay-titl-2"> {{ Carbon\Carbon::parse($seminar_paid_subscriber->created_at)->format('Y-m-d') }}</h3>
                                                <h3 class="pay-titl-2">Invoice: #SPF{{$seminar_paid_subscriber->seminar_id}}{{$seminar_paid_subscriber->userid}}</h3>
                                                <h3 class="pay-titl-1"> {{$seminar_paid_subscriber->amount}} Tk.</h3>
                                            </div>
                                            <div class="history-button">
                                                <ul>
                                                    <li><a href="{{route('Seminar_payment_Receipt',$seminar_paid_subscriber->seminar_id)}}"> Recipt</a></li>
                                                    <li><a href="{{route('Seminar_payment_invoice',$seminar_paid_subscriber->seminar_id)}}"> Invoice</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @foreach($subscription_paid_subscriber as $subscription_paid_subscriber)
                                <div class="col-md-6 mb-12 mb-6">
                                    <div class="card card-stats card-payment-custom">
                                        <div class="payment-history-box">
                                            <h2 class="main-title-history">{{ \App\Models\SubscriptionFeess::where(['id' => $subscription_paid_subscriber->subscriptionid])->pluck('title')->first() }}</h2>
                                            <h3 class="pay-titl-1"> #Success</h3>
                                            <h3 class="pay-titl-2"> {{ Carbon\Carbon::parse($subscription_paid_subscriber->created_at)->format('Y-m-d') }}</h3>
                                            <h3 class="pay-titl-2">Invoice: #SPF{{$subscription_paid_subscriber->subscriptionid}}{{$subscription_paid_subscriber->userid}}</h3>
                                            <h3 class="pay-titl-1"> {{$subscription_paid_subscriber->amount}} Tk.</h3>
                                        </div>
                                        <div class="history-button">
                                            <ul>
                                                <li><a href="{{route('Subcription_payment_Receipt',$subscription_paid_subscriber->subscriptionid)}}"> Recipt</a></li>
                                                <li><a href="{{route('Subscription_payment_invoice',$subscription_paid_subscriber->subscriptionid)}}"> Invoice</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach





                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection