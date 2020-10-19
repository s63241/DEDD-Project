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

$colname_showq3 = "-1";
if (isset($_GET['qg3_id'])) {
  $colname_showq3 = $_GET['qg3_id'];
}
mysql_select_db($database_conn, $conn);
$query_showq3 = sprintf("SELECT * FROM tbl_q3_group WHERE qg3_id = %s", GetSQLValueString($colname_showq3, "int"));
$showq3 = mysql_query($query_showq3, $conn) or die(mysql_error());
$row_showq3 = mysql_fetch_assoc($showq3);
$totalRows_showq3 = mysql_num_rows($showq3);

$colname_showqg3 = "-1";
if (isset($_GET['qg3_id'])) {
  $colname_showqg3 = $_GET['qg3_id'];
}
mysql_select_db($database_conn, $conn);
$query_showqg3 = sprintf("


  SELECT * FROM tbl_q3 as q LEFT JOIN tbl_department as d on q.ref_d_id = d.d_id
  WHERE q.ref_qg3_id = %s



  ", GetSQLValueString($colname_showqg3, "int"));
$showqg3 = mysql_query($query_showqg3, $conn) or die(mysql_error());
$row_showqg3 = mysql_fetch_assoc($showqg3);
$totalRows_showqg3 = mysql_num_rows($showqg3);

mysql_select_db($database_conn, $conn);
$query_showdiv = "SELECT * FROM tbl_department";
$showdiv = mysql_query($query_showdiv, $conn) or die(mysql_error());
$row_showdiv = mysql_fetch_assoc($showdiv);
$totalRows_showdiv = mysql_num_rows($showdiv);
?>
<div class="row">
  <div class="col-sm-12">
<h4>::ประเภทคำถาม ป.มสด.3::</h4>
<form id="form1" name="form1" method="post" action="question1_edit_db.php" class="form-horizontal">
  <div class="form-group">
      <div class="col-sm-3"> ชื่อประเภทคำถาม </div>
      <div class="col-sm-7">
        <input name="qt_name" type="text"  class="form-control" value="<?php echo $row_showq3['qg3_name']; ?>" disabled="disabled">
        
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"> รายละเอียด </div>
      <div class="col-sm-7">
        <input name="qt_detail" type="text"  required="required" class="form-control" value="<?php echo $row_showq3['qg3_detail']; ?>" disabled>
      </div>
    </div>
</form>
</div>
</div>
<div class="row">
  <div class="col-sm-12">
<hr />
<h4>::เพิ่มคำถาม ป.มสด.3::</h4>
<form id="form2" name="form2" method="post" action="question3_add_q_form_db.php" class="form-horizontal">

  <div class="form-group">
    <div class="col-sm-2"> หน่วยงาน  </div>
    <div class="col-sm-2">

      <select name="ref_d_id" id="ref_d_id"class="form-control" >
        <option value="">เลือกหน่วยงาน</option>
        <?php
do {  
?>
        <option value="<?php echo $row_showdiv['d_id']?>"><?php echo $row_showdiv['d_name']?></option>
        <?php
} while ($row_showdiv = mysql_fetch_assoc($showdiv));
  $rows = mysql_num_rows($showdiv);
  if($rows > 0) {
      mysql_data_seek($showdiv, 0);
	  $row_showdiv = mysql_fetch_assoc($showdiv);
  }
?>
      </select>
    </div> 
  </div>

  <div class="form-group">
    <div class="col-sm-2"> ข้อที่  </div>
    <div class="col-sm-2">
        <input name="q3_number" type="number" required="required" class="form-control" id="q3_number">
    </div> 
  </div>
  <div class="form-group">
    <div class="col-sm-2"> ช่วงคะแนน </div>
    <div class="col-sm-1">
     <input name="q3_socre_rankx" type="text"   class="form-control" value="0" disabled="disabled">  
     </div>
      <div class="col-sm-1">
      ถึง 
      </div>
    <div class="col-sm-2">
        <input name="q3_score_rank" type="text" required="required" class="form-control" id="q3_score_rank">
    </div> 
  </div>
  <div class="form-group">
    <div class="col-sm-2"> คำถาม  </div>
    <div class="col-sm-10">
        <input  name="q3_detail" type="text" required="required" class="form-control" id="q3_detail">
    </div> 
  </div>
<input name="ref_qg3_id" type="hidden" id="ref_qg3_id" value="<?php echo $_GET['qg3_id'];?>">
<input name="qg3_id" type="hidden" id="qg3_id" value="<?php echo $_GET['qg3_id'];?>" />

  <div class="form-group">
    <div class="col-sm-2">    </div>
    <div class="col-sm-10">
        <button class="btn btn-primary"> เพิ่ม </button>
    </div> 
</div>


  
</form>
</div>
<div class="col-sm-12">
<br />
<table border="1" class="table table-hover table-bordered">
  <tr class="info">
    <td>ข้อที่</td>
    <td>ช่วงคะแนน</td>
    <td>รายละเอียด</td>
    <td>หน่วยงาน</td>
    <td>แก้ไข</td>
    <td>ลบ</td>
  </tr>
  <?php if($totalRows_showqg3 > 0){ do { ?>
    <tr>
      <td><?php echo $row_showqg3['q3_number']; ?></td>
      <td>0-<?php echo $row_showqg3['q3_score_rank']; ?></td>
      <td><?php echo $row_showqg3['q3_detail']; ?></td>
       <td><?php echo $row_showqg3['d_name']; ?></td>
      <td><a href="question3.php?q3_id=<?php echo $row_showqg3['q3_id']; ?>&qg3_id=<?php echo $_GET['qg3_id'];?>&p=edit_q3_q" class="btn btn-warning btn-xs">แก้ไข</a></td>
      <td>
        <a href="question3_del_q_db.php?q3_id=<?php echo $row_showqg3['q3_id']; ?>&qg3_id=<?php echo $_GET['qg3_id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยันการลบข้อมูล');">
        ลบ</a></td>
    </tr>
    <?php } while ($row_showqg3 = mysql_fetch_assoc($showqg3)); } ?>
</table>
</div>
</div>
 <?php
mysql_free_result($showq3);

mysql_free_result($showqg3);

mysql_free_result($showdiv);
?>
