<?php
include '../petugas/sidebar_petugas.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">
    <h4>BUKU</h4>
    <hr>
    <div class="d-flex">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Peminjaman</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Gambar Buku</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userTemp = $_SESSION['user']['id'];
                $query = mysqli_query($con, "SELECT * FROM user INNER JOIN peminjaman on user.id=peminjaman.id_peminjam INNER JOIN buku on peminjaman.id_buku=buku.id where status = 'Belum Dikembalikan'") or
                    die(mysqli_error($con));
                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data buku</td> </tr>';
                } else {
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                        echo '
                            <tr>
                            <th scope="row">' . $no . '</th>
                            <td>' . $data['id_peminjaman'] . '</td>
                            <td>' . $data['nama_buku'] . '</td>
                            <td>' . $data['nama'] . '</td>
                            <td> <img src="../gambu/'.$data['gambar_buku'].'" style="width:100px; height:150px;"> </td>
                            <td>' . $data['status'] . '</td>
                            <td>' . $data['tanggal_pengembalian'] . '</td>
                            </tr>';
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</aside>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
