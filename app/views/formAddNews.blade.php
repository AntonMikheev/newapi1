<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        {{ Form::open(array('route' => 'add-news', 'method' => 'post')) }}
        Name: {{Form::text('name');}}</br>
        Text: {{Form::text('text');}}</br>
        Author: {{Form::text('author');}}</br>
        Heading: {{Form::select('heading', $heading_mass);}}</br>
        Tags: {{Form::select('tags[]', $tags_mass, array('', ''), array('multiple'));}}</br>
        Reviews: {{Form::select('reviews[]', $rev_mass, array('', ''), array('multiple'));}}</br>
        {{Form::submit('Add');}}
        {{ Form::close() }}

    </body>
</div>
</html>