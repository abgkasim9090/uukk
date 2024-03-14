<?php
include '../petugas/sidebar_admin.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; ">

    <h4>PROFIL | PETUGAS | EDIT </h4>
    <hr>

    <form action="../process/editBeritaBukuProcess_petugas.php" method="post" enctype="multipart/form-data">

        <?php
        include '../db.php';
        $id = $_GET["id"];
        $sql = mysqli_query($con, "SELECT * FROM berita WHERE id = $id");
        $data = mysqli_fetch_array($sql);
        ?>
        
        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo  $data['id']; ?>" required>
        

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Judul Berita</label>
            <input class="form-control" id="judul_berita" name="judul_berita" value="<?php echo  $data['judul_berita']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal Terbit</label>
            <input class="form-control" id="tanggal_terbit" name="tanggal_terbit" value="<?php echo  $data['tanggal_terbit']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Isi Berita</label>
            <input class="form-control" id="isi_berita" name="isi_berita" value="<?php echo  $data['isi_berita']; ?>" required>
        </div>

        

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        </div>

    </form>

    </aside>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>