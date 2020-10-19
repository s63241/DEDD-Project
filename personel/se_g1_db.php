<meta charset="utf-8" />
<?php
include('../Connections/conn.php');
error_reporting(error_reporting() & ~E_NOTICE);

//echo '<pre>';
// print_r($_POST);
// echo '</pre>';
//xit;
$ref_p_id = $_POST['ref_p_id'];
$s_p_id_1 = $_POST['s_p_id_1'];
$s_ip1 = $_POST['s_ip1'];
$s_group_no = $_POST['s_group_no'];
$ref_dq_id = $_POST['ref_dq_id'];

$check = "SELECT * FROM tbl_score  WHERE ref_p_id=$ref_p_id AND ref_dq_id='$ref_dq_id' AND s_group_no=1";
$result1 = mysql_db_query($database_conn, $check);
$num = mysql_num_rows($result1);

if ($num > 0) {
    echo "<script>";
    echo "alert('คุณได้ทำการประเมินไปแล้ว');";
    echo "window.location ='index.php?p=report'; ";
    echo "</script>";
} else {
    foreach ($_POST['ref_q1_number'] as $row => $art) {
        $ref_q1_number = mysql_real_escape_string($_POST['ref_q1_number'][$row]);
        $s_score = mysql_real_escape_string($_POST['s_score'][$row]);
        if ($s_score != '') {
            $sql = "INSERT INTO  tbl_score(
			  ref_q1_number,
			  s_score,
			  ref_p_id,
			  s_p_id_1,
			  s_ip1,
			  s_group_no,
			  ref_dq_id

			  )
			VALUES(
			 '$ref_q1_number',
			 '$s_score',
			 '$ref_p_id',
			 '$s_p_id_1',
			 '$s_ip1',
			 '$s_group_no',
			 '$ref_dq_id'
			 )
		";
            $result = mysql_db_query($database_conn, $sql) or die("Error in query: $sql " . mysql_error());
        }
    }
}
//echo $sql;
//exit;
mysql_close();
if ($result) {

    echo "<script type='text/javascript'>";
    // echo  "alert('SAVE!!');";
    echo "window.location='index.php?p=se2&term=$ref_dq_id';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "window.location='index.php';";
    echo "</script>";
}
?>