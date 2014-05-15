<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
        foreach ($tags2 as $item) {
            $tags_old[] = $item->id;
            $tags_old[] = $item->name;
        }
        $news_old = array();
        foreach ($news2 as $item) {
            $news_old[] = $item->id;
            $news_old[] = $item->name;
        }
        ?>
        <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
        <h3><a href="{{ URL::route('viewreviews') }}">Back to News</a></h3><br>
        {{ Form::open(array('url' => 'edit-reviews/'.$id, 'method' => 'post')) }}
        Old Name = {{$name}}: {{Form::text('name', $name);}}</br>
        Old Text = {{$text}}: {{Form::text('text', $text);}}</br>
        Old Author = {{$author}}: {{Form::text('author', $author);}}</br>
        Edit Heading: {{Form::select('heading', $heading_mass,array($heading_id, $heading_id));}}</br>
        Tags: {{Form::select('tags[]', $tags_mass, $tags_old, array('multiple'));}}</br>
        Reviews: {{Form::select('news[]', $news_mass, $news_old, array('multiple'));}}</br>
        {{Form::submit('Save');}}
        {{ Form::close() }}
    </body>
</div>
</html>