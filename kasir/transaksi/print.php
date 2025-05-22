<?php
include "../koneksi.php";

if (isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];
    $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
    $data = mysqli_fetch_array($query);

    $query2 = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_transaksi='$id_transaksi'");
    $barang = [];
    while ($row = mysqli_fetch_array($query2)) {
        $barang[] = $row;
    }
} else {
    echo "ID Transaksi tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header bg-primary text-light">
                <h1 class="text-center">Laporan Transaksi</h1>
            </div>
            <div class="card-body">
                <h5>Informasi Transaksi:</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><b>ID Transaksi:</b></td>
                            <td><?php echo $data['id_transaksi']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Pembelian:</b></td>
                            <td><?php echo $data['tanggal']; ?></td>
                        </tr>
                    </tbody>
                </table>

                <h5>Detail Produk:</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Jumlah (pcs)</th>
                            <th>Harga /pcs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td>Rp. <?php echo number_format($data['hargaPCS']); ?></td>
                        </tr>
                        <?php foreach ($barang as $item): ?>
                        <tr>
                            <td><?php echo $item['nama_produk']; ?></td>
                            <td><?php echo $item['jumlah']; ?></td>
                            <td>Rp. <?php echo number_format($item['hargaPCS']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <h5>Ringkasan Pembayaran:</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><b>Total Harga:</b></td>
                            <td>Rp. <?php echo number_format($data['total']); ?></td>
                        </tr>
                        <tr>
                            <td><b>Total Bayar:</b></td>
                            <td>Rp. <?php echo number_format($data['uang_cash']); ?></td>
                        </tr>
                        <tr>
                            <td><b>Kembalian:</b></td>
                            <td>Rp. <?php echo number_format($data['kembalian']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="card-footer">
                <button class="btn btn-primary no-print" onclick="window.print();">Print</button>
                <a href="index.php" class="btn btn-secondary no-print">Kembali</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/ umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb8g5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-1g5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5c5" crossorigin="anonymous"></script>
</body>
</html> 