<?php // require_once('../Connections/conn.php');    ?>
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
$query_showqg1list = "SELECT * FROM tbl_q2_group order by qg2_id ASC";
$showqg1list = mysql_query($query_showqg1list, $conn) or die(mysql_error());
$row_showqg1list = mysql_fetch_assoc($showqg1list);
$totalRows_showqg1list = mysql_num_rows($showqg1list);
?>
<style>
    input[type=number]{
        width: 80px;
    }
</style>
<hr>
<h4>ชุดที่ 2</h4>
<hr>
<form action="se_g2_db.php" method="post" name="ev" class="form-horizontal" id="frm">
    <table border="1" class="table table-light table-bordered rounded shadow" style="overflow: hidden; " id="main_tb">
        <tr style="color: #fff; background-color: #59d7fd;">
            <td>ข้อ</td>
            <td>หัวข้อ</td>
            <td>รายละเอียด</td>
        </tr>
        <?php do { ?>
            <tr>
                <td><?php echo $row_showqg1list['qg2_id']; ?></td>
                <td><?php echo $row_showqg1list['qg2_name']; ?></td>
                <td><?php echo $row_showqg1list['qg2_detail']; ?>
                    <?php
                    $qg2_id = $row_showqg1list['qg2_id'];
                    $query_rsquint1 = "SELECT * FROM tbl_q2 WHERE ref_qg2_id = $qg2_id ORDER BY q2_number ASC";
                    $rsquint1 = mysql_query($query_rsquint1, $conn) or die(mysql_error());
                    $row_rsquint1 = mysql_fetch_assoc($rsquint1);
                    $totalRows_rsquint1 = mysql_num_rows($rsquint1);
                    ?>
                    <table width="100%" border="1" class="table table-hover rounded shadow-sm" style="border:none;overflow: hidden;">
                        <tr style="background-color: #f3f3f3;">
                            <td>ระดับ</td>
                            <td>คะแนน</td>
                            <td>รายละเอียดการพิจารณา</td>
                            <td>ใส่คะแนน</td>
                        </tr>
                        <?php
                        if ($totalRows_rsquint1 > 0) {
                            do {
                                ?>
                                <tr>
                                    <td><?php echo $row_rsquint1['q2_number']; ?></td>
                                    <td><?php echo $row_rsquint1['q2_score_rank']; ?></td>
                                    <td><?php echo $row_rsquint1['q2_detail']; ?></td>
                                    <td>
                                        <input type="hidden" name="ref_p_id"  value="<?php echo $p_id; ?>" />
                                        <input type="hidden" name="ref_dq_id"  value="<?php echo $_GET['term']; ?>" />
                                        <input type="hidden" name="s_p_id_1"  value="<?php echo $p_id; ?>" />
                                        <input type="hidden" name="s_ip1" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                        <input type="hidden" name="s_group_no" value="2" />


                                        <input type="hidden" name="ref_q1_number[]" required="required"  value="<?php echo $row_rsquint1['q2_id']; ?>" />
                                        <input type="number" data-id="score" name="s_score[]" max="<?php echo $row_rsquint1['q2_score_rank']; ?>" min="0" class="form-control input" step="0.01"/>
                                    </td>
                                </tr>
                            <?php
                            } while ($row_rsquint1 = mysql_fetch_assoc($rsquint1));
                        }
                        ?>
                    </table>
                </td>
            </tr>
            <tr  style="background-color: #59d7fd;" >
                <td colspan="3"></td>
            </tr>
<?php } while ($row_showqg1list = mysql_fetch_assoc($showqg1list)); ?>
        <tr>
            <td align="right" colspan="3">
                รวม 
                <input name="total" type="text" class="rounded px-2 py-1" style=" border: 1px solid #ced4da; background-color: yellow; text-align: right; color:red" id="total" value="" required readonly="readonly" size="10">
            </td>
        </tr>
    </table>
    <p align="right">
        <button type="button" id="bt_submit" name="save" class="btn btn-primary" style="width: 300px; height: 70px"> บันทึก </button>
    </p>
</form>
<script type="text/javascript" src="../js/validate_question_2.js"></script>