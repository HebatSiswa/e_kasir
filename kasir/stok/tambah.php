<?php
include "../koneksi.php";
include "header2.php";

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    
    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
    $data = mysqli_fetch_array($query);
}
?>

<div class="container mt-5">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-4">
            <img src="../asset/img/<?php echo htmlspecialchars($data['foto']); ?>" 
                 alt="Gambar Produk" 
                 class="img-thumbnail" 
                 style="width:100%; max-height:350px; object-fit:cover;">
        </div>

        <!-- FORM UPDATE STOK -->
        <div class="col-md-8">
            <form action="tambah_proses.php" method="POST">
                <h4 class="mb-3">Detail Produk</h4>

                <!-- ID Produk -->
                <input type="hidden" name="id_produk" value="<?php echo htmlspecialchars($data['id_produk']); ?>">
                <p><strong>ID Produk:</strong> <?php echo htmlspecialchars($data['id_produk']); ?></p>

                <!-- Nama Produk -->
                <input type="hidden" name="nama_produk" value="<?php echo htmlspecialchars($data['nama_produk']); ?>">
                <p><strong>Nama Produk:</strong> <?php echo htmlspecialchars($data['nama_produk']); ?></p>

                <!-- Stok -->
                <div class="mb-3">
                    <label class="form-label"><strong>Stok Sekarang:</strong> <?php echo $data['stok']; ?></label>
                    <input type="number" name="stok" class="form-control" placeholder="Tambahkan stok baru" required>
                </div>

                <!-- Harga -->
                <input type="hidden" name="harga" value="<?php echo $data['harga']; ?>">
                <p><strong>Harga / pcs:</strong> Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></p>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label class="form-label"><strong>Deskripsi Produk:</strong></label>
                    <textarea class="form-control" rows="4" disabled><?php echo htmlspecialchars($data['deskripsi']); ?></textarea>
                </div>

                <!-- Tombol -->
                <div class="d-flex gap-2">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan Stok</button>
                    <a href="../produk/hapus.php?id_produk=<?php echo $data['id_produk']; ?>" 
                       onclick="return confirm('Yakin ingin menghapus produk ini?')"
                       class="btn btn-danger ">
                        Hapus Produk
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
