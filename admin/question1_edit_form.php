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
$query_editpo = sprintf("SELECT * FROM tbl_q1_group WHERE qt_id = %s", GetSQLValueString($colname_editpo, "int"));
$editpo = mysql_query($query_editpo, $conn) or die(mysql_error());
$row_editpo = mysql_fetch_assoc($editpo);
$totalRows_editpo = mysql_num_rows($editpo);
?>
<h4>:: อัพเดทประเภทคำถามชุดที่ 1 ::</h4>
<form id="form1" name="form1" method="post" action="question1_edit_db.php" class="form-horizontal">
  <div class="form-group">
      <div class="col-sm-3"> ชื่อประเภทคำถาม </div>
      <div class="col-sm-7">
        <input name="qt_name" type="text"  required="required" class="form-control" value="<?php echo $row_editpo['qt_name']; ?>">
        <input name="qt_id" type="hidden" id="qt_id" value="<?php echo $row_editpo['qt_id']; ?>" />
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"> รายละเอียดคำถาม </div>
      <div class="col-sm-7">
        <input name="qt_detail" type="text"  required="required" class="form-control" value="<?php echo $row_editpo['qt_detail']; ?>">
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
