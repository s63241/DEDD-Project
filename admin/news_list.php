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
$query_listnews = "SELECT * FROM tbl_news ORDER BY n_id DESC";
$listnews = mysql_query($query_listnews, $conn) or die(mysql_error());
$row_listnews = mysql_fetch_assoc($listnews);
$totalRows_listnews = mysql_num_rows($listnews);
?>
<div class="row">
    <div class="col-md-10">
        <h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i> การจัดการข้อมูลข่าวสาร</h3>
    </div>
    <div class="col-md-2">
         <a href="position.php?p=add" class="btn btn-primary btn-sm pull-right">+เพิ่ม</a>
    </div> 
    
</div>
<table border="1" cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
  <tr class="info">
    <td align="center" width="5%">ลำดับ</td>
    <td width="5%">ภาพ</td>
    <td width="75%">รายละเอียด</td>
    <td width="5%">แก้ไข</td>
    <td width="5%">ลบ</td>
  </tr>
  <?php $i=1; do { ?>
    <tr>
      <td align="center"><?php echo $i ?></td>
      <td align="center"><img src="../news/<?php echo $row_listnews['n_img'] ?>" width="100px"></td>
      <td><?php echo $row_listnews['n_title']; ?></td>
      <td><a href="news.php?n_id=<?php echo $row_listnews['n_id']; ?>&p=edit" class="btn btn-warning btn-xs">แก้ไข</a></td>
      <td>
        <a href="news_del_db.php?n_id=<?php echo $row_listnews['n_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยันการลบข้อมูล');">
        ลบ</a></td>
    </tr>
    <?php $i++; } while ($row_listnews = mysql_fetch_assoc($listnews)); ?>
</table>

<?php
mysql_free_result($listnews);
?>
