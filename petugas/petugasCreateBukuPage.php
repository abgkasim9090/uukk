<?php
include '../petugas/sidebar_petugas.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; ">

    <h4>PROFIL | PETUGAS | EDIT </h4>
    <hr>

    <form action="../process/createDataBuku_petugas.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Buku</label>
            <input class="form-control" id="nama_buku" name="nama_buku" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah Buku</label>
            <input class="form-control" id="jumlah_buku" name="jumlah_buku" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Gambar Buku</label>
            <input type="file" class="form-control" id="gambar_buku" name="gambar_buku" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">kategori</label>
            <?php
	    $query_kategori = mysqli_query($con, "select * from kategoribuku");
        ?>

        <select name="kategori" class="form-control" required>
	    <option value="">Pilih Kategori</option>
	    <?php
    
        foreach($query_kategori as $kategori){
            echo "<option value='$kategori[KategoriID]'>$kategori[NamaKategori]</option>";
          }
          ?> 
            </select>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">penulis</label>
            <input class="form-control" id="penulis" name="penulis" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">penerbit</label>
            <input class="form-control" id="penerbit" name="penerbit" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">tahun terbit</label>
            <input class="form-control" id="tahun_terbit" name="tahun_terbit" required>
        </div>
        <div class="mb-30">
            <label for="exampleInputEmail1" class="form-label">deskripsi</label>
            <input class="form-control" id="deskripsi" name="deskripsi" required>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        </div>

    </form>

    </aside>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>