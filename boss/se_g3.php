<?php require_once('../Connections/conn.php'); ?>

<?php // require_once('../Connections/conn.php'); ?>
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
$query_showqg1list = "SELECT * FROM tbl_q3_group WHERE qg3_id=1 order by qg3_id ASC";
$showqg1list = mysql_query($query_showqg1list, $conn) or die(mysql_error());
$row_showqg1list = mysql_fetch_assoc($showqg1list);
$totalRows_showqg1list = mysql_num_rows($showqg1list);
$colname_rspersonel = "-1";
if (isset($_GET['p_id'])) {
    $colname_rspersonel = $_GET['p_id'];
}
mysql_select_db($database_conn, $conn);
$query_rspersonel = sprintf("SELECT * FROM tbl_personal WHERE p_id = %s", GetSQLValueString($colname_rspersonel, "int"));
$rspersonel = mysql_query($query_rspersonel, $conn) or die(mysql_error());
$row_rspersonel = mysql_fetch_assoc($rspersonel);
$totalRows_rspersonel = mysql_num_rows($rspersonel);
$query_showqg2list = "SELECT * FROM tbl_q3_group WHERE qg3_id>1 order by qg3_id ASC";
$showqg2list = mysql_query($query_showqg2list, $conn) or die(mysql_error());
$row_showqg2list = mysql_fetch_assoc($showqg2list);
$totalRows_showqg2list = mysql_num_rows($showqg2list);

$p_id = $_GET['p_id'];
$rc_term = $_GET['term'];
$query_rsreson = "SELECT * FROM tbl_reason_chk_score 
WHERE ref_p_id=$p_id
AND rc_term ='$rc_term'
AND rc_group=3
LIMIT 1";
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
<h4> ชุดที่ 3 </h4>
<form action="se_g3_db.php" method="post" name="ev" class="form-horizontal" id="frm">
    <table border="1" class="table" id="main_tb">
        <tr class="info">
            <td>ข้อ</td>
            <td>หัวข้อ</td>
            <td>รายละเอียดการประเมิน</td>
        </tr>
        <?php $k = 1;
        do {
            ?>
            <tr>
                <td><?php echo $k; ?></td>
                <td><?php echo $row_showqg1list['qg3_name']; ?>
                </td>
                <td><?php echo $row_showqg1list['qg3_detail']; ?>

                    <?php
                    $qg3_id = $row_showqg1list['qg3_id'];
                    $qg3_id1 = $row_showqg1list['qg3_id'];
                    //echo 'xxx = ' .$qg3_id1;
                    $ref_d_id = $row_rspersonel['ref_d_id'];
                    $query_rsquint1 = "SELECT * FROM tbl_q3 WHERE ref_qg3_id = $qg3_id AND ref_d_id=$ref_d_id ORDER BY q3_number ASC";
                    $rsquint1 = mysql_query($query_rsquint1, $conn) or die(mysql_error());
                    $row_rsquint1 = mysql_fetch_assoc($rsquint1);
                    $totalRows_rsquint1 = mysql_num_rows($rsquint1);
                    $pid = $_GET['p_id'];
                    //echo 'nnnnnnnnn = '.$pid;
                    mysql_select_db($database_conn, $conn);
                    $query_scoreg11 = sprintf("
        SELECT *
        FROM tbl_score as c, tbl_q3 as g, tbl_q3_group as d
        WHERE c.ref_p_id =$pid
        AND c.ref_q1_number=g.q3_id
        AND g.ref_qg3_id=d.qg3_id
        AND c.s_group_no=3
        AND g.ref_qg3_id=$qg3_id1
        ", GetSQLValueString($colname_scoreg11, "int"));
                    $scoreg11 = mysql_query($query_scoreg11, $conn) or die(mysql_error());
                    $row_scoreg11 = mysql_fetch_assoc($scoreg11);
                    $totalRows_scoreg11 = mysql_num_rows($scoreg11);
                    ?>
                    <table width="100%" border="1" class="table table-hovered">
                        <tr>
                            <td>ระดับ</td>
                            <td>คะแนน</td>
                            <td>รายละเอียดการพิจารณา</td>
                            <td>ใส่คะแนน</td>
                        </tr>
                        <?php
                        $s = 1;
                        if ($totalRows_rsquint1 > 0) {
                            do {
                                ?>
                                <tr>
                                    <td><?php echo $s; ?></td>
                                    <td><?php echo $row_rsquint1['q3_score_rank']; ?></td>
                                    <td><?php echo $row_rsquint1['q3_detail']; ?></td>
                                    <td>
                                        <input type="hidden" name="s_p_id_3"  value="<?php echo $p_id; ?>" />
                                        <input type="hidden" name="s_p_id_1"  value="<?php echo $_GET['p_id']; ?>" />
                                        <input type="hidden" name="s_ip3" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                        <input type="hidden" name="s_dateq3" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                        <input type="hidden" name="s_group_no" value="2" />
                                        <input type="hidden" name="ref_q1_number[]" required="required"  value="<?php echo $row_scoreg11['ref_q1_number']; ?>" />
                                        <input type="number" name="s_score[]" required="required" class="form-control input" value="<?php echo $row_scoreg11['s_score']; ?>" step="any" onchange='updateTotal();' />
                                    </td>
                                </tr>
            <?php
            $s++;
        } while ($row_rsquint1 = mysql_fetch_assoc($rsquint1));
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
    <?php $k++;
} while ($row_showqg1list = mysql_fetch_assoc($showqg1list));
?>
                <?php do { ?>
            <tr>
                <td><?php echo $row_showqg2list['qg3_id']; ?></td>
                <td><?php echo $row_showqg2list['qg3_name']; ?>
                </td>
                <td><?php echo $row_showqg2list['qg3_detail']; ?>

                    <?php
                    $qg3_id = $row_showqg2list['qg3_id'];
                    $query_rsquint2 = "SELECT * FROM tbl_q3 WHERE ref_qg3_id = $qg3_id ORDER BY q3_number ASC";
                    $rsquint2 = mysql_query($query_rsquint2, $conn) or die(mysql_error());
                    $row_rsquint2 = mysql_fetch_assoc($rsquint2);
                    $totalRows_rsquint2 = mysql_num_rows($rsquint2);
                    $colname_scoreg1 = "-1";
                    if (isset($_GET['p_id'])) {
                        $colname_scoreg1 = $_GET['p_id'];
                    }
                    mysql_select_db($database_conn, $conn);
                    $query_scoreg1 = sprintf("
        SELECT *
        FROM tbl_score as c, tbl_q3 as g, tbl_q3_group as d
        WHERE c.ref_p_id = %s
        AND c.ref_q1_number=g.q3_id
        AND g.ref_qg3_id=d.qg3_id
        AND c.s_group_no=3
        AND g.ref_qg3_id=$qg3_id
        ", GetSQLValueString($colname_scoreg1, "int"));
                    $scoreg1 = mysql_query($query_scoreg1, $conn) or die(mysql_error());
                    $row_scoreg1 = mysql_fetch_assoc($scoreg1);
                    $totalRows_scoreg1 = mysql_num_rows($scoreg1);
                    ?>
                    <table width="100%" border="1" class="table table-hovered">
                        <tr>
                            <td>ระดับ</td>
                            <td>คะแนน</td>
                            <td>รายละเอียดการพิจารณา</td>
                            <td>ใส่คะแนน</td>
                        </tr>
    <?php
    $z = 1;
    if ($totalRows_rsquint2 > 0) {
        do {
            ?>
                                <tr>
                                    <td><?php echo $z; ?></td>
                                    <td><?php echo $row_rsquint2['q3_score_rank']; ?></td>
                                    <td><?php echo $row_rsquint2['q3_detail']; ?></td>
                                    <td>
                                        <input type="hidden" name="s_p_id_3"  value="<?php echo $p_id; ?>" />
                                        <input type="hidden" name="s_p_id_1"  value="<?php echo $_GET['p_id']; ?>" />
                                        <input type="hidden" name="s_ip3" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                        <input type="hidden" name="s_dateq3" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                        <input type="hidden" name="s_group_no" value="2" />
                                        <input type="hidden" name="ref_q1_number[]" required="required"  value="<?php echo $row_scoreg1['ref_q1_number']; ?>" />
                                        <input type="number" name="s_score[]" required="required" class="form-control input" value="<?php echo $row_scoreg1['s_score']; ?>" step="any"/>
                                    </td>
                                </tr>
            <?php
            $z++;
        } while ($row_rsquint2 = mysql_fetch_assoc($rsquint2));
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
<?php } while ($row_showqg2list = mysql_fetch_assoc($showqg2list)); ?>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="right" colspan="3">
                รวม 
                <input name="total" type="text" style="background-color: yellow; text-align: right; color:red" id="total" value="" required readonly="readonly">
            </td>
        </tr>
        <tr>
        <tr>
            <td colspan="3">
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


                ความเห็นเพิ่มเติมของผู้ประเมิน  <br />
                <div class="col-xs-7">
                    <textarea name="c_comment1" class="form-control"></textarea>
                    <hr>
                    ข้อเสนอแนะเกี่ยวกับแนวทางพัฒนา  <br />

                    <textarea name="c_comment2" class="form-control"></textarea>
                </div>

            </td>

        </tr>
    </table>
    <p align="right">
        <button type="button" id="bt_submit" name="save" class="btn btn-primary" style="width: 300px; height: 70px"> บันทึก </button>
    </p>
</form>
<?php
mysql_free_result($showqg1list);
mysql_free_result($rspersonel);
?>

<script type="text/javascript" src="../js/validate_question_2.js"></script>