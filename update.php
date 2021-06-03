<?php


include_once('include.php');

$No_Aset = $_GET['Kode_Aset'];

if (isset($_GET['token'])) {
    $Token = $_GET['token'];

    $Kondisi = $_POST['Kondisi'];
    
    if ($Token == '1234556665o6u') {
        $sql ="UPDATE `inventaris` SET `Kondisi` = '$Kondisi' WHERE `inventaris`.`id` = $No_Aset";

        // echo $sql;

        $query = mysqli_query(getconnection(), $sql);
        if ($query) {
            $msg = "Update berhasil";
        } else {
            $msg = "Update gagal";
        }

        $response = array(
    'response' => 200,
    'status'=>'OK' ,
    'msg' => $msg
);

        echo json_encode($response);
    } else {
        $msg = 'token salah';
        $response = array(
        'response' => 403,
        'status'=>'forbidden' ,
        'msg' => $msg
    );
    
        echo json_encode($response);
    }
} else {
    $msg = 'Token Required';
    $response = array(
    'response' => 400,
    'status'=>'Bad Request' ,
    'msg' => $msg
);

    echo json_encode($response);
}