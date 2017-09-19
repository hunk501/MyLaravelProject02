<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>
<body>

@if ($errors->has('fname'))<p style="color:red;">{!!$errors->first('fname')!!}</p>@endif

@if ($errors->has('lname'))<p style="color:red;">{!!$errors->first('lname')!!}</p>@endif

{!! Form::open(['url'=>'userlogin']) !!}
<table>
	<tr><td>Firstname:</td><td><input type="text" name="fname"></td></tr>
	<tr><td>Lastname:</td><td><input type="text" name="lname"></td></tr>
</table>
<input type="submit" name="submit" value="Submit value">

{!! Form:: close() !!}

</body>
</html>