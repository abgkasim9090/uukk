<?php
include '../petugas/sidebar_petugas.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">
    <h4>
        KATEGORI | 
        <button class="btn btn-primary me-2" type="button">
            <a class="text-light" style="text-decoration: none;" href="../petugas/petugasCreateKategoriPage.php">Tambah Kategori</a>
        </button>
    </h4>

        
    
    <hr>
    <div class="d-flex">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Kategori</th>
                    <th scope="col">Nama Kategori</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($con, "SELECT * FROM kategoribuku") or
                    die(mysqli_error($con));
                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data kategori</td> </tr>';
                } else {
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                        echo '
                            <tr>
                            <th scope="row">' . $no . '</th>
                            <td>' . $data['KategoriID'] . '</td>
                            <td>' . $data['NamaKategori'] . '</td>

                            

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