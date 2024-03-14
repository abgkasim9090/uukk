<?php
    session_start();
    if(isset($_GET['id'])){
        include ('../db.php');
        $id = $_GET['id'];
        
        $queryCheck_1 = mysqli_query($con, "DELETE FROM peminjaman where id_buku='$id' AND status='Sudah Dikembalikan'") or 
        die(mysqli_error($con));

        $queryCheck = mysqli_query($con, "SELECT * FROM user INNER JOIN peminjaman on user.id=peminjaman.id_peminjam INNER JOIN buku on peminjaman.id_buku=buku.id WHERE id_buku='$id'") or 
        die(mysqli_error($con));

        if (mysqli_num_rows($queryCheck) != 0){
        
            echo
               '<script> alert("Tidak dapat dihapus karena sedang yang meminjam"); 
               window.location = "../admin/adminDash.php"</script>';

        }else{
            
            

            $queryDelete = mysqli_query($con, "DELETE FROM kategoribuku_relasi WHERE BukuID='$id'") or
            die(mysqli_error($con));

            if($queryDelete){
                $queryDelete = mysqli_query($con, "DELETE FROM buku WHERE id='$id'") or die(mysqli_error($con));

                echo
                    '<script>
                    alert("Delete Success"); window.location = "../admin/adminDash.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Delete Failed"); window.location = "../admin/adminDash.php"
                    </script>';
            }
        }

        
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>