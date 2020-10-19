<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// exit;

	$qg2_id = $_POST['qg2_id'];
	$qg2_name = $_POST['qg2_name'];
	$qg2_detail = $_POST['qg2_detail'];
	$qg2_fullscore = $_POST['qg2_fullscore'];
	$qg2_score_rank = $_POST['qg2_score_rank'];
	

			 $sql = "UPDATE  tbl_q2_group  SET 
					qg2_name='$qg2_name',
					qg2_detail='$qg2_detail',
					qg2_fullscore='$qg2_fullscore',
					qg2_score_rank='$qg2_score_rank'


					WHERE qg2_id=$qg2_id
					";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='question2.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='question2.php';";
			echo "</script>";
	  }
	
	
 ?>