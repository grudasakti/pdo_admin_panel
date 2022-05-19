<html>

<head>
    <title>Main Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand ml-2" href="index.php">ADMIN PANEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto px-3">
                <li class="nav-item">
                    <a class="nav-link" href="menu_tambah.php">Tambah Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu_data.php">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu_detail.php">Detail Mahasiswa</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-2">
                <li class="nav-item">
                    <a class="btn btn-secondary btn-block" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="margin-top: 50px;">
        <?php
        require_once "functions.php";

        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
        } else {
            echo '<h1>Welcome, ' . $_SESSION['user'] . '</h1>';
        }
        ?>
    </div>
</body>

</html>