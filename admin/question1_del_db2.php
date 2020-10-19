<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

// exit;

	$q1_id = $_GET['q1_id'];
	$qt_id = $_GET['qt_id'];
	

			 $sql = "DELETE FROM  tbl_q1
					WHERE q1_id=$q1_id
					";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			//echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='question1.php?qt_id=$qt_id&p=add_q';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='question1.php?qt_id=$qt_id&p=add_q';";
			echo "</script>";
	  }
	
	
 ?>