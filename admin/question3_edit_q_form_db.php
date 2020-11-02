<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');



// print_r($_POST);
// exit;
	$q3_number = $_POST['q3_number'];
	$q3_score_rank  = $_POST['q3_score_rank'];
	$q3_detail = $_POST['q3_detail'];
	$qg3_id = $_POST['qg3_id'];
	$q3_id = $_POST['q3_id'];
	$ref_d_id = $_POST['ref_d_id'];

			 $sql = "UPDATE tbl_q3 SET 
					 
					q3_number='$q3_number',
					q3_score_rank='$q3_score_rank',
					q3_detail='$q3_detail',
					ref_d_id='$ref_d_id'

					WHERE q3_id = $q3_id
					 
				";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='question3.php?qg3_id=$qg3_id&p=add_q';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='question3.php?qg3_id=$qg3_id&p=add_q';";
			echo "</script>";
	  }
	
	
 ?>