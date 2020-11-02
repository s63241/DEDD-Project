<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');



// print_r($_POST);
// exit;
	$q1_number = $_POST['q1_number'];
	$q1_socre_rank = $_POST['q1_socre_rank'];
	$q1_detail = $_POST['q1_detail'];
	$ref_qt_id = $_POST['ref_qt_id'];
	

			 $sql = "INSERT INTO tbl_q1 
					(
					q1_number,
					q1_socre_rank,
					q1_detail,
					ref_qt_id
					) 
					VALUES
					(
					'$q1_number',
					'$q1_socre_rank',
					'$q1_detail',
					'$ref_qt_id'
				)";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='question1.php?qt_id=$ref_qt_id&p=add_q';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='position.php';";
			echo "</script>";
	  }
	
	
 ?>