<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="css/main.css"> --}}
    <title>Curug Cipendok</title>
</head>

<body>

    <div class="container mt-2 mb-2">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h1>Edit Akun Login</h1>
                        <hr>
                        <form action="/edit/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            {{-- @method('PATCH') --}}
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ $data->username }}">
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control mb-2 @error('password') is-invalid @enderror"
                                    id="password" name="password" value="{{ $data->password }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- end caresol --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
