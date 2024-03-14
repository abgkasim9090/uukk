<?php

if (isset($_POST['tambah'])) {

    include('../db.php');
    $id = $_POST['id'];
    $NamaKategori = $_POST['NamaKategori'];


    $query = mysqli_query(
        $con,
        "INSERT INTO kategoribuku(NamaKategori) 
                VALUES
                ('$NamaKategori')"
    ) or die(mysqli_error($con));

    if ($query) {

        echo
            '<script>
                    alert("Create News Success"); 
                    window.location = "../petugas/petugas.php"
                    </script>';

    } else {

        echo
            '<script>
                        alert("Register Failed");
                        </script>';

    }

} else {

    echo
        '<script>
            window.history.back()
            </script>';

}

?>