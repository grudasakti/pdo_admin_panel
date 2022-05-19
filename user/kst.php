<?php

require_once "functions.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
} else {
    echo '
    <html>

    <head>
        <title>KST</title>
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
                        <a class="nav-link active" href="kst.php"><i class="fa fa-calendar-o"></i> KST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transkrip.php"><i class="fa fa-file-text"></i> Transkrip</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-2">
                    <li class="nav-item">
                        <a class="btn btn-secondary btn-block" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-3 table-responsive">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h2 class="text-center">Kartu Studi Tetap - ' . $_SESSION['user'] . '</h2>
            </div>
            <table class="table table-bordered table-striped mt-4">
                <thead class="bg-secondary text-light text-center">
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Matakuliah</th>
                        <th>B/U</th>
                        <th>SKS A</th>
                        <th>SKS B</th>
                        <th>Pengajar</th>
                    </tr>
                </thead>

                <tbody>';
    $no = 1;
    $sksa = 0;
    $sksb = 0;
    if (!empty($_SESSION['kst'])) {
        foreach ($_SESSION['kst'] as $value) {
            echo '
                    <tr>
                        <td>' . $no . '</td>
                        <td>' . $value['kode'] . '</td>
                        <td>' . $value['matkul'] . '</td>
                        <td>' . $value['status'] . '</td>
                        <td>' . $value['sksa'] . '</td>
                        <td>' . $value['sksb'] . '</td>
                        <td>' . $value['pengajar'] . '</td>
                    </tr>
                ';
            $no++;
            $sksa += $value['sksa'];
            $sksb += $value['sksb'];
        }
        echo '
                    <tr>
                        <td></td>
                        <td><b>Total</b></td>
                        <td></td>
                        <td></td>
                        <td><b>' . $sksa . '</b></td>
                        <td><b>' . $sksb . '</b></td>
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
