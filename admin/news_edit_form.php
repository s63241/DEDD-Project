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

$colname_editnews = "-1";
if (isset($_GET['n_id'])) {
  $colname_editnews = $_GET['n_id'];
}
mysql_select_db($database_conn, $conn);
$query_editnews = sprintf("SELECT * FROM tbl_news WHERE n_id = %s", GetSQLValueString($colname_editnews, "int"));
$editnews = mysql_query($query_editnews, $conn) or die(mysql_error());
$row_editnews = mysql_fetch_assoc($editnews);
$totalRows_editnews = mysql_num_rows($editnews);
?>
<h4>::แก้ไขข่าวสาร/ประชาสัมพันธ์::</h4>
<form id="form1" name="form1" method="post" action="news_edit_form_db.php" enctype="multipart/form-data" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2 control-label"> หัวข้อ </div>
    <div class="col-sm-7">
      <input type="text" name="n_title" class="form-control" required value="<?php echo $row_editnews['n_title'];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
     รายละเอียด
    </div>
    <div class="col-sm-10">
      <textarea name="n_detail" id="txtMessage" class="ckeditor" cols="69" rows="5"><?php echo $row_editnews['n_detail'];?></textarea>
    </div>
  </div>
  <div class="form-group">
      <div class="col-sm-2 control-label">
        รูปภาพประกอบ
      </div>
      <div class="col-sm-4">
        <img src="../news/<?php echo $row_editnews['n_img'] ?>" width="100px">
        <br />
        เลือก 
          <input type="hidden" name="img" value="<?php echo $row_editnews['n_img'] ?>">
          <input type="file" name="n_img"  accept="image/*">
      </div>
  </div>
    <div class="form-group">
      <div class="col-sm-2 control-label">
        แนบไฟล์
      </div>
      <div class="col-sm-3">
          <a href="../news/<?php echo $row_editnews['n_file'] ?>" target="_blank"><?php echo $row_editnews['n_img'] ?></a>
           <input type="hidden" name="nfile" value="<?php echo $row_editnews['n_file'] ?>">
          <input type="file" name="n_file">
      </div>
      <div class="col-sm-3">
        (ms office, pdf)
      </div>
  </div>
<div class="form-group">
  <div class="col-sm-1">   </div>
  <div class="col-sm-6">
    <input type="hidden" name="n_id" value="<?php echo $row_editnews['n_id'] ?>">
    <button type="submit" class="btn btn-primary"> บันทึก </button>
  </div>
</div>
</div>
</form>