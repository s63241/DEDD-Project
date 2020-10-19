<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

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

$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(), E_USER_ERROR);
mysql_query("SET NAMES UTF8");
error_reporting(error_reporting() & ~E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);

mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
?>