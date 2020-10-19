<?php require_once('../Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
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
$query_listdept = "SELECT * FROM tbl_department ORDER BY d_id DESC";
$listdept = mysql_query($query_listdept, $conn) or die(mysql_error());
$row_listdept = mysql_fetch_assoc($listdept);
$totalRows_listdept = mysql_num_rows($listdept);
?>
<div class="row">
    <div class="col-md-10">
        <h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i> การจัดการหน่วยงาน</h3>
    </div>
    <div class="col-md-2">
        <a href="dept.php?p=add" class="btn btn-primary btn-sm">+เพิ่ม</a>
    </div>
    
</div>
<table border="1" cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
    <tr class="info">
        <td align="center">ID</td>
        <td>ชื่อหน่วยงาน</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
    </tr>
<?php $i = 1;
do { ?>
        <tr>
            <td align="center"><?php echo $i ?></td>
            <td><?php echo $row_listdept['d_name']; ?></td>
            <td><a href="dept.php?d_id=<?php echo $row_listdept['d_id']; ?>&p=edit" class="btn btn-warning btn-xs">แก้ไข</a></td>
            <td>
                <a href="dept_del_db.php?d_id=<?php echo $row_listdept['d_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยันการลบข้อมูล');">
                    ลบ</a></td>
        </tr>
    <?php $i++;
} while ($row_listdept = mysql_fetch_assoc($listdept)); ?>
</table>

<?php
mysql_free_result($listdept);
?>
