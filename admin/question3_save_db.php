<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// print_r($_POST);
// exit;

	$qg3_name = $_POST['qg3_name'];
	$qg3_detail = $_POST['qg3_detail'];
	$qg3_fullscore = $_POST['qg3_fullscore'];
	//$qg3_score_rank = $_POST['qg3_score_rank'];


	

			 $sql = "INSERT INTO tbl_q3_group 
					(
					qg3_name,
					qg3_fullscore,
					qg3_detail
					

					) 
					VALUES
					(
					'$qg3_name',
					'$qg3_fullscore',
					'$qg3_detail'
					

				)";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='question3.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='question3.php';";
			echo "</script>";
	  }
	
	
 ?>