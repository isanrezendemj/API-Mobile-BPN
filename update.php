<?php
include_once('include.php');

//echo json_encode($_POST);
//die;

$No_Aset = $_POST['code'];
if (isset($_POST['token'])) {
    $Token = $_POST['token'];
    $Kondisi = $_POST['kondisi'];
    if ($Token == 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9') {
	$security = $_POST['security'];

	$sql = "SELECT * FROM tb_security_code WHERE code = '$security'";
	$security_result = mysqli_query(getconnection(), $sql);

	if(mysqli_num_rows($security_result) > 0){

	        $sql ="UPDATE `inventaris` SET `Kondisi` = '$Kondisi' WHERE `inventaris`.`No_Aset` = $No_Aset";
       		// echo $sql;
       		$query = mysqli_query(getconnection(), $sql);
       		if ($query) {
        		$response = array(
            		'response' => 200,
            		'status'=>'OK' ,
            		'msg' => "Update Success"
        		);
		} else {
			$response = array(
                        'response' => 403,
                        'status'=>'NOT OK' ,
                        'msg' => "Update Failed"
                	);
		}
        	echo json_encode($response);
	} else  {
		$msg = "security code not registered! access denied";
		$response = array(
			'response' => 403,
			'status' => 'forbidden',
			'msg' => $msg,
		);
		echo json_encode($response);
	}

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
