<?php
require_once("../db.php");

if (isset($_SESSION['user'])) {
    header("Location:../404.php");
}
$id = mysqli_real_escape_string($con, $_GET['id']);
$query = mysqli_query($con, "SELECT * FROM buku as b
                 LEFT JOIN kategoribuku_relasi as kbr ON b.id = kbr.BukuID
                 LEFT JOIN kategoribuku as kb ON kbr.KategoriID = kb.KategoriID
                 WHERE b.id = $id");
// $query = mysqli_query($con, "SELECT * FROM buku WHERE id = $id");
$buku = mysqli_fetch_assoc($query);

// $check_query = mysqli_query($con, "SELECT * FROM peminjaman WHERE id_buku = '$id'");
// $is_borrowed = mysqli_num_rows($check_query) > 0;

$total_rating_query = mysqli_query($con, "SELECT SUM(ulasan.rating) AS total_rating FROM ulasan WHERE BukuID ='$id' AND ulasan.rating IS NOT NULL");
$total_rating_row = mysqli_fetch_assoc($total_rating_query);
$total_rating = $total_rating_row['total_rating'];

$ulasan_query = mysqli_query($con, "SELECT ulasan.rating FROM ulasan WHERE BukuID ='$id' AND ulasan.rating IS NOT NULL");
$jumlah_ulasan = mysqli_num_rows($ulasan_query);

while ($rating_row = mysqli_fetch_assoc($ulasan_query)) {
    $total_rating += $rating_row['rating'];
}

if ($jumlah_ulasan > 0) {
    $rata_rata_rating = $total_rating / $jumlah_ulasan;
    $rata_rata_rating = min($rata_rata_rating, 5);
} else {
    $rata_rata_rating = 0; // Jika tidak ada ulasan, rata-rata dianggap 0
}

?>

<?php
include '../user/sidebar_user.php';
?>
    <section class="container">
    <section id="" style="margin-top: 50px; margin-left:40px">
        <div class=" d-flex gap-0">
            <div class="card border-0">
                <img src="../gambu/<?= $buku['gambar_buku']; ?>" class="img-fluid" style="width: auto; max-height:60vh; min-height:60vh;" alt="">
                <br>

            </div>

            <div class="ml-5" style="margin-left: 40px">
                <h2><?= $buku['nama_buku'] ?></h2>
                <h6><?= $buku['penulis'] ?></h6>
                <br>
                <p>Rata-rata Rating : <?php echo number_format($rata_rata_rating, 1); ?></p>
                <p>Kategori: <?= $buku['NamaKategori'] ?></p>
                <p>Tahun terbit: <?= $buku['tahun_terbit'] ?> </p>
                <p>Penerbit: <?= $buku['penerbit'] ?> </p>
                <p>deskripsi: <?= $buku['deskripsi']?></p>

                <!-- tambah ulasan -->
                
                    <h5>Tambah Ulasan</h5>
                    <form id="formUlasan" action="tambah-ulasan.php?id=<?php echo $buku['id']; ?>" method="post">
                        <div class="row mb-3">
                            <div class="col-md-4 ms-0">Rating :</div>
                            <div class="col-md-0">
                                <select name="rating" class="form-control">
                                    <option value="1">1 Bintang</option>
                                    <option value="2">2 Bintang</option>
                                    <option value="3">3 Bintang</option>
                                    <option value="4">4 Bintang</option>
                                    <option value="5">5 Bintang</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 ms-0"></div>
                            <div class="col-md-0">
                                <textarea name="deskripsi" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                        <button type="submit" style="border: 1px solid black; border-radius: 5px; padding: 5px 10px; color: black; margin-bottom: 10px;">Kirim Ulasan</button>
                    </form>
                
            </div>
        </div>
    </section>
    
    <section class="isi-ulasan-container" id="ulasan">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h5>Ulasan</h5>
                    <div class="list-group">
                         <?php
                                $ulasan_query = mysqli_query($con, "SELECT ulasan.ulasan, ulasan.rating, user.nama FROM ulasan JOIN user ON ulasan.UserID = user.id WHERE BukuID ='$id' AND (ulasan.ulasan IS NOT NULL OR ulasan.rating IS NOT NULL)");
                                while ($ulasan = mysqli_fetch_assoc($ulasan_query)) {
                                    echo '<div class="list-group-item mb-3 bg-light">';
                                    echo '<h6 class="mb-1">' . $ulasan['nama'] . '</h6>';

                                    if (!empty($ulasan['ulasan'])) {
                                        echo '<p class="mb-1">' . $ulasan['ulasan'] . '</p>';
                                    }

                                    if (!empty($ulasan['rating'])) {
                                        echo '<p class="mb-1">Rating: ' . $ulasan['rating'] . '</p>';
                                    }
                                    echo '</div>'; // tutup list-group-item
                                }
                                ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
</aside>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>