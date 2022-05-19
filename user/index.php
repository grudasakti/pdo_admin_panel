<?php

require_once "functions.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
} else {
    echo '
    <html>

    <head>
        <title>Home</title>
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
                        <a class="nav-link active" href="index.php"><i class="fa fa-home" style="font-size:20px"></i>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kst.php"><i class="fa fa-calendar-o"></i> KST</a>
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

        <div class="container mt-3">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h2>Welcome, ' . $_SESSION['data']['nama'] . '</h2>
            </div>
            <div class="container">
                <table class="table table-borderless table-sm">
                    <tr>
                        <th width="5%"> NIM</th>
                        <td>: ' . $_SESSION['user'] . '</td>
                    </tr>
                    <tr>
                        <th>IPK</th>
                        <td>: ' . $_SESSION['data']['ipk'] . '</td>
                    </tr>
                    <tr>
                        <th>Asal</th>
                        <td>: ' . $_SESSION['data']['asal'] . '</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
    
    </html>
    ';
}
