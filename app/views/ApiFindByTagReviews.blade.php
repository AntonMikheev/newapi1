<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            @if(isset($news))
            <h1>NEWS</h1>
                @foreach ($news as $item)
                <div class="row">
                    <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
                    <article class="col-md-5">
                        <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                            <div class="btn-group">
                                <a href="curleditreviews/{{$item->id}}" class="btn btn-primary">Edite</a>
                                <a href="curlreviewsdel/{{$item->id}}" class="btn btn-primary">Delete</a>
                                <a href="curlsinglereview/{{$item->id}}" class="btn btn-primary">Learn more</a>
                            </div>
                           <tr><td>News ID</td><td>{{$item->id}}</td></tr>
                            <tr><td>News heading ID</td><td>{{$item->heading_id}}</td></tr>
                            <tr><td>News name</td><td>{{$item->name}}</td></tr>
                            <tr><td>News text</td><td>{{$item->text}}</td></tr>
                            <tr><td>News author</td><td>{{$item->author}}</td></tr>
                        </table>
                    </article>
                </div>
                @endforeach
            @else
            <h1>NEWS NOT FOND</h1>
            @endif
        </div>
        <div class="container">
            @if (isset($reviews))
            <h1>REVIEWS</h1>
                @foreach ($reviews as $item)
                <div class="row">
                    <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
                    <h3><a href="{{ URL::route('api.curl.reviews.add') }}">Add Reviews</a></h3><br>

                    <article class="col-md-5">
                        <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                            <div class="btn-group">
                                <a href="curleditreviews/{{$item->id}}" class="btn btn-primary">Edite</a>
                                <a href="curlreviewsdel/{{$item->id}}" class="btn btn-primary">Delete</a>
                                <a href="curlsinglereview/{{$item->id}}" class="btn btn-primary">Learn more</a>
                            </div>
                            <tr><td>Reviews ID</td><td>{{$item->id}}</td></tr>
                            <tr><td>Reviews heading ID</td><td>{{$item->heading_id}}</td></tr>
                            <tr><td>Reviews name</td><td>{{$item->name}}</td></tr>
                            <tr><td>Reviews text</td><td>{{$item->text}}</td></tr>
                            <tr><td>Reviews author</td><td>{{$item->author}}</td></tr>
                        </table>
                    </article>

                </div>
                @endforeach
            @else
                <h1>REVIEWS NOT FOND</h1>
            @endif
            <div class="container">
                @if (isset($error))
                <div class="row">
                    <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
                    <h3><a href="{{ URL::route('api.curl.reviews.formfindbytag') }}">Back to search</a></h3><br>
                    <article class="col-md-5">
                        <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                            <tr><td>Error</td><td>{{$error->message}}</td></tr>
                        </table>
                    </article>

                </div>
                @endif
        </div>
    </body>

</html>