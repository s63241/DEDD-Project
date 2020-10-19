<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');

	$d_name = $_POST['d_name'];
	

			 $sql = "INSERT INTO tbl_department 
					(d_name) 
					VALUES
					('$d_name')";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มข้อมํลเรียบร้อยแล้ว');";
			echo "window.location='dept.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='dept.php';";
			echo "</script>";
	  }
	
	
 ?>