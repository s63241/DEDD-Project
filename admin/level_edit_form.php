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
if (isset($_GET['l_id'])) {
  $colname_editpo = $_GET['l_id'];
}
mysql_select_db($database_conn, $conn);
$query_editpo = sprintf("SELECT * FROM tbl_level WHERE l_id = %s", GetSQLValueString($colname_editpo, "int"));
$editpo = mysql_query($query_editpo, $conn) or die(mysql_error());
$row_editpo = mysql_fetch_assoc($editpo);
$totalRows_editpo = mysql_num_rows($editpo);
?>
<h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i> แก้ไขข้อมูลสิทธิ์การเข้าใช้งาน</h3>
<form id="form1" name="form1" method="post" action="level_edit_db.php" class="form-horizontal">
  <div class="form-group">
      <div class="col-sm-3"> สิทธิ์การใช้งาน </div>
      <div class="col-sm-7">
        <input name="l_name" type="text"  required="required" class="form-control" value="<?php echo $row_editpo['l_name']; ?>">
        <input name="l_id" type="hidden" id="l_id" value="<?php echo $row_editpo['l_id']; ?>" />
      </div>
    </div>
     <div class="form-group">
      <div class="col-sm-3">   </div>
      <div class="col-sm-6">
        <button type="submit" class="btn btn-primary"> บันทึก </button>
      </div>
    </div>
  </div>
</form>
<?php
mysql_free_result($editpo);
?>
