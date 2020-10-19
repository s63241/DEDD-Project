<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');
date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	
	$n_title = $_POST['n_title'];
	$n_detail = $_POST['n_detail'];
	//img
	$n_img = (isset($_POST['n_img']) ? $_POST['n_img'] : '');
	$upload=$_FILES['n_img']['name'];
	if($upload <> '') {
	$path="../news/";
	$type = strrchr($_FILES['n_img']['name'],".");
	$newname ='img'.$numrand.$date1.$type;
	$path_copy=$path.$newname;
	$path_link="../img/".$newname;
	move_uploaded_file($_FILES['n_img']['tmp_name'],$path_copy);
	}
	//file
	$n_file = (isset($_POST['n_file']) ? $_POST['n_file'] : '');
	$upload1=$_FILES['n_file']['name'];
	if($upload1 <> '') {
	$path1="../news/";
	$type1 = strrchr($_FILES['n_file']['name'],".");
	$newname1 ='doc'.$numrand.$date1.$type1;
	$path1_copy=$path1.$newname1;
	$path1_link="../img/".$newname1;
	move_uploaded_file($_FILES['n_file']['tmp_name'],$path1_copy);
	}else{
	$newname1='0';
}
			$sql = "INSERT INTO tbl_news
					(n_title, n_detail, n_img, n_file)
					VALUES
					('$n_title', '$n_detail','$newname', '$newname1' )";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());
	mysql_close();

	
	if($result){
echo "<script type='text/javascript'>";
echo  "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
echo "window.location='news.php';";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
		echo "window.location='news.php';";
echo "</script>";
}


?>