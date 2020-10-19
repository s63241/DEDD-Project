<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');

    date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());


	// print_r($_POST);

	// exit;

	
	$n_title = $_POST['n_title'];
	$n_detail = $_POST['n_detail'];
	$img = $_POST['img'];
	$nfile = $_POST['nfile'];
	$n_id = $_POST['n_id'];

	//img
	$n_img = (isset($_POST['n_img']) ? $_POST['n_img'] : '');
	$upload=$_FILES['n_img']['name'];
	if($upload !='') { 
	$path="../news/";
	$type = strrchr($_FILES['n_img']['name'],".");
	$newname ='img'.$numrand.$date1.$type;
	$path_copy=$path.$newname;
	$path_link="../img/".$newname;
	move_uploaded_file($_FILES['n_img']['tmp_name'],$path_copy);  
	}elseif($upload==''){
		$newname=$img;
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
	}elseif($upload1==''){
		$newname1=$nfile;
	}

			 $sql = "UPDATE tbl_news  SET 
					n_title='$n_title',
					n_detail='$n_detail',
					n_img='$newname',
					n_file='$newname1'
					WHERE n_id=$n_id ";
		
		$result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());


	mysql_close();


// echo $sql;

// exit;

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('ปรับปรุงข้อมูลเรียบร้อยแล้ว');";
			echo "window.location='news.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='news.php';";
			echo "</script>";
	  }
	
	
 ?>