@extends('Member.Member_master')
@section('title')
    <title>Subscriber Signup | Women & e-Commerce</title>
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

                        <h2>Payment Has Been Cancelled</h2>








                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                    </div>

                        <div class="form-row">





                            <div class="col-sm-9 form-group form-groum-custom1"><p class="text-right">
                                    If you are already registered ?
                                    <a href="{{route('signin')}}" class="btn btn-danger font-weight-bold rounded-50 ml-2">Login</a></p></div>


                        </div>

                    <div class="footer-custom">
                        <p><a target="__blank" href="https://esoft.com.bd/">Software Developed by</a> e-Soft</p>
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection

<style>
    .box{

        display: none;

    }

</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("select").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else{
                    $(".box").show();
                }
            });
        }).change();
    });
</script>