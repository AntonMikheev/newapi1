<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
                <h3><a href="{{ URL::route('api.curl.reviews') }}">All Reviews</a></h3><br>
                <article class="col-md-5">
                    <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                        <div class="btn-group">
                            <a href="editreviews/{{$data->id}}" class="btn btn-primary">Edite</a>
                            <a href="api.laraveltest/curlreviewsdel/{{$data->id}}" class="btn btn-primary">Delete</a>
                        </div>
                       <tr><td>Reviews ID</td><td>{{$data->id}}</td></tr>
                        <tr><td>Reviews heading ID</td><td>{{$data->heading_id}}</td></tr>
                        <tr><td>Reviews name</td><td>{{$data->name}}</td></tr>
                        <tr><td>Reviews text</td><td>{{$data->text}}</td></tr>
                        <tr><td>Reviews author</td><td>{{$data->author}}</td></tr>
                    </table>
                </article>
            </div>
    </body>
</div>
</html>