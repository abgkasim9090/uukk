<?php

    if(isset($_POST['tambah'])){
        
        include('../db.php');
        $id = $_POST['id'];
        $judul_berita = $_POST['judul_berita'];
        $tanggal_terbit= $_POST['tanggal_terbit'];
        $isi_berita= $_POST['isi_berita'];

           
                $query = mysqli_query($con,
                "INSERT INTO berita(judul_berita, tanggal_terbit, isi_berita) 
                VALUES
                ('$judul_berita', '$tanggal_terbit', '$isi_berita')") or die(mysqli_error($con));


            if($query){
                
                echo
                    '<script>
                    alert("Create News Success"); 
                    window.location = "../petugas/petugasBeritaPage.php"
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