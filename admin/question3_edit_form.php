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

$colname_updateq3 = "-1";
if (isset($_GET['qg3_id'])) {
  $colname_updateq3 = $_GET['qg3_id'];
}
mysql_select_db($database_conn, $conn);
$query_updateq3 = sprintf("SELECT * FROM tbl_q3_group WHERE qg3_id = %s", GetSQLValueString($colname_updateq3, "int"));
$updateq3 = mysql_query($query_updateq3, $conn) or die(mysql_error());
$row_updateq3 = mysql_fetch_assoc($updateq3);
$totalRows_updateq3 = mysql_num_rows($updateq3);
?>
<h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i> แก้ไขคำถามชุดที่ 3</h3>
<form id="form1" name="form1" method="post" action="question3_edit_db.php" class="form-horizontal">
  <div class="form-group">
      <div class="col-sm-2"> ชื่อประเภทคำถาม </div>
      <div class="col-sm-7">
        <input name="qg3_name" type="text"  required="required" class="form-control" value="<?php echo $row_updateq3['qg3_name']; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"> รายละเอียดคำถาม </div>
      <div class="col-sm-9">
        <input name="qg3_detail" type="text"  required="required" class="form-control" value="<?php echo $row_updateq3['qg3_detail']; ?>">
      </div>
    </div>
     <div class="form-group">
      <div class="col-sm-2"> คะแนนเต็ม </div>
      <div class="col-sm-2">
        <input name="qg3_fullscore" type="text"  required="required" class="form-control" value="<?php echo $row_updateq3['qg3_fullscore']; ?>">
      </div>
    </div>
    <!-- <div class="form-group">
      <div class="col-sm-2"> ช่วงคะแนน </div>
      <div class="col-sm-1">
         <input type="text" value="0" disabled="disabled" class="form-control"> 
      </div>
      <div class="col-sm-1" align="center">
        ถึง
      </div>

      <div class="col-sm-2">
        <input name="qg3_score_rank" type="text"   required="required" class="form-control" value="<?php echo $row_updateq3['qg3_score_rank']; ?>">
      </div>
    </div> -->
     <div class="form-group">
      <div class="col-sm-2">
        <input name="qg3_id" type="hidden" id="qg3_id" value="<?php echo $row_updateq3['qg3_id']; ?>" />
      </div>
      <div class="col-sm-6">
        <button type="submit" class="btn btn-primary"> บันทึก </button>
      </div>
    </div>
  </div>
</form>
<?php
mysql_free_result($updateq3);
?>
