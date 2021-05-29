<?php 
$con = new mysqli("localhost","root","","flangerdb");

if($con -> connect_error){
    die("Connection failed: ".$con->connection_error);
}
else
    echo "Connected";
?>