<p>Hi, {{ $email_data['name'] }}</p>
<br>
<p>Your User Id : {{ $email_data['email'] }}</p>
<p>Your User Password : {{ $email_data['password'] }}</p>
<p><a href="{{asset('signin')}}">Login</a></p>

<br><br>
Thank you!
<br>
weforumbd.org