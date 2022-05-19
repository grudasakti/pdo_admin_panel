<?php
require_once "config.php";

function select_data($user = "")
{
    global $con;

    $hasil = array();

    if ($user != "") $sql = "SELECT * FROM tbl_data WHERE NIM = :user";
    else $sql = "SELECT * FROM tbl_data";

    try {
        $stmt = $con->prepare($sql);
        if ($user != "") $stmt->bindValue(':user', $user, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rs = $stmt->fetchAll();

            if ($rs != null) {
                foreach ($rs as $val) {
                    $hasil['nim'] = $val['NIM'];
                    $hasil['nama'] = $val['Nama'];
                    $hasil['ipk'] = $val['IPK'];
                    $hasil['asal'] = $val['Asal'];
                }
            }
        }
    } catch (Exception $e) {
        echo 'Error select_data : ' . $e->getMessage();
    }

    return $hasil;
}

function select_kst($user = "")
{
    global $con;

    $hasil = array();

    if ($user != "") $sql = "SELECT * FROM tbl_kst WHERE NIM = :user";
    else $sql = "SELECT * FROM tbl_kst";

    try {
        $stmt = $con->prepare($sql);
        if ($user != "") $stmt->bindValue(':user', $user, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rs = $stmt->fetchAll();

            if ($rs != null) {
                $i = 0;
                foreach ($rs as $val) {
                    $hasil[$i]['nim'] = $val['NIM'];
                    $hasil[$i]['kode'] = $val['Kode'];
                    $hasil[$i]['matkul'] = $val['Matkul'];
                    $hasil[$i]['status'] = $val['Status'];
                    $hasil[$i]['sksa'] = $val['SKSA'];
                    $hasil[$i]['sksb'] = $val['SKSB'];
                    $hasil[$i]['pengajar'] = $val['Pengajar'];
                    $i++;
                }
            }
        }
    } catch (Exception $e) {
        echo 'Error select_data : ' . $e->getMessage();
    }

    return $hasil;
}

function select_transkrip($user = "")
{
    global $con;

    $hasil = array();

    if ($user != "") $sql = "SELECT * FROM tbl_transkrip WHERE NIM = :user";
    else $sql = "SELECT * FROM tbl_transkrip";

    try {
        $stmt = $con->prepare($sql);
        if ($user != "") $stmt->bindValue(':user', $user, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rs = $stmt->fetchAll();

            if ($rs != null) {
                $i = 0;
                foreach ($rs as $val) {
                    $hasil[$i]['nim'] = $val['NIM'];
                    $hasil[$i]['kode'] = $val['Kode'];
                    $hasil[$i]['matkul'] = $val['Matkul'];
                    $hasil[$i]['sks'] = $val['SKS'];
                    $hasil[$i]['nilai'] = $val['Nilai'];
                    $hasil[$i]['angka'] = $val['Angka'];
                    $hasil[$i]['tahun'] = $val['Tahun'];
                    $i++;
                }
            }
        }
    } catch (Exception $e) {
        echo 'Error select_data : ' . $e->getMessage();
    }

    return $hasil;
}
