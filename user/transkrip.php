<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
} else {
    echo '
    <html>

    <head>
        <title>Transkrip</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>
            .navbar-brand {
                letter-spacing: 1px;
            }

            .active {
                color: #64C9CF !important;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-dark">
            <a class="navbar-brand ml-2" href="index.php">SIASAT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto px-3">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fa fa-home" style="font-size:20px"></i>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kst.php"><i class="fa fa-calendar-o"></i> KST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="transkrip.php"><i class="fa fa-file-text"></i> Transkrip</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-2">
                    <li class="nav-item">
                        <a class="btn btn-secondary btn-block" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-3 mb-5 table-responsive">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h2 class="text-center">Transkrip Nilai - ' . $_SESSION['user'] . '</h2>
            </div>
            <table class="table table-bordered table-striped mt-4">
                <thead class="bg-secondary text-light text-center">
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Matakuliah</th>
                        <th>SKS</th>
                        <th>Nilai</th>
                        <th>AK</th>
                        <th>Tahun Ambil</th>
                    </tr>
                </thead>

                <tbody>';
    $no = 1;
    $sks = 0;
    $angka = 0;
    if (!empty($_SESSION['transkrip'])) {
        foreach ($_SESSION['transkrip'] as $value) {
            echo '
                    <tr>
                        <td>' . $no . '</td>
                        <td>' . $value['kode'] . '</td>
                        <td>' . $value['matkul'] . '</td>
                        <td>' . $value['sks'] . '</td>
                        <td>' . $value['nilai'] . '</td>
                        <td>' . $value['angka'] . '</td>
                        <td>' . $value['tahun'] . '</td>
                    </tr>
                ';
            $no++;
            $sks += $value['sks'];
            $angka += $value['angka'];
        }
        $ipk = $angka / $sks;
        echo ' 
                    <tr>
                        <td></td>
                        <td><b>Total</b></td>
                        <td></td>
                        <td><b>' . $sks . '</b></td>
                        <td></td>
                        <td><b>' . $angka . '</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><b>IPK</b></td>
                        <td></td>
                        <td><b>' . number_format((float)$ipk, 2, '.', '') . '</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>';
    } else {
        echo '
                    <tr>
                        <td colspan="7"><center class="font-weight-bold">Tidak Ada Data</center></td>
                    </tr>
        ';
    }
    echo '
                </tbody>
            </table>
        </div>
    </body>
    
    </html>
        ';
}
