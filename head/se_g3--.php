<?php // require_once('../Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conn, $conn);
$query_showqg1list = "SELECT * FROM tbl_q3_group WHERE qg3_id=1 order by qg3_id ASC";
$showqg1list = mysql_query($query_showqg1list, $conn) or die(mysql_error());
$row_showqg1list = mysql_fetch_assoc($showqg1list);
$totalRows_showqg1list = mysql_num_rows($showqg1list);

$query_showqg2list = "SELECT * FROM tbl_q3_group WHERE qg3_id>1 order by qg3_id ASC";
$showqg2list = mysql_query($query_showqg2list, $conn) or die(mysql_error());
$row_showqg2list = mysql_fetch_assoc($showqg2list);
$totalRows_showqg2list = mysql_num_rows($showqg2list);
?>

<style>
      input[type=number]{
      width: 80px;
      }
        
      </style>


<form action="se_g3_db.php" method="post" name="ev" class="form-horizontal">

<table border="1" class="table">
  <tr class="info">
    <td>ID</td>
    <td>qt_name</td>
    <td>qt_detail</td>
  </tr>


  <?php $k=1; do { ?>
    <tr>
      <td><?php echo $k; ?></td>
      <td><?php echo $row_showqg1list['qg3_name']; ?>
      </td>
      <td><?php echo $row_showqg1list['qg3_detail']; ?>  
        
        <?php 
      
     
	        $qg3_id = $row_showqg1list['qg3_id'];
          $qg3_id1 = $row_showqg1list['qg3_id'];

          //echo 'xxx = ' .$qg3_id1;

          $query_rsquint1 = "SELECT * FROM tbl_q3 WHERE ref_qg3_id = $qg3_id AND ref_d_id=$ref_d_id ORDER BY q3_number ASC";
          $rsquint1 = mysql_query($query_rsquint1, $conn) or die(mysql_error());
          $row_rsquint1 = mysql_fetch_assoc($rsquint1);
          $totalRows_rsquint1 = mysql_num_rows($rsquint1);

$pid = $_GET['p_id'];

//echo 'nnnnnnnnn = '.$pid;
mysql_select_db($database_conn, $conn);
$query_scoreg11 = sprintf("
SELECT * 
FROM tbl_score as c, tbl_q3 as g, tbl_q3_group as d
WHERE c.ref_p_id =$pid
AND c.ref_q1_number=g.q3_id
AND g.ref_qg3_id=d.qg3_id
AND c.s_group_no=3 
AND g.ref_qg3_id=$qg3_id1
AND c.ref_dq_id='$lastterm'
", GetSQLValueString($colname_scoreg11, "int"));
$scoreg11 = mysql_query($query_scoreg11, $conn) or die(mysql_error());
$row_scoreg11 = mysql_fetch_assoc($scoreg11);
$totalRows_scoreg11 = mysql_num_rows($scoreg11);


	  ?>
        <table width="100%" border="1" class="table table-hovered">
          <tr>
            <td>ระดับ</td>
            <td>คะแนน</td>
            <td>รายละเอียดการพิจารณา</td>
            <td>ใส่คะแนน</td>
          </tr>
          <?php $s=1; if($totalRows_rsquint1 > 0){ do { ?>
            <tr>
              <td><?php echo $s; ?></td>
              <td><?php echo $row_rsquint1['q3_score_rank']; ?></td>
              <td><?php echo $row_rsquint1['q3_detail']; ?></td>
              <td>
                <input type="hidden" name="s_p_id_2"  value="<?php echo $p_id;?>" />
                <input type="hidden" name="s_p_id_1"  value="<?php echo $_GET['p_id']; ?>" />

                <input type="hidden" name="s_ip2" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
                <input type="hidden" name="s_dateq2" value="<?php echo date('Y-m-d H:i:s');?>" />

                <input type="hidden" name="s_group_no" value="2" />

                 <input type="text" name="ref_q1_number[]" required="required"  value="<?php echo $row_scoreg11['ref_q1_number']; ?>" />
               
                <input type="hidden" name="ref_dq_id" value="<?php echo $_GET['term']; ?>" />


                 <input type="number" name="s_score[<?php echo $row_scoreg11['ref_q1_number']; ?>]" required="required" class="form-control" value="<?php echo $row_scoreg11['s_score'];?>" step="any" />


              </td>
            </tr>
            <?php $s++; } while ($row_rsquint1 = mysql_fetch_assoc($rsquint1))  ;}  ?>
      </table>

     
   
        
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php $k++; } while ($row_showqg1list = mysql_fetch_assoc($showqg1list)); ?>


<?php do { ?>
    <tr>
      <td><?php echo $row_showqg2list['qg3_id']; ?></td>
      <td><?php echo $row_showqg2list['qg3_name']; ?>
      </td>
      <td><?php echo $row_showqg2list['qg3_detail']; ?>  
        
        <?php 
      
     
          $qg3_id = $row_showqg2list['qg3_id'];
          $query_rsquint2 = "SELECT * FROM tbl_q3 WHERE ref_qg3_id = $qg3_id ORDER BY q3_number ASC";
          $rsquint2 = mysql_query($query_rsquint2, $conn) or die(mysql_error());
          $row_rsquint2 = mysql_fetch_assoc($rsquint2);
          $totalRows_rsquint2 = mysql_num_rows($rsquint2);

$colname_scoreg1 = "-1";
if (isset($_GET['p_id'])) {
  $colname_scoreg1 = $_GET['p_id'];
}
mysql_select_db($database_conn, $conn);
$query_scoreg1 = sprintf("
SELECT * 
FROM tbl_score as c, tbl_q3 as g, tbl_q3_group as d
WHERE c.ref_p_id = %s 
AND c.ref_q1_number=g.q3_id
AND g.ref_qg3_id=d.qg3_id
AND c.s_group_no=3 
AND g.ref_qg3_id=$qg3_id
GROUP BY c.s_id
", GetSQLValueString($colname_scoreg1, "int"));
$scoreg1 = mysql_query($query_scoreg1, $conn) or die(mysql_error());
$row_scoreg1 = mysql_fetch_assoc($scoreg1);
$totalRows_scoreg1 = mysql_num_rows($scoreg1);


    ?>
        <table width="100%" border="1" class="table table-hovered">
          <tr>
            <td>ระดับ</td>
            <td>คะแนน</td>
            <td>รายละเอียดการพิจารณา</td>
            <td>ใส่คะแนน</td>
          </tr>
          <?php $z=1;  if($totalRows_rsquint2 > 0){ do { ?>
            <tr>
              <td><?php echo $z; ?></td>
              <td><?php echo $row_rsquint2['q3_score_rank']; ?></td>
              <td><?php echo $row_rsquint2['q3_detail']; ?></td>
              <td>
                <input type="hidden" name="s_p_id_2"  value="<?php echo $p_id;?>" />
                <input type="hidden" name="s_p_id_1"  value="<?php echo $_GET['p_id']; ?>" />

                <input type="hidden" name="s_ip2" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
                <input type="hidden" name="s_dateq2" value="<?php echo date('Y-m-d H:i:s');?>" />

                <input type="hidden" name="s_group_no" value="2" />

                 <input type="text" name="ref_q1_number[]" required="required"  value="<?php echo $row_scoreg1['s_id']; ?>" />
                <input type="number" name="s_score[]" required="required" class="form-control" value="<?php echo $row_scoreg1['s_score'];?>" step="any" />
                

              </td>
            </tr>
            <?php $z++; } while ($row_rsquint2 = mysql_fetch_assoc($rsquint2))  ;}  ?>
      </table>

     
   
        
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php } while ($row_showqg2list = mysql_fetch_assoc($showqg2list)); ?>

<tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">
         
        ความเห็นเพิ่มเติมของผู้ประเมิน  <br />
       <div class="col-xs-7">
       <textarea name="c_comment1" class="form-control"></textarea>
     <hr>

       ข้อเสนอแนะเกี่ยวกับแนวทางพัฒนา  <br />
       
       <textarea name="c_comment2" class="form-control"></textarea>
     </div>
   
      </td>
 
    </tr>
</table>
<input type="hidden" name="c_term" value="1/2561">
<button type="submit" name="save" class="btn btn-primary"> บันทึก  </button> 
</form>
 