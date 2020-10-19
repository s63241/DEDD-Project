<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');

 $q3_id = $_GET['q3_id'];
 $qg3_id = $_GET['qg3_id'];

			 $sql = "DELETE FROM tbl_q3 WHERE q3_id=$q3_id";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			//echo  "alert('เพิ่มข้อมํลเรียบร้อยแล้ว');";
			echo "window.location='question3.php?qg3_id=$qg3_id&p=add_q';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='question3.php?qg3_id=$qg3_id&p=add_q';";
			echo "</script>";
	  }
	
	
 ?>