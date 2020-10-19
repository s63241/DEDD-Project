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

$colname_rsedit = "-1";
if (isset($_GET['p_id'])) {
  $colname_rsedit = $_GET['p_id'];
}
mysql_select_db($database_conn, $conn);
$query_rsedit = sprintf("
SELECT * 
FROM 
tbl_personal  as p,
tbl_department as d,
tbl_position as j,
tbl_level as l    
WHERE  p.p_id = %s
AND p.ref_d_id=d.d_id  
AND p.ref_po_id=j.po_id
AND p.ref_l_id=l.l_id 


  ", GetSQLValueString($colname_rsedit, "int"));
$rsedit = mysql_query($query_rsedit, $conn) or die(mysql_error());
$row_rsedit = mysql_fetch_assoc($rsedit);
$totalRows_rsedit = mysql_num_rows($rsedit);
?>
<h4 align="center">::UPDATE PERSONAL::</h4>
<hr/>
<form id="form1" name="form1" method="post" action="personal_edit_db.php" class="form-horizontal">
<div class="form-group">
      <div class="col-sm-2">สถานะ</div>
      <div class="col-sm-4">
        <select name="p_status" id="p_status" required class="form-control">
          <option value="<?php echo $row_rsedit['p_status']; ?>">-<?php echo $row_rsedit['p_status']; ?>-</option>
          <option value="">-เลือกใหม่-</option>
          <option value="ปฏิบัติการ">ปฏิบัติการ</option>
          <option value="ลาออก">ลาออก</option>
        </select>
   </div>
  </div>
  <div class="form-group">
      <div class="col-sm-2"> หน่วยงาน </div>
      <div class="col-sm-4">
        <select name="ref_d_id" id="ref_d_id" required class="form-control">
          <option value="<?php echo $row_rsedit['ref_d_id']?>"><?php echo $row_rsedit['d_name']?></option>
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
      <div class="col-sm-2"> ตำแหน่ง  </div>
      <div class="col-sm-4">
        <select name="ref_po_id" id="ref_po_id" required class="form-control">
          <option value="<?php echo $row_rsedit['ref_po_id']?>"><?php echo $row_rsedit['po_name']?></option>
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
      <div class="col-sm-2"> สิทธิ์การใช้งาน  </div>
      <div class="col-sm-4">
        <select name="ref_l_id" id="ref_l_id" required class="form-control">
          <option value="<?php echo $row_rsedit['ref_l_id']?>"><?php echo $row_rsedit['l_name']?></option>
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
      <div class="col-sm-2"> Username  </div>
      <div class="col-sm-3">
        <input name="p_username" type="text" required="required" class="form-control" value="<?php echo $row_rsedit['p_username']; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"> Password  </div>
      <div class="col-sm-3">
        <input name="p_password" type="text" required="required" class="form-control" value="<?php echo $row_rsedit['p_password']; ?>">
      </div>
    </div>
        <div class="form-group">
      <div class="col-sm-2"> เพศ </div>
      <div class="col-sm-6">
         <label>
      <input <?php if (!(strcmp($row_rsedit['p_sex'],"ชาย"))) {echo "checked=\"checked\"";} ?> type="radio" name="p_sex" value="ชาย" id="RadioGroup1_0" />
      ชาย</label>
 
    <label>
      <input <?php if (!(strcmp($row_rsedit['p_sex'],"หญิง"))) {echo "checked=\"checked\"";} ?> type="radio" name="p_sex" value="หญิง" id="RadioGroup1_1" />
      หญิง</label>
    <br />
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"> คำนำหน้า </div>
      <div class="col-sm-3">
         <select name="p_firstname" required class="form-control">
           <option value="<?php echo $row_rsedit['p_firstname']; ?>">-<?php echo $row_rsedit['p_firstname']; ?>-</option>
           <option value="">-choose-</option>
            <option value="นาย">-นาย-</option>
            <option value="นาง">-นาง-</option>
            <option value="นางสาว">-นางสาว-</option>
            <option value="ผู้ช่วยศาสตราจารย์">-ผู้ช่วยศาสตราจารย์-</option>
            <option value="ดร.">-ดร.-</option>
         </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2"> ชื่อ </div>
      <div class="col-sm-4">
        <input name="p_name" type="text" required="required" class="form-control" value="<?php echo $row_rsedit['p_name']; ?>">
      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-2"> นามสกุล </div>
      <div class="col-sm-4">
        <input name="p_lastname" type="text" required="required" class="form-control" value="<?php echo $row_rsedit['p_lastname']; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"> ที่อยู่ </div>
      <div class="col-sm-6">
        <textarea name="p_address" rows="3" required="required" class="form-control"><?php echo $row_rsedit['p_address']; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"> เบอร์โทรศัพท์ </div>
      <div class="col-sm-4">
        <input name="p_phone" type="text" required="required" class="form-control" value="<?php echo $row_rsedit['p_phone']; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"> อีเมล </div>
      <div class="col-sm-4">
        <input name="p_email" type="email" required="required" class="form-control" value="<?php echo $row_rsedit['p_email']; ?>">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2"> วันเกิด </div>
      <div class="col-sm-3">
        <input name="p_birthday" type="date" required="required" class="form-control" value="<?php echo $row_rsedit['p_birthday']; ?>">
      </div>
    </div>







     <div class="form-group">
      <div class="col-sm-3">   </div>
      <div class="col-sm-6">
        <input type="hidden" name="p_id" value="<?php echo $row_rsedit['p_id'];?>">
        <button type="submit" class="btn btn-primary"> บันทึก </button>
      </div>
    </div>

  </div>
</form>
<?php
mysql_free_result($rsdept);

mysql_free_result($rspo);

mysql_free_result($rslevel);

mysql_free_result($rsedit);
?>
