<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>url-shortner-api</title>
    </head>
    <body>
        <div class="container">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">url-shortner-api</h1>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Long URL</th>
                                            <th>Counts</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($res as $url)
                                        <tr>
                                            <td>{{$url->url}}</td>
                                            <td>{{$url->count}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
