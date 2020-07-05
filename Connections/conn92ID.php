<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
//header('Content-Type: text/html; charset=utf-8');
//header ('Content-type: text/html; charset=UTF-8');
header ('Content-type: text/html; charset=ISO-8859-1');


$hostname_conn92ID = "localhost";
$database_conn92ID = "cdlmed_idcom";
$username_conn92ID = "root";
$password_conn92ID = "";
$conn92ID = mysqli_connect($hostname_conn92ID, $username_conn92ID, $password_conn92ID) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_query($conn92ID, "SET NAMES 'utf8'");
mysqli_query($conn92ID, "SET character_set_connection=utf8");
mysqli_query($conn92ID, "SET character_set_client=utf8");
mysqli_query($conn92ID, "SET character_set_results=utf8");

// mysqli_query($conn92ID, "SET NAMES utf8");
//--------------------------------------^ conexão é agora o 1º parametro do mysqli_query
?>