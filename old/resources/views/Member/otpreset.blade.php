@extends('Member.Member_master')
@section('title')
    <title>Subscriber OTP Varification | Women & e-Commerce</title>
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
                        <h2>Account Varification</h2>
                        <p>varify your OTP from mobile</p>
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    {{--{{mt_rand(10, 1000000)}}--}}
                    <p class="alert alert">Varify your OTP</p>
                    <form id="Login" method="POST" action="{{ route('verify.otpreset') }}">
                        @csrf
                        <div class="form-group bmd-form-group is-filled">
                            <input type="text" name="otp" class="form-control " id="inputEmail" placeholder="Enter Your OTP" value="" required="" autocomplete="email" autofocus="">

                        </div>



                        <button type="submit" class="btn btn-primary">Varify OTP</button>
                    </form>
                    <div class="footer-custom">
                        <p><a target="__blank" href="https://esoft.com.bd/">Software Developed by</a> e-Soft</p>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection