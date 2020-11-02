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
$pid = $_GET['p_id'];
// ข้อใหญ่
$query_showqg1list = "SELECT * FROM tbl_q3_group WHERE qg3_id=1 order by qg3_id ASC";
$showqg1list = mysql_query($query_showqg1list, $conn) or die(mysql_error());
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
<h3 class="text-primary prompt-400"> แบบประเมินชุดที่ 3 </h3>
<form action="se_g3_db.php" method="post" name="ev" class="form-horizontal" id="frm">
    <table border="1" class="table table-light table-bordered rounded shadow" style="overflow: hidden; " id="main_tb">
        <tr style="color: #fff; background-color: #59d7fd;">
            <td>ข้อ</td>
            <td>หัวข้อ</td>
            <td>รายละเอียดการประเมิน</td>
        </tr>
        <?php
        $k = 1;
        while ($row_showqg1list = mysql_fetch_array($showqg1list, MYSQL_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $k; ?></td>
                <td><?php echo $row_showqg1list['qg3_name']; ?>
                </td>
                <td><?php echo $row_showqg1list['qg3_detail']; ?>

                    <?php
                    $aterm = $_GET['term'];
                    $qg3_id = $row_showqg1list['qg3_id'];
                    //echo 'xxx = ' .$qg3_id1;
                    $query_rsquint1 = "
        SELECT q.*, c.s_id, c.s_score
        FROM tbl_q3 as q
        LEFT JOIN tbl_score as c ON c.ref_q1_number=q.q3_id
        WHERE q.ref_qg3_id = $qg3_id
        AND q.ref_d_id=$ref_d_id
        AND c.s_group_no = 3
        AND c.ref_p_id=$pid
        AND c.ref_dq_id='$aterm'
        ORDER BY q.q3_number ASC";
                    $rsquint1 = mysql_query($query_rsquint1, $conn) or die(mysql_error());

                    // while ($row_rsquint1 = mysql_fetch_array($rsquint1, MYSQL_ASSOC)) {
                    //   echo '<pre>';
                    //   print_r($row_rsquint1);
                    //   echo '</pre>';
                    // }
                    ?>
                    <table width="100%" border="1" class="table table-hover rounded shadow-sm" style="border:none;overflow: hidden;">
                        <tr style="background-color: #f3f3f3;">
                            <td>ระดับ</td>
                            <td>คะแนน</td>
                            <td>รายละเอียดการพิจารณา</td>
                            <td>ใส่คะแนน</td>
                        </tr>
                        <?php $s = 1;
                        while ($row_rsquint1 = mysql_fetch_array($rsquint1, MYSQL_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $s; ?></td>
                                <td><?php echo $row_rsquint1['q3_score_rank']; ?></td>
                                <td><?php echo $row_rsquint1['q3_detail']; ?></td>
                                <td>
                                    <input type="hidden" name="s_p_id_2"  value="<?php echo $p_id; ?>" />
                                    <input type="hidden" name="s_p_id_1"  value="<?php echo $_GET['p_id']; ?>" />
                                    <input type="hidden" name="s_ip2" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                    <input type="hidden" name="s_dateq2" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                    <input type="hidden" name="s_group_no" value="3" />
                                    <!-- <input type="hidden" name="s_id[]" required="required"  value="<?php echo $row_rsquint1['s_id']; ?>" /> -->

                                    <input type="hidden" name="ref_dq_id" value="<?php echo $_GET['term']; ?>" />
                                    <?php // echo $row_rsquint1['s_id']; ?>
                                    <input type="number" data-id="score" data-value="<?= $row_rsquint1['s_score']; ?>" max="<?= $row_rsquint1['q3_score_rank']; ?>" min="0" name="s_score[<?php echo $row_rsquint1['s_id']; ?>]" required="required" class="form-control input" value="<?php echo $row_rsquint1['s_score']; ?>" step="any" />
                                </td>
                            </tr>
                            <?php $s++;
                        } ?>
                    </table>
                </td>
            </tr>
            <tr  style="background-color: #59d7fd;" >
                <td colspan="3"></td>
            </tr>
            <?php
            $k++;
        }
        ?>
        <?php
        $query_showqg2list = "SELECT * FROM tbl_q3_group WHERE qg3_id>1 order by qg3_id ASC";
        $showqg2list = mysql_query($query_showqg2list, $conn) or die(mysql_error());
        while ($row_showqg2list = mysql_fetch_array($showqg2list, MYSQL_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row_showqg2list['qg3_id']; ?></td>
                <td><?php echo $row_showqg2list['qg3_name']; ?>
                </td>
                <td><?php echo $row_showqg2list['qg3_detail']; ?>

                    <?php
                    $qg3_id = $row_showqg2list['qg3_id'];
                    $query_rsquint2 = "
        SELECT q.*, c.s_id, c.s_score
        FROM tbl_q3 as q
        LEFT JOIN tbl_score as c ON c.ref_q1_number=q.q3_id
        WHERE q.ref_qg3_id = $qg3_id
        AND c.s_group_no = 3
        AND c.ref_dq_id='$aterm'
        ORDER BY q.q3_number ASC";
                    $rsquint2 = mysql_query($query_rsquint2, $conn) or die(mysql_error());
                    // while ($row_rsquint2 = mysql_fetch_array($rsquint2, MYSQL_ASSOC)) {
                    //   echo '<pre>';
                    //   print_r($row_rsquint2);
                    //   echo '</pre>';
                    // }
                    ?>
                    <table width="100%" border="1" class="table table-hover rounded shadow-sm" style="border:none;overflow: hidden;">
                        <tr style="background-color: #f3f3f3;">
                            <td>ระดับ</td>
                            <td>คะแนน</td>
                            <td>รายละเอียดการพิจารณา</td>
                            <td>ใส่คะแนน</td>
                        </tr>
                        <?php $z = 1;
                        while ($row_rsquint2 = mysql_fetch_array($rsquint2, MYSQL_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $z; ?></td>
                                <td><?php echo $row_rsquint2['q3_score_rank']; ?></td>
                                <td><?php echo $row_rsquint2['q3_detail']; ?></td>
                                <td>
                                    <input type="hidden" name="s_p_id_2"  value="<?php echo $p_id; ?>" />
                                    <input type="hidden" name="s_p_id_1"  value="<?php echo $_GET['p_id']; ?>" />
                                    <input type="hidden" name="s_ip2" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                    <input type="hidden" name="s_dateq2" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                    <!--  <input type="hidden" name="s_group_no" value="2" /><?php echo $row_rsquint2['s_id']; ?> -->
                                    <input type="number" data-id="score" data-value="<?= $row_rsquint2['s_score']?>" max="<?= $row_rsquint2['q3_score_rank']; ?>" min="0" name="s_score[<?php echo $row_rsquint2['s_id']; ?>]" required="required"   value="<?php echo $row_rsquint2['s_score']; ?>" step="any"  class="form-control input"  onchange='updateTotal();'/>

                                </td>
                            </tr>
        <?php $z++;
    } ?>

                    </table>



                </td>
            </tr>
<?php } ?>
        <tr>
            <td align="right" colspan="3">
                รวม 
                <input name="total" type="text" class="rounded px-2 py-1" style=" border: 1px solid #ced4da; background-color: yellow; text-align: right; color:red" id="total" value="" required readonly="readonly">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    เหตุผลในการ เพิ่ม/ลด คะแนน  <br />
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
    <input type="hidden" name="c_term" value="<?php echo $_GET['term']; ?>">

    <p align="right">
        <button type="button" id="bt_submit" name="save" class="btn btn-primary" style="width: 300px; height: 70px"> บันทึก </button>
    </p>
</form>
<script type="text/javascript" src="../js/validate_question_3.js"></script>