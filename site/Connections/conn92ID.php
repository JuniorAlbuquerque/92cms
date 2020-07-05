<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn92ID = "187.108.203.223:3306";
$database_conn92ID = "idcom_p0341";
$username_conn92ID = "idcom_admin341";
$password_conn92ID = "4zG6VJjMZT";
$conn92ID = mysql_pconnect($hostname_conn92ID, $username_conn92ID, $password_conn92ID) or trigger_error(mysql_error(),E_USER_ERROR); 
?>