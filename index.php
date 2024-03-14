<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Perpustakaan</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container">

            <a class="navbar-brand fw-bold" href="index.php" style="text-align: center;">Perpustakaan</a>

            <div class="d-flex justify-content-end">

                <button class="btn btn-warning me-2" type="button">
                    <a class="text-light" style="text-decoration: none" href="index.php">HOME</a>
                </button>

            </div>

        </div>
    </nav>

    <div class="bg">

        <div class="container min-vh-100 d-flex align-items-center">
            <div class="pt-5 mt-4">
                <h2 class="text-center align-middle">WELCOME TO PERPUSTAKAAN | HOME</h2>

                <button class="btn btn-primary me-2" type="button">
                    <a class="text-light" style="text-decoration: none" href="./user/userPage.php">USER</a>
                </button>

                <button class="btn btn-primary me-2" type="button" href="./adminPage.php">
                    <a class="text-light" style="text-decoration: none" href="./admin/adminPage.php">ADMIN</a>
                </button>

                <button class="btn btn-primary me-2" type="button" href="./petugasPage.php">
                    <a class="text-light" style="text-decoration: none" href="./petugas/petugasPage.php">PETUGAS</a>
                </button>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>