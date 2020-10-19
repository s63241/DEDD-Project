<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

// exit;

	$l_id = $_GET['l_id'];
	

			 $sql = "DELETE FROM  tbl_level 
					WHERE l_id=$l_id
					";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			//echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='level.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='level.php';";
			echo "</script>";
	  }
	
	
 ?>