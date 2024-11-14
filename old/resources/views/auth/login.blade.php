@extends('Member.Member_master')
@section('title')

    <title>Login | Nurjahan Bazar</title>
@endsection

@section('signup')
    <div id="LoginForm">
        <div class="container">
            <!-- <h1 class="form-heading">login Form</h1> -->
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <div class="fadeIn first">
                            <img src="{{asset('asset/images/logo.png')}}" id="icon" alt="We Logo">
                            <!-- <h1>Aditya News</h1> -->
                        </div>
                        <h2>Login</h2>
                        <p>Please enter your email and password</p>
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <form id="Login" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="off" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" placeholder="Password"  name="password" required autocomplete="off">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" autocomplete="off" class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><label class="custom-control-label" for="__BVID__16">
                                Remeber Me
                        </div>
                        <div class="forgot">
                            <a style="color: #222" href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <style>
        .custom-control-label {
            margin-left: 24px;

        }
    </style>

    <!-- line modal -->
    <div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <!-- <h1 class="text-center">What's My Password?</h1> -->
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="panel panel-body login-form">
                            <div class="panel-body">
                                <div class="text-center">
                                    <p>If you have forgotten your password you can reset it here.</p>
                                    <div class="panel-body">
                                        <fieldset>
                                            <form id="Login">

                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="inputPassword" placeholder="Phone Number">
                                                </div>

                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </form>
                                            <!-- <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit"> -->
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-md-12">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- header -->

@endsection