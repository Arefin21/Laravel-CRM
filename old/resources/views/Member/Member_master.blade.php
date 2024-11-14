<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   @yield('title')

    <!-- Bootstrap -->
    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <!-- Dashboard -->
    {{--<link href="{{asset('asset/css/material-dashboard.min.css')}}" rel="stylesheet"/>--}}
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Dashboard -->
    <link rel="icon" href="{{asset('asset/images/logo.png')}}" type="image/gif" sizes="16x16">
    <link href="{{asset('asset/css/styles.css')}}" rel="stylesheet">

</head>
<body>



@yield('signup')


<style>
    label {
        display: inline-block;
        margin-bottom: .5rem;
        margin: 5px 0;
    }
    .reg-form{
        background:#3598dc;
    }
    .form-control:focus{
        border-color: #5cb85c;
    }
    .form-control, .btn{
        border-radius: 3px;
    }
    .signup-form{
        width: 600px;
        margin: 0 auto;
        padding: 30px 0;
    }
    .signup-form h2{
        color: #636363;
        margin: 0 0 15px;
        position: relative;
        text-align: center;
    }
    .signup-form h2:before, .signup-form h2:after{
        content: "";
        height: 2px;
        width: 30%;
        background: #d4d4d4;
        position: absolute;
        top: 50%;
        z-index: 2;
    }
    .signup-form h2:before{
        left: 0;
    }
    .signup-form h2:after{
        right: 0;
    }
    .signup-form .hint-text{
        color: #999;
        margin-bottom: 30px;
        text-align: center;
    }
    .signup-form form{
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form .form-group{
        margin-bottom: 20px;
    }
    .signup-form input[type="checkbox"]{
        margin-top: 3px;
    }
    .signup-form .btn{
        font-size: 16px;
        font-weight: bold;
        min-width: 140px;
        outline: none !important;
    }
    .signup-form .row div:first-child{
        padding-right: 10px;
    }
    .signup-form .row div:last-child{
        padding-left: 10px;
    }
    .signup-form a{
        color: #fff;
        text-decoration: underline;
    }
    .signup-form a:hover{
        text-decoration: none;
    }
    .signup-form form a{
        color: #5cb85c;
        text-decoration: none;
    }
    .signup-form form a:hover{
        text-decoration: underline;
    }
</style>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>



<!-- dashboard -->
<script src="{{asset('asset/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('asset/assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('asset/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="{{asset('asset/assets/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('asset/assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('asset/assets/js/material-dashboard.js?v=2.1.2')}}" type="text/javascript"></script>
<!-- dashboard -->


<script>

    $(function () {
        $(".date").datepicker({
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

<script>
    // ------------step-wizard-------------
    $(document).ready(function () {
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

            var target = $(e.target);

            if (target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var active = $('.wizard .nav-tabs li.active');
            active.next().removeClass('disabled');
            nextTab(active);

        });
        $(".prev-step").click(function (e) {

            var active = $('.wizard .nav-tabs li.active');
            prevTab(active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }


    $('.nav-tabs').on('click', 'li', function() {
        $('.nav-tabs li.active').removeClass('active');
        $(this).addClass('active');
    });



</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


<script src="{{asset('asset/js/global.js')}}"></script>

</body>
</html>

