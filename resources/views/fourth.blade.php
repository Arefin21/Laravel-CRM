@extends('Member.Member_master')
@section('title')
    <title>Subscriber Registration Form | Women & e-Commerce</title>
@endsection

{{--<div class="card-body">--}}
{{--@if (session('status'))--}}
{{--<div class="alert alert-success" role="alert">--}}
{{--{{ session('status') }}--}}
{{--</div>--}}
{{--@endif--}}

{{--{{ __('You are logged in!') }}--}}
{{--</div>--}}

@section('signup')

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="row justify-content-md-center">

            <div class="col col-lg-7">
                <div class="card card-4">
                    <div class="card-body">
                        <div >
                            <a style="float:right;" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <h2 class="title">Registration Form</h2>


                        <div class="form-row">
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                            </div>
                            <!--  -->
                            <div class="wizard">
                                <div class="wizard-inner">
                                    <div class="connecting-line"></div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="disabled">
                                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Step 1</i></a>
                                        </li>
                                        <li role="presentation" class="disabled">
                                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Step 2</i></a>
                                        </li>
                                        <li role="presentation" class="disabled">
                                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Step 3</i></a>
                                        </li>
                                        <li role="presentation" class="@if(($subscriber->step1)==1 and ($subscriber->step2)==1 and ($subscriber->step3)==1) active @else disabled @endif">
                                            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Step 4</i></a>
                                        </li>

                                        <li role="presentation" class="disabled">
                                            <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>Step 5</i></a>
                                        </li>

                                        <li role="presentation" class="disabled">
                                            <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i>Step 6</i></a>
                                        </li>


                                    </ul>
                                </div>
                            </div>




                            <div class="tab-content" id="main_form">
                                <!-- step 1 -->
                                <div class="tab-pane" role="tabpanel" id="step1">

                                    <!-- <h4 class="text-center">Personal Information</h4> -->
                                    <form method="POST" action="{{route('registration-form')}}">
                                        {{--<form method="POST" action="">--}}
                                        @csrf

                                        <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                                        <input name="step1" type="hidden" value="1" class="form-control">
                                        <div class="row">
                                            <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                                <legend class="w-50 text-center main-title"><small class="text-uppercase font-weight-bold "> Personal Information</small></legend>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Entrepreneur’s Name </label>
                                                        <span class="requierd-star"></span>
                                                        <input name="entrepreneur_name" type="text" class="form-control" placeholder="Entrepreneur’s Name"
                                                               value="{{ old('entrepreneur_name') }} " required autocomplete="entrepreneur_name" autofocus>
                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Father’s Name </label>
                                                        <span class="requierd-star"></span>
                                                        <input name="fname" type="text" class="form-control"
                                                               value="{{ old('fname') }}" required autocomplete="fname" autofocus>
                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Mother's Name </label>
                                                        <span class="requierd-star"></span>
                                                        <input name="mname" type="text" class="form-control"
                                                               value="{{ old('mname') }}" required autocomplete="mname" autofocus>
                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label class="control-label">Date Of Birth</label>
                                                        <div class="input-group date">
                                                            <input name="dob" class="form-control" type="text" value="{{ old('dob') }}" required autocomplete="dob" autofocus/>
                                                            <span class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </button></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Gender </label>
                                                        <span class="requierd-star"></span>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" value="Male" class="custom-control-input" id="defaultGroupExample1" name="gender" checked>
                                                            <label class="custom-control-label" for="defaultGroupExample1">Male</label>
                                                        </div>

                                                        <!-- Group of default radios - option 2 -->
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" value="Female" class="custom-control-input" id="defaultGroupExample2" name="gender" >
                                                            <label class="custom-control-label" for="defaultGroupExample2">Female</label>
                                                        </div>

                                                        <!-- Group of default radios - option 3 -->
                                                        <div class="custom-control custom-radio">
                                                            <input name="Other" type="radio" class="custom-control-input" id="defaultGroupExample3" name="gender">
                                                            <label class="custom-control-label" for="defaultGroupExample3">Other</label>
                                                        </div>

                                                    </div>


                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Resident Address  </label>
                                                        <span class="requierd-star"></span>

                                                        <textarea name="residentaddress" type="text" class="form-control"
                                                                  required autocomplete="residentaddress" autofocus>{{ old('residentaddress') }} </textarea>
                                                        <!-- <select id="inputState" class="form-control">
                                                          <option selected>Choose...</option>
                                                          <option>...</option>
                                                        </select> -->
                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Permanent Address</label>
                                                        <span class="requierd-star"></span>
                                                        <textarea name="permanentaddress" type="text" class="form-control"
                                                                  required autocomplete="permanentaddress" autofocus>{{ old('permanentaddress') }}</textarea>
                                                    </div>


                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Duel Nationality</label>
                                                        <span class="requierd-star"></span>
                                                        <div class="custom-control custom-radio">
                                                            <input name="duelnationality" type="radio" class="custom-control-input" id="defaultGroupExample21" value="Yes" >
                                                            <label class="custom-control-label" for="defaultGroupExample21">Yes</label>
                                                        </div>

                                                        <!-- Group of default radios - option 3 -->
                                                        <div class="custom-control custom-radio">
                                                            <input  name="duelnationality" type="radio" class="custom-control-input" id="defaultGroupExample5" value="No" checked>
                                                            <label class="custom-control-label" for="defaultGroupExample5">No</label>
                                                        </div>

                                                    </div>


                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013"> District </label>
                                                        <select name="district" class="form-control" required><option>Choose...</option> <option>Dhaka</option><option>Faridpur</option><option>Gazipur</option><option>Gopalganj</option><option>Jamalpur</option><option>Kishoreganj</option><option >Madaripur</option><option>Manikganj</option><option>Munshiganj</option><option>Mymensingh</option><option>Narayanganj</option><option>Narsingdi</option><option>Netrokona</option><option>Rajbari</option><option>Shariatpur</option><option>Sherpur</option><option>Tangail</option><option>Bogura</option><option>Joypurhat</option><option>Naogaon</option><option>Natore</option><option>Chapainawabganj</option><option>Pabna</option><option>Rajshahi</option><option>Sirajgonj</option><option>Dinajpur</option><option>Gaibandha</option><option>Kurigram</option><option">Lalmonirhat</option><option>Nilphamari</option><option>Panchagarh</option><option>Rangpur</option><option>Thakurgaon</option><option>Barguna</option><option>Barishal</option><option>Bhola</option><option>Jhalokati</option><option>Patuakhali</option><option>Pirojpur</option><option">Bandarban</option><option>Brahmanbaria</option><option>Chandpur</option><option>Chattogram</option><option>Cumilla</option><option>Cox's Bazar</option><option>Feni</option><option>Khagrachhari</option><option>Lakshmipur</option><option>Noakhali</option><option>Rangamati</option><option>Habiganj</option><option>Moulvibazar</option><option>Sunamganj</option><option>Sylhet</option><option>Bagerhat</option><option>Chuadanga</option><option>Jashore</option><option>Jhenaidah</option><option>Khulna</option><option>Kushtia</option><option>Magura</option><option>Meherpur</option><option>Narail</option><option>Satkhira</option></select>
                                                    </div>


                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Postal Code</label>
                                                        <span class="requierd-star"></span>
                                                        <input name="postalcode" type="text" class="form-control"
                                                               value="{{ old('postalcode') }}" required autocomplete="postalcode" autofocus>
                                                        @error('postalcode')
                                                        <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Facebook I'd Link </label>
                                                        <span class="requierd-star"></span>
                                                        <input name="facebook" type="text" class="form-control"
                                                               value="{{ old('facebook') }}" required autocomplete="facebook" autofocus>
                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Contact Number </label>
                                                        <span class="requierd-star"></span>
                                                        <input name="contact" type="text" class="form-control"
                                                               value="{{ old('contact') }}" required autocomplete="contact" autofocus>
                                                        @error('contact')
                                                        <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                                        @enderror

                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">E-mail Address  </label>
                                                        <span class="requierd-star"></span>
                                                        <input name="email" type="text" class="form-control"
                                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                        @error('email')
                                                        <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Facebook WE follower since</label>
                                                        <span class="requierd-star"></span>
                                                        <input name="since" type="text" class="form-control"
                                                               value="{{ old('since') }}" required autocomplete="since" autofocus>
                                                    </div>


                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Blood Group </label>
                                                        <span class="requierd-star"></span>
                                                        <select id="inputState" name="bloodgroup" class="form-control">
                                                            <option selected>A+</option>
                                                            <option>B+</option>
                                                            <option>O+</option>
                                                            <option>AB+</option>
                                                            <option>B-</option>
                                                        </select>

                                                    </div>


                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Interested in Donate Blood?  </label>
                                                        <span class="requierd-star"></span>
                                                        <input name="donateblood" type="text" class="form-control"
                                                               value="{{ old('donateblood') }}" required autocomplete="donateblood" autofocus>
                                                    </div>

                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">National Identity/Birth Certificate No </label>
                                                        <span class="requierd-star"></span>
                                                        <input name="nid" type="text" class="form-control"
                                                               value="{{ old('nid') }}" required autocomplete="nid" autofocus>
                                                    </div>
                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Which on You have </label>
                                                        <span class="requierd-star"></span>


                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="form101" name="certificate" value="NID" checked>
                                                            <label class="custom-control-label" for="form101">NID</label>
                                                        </div>

                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="form201" name="certificate" value="BIRTH">
                                                            <label class="custom-control-label" for="form201">Birth Certificate</label>
                                                        </div>


                                                    </div>


                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Marital Status </label>
                                                        <span class="requierd-star"></span>


                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="form10111" name="maritalstatus" value="Married" >
                                                            <label class="custom-control-label" for="form10111">Married</label>
                                                        </div>

                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="form20112121" name="maritalstatus" value="Unmarried" checked>
                                                            <label class="custom-control-label" for="form20112121">Unmarried</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="form301" name="maritalstatus" value="Widow">
                                                            <label class="custom-control-label" for="form301">Widow</label>
                                                        </div>

                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="form401" name="maritalstatus" value="Divorce">
                                                            <label class="custom-control-label" for="form401">Divorce</label>
                                                        </div>



                                                    </div>


                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013">Detail of Passport Number (If any)</label>

                                                        <input name="passport" type="text" class="form-control" value="{{ old('passport') }}" required autocomplete="passport" autofocus>
                                                    </div>


                                                </div>
                                            </fieldset>
                                        </div>
                                        <ul class="list-inline pull-right">
                                            {{--<li><button type="submit" class="default-btn next-step">Continue to next step</button></li>--}}
                                            <li><button type="submit" class="default-btn">Continue to next step</button></li>
                                        </ul>
                                    </form>
                                </div>



                                <!-- step 2 -->
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <!-- <h4 class="text-center">Step 2</h4> -->
                                    <form method="POST" action="{{route('second-form',$subscriber->subscriber_id)}}">
                                        @csrf

                                        <div class="row">
                                            <!--  Details of Family -->

                                            <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                                <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">Details of Family </small></legend>



                                                <div class="form-row">
                                                    <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                                                    <input name="step2" type="hidden" value="1" class="form-control">

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

                                        </div>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="default-btn prev-step">Back</button></li>
                                            <li><button type="submit" class="default-btn next-step">Save</button></li>
                                            {{--<li><button type="button" class="default-btn next-step">Continue</button></li>--}}
                                        </ul>
                                    </form>

                                </div>


                                <!-- step 3 -->

                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <!-- <h4 class="text-center">Step 3</h4> -->
                                    <form method="POST" action="{{route('third-form',$subscriber->subscriber_id)}}">
                                        @csrf
                                        <div class="row">
                                            <!--  Detail of Income & Income Tax -->
                                            <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                                            <input name="step3" type="hidden" value="1" class="form-control">
                                            <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                                <legend class="w-75 text-center main-title"><small class="text-uppercase font-weight-bold ">Detail of Income & Income Tax</small></legend>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationServer013"> Average Annual Income (Estimated) </label>
                                                        <span class="requierd-star"></span>
                                                        <input name="income" type="text" class="form-control"  value="{{$subscriber->income}}"
                                                               required>
                                                        @error('spouse_guardian_contact')
                                                        <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </fieldset>

                                        </div>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="default-btn prev-step">Back</button></li>
                                            <li><button type="submit" class="default-btn next-step">Save</button></li>
                                            {{--<li><button type="button" class="default-btn next-step">Continue</button></li>--}}
                                        </ul>
                                    </form>
                                </div>


                                <!-- step 4 -->

                                <div class="tab-pane @if(($subscriber->step1)==1 and ($subscriber->step2)==1 and ($subscriber->step3)==1) active @else @endif" role="tabpanel" id="step4">
                                    <form method="POST" action="{{route('fourth-form',$subscriber->subscriber_id)}}">

                                        @csrf
                                        <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                                        <input name="step4" type="hidden" value="1" class="form-control">
                                    <div class="row">
                                        <!--  Company Information -->

                                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                            <legend class="w-50 text-center main-title"><small class="text-uppercase font-weight-bold ">Company Information</small></legend>

                                            <div class="form-row">

                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Company Name  </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="company_name" type="text" class="form-control" value="{{$subscriber->company_name}}"
                                                           required>
                                                </div>



                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Office Address  </label>

                                                    <input name="office_address" type="text" class="form-control" value="{{$subscriber->office_address}}" required
                                                    >
                                                </div>



                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> District </label>
                                                    <select name="office_district" class="form-control"><option selected>{{$subscriber->office_district}}</option> <option>Dhaka</option><option>Faridpur</option><option>Gazipur</option><option>Gopalganj</option><option>Jamalpur</option><option>Kishoreganj</option><option >Madaripur</option><option>Manikganj</option><option>Munshiganj</option><option>Mymensingh</option><option>Narayanganj</option><option>Narsingdi</option><option>Netrokona</option><option>Rajbari</option><option>Shariatpur</option><option>Sherpur</option><option>Tangail</option><option>Bogura</option><option>Joypurhat</option><option>Naogaon</option><option>Natore</option><option>Chapainawabganj</option><option>Pabna</option><option>Rajshahi</option><option>Sirajgonj</option><option>Dinajpur</option><option>Gaibandha</option><option>Kurigram</option><option">Lalmonirhat</option><option>Nilphamari</option><option>Panchagarh</option><option>Rangpur</option><option>Thakurgaon</option><option>Barguna</option><option>Barishal</option><option>Bhola</option><option>Jhalokati</option><option>Patuakhali</option><option>Pirojpur</option><option">Bandarban</option><option>Brahmanbaria</option><option>Chandpur</option><option>Chattogram</option><option>Cumilla</option><option>Cox's Bazar</option><option>Feni</option><option>Khagrachhari</option><option>Lakshmipur</option><option>Noakhali</option><option>Rangamati</option><option>Habiganj</option><option>Moulvibazar</option><option>Sunamganj</option><option>Sylhet</option><option>Bagerhat</option><option>Chuadanga</option><option>Jashore</option><option>Jhenaidah</option><option>Khulna</option><option>Kushtia</option><option>Magura</option><option>Meherpur</option><option>Narail</option><option>Satkhira</option></select>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Postal Code  </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="office_postal" type="text" class="form-control" value="{{$subscriber->office_postal}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Phone No. (Office) </label>

                                                    <input name="office_phone" type="text" class="form-control" value="{{$subscriber->office_phone}}">
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Mobile </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="office_mobile" type="text" class="form-control" value="{{$subscriber->office_mobile}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Company Email ID </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="company_email" type="text" class="form-control" value="{{$subscriber->company_email}}"
                                                           required>
                                                    @error('company_email')
                                                    <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                                    @enderror

                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Website (If any) </label>

                                                    <input name="website" type="text" class="form-control" value="{{$subscriber->website}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Company Facebook Page Name</label>
                                                    <span class="requierd-star"></span>
                                                    <input name="company_facebook" type="text" class="form-control" value="{{$subscriber->company_facebook}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013">Company Facebook Page Link  </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="companypagelink" type="text" class="form-control" value="{{$subscriber->companypagelink}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Company Facebook Group Name: (if any)</label>
                                                    <span class="requierd-star"></span>
                                                    <input name="facebook_group" type="text" class="form-control" value="{{$subscriber->facebook_group}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Company Linked-in Link : (if any)  </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="company_linkedin" type="text" class="form-control" value="{{$subscriber->company_linkedin}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Product Category </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="product_category" type="text" class="form-control"  value="{{$subscriber->product_category}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013">Product Name  </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="product" type="text" class="form-control" value="{{$subscriber->product}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Company Establishment Year  </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="company_year" type="text" class="form-control" value="{{$subscriber->company_year}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Annual Average Turnover *  </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="turnover" type="text" class="form-control" value="{{$subscriber->turnover}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Monthly Average Order </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="monthly_order" type="text" class="form-control" value="{{$subscriber->monthly_order}}"
                                                           required>
                                                </div>




                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Business Channel </label>
                                                    <span class="requierd-star"></span>

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample77" name="channel" value="Online" checked >
                                                        <label class="custom-control-label" for="defaultGroupExample77">Online</label>
                                                    </div>

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample88" name="channel" value="Offline">
                                                        <label class="custom-control-label" for="defaultGroupExample88">Offline</label>
                                                    </div>

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample99" name="channel" value="Both">
                                                        <label class="custom-control-label" for="defaultGroupExample99">Both</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Are you interested in Export? </label>
                                                    <span class="requierd-star"></span>

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample7712" value="Yes" name="export" checked>
                                                        <label class="custom-control-label" for="defaultGroupExample7712">Yes</label>
                                                    </div>

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample8877" value="Yes" name="export">
                                                        <label class="custom-control-label" for="defaultGroupExample8877">No</label>
                                                    </div>

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample9009" value="May be" name="export">
                                                        <label class="custom-control-label" for="defaultGroupExample9009">May be</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> WE Involvement (Short Details) * </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="involvement" type="text" class="form-control" value="{{$subscriber->involvement}}"
                                                           required>
                                                </div>


                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Joining Date </label>

                                                    <input name="joining_date" type="text" class="form-control" value="{{$subscriber->joining_date}}"
                                                    >
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Total Sale from WE</label>
                                                    <span class="requierd-star"></span>
                                                    <input name="total_sale" type="text" class="form-control" value="{{$subscriber->total_sale}}"
                                                           required>
                                                </div>



                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013"> Total Post in WE </label>
                                                    <span class="requierd-star"></span>

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample100" name="totalinpost" value="100" checked>
                                                        <label class="custom-control-label" for="defaultGroupExample100">1 to 100</label>
                                                    </div>

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample200" value="200" name="totalinpost">
                                                        <label class="custom-control-label" for="defaultGroupExample200">101 to 200</label>
                                                    </div>

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample300" value="300" name="totalinpost">
                                                        <label class="custom-control-label" for="defaultGroupExample300">201 to 300</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample400" value="400" name="totalinpost">
                                                        <label class="custom-control-label" for="defaultGroupExample400">301 to 400</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="submit" class="default-btn next-step">Save</button></li>
                                        {{--<li><button type="button" class="default-btn next-step">Continue</button></li>--}}
                                    </ul>

                                    </form>
                                </div>





                                <!-- step 5 -->

                                <div class="tab-pane" role="tabpanel" id="step5">
                                    <!-- <h4 class="text-center">Step 5</h4> -->
                                    <div class="row">
                                        <!--  Reference -->

                                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                            <legend class="w-50 text-center main-title"><small class="text-uppercase font-weight-bold ">Reference Name</small></legend>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013">Name of Reference 1 </label>
                                                    <span class="requierd-star"></span>
                                                    <input name="ref1" type="text" class="form-control"
                                                           required>
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                    <label for="validationServer013">Name of Reference 2 </label>
                                                    <input name="ref2" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </fieldset>


                                        <!--   Acceptance Declaration -->
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="submit" class="default-btn next-step">Save</button></li>
                                        {{--<li><button type="button" class="default-btn next-step">Continue</button></li>--}}
                                    </ul>
                                </div>




                                <!-- step 6 -->

                                <div class="tab-pane" role="tabpanel" id="step6">
                                    <!-- <h4 class="text-center">Step 6</h4> -->
                                    <div class="row">
                                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                            <legend class="w-50 text-center main-title"><small class="text-uppercase font-weight-bold "> Acceptance Declaration</small></legend>
                                            <p style="font-size: 13px; text-align: justify; line-height: 20px;">I hereby declare that the details furnished above are true and correct to the best of my knowledge and belief and I undertake to inform you of any changes therein, immediately. In case any of the above information is found to be false or untrue or misleading or misrepresentation, I am aware that I may be held liable for it. I hereby authorize WE to use it for internal usage and member information updating purposes.</p>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-6">
                                                    <label for=""> Please Accept * </label>
                                                    <span class="requierd-star"></span>

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="" name="groupOfDefaultRadios" required>
                                                        <label class="custom-control-label" for="defaultGroupExample2">I Agree</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="submit" class="default-btn next-step">Save</button></li>
                                        {{--<li><button type="button" class="default-btn next-step">Continue</button></li>--}}
                                    </ul>
                                </div>







                            </div>












                        </div>

                        <!--  -->





                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
