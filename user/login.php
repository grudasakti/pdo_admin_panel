<html>

<head>
    <title>Login User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .card {
            margin: 0 auto;
            margin-top: 120px;
            width: 50%;
        }

        @media only screen and (max-width: 800px) {
            .card {
                width: 100%;
            }
        }

        .navbar-brand {
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <?php
    require_once "functions.php";

    if (isset($_SESSION['user'])) {
        header("Location: index.php");
    } else {
        if (isset($_POST['login'])) {
            $nim = trim($_POST["nim"]);
            $pass = trim($_POST["pass"]);

            if ($nim != "" && $pass != "") {
                try {
                    $query = "SELECT * FROM tbl_user WHERE NIM = :nim AND Password = :pass";

                    $stmt = $con->prepare($query);
                    $stmt->bindParam('nim', $nim, PDO::PARAM_STR);
                    $stmt->bindValue('pass', $pass, PDO::PARAM_STR);
                    $stmt->execute();
                    $count = $stmt->rowCount();
                    $row   = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($count == 1 && !empty($row)) {
                        $_SESSION['user'] = $nim;
                        $_SESSION['data'] = select_data($nim);
                        $_SESSION['kst'] = select_kst($nim);
                        $_SESSION['transkrip'] = select_transkrip($nim);

                        header("location:loading.php");
                    } else {
                        $message = "Username/Password Salah!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                } catch (PDOException $e) {
                    echo "Error : " . $e->getMessage();
                }
            }
        }
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand ml-2" href="login.php">SIASAT</a>
    </nav>

    <div class="container">
        <div class="card">
            <h3 class="card-header text-center bg-secondary text-light">Login</h3>
            <div class="card-body bg-dark text-light">
                <form method="POST">
                    <div class="form-group row m-4">
                        <label for="nim" class="col-lg-4 col-form-label">NIM</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="nim" required>
                        </div>
                    </div>
                    <div class="form-group row m-4">
                        <label for="pass" class="col-lg-4 col-form-label">Password</label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary w-25" name="login">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>