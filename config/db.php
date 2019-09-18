<?php
//create connection
$conn = mysqli_connect('127.0.0.1', 'root', 'usha0816HEMBA', 'mysql');
//Check connection
if(mysqli_connect_errno()){
    //connection failed
    echo 'Failed to connect to MySQL  '. mysqli_connet_errno();  
}
?>