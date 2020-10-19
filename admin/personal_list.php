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
$query_listdept = "
SELECT * 
FROM 
tbl_personal  as p,
tbl_department as d,
tbl_position as j,
tbl_level as l    
WHERE p.ref_d_id=d.d_id  
AND p.ref_po_id=j.po_id
AND p.ref_l_id=l.l_id 
ORDER BY p.p_id DESC";
$listdept = mysql_query($query_listdept, $conn) or die(mysql_error());
$row_listdept = mysql_fetch_assoc($listdept);
$totalRows_listdept = mysql_num_rows($listdept);
?>
<div class="row">
    <div class="col-md-10">
        <h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i> การจัดการข้อมูลบุคลากร</h3>
    </div>
    <div class="col-md-2">
         <a href="personal.php?p=add" class="btn btn-primary btn-sm pull-right">+เพิ่ม</a>
    </div> 
    
</div>
<table border="1" cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
  <tr class="info">
    <td align="center">ID</td>
    <td>ชื่อ-นามสกุล</td>
    <td>หน่วยงาน</td>
    <td>ตำแหน่ง</td>
    <td>สถานะ</td>
    <td>สิทธิ์</td>
    <td>แก้ไข</td>
    <td>ลบ</td>
  </tr>
  <?php $i=1; do { ?>
    <tr>
      <td align="center"><?php echo $i ?></td>
      <td><?php echo $row_listdept['p_firstname']; ?><?php echo $row_listdept['p_name']; ?> 
        <?php echo $row_listdept['p_lastname']; ?></td>
      <td><?php echo $row_listdept['d_name']; ?></td>
      <td><?php echo $row_listdept['po_name']; ?></td>
      <td><?php echo $row_listdept['p_status']; ?></td>
      <td><?php echo $row_listdept['l_name']; ?></td> 

      <td><a href="personal.php?p_id=<?php echo $row_listdept['p_id']; ?>&p=edit" class="btn btn-warning btn-xs">แก้ไข</a></td>
      <td>
        <a href="personal_del_db.php?p_id=<?php echo $row_listdept['p_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยันการลบข้อมูล');">
        ลบ</a></td>
    </tr>
    <?php $i++; } while ($row_listdept = mysql_fetch_assoc($listdept)); ?>
</table>

<?php
mysql_free_result($listdept);
?>
