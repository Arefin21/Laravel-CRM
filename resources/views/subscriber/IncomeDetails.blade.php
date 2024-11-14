@extends('layouts.subscriber')
@section('title')
    <title>Income Details | Subscriber | Women & e-Commerce</title>
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
                        <h4 class="card-title">Detail of Income</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>

                    <form method="POST" action="{{route('incomedetails-form')}}">
                        {{--<form method="POST" action="">--}}
                        @csrf
                        <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">


                        <div class="card-body">
                            <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                <legend class="w-50 text-center main-title"><small class="text-uppercase font-weight-bold ">Detail of Income</small></legend>

                                <div class="form-row" style="display: inline-flex;">
                                    <div class="col-md-12 mb-12">
                                        <label for="validationServer013"> Average Annual Income </label>
                                        <span class="requierd-star"></span>
                                        <input name="income" type="text" class="form-control"  value="{{$subscriber->income}}"
                                               required>
                                    </div>

                                </div>
                            </fieldset>

                            <div class="form-group col-lg-12 text-center"><button  type="submit" class="btn btn-primary"><span>Submit</span></button></div>
                        </div>

                    </form>



                </div>
            </div>
        </div>

    </div>
@endsection