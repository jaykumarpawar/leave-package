<html>
<head></head>
<style>
button {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 10;
  -moz-border-radius: 10;
  border-radius: 10px;
  font-family: Georgia;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

button:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
</style>
<body>
<p><em>Hello&nbsp;{{$user->firstname.' '.$user->lastname }},</em></p>
<p>It's time to confirm your account. </p>
<p>You are just one step away from activating your account on Our system. Click on the button and start your account.</p>
<a href="{{url('signup/'.$user->id.'/'.$user->remember_token)}}" style="color:white;background:#3498db;font-family:Georgia;color: #ffffff;font-size: 20px;padding: 10px 20px 10px 20px;text-decoration: none">Click to Activate</a>
<p>&nbsp;</p>
<p><em>Thanks,</em></p>
<p><em>Crazyboy</em></p>
</body>
</html>
