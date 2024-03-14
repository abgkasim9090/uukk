<?php
include '../admin/sidebar_admin.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; ">

    <h4>generate laporan </h4>
    <hr>

    <form action="../process/createDataBerita_admin.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">generate laporan</label>
            <input class="form-control" id="judul_berita" name="judul_berita" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">nomor</label>
            <input class="form-control" id="tanggal_terbit" name="tanggal_terbit" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">laporan</label>
            <input class="form-control" id="isi_berita" name="isi_berita" required>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        </div>

    </form>

    </aside>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>