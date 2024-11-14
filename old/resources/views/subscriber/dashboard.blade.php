@extends('layouts.subscriber')
@section('title')
    <title>Dashboard | Subscriber | Women & e-Commerce</title>
@endsection

@section('main')


    {{--@if(isset($subscriptionfee->userid) == Auth::id())--}}
        {{--@if(isset($subscriber->subscriber_id) == Auth::id() and ($subscriber->status =='active'))--}}
            {{--@if(isset($subscriber->step1))--}}
                {{--@if($subscriber->step1 != '')--}}
                    {{--<script>window.location = "{{ route('second_step') }}";</script>--}}
                    {{--<?php exit; ?>--}}
                {{--@endif--}}
            {{--@endif--}}
        {{--@else--}}

        {{--@endif--}}
        {{--@else--}}
        {{--<script>window.location = "{{ route('non-subscriber-dashboard') }}";</script>--}}
    {{--@endif--}}


    {{--@if(isset($subscriptionfee->userid) == Auth::id())--}}
        {{--@if(isset($subscriber->subscriber_id) == Auth::id() and ($subscriber->status =='active')  and ($subscriptionfee->updated_at) > \Carbon\Carbon::now()->subDays(365)->toDateTimeString())--}}
            {{--@if(isset($subscriber->step1))--}}
                {{--@if($subscriber->step1 != '')--}}
                    {{--<script>window.location = "{{ route('second_step') }}";</script>--}}
                    {{--<?php exit; ?>--}}
                {{--@endif--}}
            {{--@endif--}}
        {{--@else--}}
        {{--@endif--}}
    {{--@endif--}}

    {{--@if(isset($subscriptionfee->userid) == Auth::id())--}}
        {{--@if((isset($subscriber->subscriber_id) == Auth::id() and ($subscriber->status =='active'))  and ($subscriptionfee->updated_at) < \Carbon\Carbon::now()->subDays(365)->toDateTimeString())--}}
          {{--<script>window.location = "{{ route('non-subscriber-dashboard') }}";</script>--}}
        {{--@endif--}}
    {{--@endif--}}

    {{--<script>window.location = "{{ route('non-subscriber-dashboard') }}";</script>--}}

    @include('subscriber.redirection')

    @if($subscriber->status != 'active')
    <div class="card-header card-header-primary" style="color:red">
        <h3>We are Reviewing Your Profile...</h3>
        <p>We will inform you soon.</p>
    </div>

    <script>window.location = "{{ route('subscriber-dashboard') }}";</script>


    @else

        <div class="container-fluid">
            <div class="row">
                 <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <a href="https://wedelivery.net" target="_blank">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">send</i>
                                </div>
                                <p class="card-category">WE Delivery</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <a href="{{route('Subscriber.Seminar')}}">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">language</i>
                                </div>
                                <p class="card-category">Seminar & Workshop</p>
                            </div>
                        </a>
                    </div>
                </div>
                
                 <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <a href="{{route('Certificate')}}">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">note</i>
                                </div>
                                <p class="card-category">Certificate</p>
                            </div>
                        </a>
                    </div>
                </div>

             

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <a href="{{route('Payment.history')}}">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">language</i>
                                </div>
                                <p class="card-category">Payment History</p>
                            </div>
                        </a>
                    </div>
                </div>

               
                



            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-success">

                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Announcement</h4>
                            @foreach($announcement as $announcement)
                                <p style="text-align: justify; padding-bottom: 10px" class="card-category">{{$loop->iteration}}, {{$announcement->short}}</p>
                                <a href="{{route('announcement.details',$announcement->slug)}}">View Details</a>
                            @endforeach

                            <div class="dasboard-services">
                                <a style="float:right;text-decoration: none;color: red;font-size: 15px;" href="{{route('announcement.allsub')}}">View All Announcement</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-warning">

                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Events</h4>
                            @foreach($event as $event)
                                <p style="text-align: justify; padding-bottom: 10px" class="card-category">{{$loop->iteration}}, {{$event->short}}</p>
                                <a href="{{route('event.details',$event->slug)}}">View Details</a>
                            @endforeach
                            <div class="dasboard-services">
                                <a style="float:right;text-decoration: none;color: red;font-size: 15px;" href="{{route('event.allsub')}}">View All Events</a>
                            </div>
                        </div>
                        <!-- <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons">access_time</i> campaign sent 2 days ago
                          </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-danger">

                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Notices</h4>
                           @foreach($notice as $notice)
                            <p style="text-align: justify; padding-bottom: 10px" class="card-category">{{$notice->short}}</p>
                               <a href="{{route('notice.details',$notice->slug)}}">View Details</a>
                            @endforeach
                            <div class="dasboard-services">
                                <a style="float:right;text-decoration: none;color: red;font-size: 15px;" href="{{route('notice.allsub')}}">View All Announcement</a>
                            </div>
                            <!-- <p class="card-category">Last Campaign Performance</p> -->
                        </div>
                        <!-- <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons">access_time</i> campaign sent 2 days ago
                          </div>
                        </div> -->
                    </div>
                </div>
            </div>






    </div>
    @endif
@endsection
