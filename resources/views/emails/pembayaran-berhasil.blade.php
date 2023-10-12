<!DOCTYPE html>
<html>

<head>
    <title>Pemberitahuan Pembayaran Berhasil</title>
</head>

<body>
    <p>Terima kasih! Pembayaran Anda untuk pesanan dengan ID {{ $order_id }} telah berhasil.</p>
    <p>Halo,</p>
    <p>Pembayaran Anda telah berhasil diverifikasi.</p>
    <p>Nama Pelanggan: {{ $name }}</p>
    <p>Total Harga: Rp.{{ $jml }}</p>
    <p>Tanggal Pembelian: {{ date('d/m/y', strtotime($total_price)) }}</p>
    <p>Jumlah Tiket: {{ $status }}</p>
    <p>Status: {{ $created_at }}</p>
    <p>Terima kasih atas pesanan Anda.</p>
    <p>Salam,</p>
    <p>Tim Support</p>
</body>

</html>
