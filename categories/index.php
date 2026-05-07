<?php
require '../config/auth.php';
require '../config/database.php';
require '../layouts/header.php';

if(isset($_POST['name'])) {

    $name = $_POST['name'];

    $slug = strtolower($name);

    $slug = str_replace(' ', '-', $slug);

    mysqli_query($conn, "
        INSERT INTO categories(name, slug)
        VALUES('$name', '$slug')
    ");

    header("Location: index.php");

}

$categories = mysqli_query($conn, "
    SELECT * FROM categories
");

?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1>Kategori</h1>

</div>

<div class="row">

    <!-- FORM TAMBAH -->
    <div class="col-md-4">

        <div class="card">
            <div class="card-body">

                <h5>Tambah Kategori</h5>

                <form action="" method="POST">

                    <div class="mb-3">
                        <label>Nama Kategori</label>

                        <input type="text"
                               name="name"
                               class="form-control">
                    </div>

                    <button class="btn btn-primary">
                        Simpan
                    </button>

                </form>

            </div>
        </div>

    </div>

    <!-- DATA KATEGORI -->
    <div class="col-md-8">

        <table class="table table-bordered">

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Slug</th>
                <th>Aksi</th>
            </tr>

            <?php $no = 1; ?>

            <?php while($category = mysqli_fetch_assoc($categories)) : ?>

            <tr>

                <td><?= $no++ ?></td>

                <td>
                    <?= $category['name'] ?>
                </td>

                <td>
                    <?= $category['slug'] ?>
                </td>

                <td>

                    <a href="delete.php?id=<?= $category['id'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus kategori?')">

                        Hapus

                    </a>

                </td>

            </tr>

            <?php endwhile; ?>

        </table>

    </div>

</div>

<?php require '../layouts/footer.php'; ?>