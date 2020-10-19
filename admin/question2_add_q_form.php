<?php require_once('../Connections/conn.php'); ?>
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

$colname_showq2 = "-1";
if (isset($_GET['qg2_id'])) {
  $colname_showq2 = $_GET['qg2_id'];
}
mysql_select_db($database_conn, $conn);
$query_showq2 = sprintf("SELECT * FROM tbl_q2_group WHERE qg2_id = %s", GetSQLValueString($colname_showq2, "int"));
$showq2 = mysql_query($query_showq2, $conn) or die(mysql_error());
$row_showq2 = mysql_fetch_assoc($showq2);
$totalRows_showq2 = mysql_num_rows($showq2);

$colname_showqg2 = "-1";
if (isset($_GET['qg2_id'])) {
  $colname_showqg2 = $_GET['qg2_id'];
}
mysql_select_db($database_conn, $conn);
$query_showqg2 = sprintf("SELECT * FROM tbl_q2 WHERE ref_qg2_id = %s", GetSQLValueString($colname_showqg2, "int"));
$showqg2 = mysql_query($query_showqg2, $conn) or die(mysql_error());
$row_showqg2 = mysql_fetch_assoc($showqg2);
$totalRows_showqg2 = mysql_num_rows($showqg2);
?>
<div class="row">
  <div class="col-sm-12">
<h4>::ประเภทคำถาม ป.มสด.2::</h4>
<form id="form1" name="form1" method="post" action="question1_edit_db.php" class="form-horizontal">
  <div class="form-group">
      <div class="col-sm-3"> ชื่อประเภทคำถาม </div>
      <div class="col-sm-7">
        <input name="qt_name" type="text"  class="form-control" value="<?php echo $row_showq2['qg2_name']; ?>" disabled="disabled">
        
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"> รายละเอียด </div>
      <div class="col-sm-7">
        <input name="qt_detail" type="text"  required="required" class="form-control" value="<?php echo $row_showq2['qg2_detail']; ?>" disabled>
      </div>
    </div>
</form>
</div>
</div>
<div class="row">
  <div class="col-sm-12">
<hr />
<h4>::เพิ่มคำถาม ป.มสด.2::</h4>
<form id="form2" name="form2" method="post" action="question2_add_q_form_db.php" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2"> ข้อที่  </div>
    <div class="col-sm-2">
        <input name="q2_number" type="number" required="required" class="form-control" id="q2_number">
    </div> 
  </div>
  <div class="form-group">
    <div class="col-sm-2"> ช่วงคะแนน </div>
    <div class="col-sm-1">
     <input name="q2_socre_rankx" type="text"   class="form-control" value="0" disabled="disabled">  
     </div>
      <div class="col-sm-1">
      ถึง 
      </div>
    <div class="col-sm-2">
        <input name="q2_score_rank" type="text" required="required" class="form-control" id="q2_score_rank">
    </div> 
  </div>
  <div class="form-group">
    <div class="col-sm-2"> คำถาม  </div>
    <div class="col-sm-10">
        <input  name="q2_detail" type="text" required="required" class="form-control" id="q2_detail">
    </div> 
  </div>
<input name="ref_qg2_id" type="hidden" id="ref_qg2_id" value="<?php echo $_GET['qg2_id'];?>">
<input name="qg2_id" type="hidden" id="qg2_id" value="<?php echo $_GET['qg2_id'];?>" />

  <div class="form-group">
    <div class="col-sm-2">    </div>
    <div class="col-sm-10">
        <button class="btn btn-primary"> เพิ่ม </button>
    </div> 
</div>


  
</form>
</div>
<div class="col-sm-12">
<br />
<table border="1" class="table table-hover table-bordered">
  <tr class="info">
    <td>ข้อที่</td>
    <td>ช่วงคะแนน</td>
    <td>รายละเอียด</td>
    <td>แก้ไข</td>
    <td>ลบ</td>
  </tr>
  <?php if($totalRows_showqg2 > 0){ do { ?>
    <tr>
      <td><?php echo $row_showqg2['q2_number']; ?></td>
      <td>0-<?php echo $row_showqg2['q2_score_rank']; ?></td>
      <td><?php echo $row_showqg2['q2_detail']; ?></td>
      <td><a href="question2.php?q2_id=<?php echo $row_showqg2['q2_id']; ?>&qg2_id=<?php echo $_GET['qg2_id'];?>&p=edit_q2_q" class="btn btn-warning btn-xs">แก้ไข</a></td>
      <td>
        <a href="question2_del_q_db.php?q2_id=<?php echo $row_showqg2['q2_id']; ?>&qg2_id=<?php echo $_GET['qg2_id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยันการลบข้อมูล');">
        ลบ</a></td>
    </tr>
    <?php } while ($row_showqg2 = mysql_fetch_assoc($showqg2)); } ?>
</table>
</div>
</div>
 <?php
mysql_free_result($showq2);

mysql_free_result($showqg2);
?>
