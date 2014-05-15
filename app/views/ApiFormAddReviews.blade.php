<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        {{ Form::open(array('route' => 'api.curl.reviews.add', 'method' => 'post')) }}
        Name: {{Form::text('name');}}</br>
        Text: {{Form::text('text');}}</br>
        Author: {{Form::text('author');}}</br>
        Heading: {{Form::select('heading_id', $data->heading_mass);}}</br>
        Tags: {{Form::select('tags[]', $data->tags_mass, array('', ''), array('multiple'));}}</br>
        News: {{Form::select('news[]', $data->news_mass, array('', ''), array('multiple'));}}</br>
        {{Form::submit('Add');}}
        {{ Form::close() }}
    </body>
</div>
</html>