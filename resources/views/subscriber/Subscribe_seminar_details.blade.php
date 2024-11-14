@extends('layouts.subscriber')
@section('title')
    <title>Seminar Details | Subscriber | Women & e-Commerce</title>
@endsection

@if(isset($subscriptionfee->userid) == Auth::id())
    @if((isset($subscriber->subscriber_id) == Auth::id() and ($subscriber->status =='active'))  and ($subscriptionfee->updated_at) < \Carbon\Carbon::now()->subDays(365)->toDateTimeString())
        <script>window.location = "{{ route('nonSubscriber_seminar_details',$seminar->id) }}";</script>
    @endif
@endif



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
                            <h4 class="card-title"> {{$seminar->title}}</h4>
                            <!-- <p class="card-category">Complete your profile</p> -->
                        </div>

                    <div class="card-body">
                        <div class="col-lg-12 col-md-12">
                            <div class="seminar-workshop-box">
                                <h3 class="seminar-title-name"> {{$seminar->title}}</h3>


                                <h4 class="seminar-fee"> Fee: {{$seminar->fee}} Tk.</h4>
                                {!! $seminar->details !!}
                                <br>
                                @if($seminar->speaker1 !='')
                                <h3 class="seminar-title-name"><a href=" {!! $seminar->speakerdetails1 !!}" target="_blank">{!! $seminar->speaker1 !!}</a></h3>
                                <br>
                                @endif
                                @if($seminar->speaker2 !='')
                                    <h3 class="seminar-title-name"><a href=" {!! $seminar->speakerdetails2 !!}" target="_blank">{!! $seminar->speaker2 !!}</a></h3>
                                    <br>
                                @endif
                                @if($seminar->speaker3 !='')
                                    <h3 class="seminar-title-name"><a href=" {!! $seminar->speakerdetails3 !!}" target="_blank">{!! $seminar->speaker3 !!}</a></h3>
                                    <br>
                                @endif
                                @if($seminar->speaker4 !='')
                                    <h3 class="seminar-title-name"><a href=" {!! $seminar->speakerdetails4 !!}" target="_blank">{!! $seminar->speaker4 !!}</a></h3>
                                    <br>
                                @endif
                                @if($seminar->speaker5 !='')
                                    <h3 class="seminar-title-name"><a href=" {!! $seminar->speakerdetails5 !!}" target="_blank">{!! $seminar->speaker5 !!}</a></h3>
                                    <br>
                                @endif

                                <!--<h3 class="seminar-fee" style="color:blue">Total Seat : {!! $seminar->seat !!}</h3>-->


                                <h3 class="seminar-fee" style="color:green">Available Seat : {!! $seminar->seat - $seat_count !!}</h3>


                            </div>
                        </div>

                        <div class="form-group col-lg-12 text-center">

                            {{--<form method="POST" action="{{route('seminar-payment-submission')}}">--}}
                            <form method="POST" action="{{route('shurjopay-submission')}}">
                                @csrf
                                <input name="userid" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                                <input name="seminar_id" type="hidden" value="{{$seminar->id}}" class="form-control">
                                <input name="name" type="hidden" value="{{{ Auth::user()->name}}}" class="form-control">
                                <input name="email" type="hidden" value="{{{ Auth::user()->email}}}" class="form-control">
                                <input name="amount" type="hidden" value="{{$seminar->fee}}" class="form-control">
                                @if(($seminar->seat - $seat_count)>0)
                                <button type="submit" class="btn btn-primary"><span>Pay Now</span></button>
                                @else

                                    <h3 class="btn btn-danger"><span>No Seat Available!</span></h3>
                                @endif

                            </form>


                        </div>
                    </div>






                </div>
            </div>
        </div>

    </div>
@endsection