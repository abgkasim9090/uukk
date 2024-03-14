<?php

    if(isset($_POST['tambah'])){

        include('../db.php');

        $nama_buku = $_POST['nama_buku'];
        $jumlah_buku = $_POST['jumlah_buku'];
        $kategori_id = $_POST['kategori'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $deskripsi = $_POST['deskripsi'];
        

        
            // var_dump(mysqli_fetch_object($query_buku_terbaru)->id, $kategori_id);
            // die();
        $gambar_buku = $_FILES['gambar_buku']['name'];
        $tmp_gambar_buku = $_FILES['gambar_buku']['tmp_name'];
        $folder = '../gambu/';
        move_uploaded_file($tmp_gambar_buku, $folder.$gambar_buku);

            $query = mysqli_query($con,
                "INSERT INTO buku(nama_buku, gambar_buku, jumlah_buku, penulis, penerbit, tahun_terbit, deskripsi) 
                VALUES
                ('$nama_buku', '$gambar_buku', '$jumlah_buku', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')") or die(mysqli_error($con));
                
                 $query_buku_terbaru = mysqli_query($con, "select * from buku order by id desc");
                 $buku_terbaru = mysqli_fetch_object($query_buku_terbaru);

            $query_insert_kategoribuku_relasi = mysqli_query($con, "INSERT INTO kategoribuku_relasi (BukuID, KategoriID)
                VALUES
                ('$buku_terbaru->id', '$kategori_id')
            ");
            if($query){
                
                echo
                    '<script>
                    alert("Create Book Success"); 
                    window.location = "../petugas/petugasDash.php"
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