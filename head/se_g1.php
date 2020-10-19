<?php require_once('../Connections/conn.php'); ?>
<?php // require_once('../Connections/conn.php');    ?>
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
$datenow = date('Y-m-d');
$dq_date_open1 = $row_fixdate['dq_date_open2'];
$dq_date_close1 = $row_fixdate['dq_date_close2'];
$totalScore = 0;
echo '<h3>';
echo 'วันที่เริ่มประเมิน : ' . date('d/m/Y', strtotime($dq_date_open1));
echo ' วันที่สิ้นสุด :  ' . date('d/m/Y', strtotime($dq_date_close1));
echo '</h3>';
if ($datenow >= $dq_date_open1 && $datenow <= $dq_date_close1) {
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
                            <?php
                            $i = 1;
                            if ($totalRows_rsquint1 > 0) {
                                do {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row_scoreg1['q1_score_rank']; ?>-<?php echo $row_scoreg1['q1_score_rank_max']; ?></td>
                                        <td><?php echo $row_scoreg1['q1_detail']; ?></td>
                                        <td>
                                            <input type="hidden" name="s_p_id_2"  value="<?php echo $p_id; ?>" />
                                            <input type="hidden" name="s_p_id_1"  value="<?php echo $_GET['p_id']; ?>" />
                                            <input type="hidden" name="s_ip2" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                            <input type="hidden" name="s_dateq2" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                            <input type="hidden" name="s_group_no" value="1" />
                                            <input type="hidden" name="ref_dq_id" value="<?php echo $_GET['term']; ?>" />
                                            <input type="hidden" name="s_id[]" required="required"  value="<?php echo $row_scoreg1['s_id']; ?>" />
                                            <input type="number" name="s_score[]" data-id="score" data-value="<?= $row_scoreg1['s_score']; ?>"  value="<?php echo $row_scoreg1['s_score']; ?>"  step="any" max="<?php echo $row_scoreg1['q1_score_rank_max']; ?>" min="0" class="form-control input"  onchange='updateTotal();'/>
                                        </td>
                                    </tr>
                                    <?php
                                    $totalScore = $totalScore+$row_scoreg1['s_score'];
                                    $i++;
                                } while ($row_scoreg1 = mysql_fetch_assoc($scoreg1));
                            }
                            ?>
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
                    รวม 
                    <input name="total" type="text" style="background-color: yellow; text-align: right; color:red" id="total" value="<?=$totalScore?>" required readonly="readonly">
                </td>
            </tr>
        </table>
        <p>
            เหตุผลในการ เพิ่ม/ลด คะแนน  <br />
            <textarea name="rc_resason" class="form-control"></textarea>
            <br />

        </p>
        <p align="right">
            <button type="button" id="bt_submit" name="save" class="btn btn-primary" style="width: 300px; height: 70px"> บันทึก </button>
        </p>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
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

<script type="text/javascript" src="../js/validate_question_3.js"></script>