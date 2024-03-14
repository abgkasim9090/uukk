<?php
include '../user/sidebar_user.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; ">

    <h4>PROFIL | ADMIN | EDIT </h4>
    <hr>

    <form action="../process/editProfileProcess_user.php" method="post" enctype="multipart/form-data">

        <?php
        include '../db.php';
        $id = $_GET["id"];
        $sql = mysqli_query($con, "SELECT * FROM user WHERE id = $id");
        $data = mysqli_fetch_array($sql);
        ?>

        <div class="mb-3">
            <?php
            echo'
            <img src="../gambu/'.$data['gambar_profil'].'" style="width:100px; height:150px; border-radius: 100%;"> </td>
            '?>
        </div>                

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ID Profil</label>
            <input class="form-control" id="id" name="id" value="<?php echo  $data['id']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Gambar Profil</label>
            <input class="form-control" id="gambar_profil_2" name="gambar_profil_2" value="<?php echo  $data['gambar_profil']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input class="form-control" id="nama" name="nama" value="<?php echo  $data['nama']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input class="form-control" id="email" name="email" value="<?php echo  $data['email']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Gambar Profil</label>
            <input type="file" class="form-control" id="gambar_profil" name="gambar_profil">
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        </div>

    </form>

    </aside>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>