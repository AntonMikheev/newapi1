<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    @if(Auth::check())
    <h2>Hello, {{Auth::user()->name}}</h2></br>
    @if(Auth::user()->permission == 'admin')
    <h3><a href="{{ URL::route('add-reviews') }}">Add Reviews</a></h3><br>
    @endif
    <a href="{{ URL::route('userlogout') }}" class="btn btn-primary">Logout</a>
    @else
    <h2>Hello, Guest</h2></br>
    <h3><a href="{{ URL::route('viewregistrform') }}" class="btn btn-primary">Register new user</a><br></h3>
    <a href="{{ URL::route('userloginform') }}" class="btn btn-primary">Login</a>
    @endif
        <div class="container">
            @foreach (array_chunk($reviews->all(),2) as $items)
            <div class="row">
                <h3><a href="{{ URL::route('home') }}">Home</a></h3><br>
                @foreach($items as $item)
                <article class="col-md-5">
                    <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                        @if(Auth::check())
                            @if(Auth::user()->permission == 'admin')
                                <div class="btn-group">
                                    <a href="editreviews/{{$item->id}}" class="btn btn-primary">Edite</a>
                                    <a href="deletereviews/{{$item->id}}" class="btn btn-primary">Delete</a>
                                </div>
                            @endif
                        @endif
                       <tr><td>Reviews ID</td><td>{{$item->id}}</td></tr> 
                        <tr><td>Reviews heading ID</td><td>{{$item->heading_id}}</td></tr> 
                        <tr><td>Reviews name</td><td>{{$item->name}}</td></tr> 
                        <tr><td>Reviews text</td><td>{{$item->text}}</td></tr> 
                        <tr><td>Reviews author</td><td>{{$item->author}}</td></tr> 
                    </table>
                </article>
                @endforeach
            </div>
            @endforeach
    </body>
</div>
</html>