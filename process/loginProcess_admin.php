<?php

    if(isset($_POST['login'])){

        include('../db.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$username'") 
        or die(mysqli_error($con));

        if(mysqli_num_rows($query) == 0){

            echo
                '<script>
                alert("Username not found!"); window.location = "../page/loginPage_admin.php"
                </script>';

        }else{
            $admin = mysqli_fetch_assoc($query);
            if(password_verify($password, $admin['password'])){

                session_start();

                $_SESSION['isLogin'] = true;
                $_SESSION['admin'] = $admin;

                echo
                    '<script>
                    alert("Login Success"); window.location = "../admin/adminDash.php"
                    </script>';

            }else {

                echo
                    '<script>
                    alert("Username or Password Invalid");
                    window.location = "../page/loginPage_admin.php"
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