<?php // require_once('../Connections/conn.php');  ?>
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
$query_rsrank1 = "
SELECT d.d_name, p.p_firstname ,p.p_name,p.p_lastname, SUM(s.s_score) AS tscore
FROM tbl_score as s
INNER JOIN tbl_personal as p ON s.ref_p_id=p.p_id
INNER JOIN tbl_department as d  ON p.ref_d_id=d.d_id
WHERE d.d_id=1
AND s.ref_dq_id='$lastterm'
GROUP BY s.ref_p_id
ORDER BY tscore desc LIMIT 5
";
$rsrank1 = mysql_query($query_rsrank1, $conn) or die(mysql_error());
$row_rsrank1 = mysql_fetch_assoc($rsrank1);
$totalRows_rsrank1 = mysql_num_rows($rsrank1);

$query_rsrank2 = "
SELECT d.d_name, p.p_firstname ,p.p_name,p.p_lastname, SUM(s.s_score) AS tscore2
FROM tbl_score as s
INNER JOIN tbl_personal as p ON s.ref_p_id=p.p_id
INNER JOIN tbl_department as d  ON p.ref_d_id=d.d_id
WHERE d.d_id=2
AND s.ref_dq_id='$lastterm'
GROUP BY s.ref_p_id
ORDER BY tscore2 desc LIMIT 5
";
$rsrank2 = mysql_query($query_rsrank2, $conn) or die(mysql_error());
$row_rsrank2 = mysql_fetch_assoc($rsrank2);
$totalRows_rsrank2 = mysql_num_rows($rsrank2);


$query_rsrank3 = "
SELECT d.d_name, p.p_firstname ,p.p_name,p.p_lastname, SUM(s.s_score) AS tscore3
FROM tbl_score as s
INNER JOIN tbl_personal as p ON s.ref_p_id=p.p_id
INNER JOIN tbl_department as d  ON p.ref_d_id=d.d_id
WHERE d.d_id=3
AND s.ref_dq_id='$lastterm'
GROUP BY s.ref_p_id
ORDER BY tscore3 desc LIMIT 5
";
$rsrank3 = mysql_query($query_rsrank3, $conn) or die(mysql_error());
$row_rsrank3 = mysql_fetch_assoc($rsrank3);
$totalRows_rsrank3 = mysql_num_rows($rsrank3);


$query_rsrank4 = "
SELECT d.d_name, p.p_firstname ,p.p_name,p.p_lastname, SUM(s.s_score) AS tscore4
FROM tbl_score as s
INNER JOIN tbl_personal as p ON s.ref_p_id=p.p_id
INNER JOIN tbl_department as d  ON p.ref_d_id=d.d_id
WHERE d.d_id=4
AND s.ref_dq_id='$lastterm'
GROUP BY s.ref_p_id
ORDER BY tscore4 desc LIMIT 5
";
$rsrank4 = mysql_query($query_rsrank4, $conn) or die(mysql_error());
$row_rsrank4 = mysql_fetch_assoc($rsrank4);
$totalRows_rsrank4 = mysql_num_rows($rsrank4);
?>
<h3 class="text-primary prompt-400"> รอบปัจจุบัน <?php echo $lastterm; ?> </h3>
<div class="row">
    <div class="col-sm-6">
        <b> ส่วนงานบริการ กลุ่มงานเลขานุการและธุรการ</b> <br />
        <table class="table-bordered table table-hover" cellspacing="0">
            <tr class="success">
                <th width="3%">No.</th>
                <th width="60%">ชื่อ-สกุล</th>
                <th width="10%">คะแนน</th>
            </tr>
            <?php $i = 1;
            if ($totalRows_rsrank1 > 0) {
                do { ?>
                    <tr>
                        <td align="center"><?php echo $i; ?></td>
                        <td><?php echo $row_rsrank1['p_firstname'] . $row_rsrank1['p_name'] . ' ' . $row_rsrank1['p_lastname']; ?></td>
                        <td align="center"><?php echo $row_rsrank1['tscore']; ?></td>
                    </tr>
        <?php $i++;
    } while ($row_rsrank1 = mysql_fetch_assoc($rsrank1));
} ?>
        </table>
    </div>
    <div class="col-sm-6">
        <b> กลุ่มงานอำนวยการและสื่อสารองค์กร</b> <br />
        <table class="table-bordered table table-hover" cellspacing="0">
            <tr class="success">
                <th width="3%">No.</th>
                <th width="60%">ชื่อ-สกุล</th>
                <th width="10%">คะแนน</th>
            </tr>
<?php $n = 1;
if ($totalRows_rsrank2 > 0) {
    do { ?>
                    <tr>
                        <td align="center"><?php echo $n; ?></td>
                        <td><?php echo $row_rsrank2['p_firstname'] . $row_rsrank2['p_name'] . ' ' . $row_rsrank2['p_lastname']; ?></td>
                        <td align="center"><?php echo $row_rsrank2['tscore2']; ?></td>
                    </tr>
        <?php $n++;
    } while ($row_rsrank2 = mysql_fetch_assoc($rsrank2));
} ?>
        </table>
    </div>
</div>
<div class="row">
    <hr />
    <div class="col-sm-6">
        <b> กลุ่มงานส่งเสริมวิชาการ</b> <br />
        <table class="table-bordered table table-hover" cellspacing="0">
            <tr class="success">
                <th width="3%">No.</th>
                <th width="60%">ชื่อ-สกุล</th>
                <th width="10%">คะแนน</th>
            </tr>
<?php $m = 1;
if ($totalRows_rsrank3 > 0) {
    do { ?>
                    <tr>
                        <td align="center"><?php echo $m; ?></td>
                        <td><?php echo $row_rsrank3['p_firstname'] . $row_rsrank3['p_name'] . ' ' . $row_rsrank3['p_lastname']; ?></td>
                        <td align="center"><?php echo $row_rsrank3['tscore3']; ?></td>
                    </tr>
                    <?php $m++;
                } while ($row_rsrank3 = mysql_fetch_assoc($rsrank3));
            } ?>
        </table>
    </div>
    <div class="col-sm-6">
        <b> กลุ่มงานทะเบียนนักศึกษาและฐานข้อมูล</b> <br />
        <table class="table-bordered table table-hover" cellspacing="0">
            <tr class="success">
                <th width="3%">No.</th>
                <th width="60%">ชื่อ-สกุล</th>
                <th width="10%">คะแนน</th>
            </tr>
<?php $s = 1;
if ($totalRows_rsrank4 > 0) {
    do { ?>
                    <tr>
                        <td align="center"><?php echo $s; ?></td>
                        <td><?php echo $row_rsrank4['p_firstname'] . $row_rsrank4['p_name'] . ' ' . $row_rsrank4['p_lastname']; ?></td>
                        <td align="center"><?php echo $row_rsrank4['tscore4']; ?></td>
                    </tr>
        <?php $s++;
    } while ($row_rsrank4 = mysql_fetch_assoc($rsrank4));
} ?>
        </table>
    </div>
</div>
<br />