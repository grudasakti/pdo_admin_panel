<html>

<head>
    <title>Tambah Mahasiswa</title>
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
                    <a class="nav-link active" href="menu_tambah.php">Tambah Mahasiswa</a>
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
            if (isset($_POST['tambah'])) {
                $tambah_data['nim'] = isset($_POST['nim']) ? $_POST['nim'] : "";
                $tambah_data['nama'] = isset($_POST['nama']) ? $_POST['nama'] : "";
                $tambah_data['ipk'] = isset($_POST['ipk']) ? (float) $_POST['ipk'] : "";
                $tambah_data['asal'] = isset($_POST['asal']) ? $_POST['asal'] : "";
                $tambah_data['pass'] = isset($_POST['pass']) ? $_POST['pass'] : "";

                if ($tambah_data['nim'] == "" || $tambah_data['nama'] == "" || $tambah_data['ipk'] == "" || $tambah_data['asal'] == "" || $tambah_data['pass'] == "") {
                    echo '<div class="alert alert-danger">Pastikan semua kolom sudah diisi!</div>';
                } else {
                    $data = select_data($tambah_data['nim']);
                    if (sizeof($data) > 0) {
                        echo '<div class="alert alert-danger">NIM (' . $tambah_data['nim'] . ') sudah terdaftar!</div>';
                    } else {
                        if (insert_data($tambah_data)) echo '<div class="alert alert-success">Sukses tambah data mahasiswa dengan NIM (' . $tambah_data['nim'] . ')!</div>';
                        else echo '<div class="alert alert-danger">Gagal tambah data mahasiswa!</div>';
                    }
                }
            }

            echo '
            <form method="POST">
                <table class="table table-bordered">
                    <tr>
                        <th class="table-info" width="15%" nowrap>NIM</th>
                        <td><input type="text" class="form-control" name="nim" required></td>
                    </tr>
                    <tr>
                        <th class="table-info" nowrap>Nama</th>
                        <td><input type="text" class="form-control" name="nama" required></td>
                    </tr>
                    <tr>
                        <th class="table-info" nowrap>IPK</th>
                        <td><input type="text" class="form-control" name="ipk" required></td>
                    </tr>
                    <tr>
                        <th class="table-info" nowrap>Asal</th>
                        <td><input type="text" class="form-control" name="asal" required></td>
                    </tr>
                    <tr>
                        <th class="table-info" nowrap>Password</th>
                        <td><input type="password" class="form-control" name="pass" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class="btn btn-info" name="tambah" value="TAMBAH"></td>
                    </tr>
                </table>
            </form>
            ';
        }
        ?>
    </div>
</body>

</html>