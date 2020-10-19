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

$colname_rsq = "-1";
if (isset($_GET['qt_id'])) {
  $colname_rsq = $_GET['qt_id'];
}
mysql_select_db($database_conn, $conn);
$query_rsq = sprintf("SELECT * FROM tbl_q1 WHERE ref_qt_id = %s ORDER BY q1_id ASC", GetSQLValueString($colname_rsq, "int"));
$rsq = mysql_query($query_rsq, $conn) or die(mysql_error());
$row_rsq = mysql_fetch_assoc($rsq);
$totalRows_rsq = mysql_num_rows($rsq);
?>

<div class="row">
  <div class="col-sm-12">
<hr />
<h4>::เพิ่มคำถาม ป.มสด.1::</h4>
<form id="form2" name="form2" method="post" action="question1_edit_form3_save_db.php" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2"> ระดับ  </div>
    <div class="col-sm-2">
        <input type="number" name="q1_number" required="required" class="form-control">
    </div> 
  </div>
  <div class="form-group">
    <div class="col-sm-2"> ช่วงคะแนน </div>
    <div class="col-sm-5">
        <input type="text" placeholder="(0-3)" name="q1_socre_rank" required="required" class="form-control">
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

</div>
<?php
mysql_free_result($editpo);

mysql_free_result($rsq);
?>
