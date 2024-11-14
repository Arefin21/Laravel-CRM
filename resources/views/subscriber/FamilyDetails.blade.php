@extends('layouts.subscriber')
@section('title')
    <title>Family Details | Subscriber | Women & e-Commerce</title>
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
                        <h4 class="card-title">Details of Family</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>

                    <form method="POST" action="{{route('familydetails-form')}}">
                        {{--<form method="POST" action="">--}}
                        @csrf
                        <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">


                        <div class="card-body">
                            <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">Details of Family </small></legend>

                                <div class="form-row">

                                    <div class="col-md-6 mb-6">
                                        <label for="validationServer013"> Name Of Spouse/Guardian </label>
                                        <span class="requierd-star"></span>
                                        <input name="spouse_guardian" type="text" class="form-control" value="{{$subscriber->spouse_guardian}}"
                                               required>
                                    </div>


                                    <div class="col-md-6 mb-6">
                                        <label for="validationServer013"> Contact Number of Spouse/Guardian</label>
                                        <span class="requierd-star"></span>
                                        <input name="spouse_guardian_contact" type="text" class="form-control" value="{{$subscriber->spouse_guardian_contact}}"
                                               required>
                                        @error('spouse_guardian_contact')
                                        <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label for="validationServer013"> Occupation of Spouse/Guardian </label>
                                        <span class="requierd-star"></span>
                                        <input name="occupation_spouse_guardian" type="text" class="form-control" value="{{$subscriber->occupation_spouse_guardian}}"
                                               required>
                                    </div>


                                    <div class="col-md-6 mb-6">
                                        <label for="validationServer013"> How Many Children do you have?</label>
                                        <span class="requierd-star"></span>

                                        <select id="inputState" name="children" class="form-control">
                                            <option selected>{{$subscriber->children}}</option>
                                            <option>No</option>
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                            <option>Four</option>
                                        </select>
                                    </div>

                                </div>
                            </fieldset>
                            <div class="form-group col-lg-12 text-center"><button name="" type="submit" class="btn btn-primary"><span>Submit</span></button></div>
                        </div>

                    </form>



                </div>
            </div>
        </div>

    </div>
@endsection