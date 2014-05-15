<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
        //var_dump($data);die;
//        $test[] = $tags;
//        foreach ($test as $item) {
//            $tags_old[] = $item->id;
//            $tags_old[] = $item->name;
//        }
//        print_r($tags_old);die;
//        $news_old = array();
//        foreach ($data->news as $item) {
//            $news_old[] = $item->id;
//            $news_old[] = $item->name;
//        }
        ?>
        <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
        <h3><a href="{{ URL::route('api.curl.reviews') }}">Back to Reviews</a></h3><br>
        {{ Form::open(array('url' => 'api.laraveltest/curleditreviews/'.$data->id, 'method' => 'post')) }}
        ID = {{$data->id}}</br>
        Old Name = {{$data->name}}: {{Form::text('name', $data->name);}}</br>
        Old Text = {{$data->text}}: {{Form::text('text', $data->text);}}</br>
        Old Author = {{$data->author}}: {{Form::text('author', $data->author);}}</br>
        Edit Heading: {{Form::select('heading', $data->heading_mass,array($data->heading_id, $data->heading_id));}}</br>
        Tags: {{Form::select('tags[]', $data->tags_mass, $data->tags, array('multiple'));}}</br>
        Reviews: {{Form::select('news[]', $data->news_mass, $data->news, array('multiple'));}}</br>
        {{Form::submit('Save');}}
        {{ Form::close() }}
    </body>
</div>
</html>