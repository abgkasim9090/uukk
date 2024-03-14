<?php
include '../user/sidebar_user.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #212529; ">
    <h4>PROFILE | USER
        </h4>
    <hr>

    <?php
    $userTemp = $_SESSION['user']['id'];
    $query = mysqli_query($con, "SELECT * FROM user WHERE id = '$userTemp'") or die(mysqli_error($con));
    if (mysqli_num_rows($query) == 0) {
        echo '<tr> <td> Tidak ada data </td> </tr>';
    } else {
        while ($data = mysqli_fetch_assoc($query)) {
            echo ' 
                <table class="table">

                    <tr>
                        <th>Nama</th>
                        <td>' . $data['gambar_profil'] . '
                    <tr>

                    <tr>
                        <th>Nama</th>
                        <td>' . $data['nama'] . '
                    <tr>
                    
                    <tr>
                        <th>Email</th>
                        <td>' . $data['email'] . '</td>
                    <tr>
            
                </table>
                    <a class="btn btn-primary btn-sm" href="../user/userEditProfilePage.php?id='.$data['id'].'">EDIT</a>
    
                ';
        }
    }

    ?>
</div>

</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>