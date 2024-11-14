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
                        <h4 class="card-title">Company Information</h4>
                        <!-- <p class="card-category">Complete your profile</p> -->
                    </div>

                    <form method="POST" action="{{route('CompanyInformation-form')}}">
                        {{--<form method="POST" action="">--}}
                        @csrf
                        <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">


                        <div class="card-body">
                            <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">Company Information </small></legend>

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
                                        <select name="office_district" class="form-control"><option selected>{{$subscriber->office_district}}</option> <option>Dhaka</option><option>Faridpur</option><option>Gazipur</option><option>Gopalganj</option><option>Jamalpur</option><option>Kishoreganj</option><option >Madaripur</option><option>Manikganj</option><option>Munshiganj</option><option>Mymensingh</option><option>Narayanganj</option><option>Narsingdi</option><option>Netrokona</option><option>Rajbari</option><option>Shariatpur</option><option>Sherpur</option><option>Tangail</option><option>Bandarban</option><option>Bogura</option><option>Joypurhat</option><option>Naogaon</option><option>Natore</option><option>Chapainawabganj</option><option>Pabna</option><option>Rajshahi</option><option>Sirajgonj</option><option>Dinajpur</option><option>Gaibandha</option><option>Kurigram</option><option">Lalmonirhat</option><option>Nilphamari</option><option>Panchagarh</option><option>Rangpur</option><option>Thakurgaon</option><option>Barguna</option><option>Barishal</option><option>Bhola</option><option>Jhalokati</option><option>Patuakhali</option><option>Pirojpur</option><option">Bandarban</option><option>Brahmanbaria</option><option>Chandpur</option><option>Chattogram</option><option>Cumilla</option><option>Cox's Bazar</option><option>Feni</option><option>Khagrachhari</option><option>Lakshmipur</option><option>Noakhali</option><option>Rangamati</option><option>Habiganj</option><option>Moulvibazar</option><option>Sunamganj</option><option>Sylhet</option><option>Bagerhat</option><option>Chuadanga</option><option>Jashore</option><option>Jhenaidah</option><option>Khulna</option><option>Kushtia</option><option>Magura</option><option>Meherpur</option><option>Narail</option><option>Satkhira</option></select>
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
                            <div class="form-group col-lg-12 text-center"><button name="" type="submit" class="btn btn-primary"><span>Submit</span></button></div>
                        </div>

                    </form>



                </div>
            </div>
        </div>

    </div>
@endsection