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
$query_rsconsys = "SELECT * FROM tbl_date_q ORDER BY dq_id DESC";
$rsconsys = mysql_query($query_rsconsys, $conn) or die(mysql_error());
$row_rsconsys = mysql_fetch_assoc($rsconsys);
$totalRows_rsconsys = mysql_num_rows($rsconsys);
?>
<div class="row">
    <div class="col-md-10">
        <h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i> การจัดการรอบการประเมิน</h3>
    </div>
    <div class="col-md-2">
         <a href="config.php?p=add" class="btn btn-primary btn-sm pull-right">+เพิ่ม</a>
    </div> 
    
</div>
<table border="1" cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
    <tr class="info">
        <td width="7%" align="center">รอบ</td>
        <td width="25%">เจ้าหน้าที่</td>
        <td width="25%">หัวหน้าฝ่าย</td>
        <td width="25%">ผู้อำนวยการ</td>
        <td width="5%">แก้ไข</td>
        <td width="5%">ลบ</td>
    </tr>
<?php $i = 1;
do { ?>
        <tr>
            <td><b><?php echo $row_rsconsys['dq_name']; ?></b></td>
            <td>
                <p style="color: green">
                    เปิด : <?php echo date('d/m/Y', strtotime($row_rsconsys['dq_date_open1'])); ?>
                </p>
                <p style="color: red">
                    ปิด : <?php echo date('d/m/Y', strtotime($row_rsconsys['dq_date_close1'])); ?>
                </p>
            </td>
            <td>
                <p style="color: green">
                    เปิด : <?php echo date('d/m/Y', strtotime($row_rsconsys['dq_date_open2'])); ?>
                </p>
                <p style="color: red">
                    ปิด : <?php echo date('d/m/Y', strtotime($row_rsconsys['dq_date_close2'])); ?>
                </p>
            </td>
            <td>
                <p style="color: green">
                    เปิด : <?php echo date('d/m/Y', strtotime($row_rsconsys['dq_date_open3'])); ?>
                </p>
                <p style="color: red">
                    ปิด : <?php echo date('d/m/Y', strtotime($row_rsconsys['dq_date_close3'])); ?>
                </p>
            </td>
            <td><a href="config.php?dq_id=<?php echo $row_rsconsys['dq_id']; ?>&p=edit" class="btn btn-warning btn-xs">แก้ไข</a></td>
            <td>
                <a href="config_del_db.php?dq_id=<?php echo $row_rsconsys['dq_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ยืนยันการลบข้อมูล');">
                    ลบ</a></td>
        </tr>
    <?php $i++;
} while ($row_rsconsys = mysql_fetch_assoc($rsconsys)); ?>
</table>
<?php
mysql_free_result($rsconsys);
?>