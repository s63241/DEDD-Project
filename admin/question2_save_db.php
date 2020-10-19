<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// print_r($_POST);
// exit;

	$qg2_name = $_POST['qg2_name'];
	$qg2_detail = $_POST['qg2_detail'];
	$qg2_fullscore = $_POST['qg2_fullscore'];
	$qg2_score_rank = $_POST['qg2_score_rank'];


	

			 $sql = "INSERT INTO tbl_q2_group 
					(
					qg2_name,
					qg2_fullscore,
					qg2_detail,
					qg2_score_rank

					) 
					VALUES
					(
					'$qg2_name',
					'$qg2_fullscore',
					'$qg2_detail',
					'$qg2_score_rank'

				)";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='question2.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='question2.php';";
			echo "</script>";
	  }
	
	
 ?>