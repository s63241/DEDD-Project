<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// exit;

	$qt_id = $_POST['qt_id'];
	$qt_name = $_POST['qt_name'];
	$qt_detail = $_POST['qt_detail'];
	

			 $sql = "UPDATE  tbl_q1_group  SET 
					qt_name='$qt_name',
					qt_detail='$qt_detail'
					WHERE qt_id=$qt_id
					";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='question1.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='question1.php';";
			echo "</script>";
	  }
	
	
 ?>