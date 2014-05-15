<!DOCTYPE html>
<html>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
{{ Form::open(array('route' => 'registration', 'method' => 'post')) }}
Name: {{Form::text('name');}}</br>
Email: {{Form::text('email');}}</br>
Password: {{Form::password('password');}}</br>
Accept Password: {{Form::password('acceptpassword');}}</br>
{{Form::submit('Add');}}
{{ Form::close() }}
</body>
</div>
</html>