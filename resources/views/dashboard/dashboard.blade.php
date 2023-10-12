<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Dashboard" />
    <meta name="author" content="Maldini | @Maldini" />

    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css" />
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>

<body class="bg-light">
    <div class="app">
        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <aside class="sidebar">
            <h3>Menu</h3>

            {{-- navbar --}}
            @include('include.sidebar')
            {{-- navbar --}}

        </aside>

        <div class="container up">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="py-4 d-flex jflex-column justify-content-center align-items-center">
                            <h3 class="mr-auto">Daftar Transaksi Berhasil</h3>

                        </div>
                        @if (session()->has('pesan'))
                            <div class="alert alert-success">
                                {{ session()->get('pesan') }}
                            </div>
                        @endif




                        <div class="table-responsive bg-white p-3 mb-5" style="border-radius: 12px">
                            {{-- <form action="{{ route('search') }}" method="POST">
                                @csrf
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" name="nama" aria-label="Nama"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg></button>
                                    </div>
                                </div>
                            </form> --}}
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Tanggal Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $dataorder)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dataorder->name }}</td>
                                            <td>{{ $dataorder->email }}</td>
                                            <td>{{ $dataorder->jml }}</td>
                                            <td>{{ $dataorder->status }}</td>
                                            <td>{{ date('d/m/Y', strtotime($dataorder->created_at)) }}</td>

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        const menu_toggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');

        menu_toggle.addEventListener('click', () => {
            menu_toggle.classList.toggle('is-active');
            sidebar.classList.toggle('is-active');
        });
    </script>


</body>

</html>
