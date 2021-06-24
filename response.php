<?php
function sendResponse($resp_code, $data, $message)
{
    echo json_encode(array('code'=>$resp_code, 'message'=>$message, 'data'=>$data));
}header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');