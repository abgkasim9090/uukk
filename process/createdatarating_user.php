<?php

if (isset($_POST['tambah'])) {

    include('../db.php');
    $id = $_POST['UlasanID'];
    $Ulasan = $_POST['Ulasan'];


    $query = mysqli_query(
        $con,
        "INSERT INTO ulasan(UlasanID) 
                VALUES
                ('$UlasanID', '$rating')"
    ) or die(mysqli_error($con));

    if ($query) {

        echo
            '<script>
                    alert("Create News Success"); 
                    window.location = "../user/userdash.php"
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