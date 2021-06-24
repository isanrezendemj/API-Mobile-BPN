<?php
function getconnection()
{
    $conn=new mysqli("localhost", "root", "isanrezende12", "db_kanwilbpnaceh");
    if ($conn->connect_error) {
        $conn=null;
    }
    return $conn;
}
