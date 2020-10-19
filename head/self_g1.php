<?php require_once('../Connections/conn.php'); ?>
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
$query_showqg1list = "SELECT * FROM tbl_q1_group order by qt_id ASC";
$showqg1list = mysql_query($query_showqg1list, $conn) or die(mysql_error());
$row_showqg1list = mysql_fetch_assoc($showqg1list);
$totalRows_showqg1list = mysql_num_rows($showqg1list);
mysql_select_db($database_conn, $conn);
$query_fixdate = "SELECT * FROM tbl_date_q ORDER BY dq_id DESC";
$fixdate = mysql_query($query_fixdate, $conn) or die(mysql_error());
$row_fixdate = mysql_fetch_assoc($fixdate);
$totalRows_fixdate = mysql_num_rows($fixdate);
mysql_select_db($database_conn, $conn);
$query_peroidassess = "SELECT * FROM tbl_date_q ORDER BY dq_id DESC";
$peroidassess = mysql_query($query_peroidassess, $conn) or die(mysql_error());
$row_peroidassess = mysql_fetch_assoc($peroidassess);
$totalRows_peroidassess = mysql_num_rows($peroidassess);
$colname_showlastascess = "-1";
if (isset($_GET['pid'])) {
    $colname_showlastascess = $_GET['pid'];
}
mysql_select_db($database_conn, $conn);
$query_showlastascess = sprintf("SELECT * FROM tbl_score WHERE ref_p_id = %s ORDER BY s_id DESC", GetSQLValueString($colname_showlastascess, "int"));
$showlastascess = mysql_query($query_showlastascess, $conn) or die(mysql_error());
$row_showlastascess = mysql_fetch_assoc($showlastascess);
$totalRows_showlastascess = mysql_num_rows($showlastascess);
$terms = $row_showlastascess['ref_dq_id'];
$pids = $row_showlastascess['ref_p_id'];
$termnow = $_GET['term'];
if ($terms == $termnow & $p_id == $pids) {

    echo ' คุณได้ประเมินเทอมนี้ไปแล้ว';

    echo "<script type='text/javascript'>";
    echo "alert('คุณได้ประเมินเทอมนี้ไปแล้ว');";
//echo "window.open('index.php?p=report&term=$terms&per_id=$p_id','_blank');";
    echo "window.location='index.php?p=report&term=$terms&per_id=$p_id','_blank';";
    echo "</script>";
}
?>
<style>
    input[type=number]{
        width: 80px;
    }

</style>
<?php
$datenow = date('Y-m-d');
$datestart = $row_fixdate['dq_date_open2'];
$dateend = $row_fixdate['dq_date_close2'];


echo '<h3>';
echo 'วันที่เริ่มประเมิน : ' . date('d/m/Y', strtotime($datestart));
echo 'วันที่สิ้นสุด :  ' . date('d/m/Y', strtotime($dateend));
echo '</h3>';

if ($datenow >= $datestart && $datenow <= $dateend) {
    ?>
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

    <h3>::รอบประเมิน <?php echo $row_peroidassess['dq_name']; ?>

        ::</h3>
    <h4> ชุดที่ 1 </h4>
    <form action="self_g1_db.php" method="post" name="ev" class="form-horizontal" id="frm">
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
                        ?>
                        <table width="100%" border="1" class="table table-hovered">
                            <tr>
                                <td width="5%">ระดับ</td>
                                <td width="15%">คะแนน</td>
                                <td width="75%">รายละเอียดการพิจารณา</td>
                                <td width="5%">ใส่คะแนน</td>
                            </tr>
                            <?php
                            if ($totalRows_rsquint1 > 0) {
                                do {
                                    ?>
                                    <tr>
                                        <td><?php echo $row_rsquint1['q1_number']; ?></td>
                                        <td><?php echo $row_rsquint1['q1_score_rank']; ?>-<?php echo $row_rsquint1['q1_score_rank_max']; ?></td>
                                        <td><?php echo $row_rsquint1['q1_detail']; ?></td>
                                        <td>
                                            <input type="hidden" name="ref_p_id"  value="<?php echo $p_id; ?>" />
                                            <input type="hidden" name="ref_dq_id"  value="<?php echo $termnow; ?>" />
                                            <input type="hidden" name="s_p_id_1"  value="<?php echo $p_id; ?>" />
                                            <input type="hidden" name="s_ip1" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                            <input type="hidden" name="s_group_no" value="1" />




                                            <input type="hidden" name="ref_q1_number[]"   value="<?php echo $row_rsquint1['q1_id']; ?>" />

                                            <input type="number" data-id="score" name="s_score[]"  max="<?php echo $row_rsquint1['q1_score_rank_max']; ?>" min="<?= $row_rsquint1['q1_score_rank'] ?>"  class="form-control input"/>
                                        </td>
                                    </tr>
                                <?php
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
    <?php } while ($row_showqg1list = mysql_fetch_assoc($showqg1list)); ?>
            <tr>
                <td align="right" colspan="3">
                    รวม 
                    <input name="total" type="text" style="background-color: yellow; text-align: right; color:red" id="total" value="" required readonly="readonly">
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
    <?php
    mysql_free_result($showqg1list);
    mysql_free_result($fixdate);
    mysql_free_result($peroidassess);
    mysql_free_result($showlastascess);
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