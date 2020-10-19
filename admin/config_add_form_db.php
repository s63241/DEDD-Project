<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$dq_name = $_POST['dq_name'];
$dq_date_open1 = $_POST['dq_date_open1'];
$dq_date_close1 = $_POST['dq_date_close1'];
$dq_date_open2 = $_POST['dq_date_open2'];
$dq_date_close2 = $_POST['dq_date_close2'];
$dq_date_open3 = $_POST['dq_date_open3'];
$dq_date_close3 = $_POST['dq_date_close3'];


       $sql = "INSERT INTO tbl_date_q 
          (
          dq_name,
          dq_date_open1,
          dq_date_close1,
          dq_date_open2,
          dq_date_close2,
          dq_date_open3,
          dq_date_close3
          ) 
          VALUES
          (
          '$dq_name',
          '$dq_date_open1',
          '$dq_date_close1',
          '$dq_date_open2',
          '$dq_date_close2',
          '$dq_date_open3',
          '$dq_date_close3'
        )";
    
    $result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
  mysql_close();

  if($result){
   
      echo "<script type='text/javascript'>";
      echo  "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
      echo "window.location='config.php';";
      echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "window.location='config.php';";
      echo "</script>";
    }
  
  
 ?>