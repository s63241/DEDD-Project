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
$query_listlevel = "SELECT * FROM tbl_level ORDER BY l_id DESC";
$listlevel = mysql_query($query_listlevel, $conn) or die(mysql_error());
$row_listlevel = mysql_fetch_assoc($listlevel);
$totalRows_listlevel = mysql_num_rows($listlevel);
?>
<div class="row">
    <div class="col-md-10">
        <h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i> การจัดการกำหนดสิทธิ์เข้าใช้งาน </h3>
    </div>
    <div class="col-md-2">
         <a href="level.php?p=add" class="btn btn-primary btn-sm pull-right">+เพิ่ม</a>
    </div> 
</div>
<table border="1" cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
  <tr class="info">
    <td align="center">ID</td>
    <td>สิทธิ์การเข้าใช้งาน</td>
    <td>แก้ไข</td>
    <td>ลบ</td>
  </tr>
  <?php $i=1; do { ?>
    <tr>
      <td align="center"><?php echo $i ?></td>
      <td><?php echo $row_listlevel['l_name']; ?></td>
      <td><a href="level.php?l_id=<?php echo $row_listlevel['l_id']; ?>&p=edit" class="btn btn-warning btn-xs">แก้ไข</a></td>
      <td>
        <a href="level_del_db.php?l_id=<?php echo $row_listlevel['l_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยันการลบข้อมูล');">
        ลบ</a></td>
    </tr>
    <?php $i++; } while ($row_listlevel = mysql_fetch_assoc($listlevel)); ?>
</table>

<?php
mysql_free_result($listlevel);
?>
