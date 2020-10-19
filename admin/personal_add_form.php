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
$query_rsdept = "SELECT * FROM tbl_department";
$rsdept = mysql_query($query_rsdept, $conn) or die(mysql_error());
$row_rsdept = mysql_fetch_assoc($rsdept);
$totalRows_rsdept = mysql_num_rows($rsdept);

mysql_select_db($database_conn, $conn);
$query_rspo = "SELECT * FROM tbl_position";
$rspo = mysql_query($query_rspo, $conn) or die(mysql_error());
$row_rspo = mysql_fetch_assoc($rspo);
$totalRows_rspo = mysql_num_rows($rspo);

mysql_select_db($database_conn, $conn);
$query_rslevel = "SELECT * FROM tbl_level";
$rslevel = mysql_query($query_rslevel, $conn) or die(mysql_error());
$row_rslevel = mysql_fetch_assoc($rslevel);
$totalRows_rslevel = mysql_num_rows($rslevel);
?>
<form id="form1" name="form1" method="post" action="personal_save_db.php" class="form-horizontal">
  <div class="form-group">
      <div class="col-sm-3"> หน่วยงาน </div>
      <div class="col-sm-7">
        <select name="ref_d_id" id="ref_d_id" required class="form-control">
          <option value="">-เลือก-</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsdept['d_id']?>"><?php echo $row_rsdept['d_name']?></option>
          <?php
} while ($row_rsdept = mysql_fetch_assoc($rsdept));
  $rows = mysql_num_rows($rsdept);
  if($rows > 0) {
      mysql_data_seek($rsdept, 0);
	  $row_rsdept = mysql_fetch_assoc($rsdept);
  }
?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"> ตำแหน่ง  </div>
      <div class="col-sm-7">
        <select name="ref_po_id" id="ref_po_id" required class="form-control">
          <option value="">-เลือก-</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rspo['po_id']?>"><?php echo $row_rspo['po_name']?></option>
          <?php
} while ($row_rspo = mysql_fetch_assoc($rspo));
  $rows = mysql_num_rows($rspo);
  if($rows > 0) {
      mysql_data_seek($rspo, 0);
	  $row_rspo = mysql_fetch_assoc($rspo);
  }
?>
        </select>
      </div>
  </div>
  <div class="form-group">
      <div class="col-sm-3"> สิทธิ์การใช้งาน  </div>
      <div class="col-sm-7">
        <select name="ref_l_id" id="ref_l_id" required class="form-control">
          <option value="">-เลือก-</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rslevel['l_id']?>"><?php echo $row_rslevel['l_name']?></option>
          <?php
} while ($row_rslevel = mysql_fetch_assoc($rslevel));
  $rows = mysql_num_rows($rslevel);
  if($rows > 0) {
      mysql_data_seek($rslevel, 0);
	  $row_rslevel = mysql_fetch_assoc($rslevel);
  }
?>
        </select>
      </div>
  </div>
  <div class="form-group">
      <div class="col-sm-3"> Username  </div>
      <div class="col-sm-6">
        <input type="text" name="p_username" required="required" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"> Password  </div>
      <div class="col-sm-6">
        <input type="text" name="p_password" required="required" class="form-control">
      </div>
    </div>
        <div class="form-group">
      <div class="col-sm-3"> เพศ  </div>
      <div class="col-sm-6">
         <label>
      <input type="radio" name="p_sex" value="ชาย" id="RadioGroup1_0" />
      ชาย</label>
 
    <label>
      <input type="radio" name="p_sex" value="หญิง" id="RadioGroup1_1" />
      หญิง</label>
    <br />
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"> คำนำหน้า </div>
      <div class="col-sm-6">
         <select name="p_firstname" required class="form-control">
           <option value="">-เลือก-</option>
            <option value="นาย">-นาย-</option>
            <option value="นาง">-นาง-</option>
            <option value="นางสาว">-นางสาว-</option>
            <option value="ผู้ช่วยศาสตราจารย์">-ผู้ช่วยศาสตราจารย์-</option>
            <option value="ดร.">-ดร.-</option>
         </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-3"> ชื่อ </div>
      <div class="col-sm-6">
        <input type="text" name="p_name" required="required" class="form-control">
      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-3"> นามสกุล </div>
      <div class="col-sm-6">
        <input type="text" name="p_lastname" required="required" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"> ที่อยู่  </div>
      <div class="col-sm-6">
        <textarea name="p_address" rows="3" required="required" class="form-control"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"> เบอร์โทรศัพท์ </div>
      <div class="col-sm-6">
        <input type="text" name="p_phone" required="required" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"> อีเมล  </div>
      <div class="col-sm-6">
        <input type="email" name="p_email" required="required" class="form-control">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-3"> วันเกิด </div>
      <div class="col-sm-6">
        <input type="date" name="p_birthday" required="required" class="form-control">
      </div>
    </div>

     <div class="form-group">
      <div class="col-sm-3">   </div>
      <div class="col-sm-6">
        <input type="hidden" name="p_status" value="ปฏิบัติการ">
        <button type="submit" class="btn btn-primary"> บันทึก </button>
      </div>
    </div>

  </div>
</form>
<?php
mysql_free_result($rsdept);

mysql_free_result($rspo);

mysql_free_result($rslevel);
?>
