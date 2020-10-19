<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

// exit;

	$p_id = $_GET['p_id'];
	

			 $sql = "DELETE FROM  tbl_personal 
					WHERE p_id=$p_id
					";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			//echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='personal.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='personal.php';";
			echo "</script>";
	  }
	
	
 ?>