<meta charset="utf-8" />
<?php
include('../Connections/conn.php');
error_reporting( error_reporting() & ~E_NOTICE );

// echo '<pre>';
// 	print_r($_POST);
// echo '</pre>';
//  exit;
$s_p_id_2 = $_POST['s_p_id_2']; 
$s_p_id_1 = $_POST['s_p_id_1']; 
$s_ip2 = $_POST['s_ip2']; 
$s_group_no = $_POST['s_group_no'];
$s_dateq2 = $_POST['s_dateq2']; 
$rc_group =2;
$rc_resason = $_POST['rc_resason'];

$ref_dq_id = $_POST['ref_dq_id'];



	$s_score  =  $_POST['s_score'];
	 	// echo '<pre>';
 		// print_r($s_score);
 		// echo '</pre>';
foreach ($s_score  as $ref_q1_number => $value) {
	 //    echo '<pre>';
		// print_r($value);
		// echo '</pre>';


 $sqlx = "UPDATE tbl_score SET 
			 
			  
			  s_score= '$value'

			 WHERE 
			  ref_q1_number='$ref_q1_number'
			  AND s_group_no=2
			  AND s_p_id_1=$s_p_id_1
			  AND ref_dq_id='$ref_dq_id'
		";

		$result = mysql_db_query($database_conn, $sqlx) or die ("Error in query: $sqlx " . mysql_error());

}


if($rc_resason!=''){
$sql2 = "INSERT INTO  tbl_reason_chk_score
		(
		ref_p_id,
		ref_h_id,
		rc_group,
		rc_resason,
		rc_term
		   )
		VALUES
		(
		'$s_p_id_1',
		'$s_p_id_2',
		'$rc_group',
		'$rc_resason',
		'$ref_dq_id'
		 )
		";
$result2 = mysql_db_query($database_conn, $sql2) or die ("Error in query: $sql2 " . mysql_error());
}

 // foreach($ref_q1_number  as $row=>$art){

 // 	print_r($art);
 // }
//exit;
 /*
$i = 0;
while ($i < $ref_q1_number) {
	$s_score= $_POST['s_score'][$i];
	$ref_q1_number = $_POST['ref_q1_number'][$i];
 
	$query = "UPDATE tbl_score SET 
	s_score = '$s_score' 
	WHERE ref_q1_number ='$ref_dq_id'  AND s_group_no=2 AND s_p_id_1=$s_p_id_1 ";
	//mysql_query($query) or die ("Error in query: $query");
	$result = mysql_db_query($database_conn, $query) or die ("Error in query: $sql " . mysql_error());
	echo "$ref_q1_number-$s_score<br /><br /><em></em><br /><br />";
	++$i;
}
 


exit;
*/
 



// $check ="SELECT * FROM tbl_score  WHERE s_p_id_2=$s_p_id_2 AND ref_dq_id='1/2561' AND s_group_no=2 ";
// $result1=mysql_db_query($database_conn, $check);
// $num=mysql_num_rows($result1);
 
// if($num > 0)
// {
// 			echo "<script>";
// 			echo "alert('คุณได้ทำการประเมินไปแล้ว');";
// 			echo "window.location ='index.php?p=report&per_id=$s_p_id_1'; ";
// 			echo "</script>";
 
// } else {
 
 

// foreach($_POST['ref_q1_number']  as $row=>$art){
// $ref_q1_number = mysql_real_escape_string($_POST['ref_q1_number'][$row]);
// $s_score = mysql_real_escape_string($_POST['s_score'][$row]);



// $sql = "UPDATE tbl_score SET 
			 


			  
// 			  s_score= '$s_score'

// 			 WHERE 
// 			  ref_q1_number='$ref_q1_number'
// 			  AND s_group_no=2
// 			  AND s_p_id_1=$s_p_id_1
// 			  AND ref_dq_id='$ref_dq_id'
// 		";
// $result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());

// echo $sql;




// }


// }
// echo $sql;
// exit;
mysql_close();
if($result){
   
			echo "<script type='text/javascript'>";
			// echo  "alert('SAVE!!');";
			echo "window.location='index.php?p=g3&p_id=$s_p_id_1&term=$ref_dq_id';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='index.php?p=g3&p_id=$s_p_id_1&term=$ref_dq_id';";
			echo "</script>";
	  }
	
 
?>