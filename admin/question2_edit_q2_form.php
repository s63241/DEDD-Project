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

$colname_editq2q = "-1";
if (isset($_GET['q2_id'])) {
  $colname_editq2q = $_GET['q2_id'];
}
mysql_select_db($database_conn, $conn);
$query_editq2q = sprintf("SELECT * FROM tbl_q2 WHERE q2_id = %s", GetSQLValueString($colname_editq2q, "int"));
$editq2q = mysql_query($query_editq2q, $conn) or die(mysql_error());
$row_editq2q = mysql_fetch_assoc($editq2q);
$totalRows_editq2q = mysql_num_rows($editq2q);
?>
<div class="row">
  <div class="col-sm-12">
<hr />
<h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i> แก้ไขคำถามชุดที่ 2</h3>
<form id="form2" name="form2" method="post" action="question2_edit_q_form_db.php" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2"> ข้อที่  </div>
    <div class="col-sm-2">
        <input name="q2_number" type="number" required="required" class="form-control" id="q2_number" value="<?php echo $row_editq2q['q2_number']; ?>">
    </div> 
  </div>
  <div class="form-group">
    <div class="col-sm-2"> ช่วงคะแนน </div>
    <div class="col-sm-1">
     <input name="q2_socre_rankx" type="text"   class="form-control" value="0" disabled="disabled">  
     </div>
      <div class="col-sm-1">
      ถึง 
      </div>
    <div class="col-sm-2">
        <input name="q2_score_rank" type="text" required="required" class="form-control" id="q2_score_rank" value="<?php echo $row_editq2q['q2_score_rank']; ?>">
    </div> 
  </div>
  <div class="form-group">
    <div class="col-sm-2"> คำถาม  </div>
    <div class="col-sm-10">
        <input  name="q2_detail" type="text" required="required" class="form-control" id="q2_detail" value="<?php echo $row_editq2q['q2_detail']; ?>">
    </div> 
  </div>
<input name="q2_id" type="hidden" id="q2_id" value="<?php echo $row_editq2q['q2_id']; ?>">
<input name="qg2_id" type="hidden" id="qg2_id" value="<?php echo $_GET['qg2_id'];?>" />

  <div class="form-group">
    <div class="col-sm-2">    </div>
    <div class="col-sm-10">
        <button class="btn btn-primary"> บันทึก  </button>
    </div> 
</div>


  
</form>
</div>

</div>

<?php
mysql_free_result($editq2q);
?>
