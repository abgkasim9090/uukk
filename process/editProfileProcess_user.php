<?php

    if(isset($_POST['tambah'])){
        
        include('../db.php');
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        
        $gambar_profil = $_FILES['gambar_profil']['name'];
        $tmp_gambar_profil = $_FILES['gambar_profil']['tmp_name'];
        $folder = '../gambu/';
        move_uploaded_file($tmp_gambar_profil, $folder.$gambar_profil);
        
        if($gambar_profil == ""){
            $query = mysqli_query($con,
                "UPDATE user SET nama = '$nama', email = '$email' WHERE id='$id'")
                or die(mysqli_error($con));


            if($query){
                
                echo
                    '<script>
                    alert("Update data user Success"); 
                    window.location = "../user/userProfilePage.php"
                    </script>';
    
                }else{
                    
                    echo
                        '<script>
                        alert("Register Failed");
                        </script>';
        
                }
        }else{
            $query = mysqli_query($con,
                "UPDATE user SET nama = '$nama', email = '$email', gambar_profil = '$gambar_profil' WHERE id='$id'")
                or die(mysqli_error($con));


            if($query){
                
                echo
                    '<script>
                    alert("Update Profil Success"); 
                    window.location = "../user/userProfilePage.php"
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