<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');

	$qt_name = $_POST['qt_name'];
	$qt_detail = $_POST['qt_detail'];
	

			 $sql = "INSERT INTO tbl_q1_group 
					(qt_name,
					qt_detail) 
					VALUES
					('$qt_name',
					'$qt_detail')";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='question1.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='question1.php';";
			echo "</script>";
	  }
	
	
 ?>