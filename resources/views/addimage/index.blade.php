<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Dashboard" />
    <meta name="author" content="Maldini | @Maldini" />

    <title>Tambah Gambar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css" />


</head>

<body>
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
                        <div class="py-4 d-flex justify-content-between align-items-center ">
                            <h2 class="mr-auto">Tambah Gambar Slider</h2>
                            <a href="{{ route('addimage.create') }}" class="btn btn-primary">
                                Tambah Gambar
                            </a>
                            <a href="/logout" class="btn btn-danger">
                                Log out
                            </a>
                        </div>
                        @if (session()->has('pesan'))
                            <div class="alert alert-success">
                                {{ session()->get('pesan') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Image</th>
                                    <th class="col-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $addimage)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $addimage->name }}</td>
                                        <td><img height="30px" src="{{ url('') }}/{{ $addimage->image }}"
                                                class="rounded" alt=""></td>
                                        <td>
                                            <div class="crud"><a href="/tampilfoto/{{ $addimage->id }}"
                                                    class="btn tmbl btn-primary">Edit
                                                </a>
                                                <form action="" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="/delete/{{ $addimage->id }}" type="submit"
                                                        class="btn tmbl btn-danger ml-3 d-flex">Hapus</a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="6" class="text-center">Tidak ada data...</td>
                                @endforelse
                            </tbody>
                        </table>
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
    {{-- navbar --}}
    {{-- @include('include.navbar') --}}
    {{-- end navbar --}}
    {{-- <section class="content1">
        <h1>hallo</h1>
    </section>
    <script>
        feather.replace()
    </script>
    <script src="./js/index.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script> --}}

</body>

</html>
