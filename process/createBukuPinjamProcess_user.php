<?php
    
    if(isset($_GET['id'])){
        session_start();
        if ($_SESSION['isLogin']);
        $userTemp = $_SESSION['user']['id'];

        include ('../db.php');
        $id = $_GET['id'];
        
        $cek = $userTemp;
        
        $data_buku = mysqli_query($con, "SELECT * FROM buku WHERE id='$id'") or
        die(mysqli_error($con));

        $data_buku = mysqli_fetch_array($data_buku);

        $jumlah_buku = $data_buku['jumlah_buku'];
        $kurang = 1;
        $jumlah_buku_kurang = ($jumlah_buku-$kurang);
        
        $data_peminjaman_cek = mysqli_query($con, "SELECT * FROM peminjaman WHERE id_buku='$id' AND status='Belum Dikembalikan' AND id_peminjam='$userTemp'") or
        die(mysqli_error($con));

        $data_peminjaman = mysqli_query($con, "SELECT * FROM peminjaman WHERE id_buku='$id'") or
        die(mysqli_error($con));
        
        $data_peminjaman = mysqli_fetch_array($data_peminjaman);

        $id_buku_cek = $data_peminjaman['id_buku'];
        $status_cek = $data_peminjaman['status'];

        if(mysqli_num_rows($data_peminjaman_cek) != 0){
            echo
            '<script>
            alert("Peminjaman Buku Gagal, tidak boleh meminjam lebih dari satu buku dengan judul yang sama"); 
            window.location = "../user/userDash.php"
            </script>';
        }else{

            if($jumlah_buku<=0){
                echo
                '<script>
                alert("Peminjaman Buku Gagal, karena stok buku sedang kosong"); 
                window.location = "../user/userDash.php"
                </script>';
            }else{
                $queryUpdate = mysqli_query($con,  
                "UPDATE buku SET jumlah_buku ='$jumlah_buku_kurang' WHERE id='$id'")    
                    or die(mysqli_error($con)); 
            
    
                $status = "Belum Dikembalikan";
                $date=date_create(date("Y-m-d"));
                $tanggal_peminjaman = date("Y-m-d");
                $tanggal_pengembalian = date_modify($date,"+7 days")->format("Y-m-d");
                $id_peminjam = $userTemp;
                $id_buku = $id;
    
                $query = mysqli_query($con,
                "INSERT INTO peminjaman(status, 
                tanggal_pengembalian, tanggal_peminjaman, 
                id_peminjam, id_buku) 
                VALUES
                ('$status', 
                '$tanggal_pengembalian', 
                '$tanggal_peminjaman', 
                '$id_peminjam', '$id_buku')") or die(mysqli_error($con));
                        
                
    
                $queryCheck = mysqli_query($con, "SELECT * FROM user INNER JOIN peminjaman on user.id=peminjaman.id_peminjam INNER JOIN buku on peminjaman.id_buku=buku.id WHERE id_buku='$id'") or 
                die(mysqli_error($con));
                
    
                if($query){
    
                    echo
                        '<script>
                        alert("Peminjaman Buku Berhasil"); 
                        window.location = "../user/userDash.php"
                        </script>';
    
                }else{
    
                    echo
                        '<script>
                        alert("Register Failed");
                        </script>';
    
                }
            }
            
        }

        
        
        
        

        
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>