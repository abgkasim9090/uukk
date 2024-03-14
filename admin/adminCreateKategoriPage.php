<?php
include '../admin/sidebar_admin.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; ">

    <h4>PROFIL | ADMIN | TAMBAH </h4>
    <hr>

    <form action="../process/createDataKategori_admin.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
            <input class="form-control" id="NamaKategori" name="NamaKategori" required>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        </div>

    </form>

    </aside>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>