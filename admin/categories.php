<?php

session_start();

if(!isset($_SESSION['login'])) {
    header('Location: ../auth/login.php');
    exit;
}

require '../config/database.php';
require '../layouts/header.php';

$query = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");

?>

<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-8">
            <h1>Kelola Kategori</h1>
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">+ Tambah Kategori</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">
            <?= $_GET['success']; ?>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="10%">No</th>
                    <th width="60%">Nama Kategori</th>
                    <th width="30%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while($category = mysqli_fetch_assoc($query)): 
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $category['name']; ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal<?= $category['id']; ?>">Edit</button>
                            <a href="../categories/delete.php?id=<?= $category['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="../categories/store.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require '../layouts/footer.php'; ?>
