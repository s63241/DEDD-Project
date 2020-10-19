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

$colname_editq1 = "-1";
if (isset($_GET['q1_id'])) {
  $colname_editq1 = $_GET['q1_id'];
}
mysql_select_db($database_conn, $conn);
$query_editq1 = sprintf("SELECT * FROM tbl_q1 WHERE q1_id = %s", GetSQLValueString($colname_editq1, "int"));
$editq1 = mysql_query($query_editq1, $conn) or die(mysql_error());
$row_editq1 = mysql_fetch_assoc($editq1);
$totalRows_editq1 = mysql_num_rows($editq1);
?>

<div class="row">
  <div class="col-sm-12">
<hr />
<h4>::แก้ไขคำถาม ป.มสด.1::</h4>
<form id="form2" name="form2" method="post" action="question1_edit_q1_form2_db.php" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2"> ระดับ  </div>
    <div class="col-sm-1">
        <input name="q1_number" type="number" class="form-control" value="<?php echo $row_editq1['q1_number']; ?>"  disabled="disabled">
    </div> 
  </div>

  <div class="form-group">
    <div class="col-sm-2"> ช่วงคะแนน </div>
    <div class="col-sm-2">
     <input name="q1_score_rank" type="text"   class="form-control" value="<?php echo $row_editq1['q1_score_rank']; ?>">  
     </div>
      <div class="col-sm-1">
      ถึง 
      </div>
    <div class="col-sm-2">
        <input name="q1_score_rank_max" type="text" required="required" class="form-control" value="<?php echo $row_editq1['q1_score_rank_max']; ?>">
    </div> 
  </div>


  <!-- <div class="form-group">
    <div class="col-sm-2"> ช่วงคะแนน </div>
    <div class="col-sm-2">
        <input name="q1_socre_rank" type="text" required="required" class="form-control" placeholder="(0-3)" value="<?php echo $row_editq1['q1_socre_rank']; ?>">
    </div> 
  </div> -->
  
  <div class="form-group">
    <div class="col-sm-2"> คำถาม  </div>
    <div class="col-sm-10">
        <input  name="q1_detail" type="text" required="required" class="form-control" value="<?php echo $row_editq1['q1_detail']; ?>">
    </div> 
  </div>
  <div class="form-group">
    <div class="col-sm-2">
      <input name="q1_id" type="hidden" id="q1_id" value="<?php echo $row_editq1['q1_id']; ?>" />
      <input name="qt_id" type="hidden" id="qt_id" value="<?php echo $_GET['qt_id'];?>" />
    </div>
    <div class="col-sm-10">
        <button class="btn btn-primary"> บันทึก </button>
    </div> 
</div>


  
</form>
</div>

</div>
 <?php
mysql_free_result($editq1);
?>
