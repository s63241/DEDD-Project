<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');

 $q2_id = $_GET['q2_id'];
 $qg2_id = $_GET['qg2_id'];

			 $sql = "DELETE FROM tbl_q2 WHERE q2_id=$q2_id";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			//echo  "alert('เพิ่มข้อมํลเรียบร้อยแล้ว');";
			echo "window.location='question2.php?qg2_id=$qg2_id&p=add_q';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='question2.php?qg2_id=$qg2_id&p=add_q';";
			echo "</script>";
	  }
	
	
 ?>