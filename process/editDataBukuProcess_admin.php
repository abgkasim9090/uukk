<?php

    if(isset($_POST['tambah'])){
        
        include('../db.php');
        $id = $_POST['id'];
        $nama_buku = $_POST['nama_buku'];
        $jumlah_buku = $_POST['jumlah_buku'];
        $kategori_id = $_POST['kategori'];
        
        $gambar_buku = $_FILES['gambar_buku']['name'];
        $tmp_gambar_buku = $_FILES['gambar_buku']['tmp_name'];
        $folder = '../gambu/';
        move_uploaded_file($tmp_gambar_buku, $folder.$gambar_buku);

        if($gambar_buku == ""){
            $query = mysqli_query($con,
                "UPDATE buku SET nama_buku = '$nama_buku', jumlah_buku = '$jumlah_buku' WHERE id='$id'")
                or die(mysqli_error($con));
            $query = mysqli_query($con,
                "UPDATE kategoribuku_relasi SET KategoriID = '$kategori_id' WHERE BukuID='$id'")
                or die(mysqli_error($con));


            if($query){
                
                echo
                    '<script>
                    alert("Update Book Success"); 
                    window.location = "../admin/adminDash.php"
                    </script>';
    
                }else{
                    
                    echo
                        '<script>
                        alert("Register Failed");
                        </script>';
        
                }
        }else{
            $query = mysqli_query($con,
                "UPDATE buku SET nama_buku = '$nama_buku', gambar_buku = '$gambar_buku', jumlah_buku = '$jumlah_buku' WHERE id='$id'")
                or die(mysqli_error($con));
                $query = mysqli_query($con,
                "UPDATE kategoribuku_relasi SET KategoriID = '$kategori_id' WHERE BukuID='$id'")
                or die(mysqli_error($con));


            if($query){
                
                echo
                    '<script>
                    alert("Create Book Success"); 
                    window.location = "../admin/adminDash.php"
                    </script>';
    
                }else{
                    
                    echo
                        '<script>
                        alert("Register Failed");
                        </script>';
        
                }
        }

            
          

        

    }else{
        
        echo
            '<script>
            window.history.back()
            </script>';

    }
    
?>