<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');

	$l_name = $_POST['l_name'];
	

			 $sql = "INSERT INTO tbl_level 
					(l_name) 
					VALUES
					('$l_name')";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มข้อมํลเรียบร้อยแล้ว');";
			echo "window.location='level.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='level.php';";
			echo "</script>";
	  }
	
	
 ?>