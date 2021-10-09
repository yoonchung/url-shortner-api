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
                    <form method="POST" action="/url">
                        @csrf
                        @if(session()->has('msg'))
                            <div class="alert alert-danger">
                                {{ session()->get('msg') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputurl1">Long URL</label>
                            <input type="url" name="url" class="form-control" id="exampleInputurl" aria-describedby="urlHelp" placeholder="Enter url">
                        </div>
                        {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck">
                            <label class="form-check-label" for="exampleCheck">NSFW</label>
                        </div> --}}
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
