<?php
include '../user/sidebar_user.php';


$user_id=$_SESSION['user']['id'];

?>
<div class="container p-3 m-4 h-100" style="background-color: #338AFF; border-top: 5px 
solid #212529; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">
    

        
    
    <hr>
    <div class="d-flex">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">ID Koleksi</th>
                    <th scope="col">ID Buku</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Gambar buku</th>
                    <th scope="col">DELETE</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($con, "SELECT K.Koleksi_ID AS KoleksiID, B.* 
                FROM BUKU B
                JOIN KOLEKSI K ON B.ID = K.BukuID
                JOIN USER U ON K.UserID = U.ID
                WHERE U.ID = UserID;
                ") or
                    die(mysqli_error($con));
                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data buku</td> </tr>';
                } else {
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                        echo '
                            <tr>
                            <th scope="row">' . $no . '</th>
                            <td>' . $data['id'] . '</td>
                            <td>' . $data['nama_buku'] . '</td>
                            <td> <img src="../gambu/'.$data['gambar_buku'].'" style="width:100px; height:150px;"> </td>
                            
                            

                            
                            <td>
                                <a href="../process/deleteKoleksiProcess_user.php?id=' . $data['KoleksiID'] . '">
                                        <i style="color: #212529" class="fa fa-trash fa-2x"></i>
                                </a>
                            </td>

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

