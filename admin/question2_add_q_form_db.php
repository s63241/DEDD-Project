<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');



// print_r($_POST);
// exit;
	$q2_number = $_POST['q2_number'];
	$q2_score_rank  = $_POST['q2_score_rank'];
	$q2_detail = $_POST['q2_detail'];
	$ref_qg2_id = $_POST['ref_qg2_id'];
	

			 $sql = "INSERT INTO tbl_q2
					(
					q2_number,
					q2_score_rank,
					q2_detail,
					ref_qg2_id
					) 
					VALUES
					(
					'$q2_number',
					'$q2_score_rank',
					'$q2_detail',
					'$ref_qg2_id'
				)";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มข้อมํลเรียบร้อยแล้ว');";
			echo "window.location='question2.php?qg2_id=$ref_qg2_id&p=add_q';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='position.php';";
			echo "</script>";
	  }
	
	
 ?>