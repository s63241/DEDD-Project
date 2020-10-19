<meta charset="UTF-8" />
<?php require_once('../Connections/conn.php');


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;
$dq_id = $_GET['dq_id'];



       $sql = "DELETE FROM  tbl_date_q 
          
          WHERE dq_id=$dq_id
          ";
    
    $result = mysql_db_query($database_conn, $sql) or die ("Error in query: $sql " . mysql_error());



// echo $sql;
// exit;
  mysql_close();

  if($result){
   
      echo "<script type='text/javascript'>";
      //echo  "alert('ปรับปรุงข้อมูลเรียบร้อยแล้ว');";
      echo "window.location='config.php';";
      echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "window.location='config.php';";
      echo "</script>";
    }
  
  
 ?>