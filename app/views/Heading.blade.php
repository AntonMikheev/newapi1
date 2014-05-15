<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">

            <?php
            $heading = Heading::paginate(2);
            ?>


        </div>

        <div class="container">
            @foreach (array_chunk($heading->all(),2) as $items)
            <div class="row">
                <h3> <a href="{{ URL::to('/') }}">Home</a></h3><br>
                @foreach($items as $item)
                <article class="col-md-5">
                    <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                        <tr><td>Heading ID</td><td>{{$item->id}}</td></tr> 
                        <tr><td>Heading name</td><td>{{$item->name}}</td></tr> 
                        <tr><td>Heading parent_id</td><td>{{$item->parent_id}}</td></tr> 
                    </table>
                </article>
                @endforeach
            </div>
            @endforeach
            {{$heading->links()}}
    </body>
</div>
</html>