<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');

	$po_name = $_POST['po_name'];
	

			 $sql = "INSERT INTO tbl_position 
					(po_name) 
					VALUES
					('$po_name')";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มข้อมํลเรียบร้อยแล้ว');";
			echo "window.location='position.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='position.php';";
			echo "</script>";
	  }
	
	
 ?>