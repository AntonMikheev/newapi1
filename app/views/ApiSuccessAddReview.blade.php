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
                        <div class="container">
                            @if($response->msg->success)
                            <div class="row">
                                <article class="col-md-5">
                                    <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                                        <tr><td>Success</td><td>{{$response->msg->message}}</td></tr>
                                    </table>
                                </article>
                            </div>
                            @elseif(!$response->success)
                            <div class="row">
                                <article class="col-md-5">
                                    <table border="3px" width="800px" bgcolor="#E6E6FA" align="center">
                                        <tr><td>Error</td><td>{{$response->msg->message}}</td></tr>
                                    </table>
                                </article>
                            </div>
                            @endif
                    </table>
                </article>
            </div>
    </body>
</div>
</html>