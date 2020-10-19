<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');



// print_r($_POST);
// exit;
	$q3_number = $_POST['q3_number'];
	$q3_score_rank  = $_POST['q3_score_rank'];
	$q3_detail = $_POST['q3_detail'];
	$ref_qg3_id = $_POST['ref_qg3_id'];
	$ref_d_id = $_POST['ref_d_id'];

	

			 $sql = "INSERT INTO tbl_q3
					(
					q3_number,
					q3_score_rank,
					q3_detail,
					ref_qg3_id,
					ref_d_id
					) 
					VALUES
					(
					'$q3_number',
					'$q3_score_rank',
					'$q3_detail',
					'$ref_qg3_id',
					'$ref_d_id'
				)";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มข้อมํลเรียบร้อยแล้ว');";
			echo "window.location='question3.php?qg3_id=$ref_qg3_id&p=add_q';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='position.php';";
			echo "</script>";
	  }
	
	
 ?>