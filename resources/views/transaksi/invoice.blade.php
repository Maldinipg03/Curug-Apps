<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Curug Cipendok</title>
</head>

<body>
    <div class="container">
        <div class="card">
            {{-- <div class="card-header">
                Featured
            </div> --}}
            <div class="card-body">
                <h5 class="card-title">Bukti Pembayaran</h5>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td> : {{ $order->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{ $order->email }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Tiket</td>
                        <td> : {{ $order->jml }}</td>
                    </tr>
                    <tr>
                        <td>Total harga</td>
                        <td> : {{ $order->total_price }}</td>
                    </tr>
                    <tr>
                        <td>Status pembayaran</td>
                        <td> : {{ $order->status }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pembelian dan berlaku</td>
                        <td> : {{ $order->created_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <p>Note: Tunjukan Bukti pembayaran ini ke petugas penjaga untuk bisa masuk</p>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
