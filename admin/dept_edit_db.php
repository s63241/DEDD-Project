<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// exit;

	$d_name = $_POST['d_name'];
	$d_id = $_POST['d_id'];
	

			 $sql = "UPDATE  tbl_department  SET 
					d_name='$d_name'
					WHERE d_id=$d_id
					";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='dept.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='dept.php';";
			echo "</script>";
	  }
	
	
 ?>