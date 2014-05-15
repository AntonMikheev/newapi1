<!DOCTYPE html>
<html>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
{{ Form::open(array('route' => 'userlogin', 'method' => 'post')) }}

Email: {{Form::text('email');}}</br>
Password: {{Form::password('password');}}</br>
Remember me {{Form::checkbox('rememberme');}}
{{Form::submit('Enter');}}
{{ Form::close() }}
</body>
</div>
</html>