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

mysql_select_db($database_conn, $conn);
$query_listquestion1 = "SELECT * FROM tbl_q1_group ORDER BY qt_id DESC";
$listquestion1 = mysql_query($query_listquestion1, $conn) or die(mysql_error());
$row_listquestion1 = mysql_fetch_assoc($listquestion1);
$totalRows_listquestion1 = mysql_num_rows($listquestion1);
?>
<div class="row">
    <div class="col-md-10">
        <h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i> จัดการประเภทคำถามชุดที่ 1</h3>
    </div>
    <div class="col-md-2">
         <a href="question1.php?p=add" class="btn btn-primary btn-sm pull-right">+เพิ่ม</a>
    </div> 
    
</div>
<table border="1" cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
  <tr class="info">
    <td align="center">ID</td>
    <td>ประเภทคำถาม</td>
    <td>รายละเอียด</td>
    <td>เพิ่มคำถาม</td>
    <td>แก้ไข</td>
    <td>ลบ</td>
  </tr>
  <?php $i=1; do { ?>
    <tr>
      <td align="center"><?php echo $i ?></td>
      <td><?php echo $row_listquestion1['qt_name']; ?></td>
      <td><?php echo $row_listquestion1['qt_detail']; ?></td>
      <td>
         <a href="question1.php?qt_id=<?php echo $row_listquestion1['qt_id']; ?>&p=add_q" class="btn btn-info btn-xs" >+คำถาม</a>
      </td>
      <td>
        <a href="question1.php?qt_id=<?php echo $row_listquestion1['qt_id']; ?>&p=edit" class="btn btn-warning btn-xs">แก้ไข</a></td>
      <td>
        <a href="question1_del_db.php?qt_id=<?php echo $row_listquestion1['qt_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยันการลบข้อมูล');">
        ลบ</a></td>
    </tr>
    <?php $i++; } while ($row_listquestion1 = mysql_fetch_assoc($listquestion1)); ?>
</table>

<?php
mysql_free_result($listquestion1);
?>
