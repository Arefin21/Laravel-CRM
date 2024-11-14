@extends('Member.Member_master')
@section('title')
    <title>Password Reset | Women & e-Commerce</title>
@endsection
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


                    {{--{{$useremail = \App\Models\User::where(['mobile' => $user->mobile])->first()->email}}--}}

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-row">

                            <div class="col-md-12 mb-12">
                                <label for="validationServer013">Email  </label>

                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="ie: subscriber@gmail.com" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-md-6 mb-6">
                                <label for="validationServer013">Password  </label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-6">
                                <label for="validationServer013">Confirmed Password  </label>

                                <input type="password" name="password_confirmation"  class="form-control is-valid" placeholder="Confirmed Password" required autocomplete="new-password">
                            </div>


                            <div class="col-sm-3 form-group mb-0"><button type="submit" class="btn btn-primary text-white">Submit</button></div>
                            <div class="col-sm-9 form-group"><p class="text-right">
                                    If you are already registered ?
                                    <a href="{{route('signin')}}" class="btn btn-danger font-weight-bold rounded-50 ml-2">Login</a></p></div>


                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


@endsection