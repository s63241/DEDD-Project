<meta charset="UTF-8" />
<?php 
require_once('../Connections/conn.php');

   
	$p_id = $_POST['p_id'];
	$p_password = $_POST['p_password'];
		

			 $sql = "UPDATE tbl_personal  SET 
					
					p_password='$p_password'
					WHERE
				    p_id = $p_id
					";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());

	mysql_close();



	if($result){
   
			echo "<script type='text/javascript'>";
			//echo  "alert('เพิ่มสินค้าเรียบร้อย');";
			echo "window.location='index.php?p=updatepassword';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
			echo "window.location='index.php?p=updatepassword';";
			echo "</script>";
	  }
	
	
 ?>