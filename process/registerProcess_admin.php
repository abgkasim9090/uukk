<?php

    if(isset($_POST['register'])){

        include('../db.php');

        $username= $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $query = mysqli_query($con,
        "INSERT INTO admin(username, password) 
        VALUES
        ('$username', '$password')") or die(mysqli_error($con));
        
        if($query){

            echo
                '<script>
                alert("Register Success"); 
                window.location = "../admin/adminPage.php"
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