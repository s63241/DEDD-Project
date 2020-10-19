<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// exit;

	$ref_l_id = $_POST['ref_l_id'];
	$ref_d_id = $_POST['ref_d_id'];
	$ref_po_id = $_POST['ref_po_id'];
	$p_username = $_POST['p_username'];
	$p_password = $_POST['p_password'];
	$p_sex = $_POST['p_sex'];
	$p_firstname = $_POST['p_firstname'];
	$p_name = $_POST['p_name'];
	$p_lastname = $_POST['p_lastname'];
	$p_address = $_POST['p_address'];
	$p_phone = $_POST['p_phone'];
	$p_email = $_POST['p_email'];
	$p_birthday = $_POST['p_birthday'];
	$p_status = $_POST['p_status'];
	$p_id = $_POST['p_id'];
	

			 $sql = "UPDATE  tbl_personal  SET 
					ref_l_id='$ref_l_id',
					ref_d_id='$ref_d_id',
					ref_po_id='$ref_po_id',
					p_username='$p_username',
					p_password='$p_password',
					p_sex='$p_sex',
					p_firstname='$p_firstname',
					p_name='$p_name',
					p_lastname='$p_lastname',
					p_address='$p_address',
					p_phone='$p_phone',
					p_email='$p_email',
					p_birthday='$p_birthday',
					p_status='$p_status'
					WHERE p_id=$p_id
					";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
	mysql_close();

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='personal.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='personal.php';";
			echo "</script>";
	  }
	
	
 ?>