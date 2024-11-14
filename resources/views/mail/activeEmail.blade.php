Hello {{$email_data['name']}}
<br><br>
You have been successfully varified!
<br>

Please <a href="{{route('nonSubscriber_subscription_details',$email_data['subscription_id'])}}">Click Here to Make Payment</a>

{{--<br>--}}
{{--Please login to your panel and pay your subscription fees!--}}
{{--<br>--}}

{{--<a href="http://weforumbd.org/verify?code={{$email_data['verification_code']}}">Click Here!</a>--}}

<br><br>
Thank you!
<br>
weforumbd.org