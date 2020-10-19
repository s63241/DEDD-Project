<meta charset="utf-8" />
<?php
include('../Connections/conn.php');
error_reporting( error_reporting() & ~E_NOTICE );

// echo '<pre>';
	// print_r($_POST);
// echo '</pre>';
//  exit;
$s_p_id_3 = $_POST['s_p_id_3']; 
$s_p_id_1 = $_POST['s_p_id_1']; 
$s_ip3 = $_POST['s_ip3']; 
$s_group_no = $_POST['s_group_no'];
$s_dateq2 = $_POST['s_dateq2'];
$ref_dq_id = $_POST['ref_dq_id']; 
$rc_group =1;
$rc_resason = $_POST['rc_resason'];
$ref_h_id = $_POST['ref_h_id'];
$rc_term = $_POST['rc_term'];

// $check ="SELECT * FROM tbl_score  WHERE s_p_id_2=$s_p_id_2 AND ref_dq_id='1/2561'  AND s_group_no=1 ";
// $result1=mysql_db_query($database_conn, $check);
// $num=mysql_num_rows($result1);
 
// if($num > 0)
// {
// 			echo "<script>";
// 			echo "alert('คุณได้ทำการประเมินไปแล้ว');";
// 			echo "window.location ='index.php?p=report&per_id=$s_p_id_1'; ";
// 			echo "</script>";
 
// } else {


 
 

foreach($_POST['ref_q1_number']  as $row=>$art){
$ref_q1_number = mysql_real_escape_string($_POST['ref_q1_number'][$row]);
$s_score = mysql_real_escape_string($_POST['s_score'][$row]);

$sql = "UPDATE tbl_score SET 
			 
			  
			  s_score= '$s_score',
			  s_p_id_3= '$s_p_id_3',
			  s_p_id_1= '$s_p_id_1',
			  s_ip3= '$s_ip3',
			  s_dateq3= '$s_dateq3'

			 WHERE 
			  ref_q1_number='$ref_q1_number'
			  AND s_group_no=1
			  AND s_p_id_1=$s_p_id_1
			  AND ref_dq_id='$ref_dq_id'
		";
$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());
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
		'$ref_h_id',
		'$rc_group',
		'$rc_resason',
		'$rc_term'
		 )
		";
$result2 = mysql_db_query($database_conn, $sql2) or die ("Error in query: $sql2 " . mysql_error());
}




// }
// echo $sql;
// exit;
mysql_close();
if($result){
   
			echo "<script type='text/javascript'>";
			// echo  "alert('SAVE!!');";
			echo "window.location='index.php?p=g2&p_id=$s_p_id_1&term=$ref_dq_id';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='index.php?p=g2&p_id=$s_p_id_1&term=$ref_dq_id';";
			echo "</script>";
	  }
	
?>