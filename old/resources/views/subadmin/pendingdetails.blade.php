@extends('layouts.subadmin')
@section('title')
    <title>{{$subscriber->entrepreneur_name}}'s  Details| Admin | Women & e-Commerce</title>
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
                        <h4 class="card-title">Personal Details</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">
                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                            <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">Personal Information </small></legend>
                            <div class="form-row">
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Entrepreneur’s Name </label>
                                   <p>{{$subscriber->entrepreneur_name}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Father’s Name </label>
                                    <p>{{$subscriber->fname}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Mother's Name </label>
                                    <p>{{$subscriber->mname}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Date Of Birth </label>
                                    <p>{{$subscriber->dob}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Gender </label>
                                    <p>{{$subscriber->gender}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Resident Address </label>
                                    <p>{{$subscriber->residentaddress}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Permanent Address </label>
                                    <p>{{$subscriber->permanentaddress}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Duel Nationality</label>
                                    <p>{{$subscriber->duelnationality}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">District</label>
                                    <p>{{$subscriber->district}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Country</label>
                                    <p>{{$subscriber->country}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Postal Code</label>
                                    <p>{{$subscriber->postalcode}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Facebook I'd Link</label>
                                    <p>{{$subscriber->facebook}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Contact Number</label>
                                    <p>{{$subscriber->contact}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">E-mail Address</label>
                                    <p>{{$subscriber->email}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Facebook WE follower since</label>
                                    <p>{{$subscriber->since}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Blood Group</label>
                                    <p>{{$subscriber->bloodgroup}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Interested in Donate Blood?</label>
                                    <p>{{$subscriber->donateblood}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Interested in Donate Blood?</label>
                                    <p>{{$subscriber->donateblood}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">National Identity/Birth Certificate No</label>
                                    <p>{{$subscriber->certificate}} : {{$subscriber->nid}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Marital Status</label>
                                    <p>{{$subscriber->maritalstatus}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Detail of Passport Number (If any)</label>
                                    <p>{{$subscriber->passport}}</p>
                                </div>

                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Details of Family</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">
                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                            <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">Details of Family </small></legend>
                            <div class="form-row">
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Name Of Spouse/Guardian </label>
                                    <p>{{$subscriber->spouse_guardian}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Contact Number of Spouse/Guardian </label>
                                    <p>{{$subscriber->spouse_guardian_contact}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Occupation of Spouse/Guardian </label>
                                    <p>{{$subscriber->occupation_spouse_guardian}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013"> How Many Children do you have? </label>
                                    <p>{{$subscriber->children}}</p>
                                </div>

                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Detail of Income & Income Tax</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">
                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                            <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">Detail of Income & Income Tax </small></legend>
                            <div class="form-row">
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013"> Average Annual Income </label>
                                    <p>{{$subscriber->income}}</p>
                                </div>



                            </div>
                        </fieldset>


                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">COMPANY INFORMATION</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">
                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                            <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">COMPANY INFORMATION </small></legend>
                            <div class="form-row">
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Company Name </label>
                                    <p>{{$subscriber->company_name}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Office Address  </label>
                                    <p>{{$subscriber->office_address}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">District  </label>
                                    <p>{{$subscriber->office_district}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Postal Code  </label>
                                    <p>{{$subscriber->office_postal}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Phone No. (Office) </label>
                                    <p>{{$subscriber->office_phone}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Mobile </label>
                                    <p>{{$subscriber->office_mobile}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Company Email ID </label>
                                    <p>{{$subscriber->company_email}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013"> Website (If any) </label>
                                    <p>{{$subscriber->website}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Company Facebook Page Name </label>
                                    <p>{{$subscriber->company_facebook}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Company Facebook Page Link </label>
                                    <p>{{$subscriber->companypagelink}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Company Facebook Group Name: (if any) </label>
                                    <p>{{$subscriber->facebook_group}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Company Linked-in Link : (if any) </label>
                                    <p>{{$subscriber->company_linkedin}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Product Category </label>
                                    <p>{{$subscriber->product_category}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Product Name </label>
                                    <p>{{$subscriber->product}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Company Establishment Year </label>
                                    <p>{{$subscriber->company_year}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Annual Average Turnover </label>
                                    <p>{{$subscriber->turnover}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Monthly Average Order</label>
                                    <p>{{$subscriber->monthly_order}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Business Channel</label>
                                    <p>{{$subscriber->channel}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013"> Are you interested in Export?</label>
                                    <p>{{$subscriber->export}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">WE Involvement (Short Details)</label>
                                    <p>{{$subscriber->involvement}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Joining Date</label>
                                    <p>{{$subscriber->joining_date}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Joining Date</label>
                                    <p>{{$subscriber->joining_date}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Total Sale from WE</label>
                                    <p>{{$subscriber->total_sale}}</p>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013">Total Post in WE </label>
                                    <p>{{$subscriber->totalinpost}}</p>
                                </div>

                            </div>
                        </fieldset>



                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Reference Number</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">
                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                            <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">Reference Number</small></legend>
                            <div class="form-row">
                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013"> Name of Reference 1 </label>
                                    <p>{{$subscriber->ref1}}</p>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label for="validationServer013"> Name of Reference 2 </label>
                                    <p>{{$subscriber->ref2}}</p>
                                </div>

                            </div>
                        </fieldset>


                    </div>


                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Subscriber Status</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('sub_status-change',$subscriber->id)}}">
                            {{--<form method="POST" action="">--}}
                            @csrf
                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                            <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">Status</small></legend>
                            <div class="form-row">
                                <div class="col-md-6 mb-6">

                                        <div class="col-md-6 mb-6">
                                            <label for="validationServer013">Status </label>
                                            <span class="requierd-star"></span>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="active" class="custom-control-input" id="defaultGroupExample1" name="status" @if(($subscriber->status)=='active') checked @else @endif>
                                                <label class="custom-control-label" for="defaultGroupExample1">Active</label>
                                            </div>

                                            <!-- Group of default radios - option 2 -->
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="pending" class="custom-control-input" id="defaultGroupExample2" name="status" @if(($subscriber->status)=='pending') checked @else @endif >
                                                <label class="custom-control-label" for="defaultGroupExample2">Pending</label>
                                            </div>

                                            <!-- Group of default radios - option 3 -->
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="defaultGroupExample3" value="rejected" name="status" @if(($subscriber->status)=='rejected') checked @else @endif>
                                                <label class="custom-control-label" for="defaultGroupExample3">Rejected</label>
                                            </div>

                                        <input name="subscription_id" value="{{$id = \App\Models\SubscriptionFeess::orderBy('id', 'DESC')->first()->id}}" type="text">



                                        </div>


                            </div>
                        </fieldset>





                        <div class="form-group col-lg-12 text-center"><button type="submit" class="btn btn-primary"><span>Submit</span></button></div>
                     </form>

                    </div>


                </div>

            </div>
        </div>

    </div>
@endsection