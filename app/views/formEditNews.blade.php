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
        $reviews_old = array();
        foreach ($revs2 as $item) {
            $reviews_old[] = $item->id;
            $reviews_old[] = $item->name;
        }
        print_r($tags_old);
        ?>
        <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
        <h3><a href="{{ URL::route('viewnews') }}">Back to News</a></h3><br>
        {{ Form::open(array('url' => 'edit-news/'.$id, 'method' => 'post')) }}
        Old Name = {{$name}}: {{Form::text('name', $name);}}</br>
        Old Text = {{$text}}: {{Form::text('text', $text);}}</br>
        Old Author = {{$author}}: {{Form::text('author', $author);}}</br>
        Edit Heading: {{Form::select('heading', $heading_mass,array($heading_id, $heading_id));}}</br>
        Tags: {{Form::select('tags[]', $tags_mass, $tags_old, array('multiple'));}}</br>
        Reviews: {{Form::select('reviews[]', $rev_mass, $reviews_old, array('multiple'));}}</br>
        {{Form::submit('Save');}}
        {{ Form::close() }}
    </body>
</div>
</html>