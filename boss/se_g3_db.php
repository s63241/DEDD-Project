<meta charset="utf-8" />
<?php
include('../Connections/conn.php');
error_reporting( error_reporting() & ~E_NOTICE );

// echo '<pre>';
// 	print_r($_POST);
// echo '</pre>';

// exit;
 
$s_p_id_3 = $_POST['s_p_id_3']; 
$s_p_id_1 = $_POST['s_p_id_1']; 
$s_ip3 = $_POST['s_ip3']; 
$s_group_no = $_POST['s_group_no'];
$s_dateq3 = $_POST['s_dateq3']; 


$rc_group =3;
$rc_resason = $_POST['rc_resason']; 
$rc_term = $_POST['rc_term'];
$ref_h_id = $_POST['ref_h_id'];


//  $check ="SELECT * FROM tbl_score  WHERE s_p_id_3=$s_p_id_3 AND ref_dq_id='1/2561' AND s_group_no=3  ";
// $result1=mysql_db_query($database_conn, $check);
// $num=mysql_num_rows($result1);
 
// if($num > 0)
// {
// 			echo "<script>";
// 			echo "alert('คุณได้ทำการประเมินไปแล้ว');";
// 			echo "window.location ='index.php?p=report'; ";
// 			echo "</script>";
 
// } else {
 

foreach($_POST['ref_q1_number']  as $row=>$art){
$ref_q1_number = mysql_real_escape_string($_POST['ref_q1_number'][$row]);
$s_score = mysql_real_escape_string($_POST['s_score'][$row]);

$sql = "UPDATE tbl_score SET 
			 
			  s_score= '$s_score'

			 WHERE 
			  ref_q1_number='$ref_q1_number'
			  AND s_group_no=3
			  AND s_p_id_1=$s_p_id_1
		";
$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());
}



//insert comment
$c_term = $_POST['c_term'];
$c_comment1 = $_POST['c_comment1'];
$c_comment2 = $_POST['c_comment2'];

$sql2 = "INSERT INTO  tbl_comment  
			(
			c_b1_id,
			c_per_id,
			c_term,
			c_comment1,
			c_comment2

			)
			VALUES
			(
			'$s_p_id_3',
			'$s_p_id_1',
			'$rc_term',
			'$c_comment1',
			'$c_comment2'
			)	  
		";
$result2 = mysql_db_query($database_conn, $sql2) or die ("Error in query: $sql2 " . mysql_error());
//}





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
		'$ref_h_id',
		'$rc_group',
		'$rc_resason',
		'$rc_term'
		 )
		";
$result2 = mysql_db_query($database_conn, $sql2) or die ("Error in query: $sql2 " . mysql_error());
}



// }
// echo $sql2;
// exit;
mysql_close();
if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('ทำการประเมินเรียบร้อยแล้ว');";
			echo "window.location='report.php?p=report&p_id=$s_p_id_1&term=$rc_term';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='report.php?p=report&p_id=$s_p_id_1';";
			echo "</script>";
	  }
	
?>