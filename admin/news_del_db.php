<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');
		
		$n_id = $_GET['n_id'];

		$sql = "DELETE FROM  tbl_news  WHERE n_id=$n_id";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());
	mysql_close();
	if($result){

echo "<script type='text/javascript'>";
//echo  "alert('เพิ่มข้อมํลเรียบร้อยแล้ว');";
echo "window.location='news.php';";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
		echo "window.location='news.php';";
echo "</script>";
}


?>