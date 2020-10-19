<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;
	$q1_id = $_POST['q1_id'];
	$q1_score_rank = $_POST['q1_score_rank'];
	$q1_score_rank_max = $_POST['q1_score_rank_max'];
	$q1_detail = $_POST['q1_detail'];
	$qt_id = $_POST['qt_id'];
	

			 $sql = "UPDATE tbl_q1  SET 
					 
				 
					q1_score_rank='$q1_score_rank',
					q1_score_rank_max='$q1_score_rank_max',
					q1_detail='$q1_detail'

					WHERE q1_id=$q1_id
					";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขข้อมํลเรียบร้อยแล้ว');";
			echo "window.location='question1.php?qt_id=$qt_id&p=add_q';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='position.php';";
			echo "</script>";
	  }
	
	
 ?>