<?php require_once('../Connections/conn.php'); ?>
<?php // require_once('../Connections/conn.php');  ?>
<?php
date_default_timezone_set('Asia/Bangkok');
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
$query_showqg1list = "SELECT * FROM tbl_q1_group order by qt_id ASC";
$showqg1list = mysql_query($query_showqg1list, $conn) or die(mysql_error());
$row_showqg1list = mysql_fetch_assoc($showqg1list);
$totalRows_showqg1list = mysql_num_rows($showqg1list);
mysql_select_db($database_conn, $conn);
$query_fixdate = "SELECT * FROM tbl_date_q ORDER BY dq_id DESC";
$fixdate = mysql_query($query_fixdate, $conn) or die(mysql_error());
$row_fixdate = mysql_fetch_assoc($fixdate);
$totalRows_fixdate = mysql_num_rows($fixdate);
$p_id = $_GET['p_id'];
$rc_term = $_GET['term'];
$query_rsreson = "SELECT * FROM tbl_reason_chk_score
WHERE ref_p_id=$p_id
AND rc_term ='$rc_term'
AND rc_group=1 ";
$rsreson = mysql_query($query_rsreson, $conn) or die(mysql_error());
$row_rsreson = mysql_fetch_assoc($rsreson);
?>
<style>
    input[type=number]{
        width: 80px;
    }
</style>
<script type="text/javascript">
    function updateTotal() {
        var total = 0;//
        var list = document.getElementsByClassName("input");
        var values = [];
        for (var i = 0; i < list.length; ++i) {
            values.push(parseFloat(list[i].value));
        }
        total = values.reduce(function (previousValue, currentValue, index, array) {
            return previousValue + currentValue;
        });
        document.getElementById("total").value = total;
    }
</script>
<?php
$totalAmt = 0;
$datenow = date('Y-m-d');
$dq_date_open2 = $row_fixdate['dq_date_open3'];
$dq_date_close2 = $row_fixdate['dq_date_close3'];
echo '<h3>';
echo ' วันที่เริ่มประเมิน : ' . date('d/m/Y', strtotime($dq_date_open2));
echo ' วันที่สิ้นสุด :  ' . date('d/m/Y', strtotime($dq_date_close2));
echo '</h3>';
if ($datenow >= $dq_date_open2 && $datenow <= $dq_date_close2) {
    ?>
    <h4> ชุดที่ 1 </h4>
    <form action="se_g1_db.php" method="post" name="ev" class="form-horizontal" id="frm">
        <table border="1" class="table" id="main_tb">
            <tr class="info">
                <td width="5%">ข้อ</td>
                <td width="10%">หัวข้อ</td>
                <td width="85%">รายละเอียดการประเมิน</td>
            </tr>
            <?php do { ?>
                <tr>
                    <td><?php echo $row_showqg1list['qt_id']; ?></td>
                    <td><?php echo $row_showqg1list['qt_name']; ?>
                    </td>
                    <td><?php echo $row_showqg1list['qt_detail']; ?>

                        <?php
                        $qt_id = $row_showqg1list['qt_id'];
                        $query_rsquint1 = "SELECT * FROM tbl_q1 WHERE ref_qt_id = $qt_id ORDER BY q1_number ASC";
                        $rsquint1 = mysql_query($query_rsquint1, $conn) or die(mysql_error());
                        $row_rsquint1 = mysql_fetch_assoc($rsquint1);
                        $totalRows_rsquint1 = mysql_num_rows($rsquint1);

                        $q1_number = $row_rsquint1['q1_number'];


                        $term = $_GET['term'];

                        $colname_scoreg1 = "-1";
                        if (isset($_GET['p_id'])) {
                            $colname_scoreg1 = $_GET['p_id'];
                        }
                        mysql_select_db($database_conn, $conn);
                        $query_scoreg1 = sprintf("
        SELECT *
        FROM tbl_score as c, tbl_q1 as g, tbl_q1_group as d
        WHERE c.ref_p_id = %s
        AND c.ref_q1_number=g.q1_id
        AND g.ref_qt_id=d.qt_id
        AND c.s_group_no=1
        AND g.ref_qt_id=$qt_id
        AND c.ref_dq_id='$lastterm'
        
        ", GetSQLValueString($colname_scoreg1, "int"));
                        $scoreg1 = mysql_query($query_scoreg1, $conn) or die(mysql_error());
                        $row_scoreg1 = mysql_fetch_assoc($scoreg1);
                        $totalRows_scoreg1 = mysql_num_rows($scoreg1);
                        ?>
                        <table width="100%" border="1" class="table table-hovered">
                            <tr>
                                <td width="5%">ระดับ</td>
                                <td width="15%">คะแนน</td>
                                <td width="75%">รายละเอียดการพิจารณา</td>
                                <td width="5%">ใส่คะแนน</td>
                            </tr>
                            <?php $i = 1;
                            if ($totalRows_rsquint1 > 0) {
                                do { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row_scoreg1['q1_score_rank']; ?>-<?php echo $row_scoreg1['q1_score_rank_max']; ?></td>
                                        <td><?php echo $row_scoreg1['q1_detail']; ?></td>
                                        <td>
                                            <input type="hidden" name="s_p_id_3"  value="<?php echo $p_id; ?>" />
                                            <input type="hidden" name="s_p_id_1"  value="<?php echo $_GET['p_id']; ?>" />
                                            <input type="hidden" name="s_ip3" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                            <input type="hidden" name="s_dateq3" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                            <input type="hidden" name="s_group_no" value="1" />
                                            <input type="hidden" name="ref_dq_id" value="<?php echo $_GET['term']; ?>" />


                                            <input type="hidden" name="ref_q1_number[]" required="required"  value="<?php echo $row_scoreg1['ref_q1_number']; ?>" />
                                            <input type="number" data-id="score" name="s_score[]" required="required"  value="<?=($row_scoreg1['s_score']<1?'':$row_scoreg1['s_score']) ?>" class="form-control input"/>
                                        </td>
                                    </tr>
                                    <?php $totalAmt= $totalAmt+$row_scoreg1['s_score'];?>
                <?php $i++;
            } while ($row_scoreg1 = mysql_fetch_assoc($scoreg1));
        } ?>
                        </table>


                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
    <?php } while ($row_showqg1list = mysql_fetch_assoc($showqg1list)); ?>
            <tr>
                <td align="right" colspan="3">
                    รวม(ปรับปรุง)
                    <input name="total" type="text" style="background-color: yellow; text-align: right; color:red" id="total" value="<?=$totalAmt?>" required readonly="readonly">
                </td>
            </tr>
        </table>
        <p>
            เหตุผลในการ เพิ่ม/ลด คะแนน จากหัวหน้าฝ่าย  <br />
            <textarea name="rc_resason_old" class="form-control" readonly="readonly"><?php echo $row_rsreson['rc_resason']; ?></textarea>
            <br />
        </p>
        <p>
            เหตุผลในการ เพิ่ม/ลด คะแนน  <br />

            <input type="hidden" name="rc_term" value="<?php echo $_GET['term']; ?>">
            <input type="hidden" name="ref_h_id" value="<?php echo $ref_h_id; ?>">
            <textarea name="rc_resason" class="form-control"></textarea>
            <br />
        </p>
        <p align="right">
            <button type="button" id="bt_submit" name="save" class="btn btn-primary" style="width: 300px; height: 70px"> บันทึก </button>
        </p>
    </form>
    <?php
    mysql_free_result($showqg1list);
    mysql_free_result($fixdate);
    mysql_free_result($scoreg1);
} else {
    echo '<font color="red">';
    echo '<h3 align="center">';
    echo 'Close System';
    echo '</h3>';
    echo '</font>';
    ?>
    <p align="center"> <a href="index.php?p=report">  Report </a> </p>
<?php } ?>

    <script type="text/javascript" src="../js/validate_question.js"></script>