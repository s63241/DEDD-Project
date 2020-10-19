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
$colname_editpo = "-1";
if (isset($_GET['qt_id'])) {
$colname_editpo = $_GET['qt_id'];
}
mysql_select_db($database_conn, $conn);
$query_editpo = sprintf("SELECT * FROM tbl_q1_group WHERE qt_id = %s", GetSQLValueString(
$colname_editpo, "int"));
$editpo = mysql_query($query_editpo, $conn) or die(mysql_error());
$row_editpo = mysql_fetch_assoc($editpo);
$totalRows_editpo = mysql_num_rows($editpo);
$colname_rsq = "-1";
if (isset($_GET['qt_id'])) {
$colname_rsq = $_GET['qt_id'];
}
mysql_select_db($database_conn, $conn);
$query_rsq = sprintf("SELECT *
FROM tbl_q1
WHERE ref_qt_id = %s
ORDER BY q1_id ASC",
GetSQLValueString($colname_rsq, "int"));
$rsq = mysql_query($query_rsq, $conn) or die(mysql_error());
$row_rsq = mysql_fetch_assoc($rsq);
$totalRows_rsq = mysql_num_rows($rsq);
?>
<div class="row">
  <div class="col-sm-12">
    <h4>:: ประเภทคำถามชุดที่ 1 ::</h4>
    <form id="form1" name="form1" method="post" action="question1_edit_db.php" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-3"> ชื่อประเภทคำถาม </div>
        <div class="col-sm-7">
          <input name="qt_name" type="text"  class="form-control" value="<?php echo $row_editpo['qt_name']; ?>" disabled="disabled">
          
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-3"> รายละเอียด </div>
        <div class="col-sm-7">
          <input name="qt_detail" type="text"  required="required" class="form-control" value="<?php echo $row_editpo['qt_detail']; ?>" disabled>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <hr />
    <h4>:: เพิ่มคำถามชุดที่ 1 ::</h4>
    <form id="form2" name="form2" method="post" action="question1_edit_form2_save_db.php" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-2"> ระดับ </div>
        <div class="col-sm-2">
          <input type="number" name="q1_number" required="required" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2"> ช่วงคะแนน </div>
        <div class="col-sm-1">
          <input name="q1_score_rank" type="text"   class="form-control" value="0">
        </div>
        <div class="col-sm-1">
          ถึง
        </div>
        <div class="col-sm-1">
          <input name="q1_score_rank_max" type="text" required="required" class="form-control" id="q1_score_rank_max" value="0">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2"> คำถาม  </div>
        <div class="col-sm-10">
          <input type="text"  name="q1_detail" required="required" class="form-control">
        </div>
      </div>
      <input type="hidden" name="ref_qt_id" value="<?php echo $row_editpo['qt_id'];?>">
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
        <td>ระดับ</td>
        <td>ช่วงคะแนน</td>
        <td>รายละเอียด</td>
        <td>วัน/เดือน/ปี</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
      </tr>
      <?php if($totalRows_rsq > 0){ do { ?>
      <tr>
        <td><?php echo $row_rsq['q1_number']; ?></td>
        <td><?php echo $row_rsq['q1_score_rank']; ?> - <?php echo $row_rsq['q1_score_rank_max']; ?></td>
        <td><?php echo $row_rsq['q1_detail']; ?></td>
        <td><?php echo date('d/m/Y',strtotime($row_rsq['q1_datesave'])); ?></td>
        <td><a href="question1.php?q1_id=<?php echo $row_rsq['q1_id']; ?>&qt_id=<?php echo $_GET['qt_id'];?>&p=edit_q1_q" class="btn btn-warning btn-xs">แก้ไข</a></td>
        <td>
          <a href="question1_del_db2.php?q1_id=<?php echo $row_rsq['q1_id']; ?>&qt_id=<?php echo $_GET['qt_id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยันการลบข้อมูล');">
          ลบ</a></td>
        </tr>
        <?php } while ($row_rsq = mysql_fetch_assoc($rsq)); } ?>
      </table>
    </div>
  </div>
  <?php
  mysql_free_result($editpo);
  mysql_free_result($rsq);
  ?>