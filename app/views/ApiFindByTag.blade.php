<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        {{ Form::open(array('route' => 'api.curl.reviews.findbytag', 'method' => 'post')) }}
        Tag: {{Form::text('tag');}}</br>
        {{Form::submit('Find');}}
        {{ Form::close() }}
    </body>
</div>
</html>