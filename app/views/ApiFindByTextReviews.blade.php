<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            @if(!isset($data->message))
            <h1>REVIEWS</h1>
                @foreach ($data as $item)
                <div class="row">
                    <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
                    <article class="col-md-5">
                        <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                           <tr><td>News ID</td><td>{{$item->id}}</td></tr>
                            <tr><td>News heading ID</td><td>{{$item->heading_id}}</td></tr>
                            <tr><td>News name</td><td>{{$item->name}}</td></tr>
                            <tr><td>News text</td><td>{{$item->text}}</td></tr>
                            <tr><td>News author</td><td>{{$item->author}}</td></tr>
                        </table>
                    </article>
                </div>
                @endforeach
        </div>
            @else
            <div class="container">
                <div class="row">
                    <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
                    <h3><a href="{{ URL::route('api.curl.reviews.formfindbytext') }}">Back to search</a></h3><br>
                    <article class="col-md-5">
                        <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                            <tr><td>Error</td><td>{{$data->message}}</td></tr>
                        </table>
                    </article>
                </div>
                @endif
        </div>
    </body>

</html>