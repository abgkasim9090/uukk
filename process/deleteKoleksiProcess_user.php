<?php
    session_start();
    if(isset($_GET['id'])){
        include ('../db.php');
        $id = $_GET['id'];
        
        

            $queryDelete = mysqli_query($con, "DELETE FROM koleksi WHERE Koleksi_ID='$id'") or
            die(mysqli_error($con));

            if($queryDelete){
                echo '<script>
                alert("Delete Success"); 
                window.location = "../user/userkoleksipribadi.php?id=' . $id . '";
            </script>';
            
            }else{
                echo
                    '<script>
                    alert("Delete Failed"); window.location = "../user/userDash.php"
                    </script>';
            }
        

        
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>