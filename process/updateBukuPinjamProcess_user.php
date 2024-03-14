<?php
    session_start();
    if(isset($_GET['id'])){

        $userTemp = $_SESSION['user']['id'];

        include ('../db.php');
        $id = $_GET['id'];
        
        
        $data_buku = mysqli_query($con, "SELECT * FROM buku WHERE id='$id'") or
        die(mysqli_error($con));

        $data_buku = mysqli_fetch_array($data_buku);

        $jumlah_buku = $data_buku['jumlah_buku'];
        $kurang = 1;
        $jumlah_buku_kurang = ($jumlah_buku+$kurang);
        
        
            $queryUpdate = mysqli_query($con,  
            "UPDATE buku SET jumlah_buku ='$jumlah_buku_kurang' WHERE id='$id'")    
                or die(mysqli_error($con)); 
        

            $status = "Sudah Dikembalikan";
            $date=date_create(date("Y-m-d"));
            $tanggal_peminjaman = date("Y-m-d");
            $tanggal_pengembalian = date_modify($date,"+7 days")->format("Y-m-d");
            $id_peminjam = $userTemp;
            $id_buku = $id;

            $query = mysqli_query($con,
            "UPDATE peminjaman SET status = '$status', 
            tanggal_pengembalian = '$tanggal_pengembalian', tanggal_peminjaman = '$tanggal_peminjaman', 
            id_peminjam = '$id_peminjam', id_buku = '$id_buku' WHERE id_buku='$id' AND id_peminjam = '$userTemp'")
                or die(mysqli_error($con));
                    
            

            $queryCheck = mysqli_query($con, "SELECT * FROM user INNER JOIN peminjaman on user.id=peminjaman.id_peminjam INNER JOIN buku on peminjaman.id_buku=buku.id WHERE id_buku='$id'") or 
            die(mysqli_error($con));
            

            if($query){

                echo
                    '<script>
                    alert("Pengembalian Buku Berhasil"); 
                    window.location = "../user/userDaftarBukuPinjamPage.php"
                    </script>';

            }else{

                echo
                    '<script>
                    alert("Register Failed");
                    </script>';

            }
        
        
        
        

        
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>