<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            @foreach (array_chunk($news->all(),2) as $items)
            <div class="row">
                <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
                <h3><a href="{{ URL::route('add-news') }}">Add News</a></h3><br>
                @foreach($items as $item)
                <article class="col-md-5">
                    <table border="1px" width="600px" bgcolor="#E6E6FA" align="center">
                        <div class="btn-group">
                            <a href="editnews/{{$item->id}}" class="btn btn-primary">Edite</a>
                            <a href="deletenews/{{$item->id}}" class="btn btn-primary">Delete</a>
                        </div>
                        <tr><td>News ID</td><td>{{$item->id}}</td></tr> 
                        <tr><td>News heading ID</td><td>{{$item->heading_id}}</td></tr> 
                        <tr><td>News name</td><td>{{$item->name}}</td></tr> 
                        <tr><td>News text</td><td>{{$item->text}}</td></tr> 
                        <tr><td>News author</td><td>{{$item->author}}</td></tr> 
                    </table>
                </article>
                @endforeach
            </div>
            @endforeach
    </body>
</div>
</html>