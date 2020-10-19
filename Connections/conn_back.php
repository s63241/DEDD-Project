<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn = "localhost";
$database_conn = "5811011802071_project";
$username_conn = "root";
$password_conn = "12345678";
$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8");
error_reporting( error_reporting() & ~E_NOTICE );
error_reporting(E_ALL ^ E_DEPRECATED);

 
// $condb= mysqli_connect("localhost","root","","db_project") or die("Error: " . mysqli_error($con));
 
// mysqli_query($condb, "SET NAMES 'utf8' ");
 
?>
 