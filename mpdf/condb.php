<?php
$conn= mysqli_connect("localhost","root","root","devbanban_mpdf") or die("Error: " . mysqli_error($con));
 
mysqli_query($conn, "SET NAMES 'utf8' ");
 
?>