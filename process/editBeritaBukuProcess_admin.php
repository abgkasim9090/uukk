<?php

    if(isset($_POST['tambah'])){
        
        include('../db.php');
        $id = $_POST['id'];
        $judul_berita = $_POST['judul_berita'];
        $tanggal_terbit= $_POST['tanggal_terbit'];
        $isi_berita= $_POST['isi_berita'];

            $query = mysqli_query($con,
                "UPDATE berita SET judul_berita = '$judul_berita', tanggal_terbit = '$tanggal_terbit'
                , isi_berita = '$isi_berita' WHERE id='$id'")
                or die(mysqli_error($con));

      
            if($query){
                
                echo
                    '<script>
                    alert("Update News Success");
                    window.location = "../admin/adminBeritaPage.php"
                    </script>';
    
                }else{
                    
                    echo
                        '<script>
                        alert("Register Failed");
                        </script>';
        
                }
        

            
          

        

    }else{
        
        echo
            '<script>
            window.history.back()
            </script>';

    }
    
?>