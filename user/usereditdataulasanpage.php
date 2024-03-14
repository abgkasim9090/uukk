<?php
include '../user/sidebar_user.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; ">

    <h4>PROFIL | ADMIN | EDIT </h4>
    <hr>

    <form action="../process/editDataBukuProcess_admin.php" method="post" enctype="multipart/form-data">

        <?php
        include '../db.php';
        $id = $_GET["id"];
        $sql = mysqli_query($con, "SELECT * FROM ulasan WHERE id = $id");
        $data = mysqli_fetch_array($sql);
        ?>

                       

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">UlasanID</label>
            <input class="form-control" id="id" name="id" value="<?php echo  $data['id']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">nama</label>
            <input class="form-control" id="gambar_buku_2" name="gambar_buku_2" value="<?php echo  $data['gambar_buku']; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">buku</label>
            <input class="form-control" id="nama_buku" name="nama_buku" value="<?php echo  $data['nama_buku']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ulasan</label>
            <input class="form-control" id="nama_buku" name="nama_buku" value="<?php echo  $data['nama_buku']; ?>" required>
        </div>

        

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">rating</label>
            <?php
	$query_ulasan = mysqli_query($con, "select * from buku");
?>

<select name="ulasan" class="form-control" required>
	<option value="">Pilih rating</option>
	<?php
    
    foreach($query_ulasan as $ulasan){
    	echo "<option value='$ulasan[UlasanID]'>$ulasan[rating]</option>";
    }
?> 
</select>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        </div>

    </form>

    </aside>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>