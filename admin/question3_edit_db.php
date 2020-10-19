<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// exit;

	$qg3_id = $_POST['qg3_id'];
	$qg3_name = $_POST['qg3_name'];
	$qg3_detail = $_POST['qg3_detail'];
	$qg3_fullscore = $_POST['qg3_fullscore'];
	
	

			 $sql = "UPDATE  tbl_q3_group  SET 
					qg3_name='$qg3_name',
					qg3_detail='$qg3_detail',
					qg3_fullscore='$qg3_fullscore'


					WHERE qg3_id=$qg3_id
					";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='question3.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='question3.php';";
			echo "</script>";
	  }
	
	
 ?>