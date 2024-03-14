<?php
include '../petugas/sidebar_petugas.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; ">

    <h4>PROFIL | PETUGAS | EDIT </h4>
    <hr>

    <form action="../process/editDataBukuProcess_petugas.php" method="post" enctype="multipart/form-data">

        <?php
        include '../db.php';
        $id = $_GET["id"];
        $sql = mysqli_query($con, "SELECT * FROM buku WHERE id = $id");
        $data = mysqli_fetch_array($sql);
        ?>

        <div class="mb-3">
            <?php
            echo'
            <img src="../gambu/'.$data['gambar_buku'].'" style="width:100px; height:150px;"> </td>
            '?>
        </div>                

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ID Buku</label>
            <input class="form-control" id="id" name="id" value="<?php echo  $data['id']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Gambar Buku</label>
            <input class="form-control" id="gambar_buku_2" name="gambar_buku_2" value="<?php echo  $data['gambar_buku']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Buku</label>
            <input class="form-control" id="nama_buku" name="nama_buku" value="<?php echo  $data['nama_buku']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">jumlah_buku</label>
            <input class="form-control" id="jumlah_buku" name="jumlah_buku" value="<?php echo  $data['jumlah_buku']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Gambar Buku</label>
            <input type="file" class="form-control" id="gambar_buku" name="gambar_buku">
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        </div>

    </form>

    </aside>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>