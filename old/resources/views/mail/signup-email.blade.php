Hello {{$email_data['name']}}
{{--<br><br>--}}
{{--Your First Step for subscriber enlistment process has successfully been completed.--}}
{{--<br>--}}
{{--You will get confirmation email with in a very short time.--}}

Please click the below link to verify your email and activate your account!
<br><br>
<a href="{{asset('/')}}verify?code={{$email_data['verification_code']}}">Click Here!</a>

<br><br>
Thank you!
<br>
weforumbd.org