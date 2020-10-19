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
SELECT * FROM tbl_complain as c,
tbl_personal as p
WHERE c.ref_p_id=p.p_id 
ORDER BY c.c_id DESC";
$listdept = mysql_query($query_listdept, $conn) or die(mysql_error());
$row_listdept = mysql_fetch_assoc($listdept);
$totalRows_listdept = mysql_num_rows($listdept);
?>
<h3> ::คำร้องขอ:: 
</h3>
<table border="1" cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
  <tr class="info">
    <td align="center">ID</td>
    <td>ผู้แจ้ง</td>
    <td>ข้อมูลที่แจ้ง</td>
    <td>วัน/เดือน/ปี</td>
  </tr>
  <?php $i=1; do { ?>
    <tr>
      <td align="center"><?php echo $i ?></td>
      <td><?php echo $row_listdept['p_firstname']; ?><?php echo $row_listdept['p_name']; ?>
        <?php echo $row_listdept['p_lastname']; ?>
      </td>
      <td><?php echo $row_listdept['c_detail']; ?></td>
      <td><?php echo $row_listdept['c_datesave']; ?></td>
  
    </tr>
    <?php $i++; } while ($row_listdept = mysql_fetch_assoc($listdept)); ?>
</table>

<?php
mysql_free_result($listdept);
?>
