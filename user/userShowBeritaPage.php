<?php
include '../user/sidebar_user.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; ">
    <h4>SHOW | BERITA | ADMIN
        </h4>
    <hr>

    <?php
    $id = $_GET["id"];
    $query = mysqli_query($con, "SELECT * FROM berita WHERE id = '$id'") or die(mysqli_error($con));
    if (mysqli_num_rows($query) == 0) {
        echo '<tr> <td> Tidak ada data </td> </tr>';
    } else {
        while ($data = mysqli_fetch_assoc($query)) {
            echo ' 
                <table class="table">

                    
                    <tr>
                        <th>Judul Berita</th>
                        <td>' . $data['judul_berita'] . '
                    <tr>
                    
                    <tr>
                        <th>Tanggal Terbit</th>
                        <td>' . $data['tanggal_terbit'] . '</td>
                    <tr>

                    <tr>
                        <th>Isi Berita</th>
                        <td>' . $data['isi_berita'] . '</td>
                    <tr>
            
                </table>
                   
                ';
        }
    }

    ?>
</div>

</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>