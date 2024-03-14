<?php

    if(isset($_POST['tambah'])){

        include('../db.php');

        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $gambar_profil = $_FILES['gambar_profil']['name'];
        $tmp_gambar_profil = $_FILES['gambar_profil']['tmp_name'];
        $folder = '../gambu/';
        move_uploaded_file($tmp_gambar_profil, $folder.$gambar_profil);

        $cek_email=mysqli_num_rows(mysqli_query($con, "SELECT email FROM user WHERE email='$email'"));

         if ($cek_email > 0){
        
             echo
                '<script> alert("Email is already use. Please, try another email."); 
                window.location = "../page/registerPage.php"</script>';

           }else{
            $query = mysqli_query($con,
            "INSERT INTO user(nama, email, password, gambar_profil) 
            VALUES
            ('$nama', '$email', '$password', '$gambar_profil')") or die(mysqli_error($con));


        if($query){
            
            echo
                '<script>
                alert("Create user Success"); 
                window.location = "../Page/RegisterPage.php"
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