<?php // require_once('../Connections/conn.php');   ?>
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
$query_showqg2list = "SELECT * FROM tbl_q3_group WHERE qg3_id>1 order by qg3_id ASC";
$showqg2list = mysql_query($query_showqg2list, $conn) or die(mysql_error());
$row_showqg2list = mysql_fetch_assoc($showqg2list);
$totalRows_showqg2list = mysql_num_rows($showqg2list);
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
<form action="self_g3_db.php" method="post" name="ev" class="form-horizontal" id="frm">
    <table border="1" class="table" id="main_tb">
        <tr class="info">
            <td>ข้อ</td>
            <td>หัวข้อ</td>
            <td>รายละเอียดการประเมิน</td>
        </tr>
        <?php do { ?>
            <tr>
                <td><?php echo $row_showqg1list['qg3_id']; ?></td>
                <td><?php echo $row_showqg1list['qg3_name']; ?>
                </td>
                <td><?php echo $row_showqg1list['qg3_detail']; ?>

                    <?php
                    $qg3_id = $row_showqg1list['qg3_id'];
                    $query_rsquint1 = "SELECT * FROM tbl_q3 WHERE ref_qg3_id = $qg3_id AND ref_d_id=$ref_d_id ORDER BY q3_number ASC";
                    $rsquint1 = mysql_query($query_rsquint1, $conn) or die(mysql_error());
                    $row_rsquint1 = mysql_fetch_assoc($rsquint1);
                    $totalRows_rsquint1 = mysql_num_rows($rsquint1);
                    ?>
                    <table width="100%" border="1" class="table table-hovered">
                        <tr>
                            <td>ระดับ</td>
                            <td>คะแนน</td>
                            <td>รายละเอียดการพิจารณา</td>
                            <td>ใส่คะแนน</td>
                        </tr>
                        <?php if ($totalRows_rsquint1 > 0) {
                            do {
                                ?>
                                <tr>
                                    <td><?php echo $row_rsquint1['q3_number']; ?></td>
                                    <td><?php echo $row_rsquint1['q3_score_rank']; ?></td>
                                    <td><?php echo $row_rsquint1['q3_detail']; ?></td>
                                    <td>
                                        <input type="hidden" name="ref_p_id"  value="<?php echo $p_id; ?>" />
                                        <input type="hidden" name="ref_dq_id"  value="<?php echo $_GET['term']; ?>" />
                                        <input type="hidden" name="s_p_id_1"  value="<?php echo $p_id; ?>" />
                                        <input type="hidden" name="s_ip1" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                        <input type="hidden" name="s_group_no" value="3" />


                                        <input type="hidden" name="ref_q1_number[]" required="required"  value="<?php echo $row_rsquint1['q3_id']; ?>" />
                                        <input type="number" data-id="score" name="s_score[]" required="required" max="<?php echo $row_rsquint1['q3_score_rank']; ?>" min="0" class="form-control input"  step="any"/>
                                    </td>
                                </tr>
                            <?php } while ($row_rsquint1 = mysql_fetch_assoc($rsquint1));
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
                    ?>
                    <table width="100%" border="1" class="table table-hovered">
                        <tr>
                            <td>ระดับ</td>
                            <td>คะแนน</td>
                            <td>รายละเอียดการพิจารณา</td>
                            <td>ใส่คะแนน</td>
                        </tr>
    <?php if ($totalRows_rsquint2 > 0) {
        do {
            ?>
                                <tr>
                                    <td><?php echo $row_rsquint2['q3_number']; ?></td>
                                    <td><?php echo $row_rsquint2['q3_score_rank']; ?></td>
                                    <td><?php echo $row_rsquint2['q3_detail']; ?></td>
                                    <td>
                                        <input type="hidden" name="ref_p_id"  value="<?php echo $p_id; ?>" />
                                        <input type="hidden" name="ref_dq_id"  value="<?php echo $_GET['term']; ?>" />
                                        <input type="hidden" name="s_p_id_1"  value="<?php echo $p_id; ?>" />
                                        <input type="hidden" name="s_ip1" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                        <input type="hidden" name="s_group_no" value="3" />


                                        <input type="hidden" name="ref_q1_number[]" required="required"  value="<?php echo $row_rsquint2['q3_id']; ?>" />
                                        <input type="number" data-id="score" name="s_score[]" min="0" class="form-control input" step="any"  max="<?php echo $row_rsquint1['q3_score_rank']; ?>" />

                                    </td>
                                </tr>
        <?php } while ($row_rsquint2 = mysql_fetch_assoc($rsquint2));
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
            <td align="right" colspan="3">
                รวม 
                <input name="total" type="text" style="background-color: yellow; text-align: right; color:red" id="total" value="" required readonly="readonly" size="10">
            </td>
        </tr>
    </table>
    <p align="right">
        <input type="hidden" name="s_ip2" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
        <input type="hidden" name="s_dateq2" value="<?php echo date('Y-m-d H:i:s'); ?>" />
        <input type="hidden" name="s_p_id_2" value="<?php echo $p_id; ?>" />
        <button type="button" id="bt_submit" name="save" class="btn btn-primary" style="width: 300px; height: 70px"> บันทึก </button>
    </p>
</form>
<script type="text/javascript" src="../js/validate_question_2.js"></script>