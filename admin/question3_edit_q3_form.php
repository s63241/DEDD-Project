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

$colname_editq3q = "-1";
if (isset($_GET['q3_id'])) {
  $colname_editq3q = $_GET['q3_id'];
}
mysql_select_db($database_conn, $conn);
$query_editq3q = sprintf("
  SELECT * FROM tbl_q3  as q 
  LEFT JOIN tbl_department as d on q.ref_d_id=d.d_id
  WHERE q.q3_id = %s
   
 


  ", GetSQLValueString($colname_editq3q, "int"));
$editq3q = mysql_query($query_editq3q, $conn) or die(mysql_error());
$row_editq3q = mysql_fetch_assoc($editq3q);
$totalRows_editq3q = mysql_num_rows($editq3q);

// AND q.ref_d_id=d.d_id
//tbl_department as d 

mysql_select_db($database_conn, $conn);
$query_showdiv = "SELECT * FROM tbl_department";
$showdiv = mysql_query($query_showdiv, $conn) or die(mysql_error());
$row_showdiv = mysql_fetch_assoc($showdiv);
$totalRows_showdiv = mysql_num_rows($showdiv);
?>
<div class="row">
  <div class="col-sm-12">
<hr />
<h4>::แก้ไขคำถาม ป.มสด.3::</h4>
<form id="form2" name="form2" method="post" action="question3_edit_q_form_db.php" class="form-horizontal">
   <div class="form-group">
    <div class="col-sm-2"> หน่วยงาน  </div>
    <div class="col-sm-2">

      <select name="ref_d_id" id="ref_d_id"class="form-control" >
         <option value="<?php echo $row_editq3q['ref_d_id']?>"><?php echo $row_showdiv['d_name']?></option>
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
        <input name="q3_number" type="number" required="required" class="form-control" id="q3_number" value="<?php echo $row_editq3q['q3_number']; ?>">
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
        <input name="q3_score_rank" type="text" required="required" class="form-control" id="q3_score_rank" value="<?php echo $row_editq3q['q3_score_rank']; ?>">
    </div> 
  </div>
  <div class="form-group">
    <div class="col-sm-2"> คำถาม  </div>
    <div class="col-sm-10">
        <input  name="q3_detail" type="text" required="required" class="form-control" id="q3_detail" value="<?php echo $row_editq3q['q3_detail']; ?>">
    </div> 
  </div>
<input name="q3_id" type="hidden" id="q3_id" value="<?php echo $row_editq3q['q3_id']; ?>">
<input name="qg3_id" type="hidden" id="qg3_id" value="<?php echo $_GET['qg3_id'];?>" />

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
mysql_free_result($editq3q);
?>
