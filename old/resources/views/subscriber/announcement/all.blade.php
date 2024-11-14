@extends('layouts.subscriber')
@section('title')
    <title>Dashboard | Subscriber | Women & e-Commerce</title>
@endsection

@section('main')

    @if(isset($subscriptionfee->userid) == Auth::id())
        @if(isset($subscriber->subscriber_id) == Auth::id() and ($subscriber->status =='active'))
            @if(isset($subscriber->step1))
                @if($subscriber->step1 != '')
                    <script>window.location = "{{ route('second_step') }}";</script>
                    <?php exit; ?>
                @endif
            @endif
        @else

        @endif
    @endif
    @if(isset($subscriber->subscriber_id) == Auth::id() and ($subscriber->status !='active'))
        <div class="card-header card-header-primary" style="color:red">
            <h3>We are Reviewing Your Profile...</h3>
            <p>We will inform you soon.</p>
        </div>
    @endif



    <div class="container-fluid">


        <div class="row">
            <div class="col-md-12">
                <div class="card card-chart">
                    <div class="card-header card-header-success">

                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Announcement</h4>
                        @foreach($announcement as $announcement)
                            <p style="text-align: justify; padding-bottom: 10px" class="card-category">{{$loop->iteration}}, {{$announcement->short}}</p>
                            <a href="{{route('announcement.details',$announcement->slug)}}">View Details</a>
                        @endforeach


                    </div>

                </div>
            </div>

        </div>






    </div>
@endsection
