<?php
function getDB(){
    $db_host = "localhost";
    $db_user = "admin";
    $db_pass = "DK-E!qvDmItrSdvP";
    $db_name = "Order_management";
    
    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }else{
        return $conn;
    }
}