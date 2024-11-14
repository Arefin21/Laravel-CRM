@extends('Member.Member_master')

@section('signup')
    <div id="LoginForm">
        <div class="container">
            <!-- <h1 class="form-heading">login Form</h1> -->
            <div class="login-form">
                <div class="main-div2">
                    <div class="panel panel-custom">
                        <div class="fadeIn first">
                            <img src="{{asset('asset/images/logo.png')}}" id="icon" alt="We Logo">
                            <!-- <h1>Aditya News</h1> -->
                        </div>

                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-12">
                                <label style="text-align: left;" for="validationServer013">Enter Your E-mail </label>

                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-3 form-group mb-0" style="margin-top: 20px;"><button type="submit" class="btn btn-primary text-white">Submit</button></div>

                        </div>
                    </form>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert" role="alert">
                        <h3>--OR--</h3>
                    </div>
                    <form method="POST" action="{{ route('password.mobile') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-12">
                                <label style="text-align: left;" for="validationServer013">Enter Your Phone Number </label>

                                <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter Your Phone Number" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $mobile ?? '' }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-3 form-group mb-0" style="margin-top: 20px;"><button type="submit" class="btn btn-primary text-white">Submit</button></div>

                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
@endsection
