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

$colname_updateq2 = "-1";
if (isset($_GET['qg2_id'])) {
  $colname_updateq2 = $_GET['qg2_id'];
}
mysql_select_db($database_conn, $conn);
$query_updateq2 = sprintf("SELECT * FROM tbl_q2_group WHERE qg2_id = %s", GetSQLValueString($colname_updateq2, "int"));
$updateq2 = mysql_query($query_updateq2, $conn) or die(mysql_error());
$row_updateq2 = mysql_fetch_assoc($updateq2);
$totalRows_updateq2 = mysql_num_rows($updateq2);
?>
<h4> ::UPDATE DATA:: </h4> 
<form id="form1" name="form1" method="post" action="question2_edit_db.php" class="form-horizontal">
  <div class="form-group">
      <div class="col-sm-2"> ชื่อประเภทคำถาม </div>
      <div class="col-sm-7">
        <input name="qg2_name" type="text"  required="required" class="form-control" value="<?php echo $row_updateq2['qg2_name']; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"> รายละเอียดคำถาม </div>
      <div class="col-sm-9">
        <input name="qg2_detail" type="text"  required="required" class="form-control" value="<?php echo $row_updateq2['qg2_detail']; ?>">
      </div>
    </div>
     <div class="form-group">
      <div class="col-sm-2"> คะแนนเต็ม </div>
      <div class="col-sm-2">
        <input name="qg2_fullscore" type="text"  required="required" class="form-control" value="<?php echo $row_updateq2['qg2_fullscore']; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"> ช่วงคะแนน </div>
      <div class="col-sm-1">
         <input type="text" value="0" disabled="disabled" class="form-control"> 
      </div>
      <div class="col-sm-1" align="center">
        ถึง
      </div>

      <div class="col-sm-2">
        <input name="qg2_score_rank" type="text"   required="required" class="form-control" value="<?php echo $row_updateq2['qg2_score_rank']; ?>">
      </div>
    </div>
     <div class="form-group">
      <div class="col-sm-2">
        <input name="qg2_id" type="hidden" id="qg2_id" value="<?php echo $row_updateq2['qg2_id']; ?>" />
      </div>
      <div class="col-sm-6">
        <button type="submit" class="btn btn-primary"> บันทึก </button>
      </div>
    </div>
  </div>
</form>
<?php
mysql_free_result($updateq2);
?>
