<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrit y="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../style.css" rel="stylesheet">
    <title>Register Page</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="../index.php">Perpustakaan</a>
            <div class="d-flex justify-content-end">
                <button class="btn btn-warning me-2" type="button">
                    <a class="text-light" style="text-decoration: none" href="../index.php">HOME</a>
                </button>
            </div>
        </div>
    </nav>
    <div class="bg bg-light text-dark">
        <div class="container min-vh-100 d-flex align-items-center justify-content-center">
            <div class="card text-white bg-dark ma-5 shadow" style="min-width: 
25rem;">
                <div class="card-header fw-bold">Register</div>
                <div class="card-body">

                    <form action="../process/registerProcess_user.php" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input class="form-control" id="emai" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input class="form-control" id="password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Gambar Profil</label>
                            <input type="file" class="form-control" id="gambar_profil" name="gambar_profil" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="tambah">Register</button>
                        </div>

                    </form>

                    <p class="mt-2 mb-0">Have an account? <a href="./loginPage.php" class="text-primary">Login here!</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>