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

$colname_editconfig = "-1";
if (isset($_GET['dq_id'])) {
  $colname_editconfig = $_GET['dq_id'];
}
mysql_select_db($database_conn, $conn);
$query_editconfig = sprintf("SELECT * FROM tbl_date_q WHERE dq_id = %s", GetSQLValueString($colname_editconfig, "int"));
$editconfig = mysql_query($query_editconfig, $conn) or die(mysql_error());
$row_editconfig = mysql_fetch_assoc($editconfig);
$totalRows_editconfig = mysql_num_rows($editconfig);

//print_r($row_editconfig);
?>
<form id="form1" name="form1" method="post" action="config_edit_form_db.php" class="form-horizontal">
  <div class="form-group">
      <div class="col-sm-3 control-label"> ปรับปรุงรอบการประเมิน </div>
      <div class="col-sm-3">
        <input type="text" name="dq_name" class="form-control"  required="required"  value="<?php echo $row_editconfig['dq_name'];?>">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4 control-label"> วันเริ่มต้น - สิ้นสุดการประเมิน  </div>
      <div class="col-sm-4">
        เปิด <br />
        <input type="date" name="dq_date_open3" class="form-control"  required="required" value="<?php echo $row_editconfig['dq_date_open3'];?>">
      </div>
      <div class="col-sm-3">
        ปิด <br />
        <input type="date" name="dq_date_close3" class="form-control"  required="required" value="<?php echo $row_editconfig['dq_date_close3'];?>">
      </div>
    </div>

      <div class="form-group">
      <div class="col-sm-3 control-label"> เจ้าหน้าที่ </div>
      <div class="col-sm-3">
        เปิด <br />
        <input type="date" name="dq_date_open1" class="form-control"  required="required" value="<?php echo $row_editconfig['dq_date_open1'];?>">
      </div>
      <div class="col-sm-3">
        ปิด <br />
        <input type="date" name="dq_date_close1" class="form-control"  required="required" value="<?php echo $row_editconfig['dq_date_close1'];?>">
      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-3 control-label"> ห้วหน้าฝ่าย  </div>
      <div class="col-sm-3">
        เปิด <br />
        <input type="date" name="dq_date_open2" class="form-control"  required="required" value="<?php echo $row_editconfig['dq_date_open2'];?>">
      </div>
      <div class="col-sm-3">
        ปิด <br />
        <input type="date" name="dq_date_close2" class="form-control"  required="required" value="<?php echo $row_editconfig['dq_date_close2'];?>">
      </div>
    </div>

     <div class="form-group">
      <div class="col-sm-3">   </div>
      <div class="col-sm-6">
        <input type="hidden" value="<?php echo $row_editconfig['dq_id'];?>" name="dq_id">
        <button type="submit" class="btn btn-primary"> บันทึก </button>
      </div>
    </div>
  </div>
</form>
