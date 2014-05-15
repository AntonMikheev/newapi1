<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">

            <?php
            $tags = Tags::paginate(2);
            ?>


        </div>

        <div class="container">
            @foreach (array_chunk($tags->all(),2) as $items)
            <div class="row">
                <h3> <a href="{{ URL::to('/') }}">Home</a></h3><br>
                @foreach($items as $item)
                <article class="col-md-5">
                    <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                        <tr><td>Tags ID</td><td>{{$item->id}}</td></tr> 
                        <tr><td>Tags name</td><td>{{$item->name}}</td></tr> 
                        <tr><td>Tags type</td><td>{{$item->type}}</td></tr> 
                    </table>
                </article>
                @endforeach
            </div>
            @endforeach
            {{$tags->links()}}
    </body>
</div>
</html>