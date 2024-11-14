@extends('layouts.nonsubscriber')
@section('title')
    <title>Registration | Non Subscriber| Women & e-Commerce</title>
@endsection

@section('main')



        <div class="container-fluid">
            <div class="row">

                <div class="page-wrapper bg-gra-02 p-t-130" style="width: 100%">
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
                                                    <li role="presentation" class="@if(($subscriber->step1)==1) active @else disabled @endif">
                                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Step 2</i></a>
                                                    </li>
                                                    <li role="presentation" class="@if(($subscriber->step1)==2) active @else disabled @endif">
                                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Step 3</i></a>
                                                    </li>
                                                    <li role="presentation" class="@if(($subscriber->step1)==3) active @else disabled @endif">
                                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Step 4</i></a>
                                                    </li>

                                                    <li role="presentation" class="@if(($subscriber->step1)==4) active @else disabled @endif">
                                                        <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>Step 5</i></a>
                                                    </li>

                                                    <li role="presentation" class="@if(($subscriber->step1)==5) active @else disabled @endif">
                                                        <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i>Step 6</i></a>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>




                                        <div class="tab-content" id="main_form">
                                            <!-- step 1 -->
                                            <div class="tab-pane" role="tabpanel" id="step1">

                                                <!-- <h4 class="text-center">Personal Information</h4> -->
                                                <form method="POST" action="{{route('nonfirst-form')}}">
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
                                                                           value="{{$subscriber->entrepreneur_name}}" required autocomplete="entrepreneur_name" autofocus>
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Father’s Name </label>
                                                                    <span class="requierd-star"></span>
                                                                    <input name="fname" type="text" class="form-control"
                                                                           value="{{$subscriber->fname}}" required autocomplete="fname" autofocus>
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Mother's Name </label>
                                                                    <span class="requierd-star"></span>
                                                                    <input name="mname" type="text" class="form-control"
                                                                           value="{{$subscriber->mname}}" required autocomplete="mname" autofocus>
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label class="control-label">Date Of Birth</label>
                                                                    <div class="input-group date">
                                                                        <input name="dob" class="form-control" type="text" value="{{$subscriber->dob}}" required autocomplete="dob" autofocus/>
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
                                                                        <input type="radio" value="Male" class="custom-control-input" id="defaultGroupExample1" name="gender" @if(($subscriber->gender)=='Male') checked @else @endif>
                                                                        <label class="custom-control-label" for="defaultGroupExample1">Male</label>
                                                                    </div>

                                                                    <!-- Group of default radios - option 2 -->
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" value="Female" class="custom-control-input" id="defaultGroupExample2" name="gender" @if(($subscriber->gender)=='Female') checked @else @endif >
                                                                        <label class="custom-control-label" for="defaultGroupExample2">Female</label>
                                                                    </div>

                                                                    <!-- Group of default radios - option 3 -->
                                                                    <div class="custom-control custom-radio">
                                                                        <input name="Other" type="radio" class="custom-control-input" id="defaultGroupExample3" name="gender" @if(($subscriber->gender)=='Other') checked @else @endif>
                                                                        <label class="custom-control-label" for="defaultGroupExample3">Other</label>
                                                                    </div>

                                                                </div>


                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Resident Address  </label>
                                                                    <span class="requierd-star"></span>

                                                                    <textarea name="residentaddress" type="text" class="form-control"
                                                                              required autocomplete="residentaddress" autofocus>{{$subscriber->residentaddress}}</textarea>
                                                                    <!-- <select id="inputState" class="form-control">
                                                                      <option selected>Choose...</option>
                                                                      <option>...</option>
                                                                    </select> -->
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Permanent Address</label>
                                                                    <span class="requierd-star"></span>
                                                                    <textarea name="permanentaddress" type="text" class="form-control"
                                                                              required autocomplete="permanentaddress" autofocus>{{$subscriber->permanentaddress}}</textarea>
                                                                </div>


                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Duel Nationality</label>
                                                                    <span class="requierd-star"></span>
                                                                    <div class="custom-control custom-radio">
                                                                        <input name="duelnationality" type="radio" class="custom-control-input" id="defaultGroupExample21" value="Yes" @if(($subscriber->duelnationality)=='Yes') checked @else @endif>
                                                                        <label class="custom-control-label" for="defaultGroupExample21">Yes</label>
                                                                    </div>

                                                                    <!-- Group of default radios - option 3 -->
                                                                    <div class="custom-control custom-radio">
                                                                        <input  name="duelnationality" type="radio" class="custom-control-input" id="defaultGroupExample5" value="No" @if(($subscriber->duelnationality)=='No') checked @else @endif>
                                                                        <label class="custom-control-label" for="defaultGroupExample5">No</label>
                                                                    </div>

                                                                </div>


                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013"> District </label>
                                                                    <select name="district" class="form-control" required><option selected>{{$subscriber->district}}<option>Choose...</option> <option>Dhaka</option><option>Faridpur</option><option>Gazipur</option><option>Gopalganj</option><option>Jamalpur</option><option>Kishoreganj</option><option >Madaripur</option><option>Manikganj</option><option>Munshiganj</option><option>Mymensingh</option><option>Narayanganj</option><option>Narsingdi</option><option>Netrokona</option><option>Rajbari</option><option>Shariatpur</option><option>Sherpur</option><option>Tangail</option><option>Bandarban</option><option>Bogura</option><option>Joypurhat</option><option>Naogaon</option><option>Natore</option><option>Chapainawabganj</option><option>Pabna</option><option>Rajshahi</option><option>Sirajgonj</option><option>Dinajpur</option><option>Gaibandha</option><option>Kurigram</option><option>Lalmonirhat</option><option>Nilphamari</option><option>Panchagarh</option><option>Rangpur</option><option>Thakurgaon</option><option>Barguna</option><option>Barishal</option><option>Bhola</option><option>Jhalokati</option><option>Patuakhali</option><option>Pirojpur</option><option>Bandarban</option><option>Brahmanbaria</option><option>Chandpur</option><option>Chattogram</option><option>Cumilla</option><option>Cox's Bazar</option><option>Feni</option><option>Khagrachhari</option><option>Lakshmipur</option><option>Noakhali</option><option>Rangamati</option><option>Habiganj</option><option>Moulvibazar</option><option>Sunamganj</option><option>Sylhet</option><option>Bagerhat</option><option>Chuadanga</option><option>Jashore</option><option>Jhenaidah</option><option>Khulna</option><option>Kushtia</option><option>Magura</option><option>Meherpur</option><option>Narail</option><option>Satkhira</option></select>
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013"> Country </label>
                                                                    <select id="country" name="country" class="form-control" required>
                                                                        <option selected>{{$subscriber->country}}</option>
                                                                        <option>Choose...</option>
                                                                        <option value="Afghanistan">Afghanistan</option>
                                                                        <option value="Åland Islands">Åland Islands</option>
                                                                        <option value="Albania">Albania</option>
                                                                        <option value="Algeria">Algeria</option>
                                                                        <option value="American Samoa">American Samoa</option>
                                                                        <option value="Andorra">Andorra</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Antarctica">Antarctica</option>
                                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                        <option value="Argentina">Argentina</option>
                                                                        <option value="Armenia">Armenia</option>
                                                                        <option value="Aruba">Aruba</option>
                                                                        <option value="Australia">Australia</option>
                                                                        <option value="Austria">Austria</option>
                                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                                        <option value="Bahamas">Bahamas</option>
                                                                        <option value="Bahrain">Bahrain</option>
                                                                        <option value="Bangladesh">Bangladesh</option>
                                                                        <option value="Barbados">Barbados</option>
                                                                        <option value="Belarus">Belarus</option>
                                                                        <option value="Belgium">Belgium</option>
                                                                        <option value="Belize">Belize</option>
                                                                        <option value="Benin">Benin</option>
                                                                        <option value="Bermuda">Bermuda</option>
                                                                        <option value="Bhutan">Bhutan</option>
                                                                        <option value="Bolivia">Bolivia</option>
                                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                                        <option value="Brazil">Brazil</option>
                                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                                        <option value="Bulgaria">Bulgaria</option>
                                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Cambodia">Cambodia</option>
                                                                        <option value="Cameroon">Cameroon</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Cape Verde">Cape Verde</option>
                                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                                        <option value="Central African Republic">Central African Republic</option>
                                                                        <option value="Chad">Chad</option>
                                                                        <option value="Chile">Chile</option>
                                                                        <option value="China">China</option>
                                                                        <option value="Christmas Island">Christmas Island</option>
                                                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                        <option value="Colombia">Colombia</option>
                                                                        <option value="Comoros">Comoros</option>
                                                                        <option value="Congo">Congo</option>
                                                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                                        <option value="Cook Islands">Cook Islands</option>
                                                                        <option value="Costa Rica">Costa Rica</option>
                                                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                                        <option value="Croatia">Croatia</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Cyprus">Cyprus</option>
                                                                        <option value="Czech Republic">Czech Republic</option>
                                                                        <option value="Denmark">Denmark</option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominica">Dominica</option>
                                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                                        <option value="Ecuador">Ecuador</option>
                                                                        <option value="Egypt">Egypt</option>
                                                                        <option value="El Salvador">El Salvador</option>
                                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                        <option value="Eritrea">Eritrea</option>
                                                                        <option value="Estonia">Estonia</option>
                                                                        <option value="Ethiopia">Ethiopia</option>
                                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                                        <option value="Fiji">Fiji</option>
                                                                        <option value="Finland">Finland</option>
                                                                        <option value="France">France</option>
                                                                        <option value="French Guiana">French Guiana</option>
                                                                        <option value="French Polynesia">French Polynesia</option>
                                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                                        <option value="Gabon">Gabon</option>
                                                                        <option value="Gambia">Gambia</option>
                                                                        <option value="Georgia">Georgia</option>
                                                                        <option value="Germany">Germany</option>
                                                                        <option value="Ghana">Ghana</option>
                                                                        <option value="Gibraltar">Gibraltar</option>
                                                                        <option value="Greece">Greece</option>
                                                                        <option value="Greenland">Greenland</option>
                                                                        <option value="Grenada">Grenada</option>
                                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                                        <option value="Guam">Guam</option>
                                                                        <option value="Guatemala">Guatemala</option>
                                                                        <option value="Guernsey">Guernsey</option>
                                                                        <option value="Guinea">Guinea</option>
                                                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong Kong">Hong Kong</option>
                                                                        <option value="Hungary">Hungary</option>
                                                                        <option value="Iceland">Iceland</option>
                                                                        <option value="India">India</option>
                                                                        <option value="Indonesia">Indonesia</option>
                                                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                                        <option value="Iraq">Iraq</option>
                                                                        <option value="Ireland">Ireland</option>
                                                                        <option value="Isle of Man">Isle of Man</option>
                                                                        <option value="Israel">Israel</option>
                                                                        <option value="Italy">Italy</option>
                                                                        <option value="Jamaica">Jamaica</option>
                                                                        <option value="Japan">Japan</option>
                                                                        <option value="Jersey">Jersey</option>
                                                                        <option value="Jordan">Jordan</option>
                                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                                        <option value="Kenya">Kenya</option>
                                                                        <option value="Kiribati">Kiribati</option>
                                                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                                                        <option value="Kuwait">Kuwait</option>
                                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                                        <option value="Latvia">Latvia</option>
                                                                        <option value="Lebanon">Lebanon</option>
                                                                        <option value="Lesotho">Lesotho</option>
                                                                        <option value="Liberia">Liberia</option>
                                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                                        <option value="Lithuania">Lithuania</option>
                                                                        <option value="Luxembourg">Luxembourg</option>
                                                                        <option value="Macao">Macao</option>
                                                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                                        <option value="Madagascar">Madagascar</option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Malaysia">Malaysia</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malta">Malta</option>
                                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                                        <option value="Martinique">Martinique</option>
                                                                        <option value="Mauritania">Mauritania</option>
                                                                        <option value="Mauritius">Mauritius</option>
                                                                        <option value="Mayotte">Mayotte</option>
                                                                        <option value="Mexico">Mexico</option>
                                                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                                        <option value="Monaco">Monaco</option>
                                                                        <option value="Mongolia">Mongolia</option>
                                                                        <option value="Montenegro">Montenegro</option>
                                                                        <option value="Montserrat">Montserrat</option>
                                                                        <option value="Morocco">Morocco</option>
                                                                        <option value="Mozambique">Mozambique</option>
                                                                        <option value="Myanmar">Myanmar</option>
                                                                        <option value="Namibia">Namibia</option>
                                                                        <option value="Nauru">Nauru</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Netherlands">Netherlands</option>
                                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                                        <option value="New Caledonia">New Caledonia</option>
                                                                        <option value="New Zealand">New Zealand</option>
                                                                        <option value="Nicaragua">Nicaragua</option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="Niue">Niue</option>
                                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                        <option value="Norway">Norway</option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Palau">Palau</option>
                                                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Peru">Peru</option>
                                                                        <option value="Philippines">Philippines</option>
                                                                        <option value="Pitcairn">Pitcairn</option>
                                                                        <option value="Poland">Poland</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Reunion">Reunion</option>
                                                                        <option value="Romania">Romania</option>
                                                                        <option value="Russian Federation">Russian Federation</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="Saint Helena">Saint Helena</option>
                                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                                        <option value="Samoa">Samoa</option>
                                                                        <option value="San Marino">San Marino</option>
                                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                                        <option value="Senegal">Senegal</option>
                                                                        <option value="Serbia">Serbia</option>
                                                                        <option value="Seychelles">Seychelles</option>
                                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                                        <option value="Singapore">Singapore</option>
                                                                        <option value="Slovakia">Slovakia</option>
                                                                        <option value="Slovenia">Slovenia</option>
                                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                                        <option value="Somalia">Somalia</option>
                                                                        <option value="South Africa">South Africa</option>
                                                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                                        <option value="Spain">Spain</option>
                                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                                        <option value="Sudan">Sudan</option>
                                                                        <option value="Suriname">Suriname</option>
                                                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                                        <option value="Swaziland">Swaziland</option>
                                                                        <option value="Sweden">Sweden</option>
                                                                        <option value="Switzerland">Switzerland</option>
                                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                                        <option value="Tajikistan">Tajikistan</option>
                                                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                                        <option value="Thailand">Thailand</option>
                                                                        <option value="Timor-leste">Timor-leste</option>
                                                                        <option value="Togo">Togo</option>
                                                                        <option value="Tokelau">Tokelau</option>
                                                                        <option value="Tonga">Tonga</option>
                                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                        <option value="Tunisia">Tunisia</option>
                                                                        <option value="Turkey">Turkey</option>
                                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                        <option value="Tuvalu">Tuvalu</option>
                                                                        <option value="Uganda">Uganda</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                                        <option value="United Kingdom">United Kingdom</option>
                                                                        <option value="United States">United States</option>
                                                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                        <option value="Uruguay">Uruguay</option>
                                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Venezuela">Venezuela</option>
                                                                        <option value="Viet Nam">Viet Nam</option>
                                                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                                        <option value="Western Sahara">Western Sahara</option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Zambia">Zambia</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                                </div>


                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Postal Code</label>
                                                                    <span class="requierd-star"></span>
                                                                    <input name="postalcode" type="text" class="form-control"
                                                                           value="{{$subscriber->postalcode}}" required autocomplete="postalcode" autofocus>
                                                                    @error('postalcode')
                                                                    <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Facebook I'd Link </label>
                                                                    <span class="requierd-star"></span>
                                                                    <input name="facebook" type="text" class="form-control"
                                                                           value="{{$subscriber->facebook}}" required autocomplete="facebook" autofocus>
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Contact Number </label>
                                                                    <span class="requierd-star"></span>
                                                                    <input name="contact" type="text" class="form-control"
                                                                           value="{{$subscriber->contact}}" required autocomplete="contact" autofocus>
                                                                    @error('contact')
                                                                    <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                                                    @enderror

                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">E-mail Address  </label>
                                                                    <span class="requierd-star"></span>
                                                                    <input name="email" type="text" class="form-control"
                                                                           value="{{$subscriber->email}}" required autocomplete="email" autofocus>
                                                                    @error('email')
                                                                    <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Facebook WE follower since</label>
                                                                    <span class="requierd-star"></span>
                                                                    <input name="since" type="date" class="form-control"
                                                                           value="{{$subscriber->since}}" required autocomplete="since" autofocus>
                                                                </div>


                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Blood Group </label>
                                                                    <span class="requierd-star"></span>
                                                                    <select id="inputState" name="bloodgroup" class="form-control">
                                                                        <option selected>{{$subscriber->bloodgroup}}</option>
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
                                                                           value="{{$subscriber->donateblood}}" required autocomplete="donateblood" autofocus>
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">National Identity/Birth Certificate No </label>
                                                                    <span class="requierd-star"></span>
                                                                    <input name="nid" type="text" class="form-control"
                                                                           value="{{$subscriber->nid}}" required autocomplete="nid" autofocus>
                                                                </div>
                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Which on You have </label>
                                                                    <span class="requierd-star"></span>


                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" id="form101" name="certificate" value="NID" @if(($subscriber->certificate)=='NID') checked @else @endif>
                                                                        <label class="custom-control-label" for="form101">NID</label>
                                                                    </div>

                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" id="form201" name="certificate" value="BIRTH" @if(($subscriber->certificate)=='BIRTH') checked @else @endif>
                                                                        <label class="custom-control-label" for="form201">Birth Certificate</label>
                                                                    </div>


                                                                </div>


                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Marital Status </label>
                                                                    <span class="requierd-star"></span>


                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" id="form10111" name="maritalstatus" value="Married" @if(($subscriber->maritalstatus)=='Married') checked @else @endif>
                                                                        <label class="custom-control-label" for="form10111">Married</label>
                                                                    </div>

                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" id="form20112121" name="maritalstatus" value="Unmarried" @if(($subscriber->maritalstatus)=='Unmarried') checked @else @endif>
                                                                        <label class="custom-control-label" for="form20112121">Unmarried</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" id="form301" name="maritalstatus" value="Widow" @if(($subscriber->maritalstatus)=='Widow') checked @else @endif>
                                                                        <label class="custom-control-label" for="form301">Widow</label>
                                                                    </div>

                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" id="form401" name="maritalstatus" value="Divorce" @if(($subscriber->maritalstatus)=='Divorce') checked @else @endif>
                                                                        <label class="custom-control-label" for="form401">Divorce</label>
                                                                    </div>



                                                                </div>


                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Detail of Passport Number (If any)</label>

                                                                    <input name="passport" type="text" class="form-control" value="{{$subscriber->passport}}" required autocomplete="passport" autofocus>
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <div class="form-group col-10">
                                                                        <label for="comments">
                                                                            Owner Photo
                                                                            <span class="requierd-star"></span></label>
                                                                        <div class="custom-file b-form-file b-custom-control-sm" id="__BVID__10444__BV_file_outer_">
                                                                            <input type="file" name="owner" accept=".jpg, .png" class="custom-file-input" id="__BVID__1044">
                                                                            <label data-browse="Browse" class="custom-file-label" for="__BVID__1044">Choose jpg,jpeg,png file</label>
                                                                        </div>

                                                                        @if($subscriber->logo)
                                                                            <img src="{{ asset('uploads/owner/'.$subscriber->owner) }}" class="img-thumbnail" width="100" height="100" />
                                                                        @else
                                                                            <img src="{{ asset('uploads/') }}/default.png" class="img-thumbnail" width="100" height="100" />
                                                                        @endif

                                                                        {{--<img src="{{ asset('uploads/logo/'.$subscriber->logo) }}" class="img-thumbnail" width="100" height="100" />--}}

                                                                        @error('logo')
                                                                        <p style="color:#f00;font-weight:500;">{{ $message }}</p>
                                                                        @enderror<br>
                                                                        <small>Resize your photo (width:300px X height:300px)</small>
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
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
                                            <div class="tab-pane @if(($subscriber->step1)=='1') active @else @endif" role="tabpanel" id="step2">
                                                <!-- <h4 class="text-center">Step 2</h4> -->
                                                <form method="POST" action="{{route('nonsecond-form',$subscriber->subscriber_id)}}">
                                                    @csrf

                                                    <div class="row">
                                                        <!--  Details of Family -->

                                                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                                            <legend class="w-25 text-center main-title"><small class="text-uppercase font-weight-bold ">Details of Family </small></legend>



                                                            <div class="form-row">
                                                                <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                                                                <input name="step1" type="hidden" value="2" class="form-control">

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
                                                        <li><button type="submit" class="default-btn  next-step">Save</button></li>
                                                        {{--<li><button type="button" class="default-btn next-step">Continue</button></li>--}}
                                                    </ul>
                                                </form>

                                            </div>


                                            <!-- step 3 -->

                                            <div class="tab-pane @if(($subscriber->step1)=='2') active @else @endif" role="tabpanel" id="step3">
                                                <!-- <h4 class="text-center">Step 3</h4> -->
                                                <form method="POST" action="{{route('nonthird-form',$subscriber->subscriber_id)}}">
                                                    @csrf
                                                    <div class="row">
                                                        <!--  Detail of Income & Income Tax -->
                                                        <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                                                        <input name="step1" type="hidden" value="3" class="form-control">
                                                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                                            <legend class="w-75 text-center main-title"><small class="text-uppercase font-weight-bold ">Detail of Income & Income Tax</small></legend>

                                                            <div class="form-row">
                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013"> Average Annual Income (Estimated) </label>
                                                                    <span class="requierd-star"></span>
                                                                    <input name="income" type="text" class="form-control"  value="{{$subscriber->income}}"
                                                                           required>


                                                                </div>

                                                            </div>
                                                        </fieldset>

                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                                        <li><button type="submit" class="default-btn next-step">Drafts</button></li>
                                                        {{--<li><button type="button" class="default-btn next-step">Continue</button></li>--}}
                                                    </ul>
                                                </form>
                                            </div>



                                            <!-- step 4 -->

                                            <div class="tab-pane @if(($subscriber->step1)=='3') active @else @endif" role="tabpanel" id="step4">
                                                <!-- <h4 class="text-center">Step 4</h4> -->
                                                <form method="POST" action="{{route('nonfourth-form',$subscriber->subscriber_id)}}">

                                                    @csrf
                                                    <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                                                    <input name="step1" type="hidden" value="4" class="form-control">
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
                                                                    <select name="office_district" class="form-control"><option selected>{{$subscriber->office_district}}</option> <option>Dhaka</option><option>Faridpur</option><option>Gazipur</option><option>Gopalganj</option><option>Jamalpur</option><option>Kishoreganj</option><option >Madaripur</option><option>Manikganj</option><option>Munshiganj</option><option>Mymensingh</option><option>Narayanganj</option><option>Narsingdi</option><option>Netrokona</option><option>Rajbari</option><option>Shariatpur</option><option>Sherpur</option><option>Tangail</option><option>Bogura</option><option>Joypurhat</option><option>Naogaon</option><option>Natore</option><option>Chapainawabganj</option><option>Pabna</option><option>Rajshahi</option><option>Sirajgonj</option><option>Dinajpur</option><option>Gaibandha</option><option>Kurigram</option><option>Lalmonirhat</option><option>Nilphamari</option><option>Panchagarh</option><option>Rangpur</option><option>Thakurgaon</option><option>Barguna</option><option>Barishal</option><option>Bhola</option><option>Jhalokati</option><option>Patuakhali</option><option>Pirojpur</option><option>Bandarban</option><option>Brahmanbaria</option><option>Chandpur</option><option>Chattogram</option><option>Cumilla</option><option>Cox's Bazar</option><option>Feni</option><option>Khagrachhari</option><option>Lakshmipur</option><option>Noakhali</option><option>Rangamati</option><option>Habiganj</option><option>Moulvibazar</option><option>Sunamganj</option><option>Sylhet</option><option>Bagerhat</option><option>Chuadanga</option><option>Jashore</option><option>Jhenaidah</option><option>Khulna</option><option>Kushtia</option><option>Magura</option><option>Meherpur</option><option>Narail</option><option>Satkhira</option></select>
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
                                                                    >
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

                                                                    <input name="joining_date" type="date" class="form-control" value="{{$subscriber->joining_date}}"
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

                                            <div class="tab-pane @if(($subscriber->step1)=='4') active @else @endif" role="tabpanel" id="step5">
                                                <!-- <h4 class="text-center">Step 5</h4> -->
                                                <form method="POST" action="{{route('nonfifth-form',$subscriber->subscriber_id)}}">
                                                    @csrf
                                                    <div class="row">
                                                        <!--  Reference -->
                                                        <input name="subscriber_id" type="hidden" value="{{{ Auth::user()->id}}}" class="form-control">
                                                        <input name="step1" type="hidden" value="5" class="form-control">
                                                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                                            <legend class="w-50 text-center main-title"><small class="text-uppercase font-weight-bold ">Reference Name</small></legend>

                                                            <div class="form-row">
                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Name of Reference 1 </label>
                                                                    <span class="requierd-star"></span>
                                                                    <input name="ref1" type="text" class="form-control" value="{{$subscriber->ref1}}"
                                                                           required>
                                                                </div>

                                                                <div class="col-md-6 mb-6">
                                                                    <label for="validationServer013">Name of Reference 2 </label>
                                                                    <input name="ref2" type="text" class="form-control" value="{{$subscriber->ref2}}">
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
                                                </form>
                                            </div>




                                            <!-- step 6 -->

                                            <div class="tab-pane @if(($subscriber->step1)=='5') active @else @endif" role="tabpanel" id="step6">
                                                <!-- <h4 class="text-center">Step 6</h4> -->
                                                <form method="POST" action="{{route('nonsixth-form',$subscriber->subscriber_id)}}">
                                                    @csrf
                                                    <div class="row">
                                                        <fieldset class="col-lg-12 border border-primary p-3 mb-3">
                                                            <legend class="w-50 text-center main-title"><small class="text-uppercase font-weight-bold "> Acceptance Declaration</small></legend>
                                                            <p style="font-size: 13px; text-align: justify; line-height: 20px;">I hereby declare that the details furnished above are true and correct to the best of my knowledge and belief and I undertake to inform you of any changes therein, immediately. In case any of the above information is found to be false or untrue or misleading or misrepresentation, I am aware that I may be held liable for it. I hereby authorize WE to use it for internal usage and member information updating purposes.</p>
                                                            <div class="form-row">
                                                                <div class="col-md-6 mb-6">
                                                                    <label for=""> Please Accept * </label>
                                                                    <span class="requierd-star"></span>

                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" id="defaultGroupExample2tt" name="step1" value="6" required>
                                                                        <label class="custom-control-label" for="defaultGroupExample2tt">I Agree</label>
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







                                        </div>












                                    </div>

                                    <!--  -->





                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection
