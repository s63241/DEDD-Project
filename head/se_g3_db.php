<meta charset="utf-8" />
<?php
include('../Connections/conn.php');
error_reporting( error_reporting() & ~E_NOTICE );

// echo '<pre>';
// 	print_r($_POST);
// echo '</pre>';

// exit;
 
$s_p_id_2 = $_POST['s_p_id_2']; 
$s_p_id_1 = $_POST['s_p_id_1']; 
$s_ip2 = $_POST['s_ip2']; 
$s_group_no = $_POST['s_group_no'];
$s_dateq2 = date('Y-m-d H:i:s');
$ref_dq_id = $_POST['ref_dq_id']; 
$rc_group =3;
$rc_resason = $_POST['rc_resason'];


//  $check ="SELECT * FROM tbl_score  WHERE s_p_id_2=$s_p_id_2 AND ref_dq_id='1/2561' AND s_group_no=3  ";
// $result1=mysql_db_query($database_conn, $check);
// $num=mysql_num_rows($result1);
 
// if($num > 0)
// {
// 			echo "<script>";
// 			echo "alert('คุณได้ทำการประเมินไปแล้ว');";
// 			echo "window.location ='index.php?p=report'; ";
// 			echo "</script>";
 
// } else {
 


$s_score  =  $_POST['s_score'];
 // echo '<pre>';
 // print_r($s_score);
 // echo '</pre>';
foreach ($s_score  as $s_id => $value) {
 //    echo '<pre>';
	// print_r($value);
	// echo '</pre>';


 $sqlx = "UPDATE tbl_score SET 
			 
			  
			  s_score= '$value'

			 WHERE 
			  s_id=$s_id
		";

		$result = mysql_db_query($database_conn, $sqlx) or die ("Error in query: $sqlx " . mysql_error());

// echo '<br />';
// echo $sqlx;

}


$sqlh = "UPDATE tbl_score SET 
			 
			  s_p_id_2='$s_p_id_2',
			  s_dateq2='$s_dateq2'

			 WHERE 
			 s_p_id_1=$s_p_id_1
			 AND ref_dq_id='$ref_dq_id'
		";
$resulth = mysql_db_query($database_conn, $sqlh) or die ("Error in query: $sqlh " . mysql_error());


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
			'$s_p_id_2',
			'$s_p_id_1',
			'$c_term',
			'$c_comment1',
			'$c_comment2'
			)	  
		";
$result2 = mysql_db_query($database_conn, $sql2) or die ("Error in query: $sql2 " . mysql_error());


if($rc_resason!=''){
$sql3 = "INSERT INTO  tbl_reason_chk_score
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
		'$c_term'
		 )
		";
$result3 = mysql_db_query($database_conn, $sql3) or die ("Error in query: $sql3 " . mysql_error());
}
//}

// }

// echo '<br />';
// echo $sql2;
// exit;
mysql_close();
if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('ทำการประเมินเรียบร้อยแล้ว');";
			echo "window.location='index.php';";
			//echo "window.location='index.php?p=report&per_id=$s_p_id_1&term=$ref_dq_id';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='index.php?p=report&per_id=$s_p_id_1&term=$ref_dq_id';";
			echo "</script>";
	  }
	
?>