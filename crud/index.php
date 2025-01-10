<?php 
session_start();
require_once 'config/database.php';
require_once 'includes/header.php';

// Query untuk mengambil data
$stmt = $pdo->query("SELECT * FROM barang ORDER BY id DESC");
$barang = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Barang</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Tambah Barang
        </button>
    </div>
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Tanggal</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($barang as $index => $item): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($item['nama_barang']) ?></td>
                <td><?= number_format($item['harga'], 0, ',', '.') ?></td>
                <td><?= $item['stok'] ?></td>
                <td><?= $item['tanggal'] ?></td>
                <td>
                    <button type="button" class="btn btn-success btn-sm" 
                            onclick="editBarang(<?= $item['id'] ?>)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" 
                            onclick="deleteBarang(<?= $item['id'] ?>)">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Tambahkan ini setelah table dan sebelum footer -->
<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-3">
                        <label for="edit_nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="edit_nama_barang" name="nama_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="edit_harga" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="edit_stok" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="edit_tanggal" name="tanggal" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambahkan script ini sebelum closing body tag -->
<script>
function editBarang(id) {
    // Ambil data barang dengan AJAX
    fetch(`actions/get_barang.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            // Isi form dengan data yang ada
            document.getElementById('edit_id').value = data.id;
            document.getElementById('edit_nama_barang').value = data.nama_barang;
            document.getElementById('edit_harga').value = data.harga;
            document.getElementById('edit_stok').value = data.stok;
            document.getElementById('edit_tanggal').value = data.tanggal;
            
            // Tampilkan modal
            new bootstrap.Modal(document.getElementById('editModal')).show();
        });
}

// Handle form submission
document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('actions/update.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Tutup modal
            bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
            // Refresh halaman
            location.reload();
        } else {
            alert('Terjadi kesalahan: ' + data.message);
        }
    });
});
</script>
</div>

<?php require_once 'includes/footer.php'; ?>