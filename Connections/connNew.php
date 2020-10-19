<?php
if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
    // DEV
    $hostname_conn = "localhost";
    $database_conn = "project";
    $username_conn = "root";
    $password_conn = "";
} else {
    $hostname_conn = "localhost";
    $database_conn = "project";
    $username_conn = "root";
    $password_conn = "";
}
$conn = new mysqli($hostname_conn,$username_conn,$password_conn,$database_conn) or trigger_error(mysql_error(), E_USER_ERROR);
$conn->set_charset('utf8');
mysql_query("SET NAMES UTF8");
?>