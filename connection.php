<?php

$servername = "remotemysql.com";
$username = "P6BTlJ0kEA";
$password = "EL4IIoyNNL";
$dbname = "P6BTlJ0kEA";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{

}

else
{
die("connection failed because".mysqli_connect_error());
}




?>
