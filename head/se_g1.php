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
echo '<h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i>';
echo ' วันที่เริ่มประเมิน : ' . date('d/m/Y', strtotime($datestart));
echo ' วันที่สิ้นสุด :  ' . date('d/m/Y', strtotime($dateend));
echo '</h3>';
if ($datenow >= $datestart && $datenow <= $dateend) {
    ?>
    <hr>
    <h3 class="text-primary prompt-400"> รอบประเมิน <?php echo $row_peroidassess['dq_name']; ?>  ( แบบประเมินชุดที่ 1 ) </h3>
        <br />
    <form action="se_g1_db.php" method="post" name="ev" class="form-horizontal" id="frm">
        <table border="1" class="table table-light table-bordered rounded shadow" style="overflow: hidden; " id="main_tb">
        <tr style="color: #fff; background-color: #59d7fd;">
                <td width="5%">ข้อ</td>
                <td width="10%">หัวข้อ</td>
                <td width="85%">รายละเอียดการประเมิน</td>
            </tr>
            <?php $idx = 0; ?>
            <?php do { 
                $index = 0;
                ?>
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
                        <table width="100%" border="1" class="table table-hover rounded shadow-sm" style="border:none;overflow: hidden;">
                        <tr style="background-color: #f3f3f3;">
                                <td width="5%">ระดับ</td>
                                <td width="15%">คะแนน</td>
                                <td width="75%">รายละเอียดการพิจารณา</td>
                                <td width="5%">ใส่คะแนน</td>
                            </tr>
                            <?php
                            $i = 1;
                            if ($totalRows_rsquint1 > 0) {
                                $idx++;
                                do {
                                    
                                    //EDIT
                                    $range = $row_scoreg1['q1_number'];
                                    $ref_q1_number = $row_scoreg1['ref_qt_id'];
                        $query_scoreg2 = "SELECT * FROM tbl_q1  WHERE ref_qt_id = $ref_q1_number";
                                        $scoreg2 = mysql_query($query_scoreg2, $conn) or die(mysql_error());
                                        $totalRows_scoreg2 = mysql_num_rows($scoreg2);
                                        while($row = mysql_fetch_assoc($scoreg2)) {
                                            // var_dump($row);
                                            ?>
                                            <tr>
                                        <td><?php echo $row['q1_number']; ?></td>
                                        <td><?php echo $row['q1_score_rank']; ?>-<?php echo $row['q1_score_rank_max']; ?></td>
                                        <td><?php echo $row['q1_detail']; ?></td>
                                        <td>
                                            <input type="hidden" name="s_p_id_2"  value="<?php echo $p_id; ?>" />
                                            <input type="hidden" name="s_p_id_1"  value="<?php echo $_GET['p_id']; ?>" />
                                            <input type="hidden" name="s_ip2" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
                                            <input type="hidden" name="s_dateq2" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                            <input type="hidden" name="s_group_no" value="1" />
                                            <input type="hidden" name="range[]" value="<?= $row['q1_number']; ?>" />
                                            <input type="hidden" name="ref_dq_id" value="<?php echo $_GET['term']; ?>" />
                                            <input type="hidden" name="s_id[]" required="required"  value="<?php echo $row_scoreg1['s_id']; ?>" />
                                            <input type="hidden" name="ref_qt_id[]" required="required"  value="<?php echo $row_scoreg1['ref_qt_id']; ?>" />
                                            <?php $score_value = ($range == $row['q1_number'])? $row_scoreg1['s_score']:"";  ?>
                                            <!-- <input type="number" name="s_score[]" data-total="total" data-id="score<?php echo $idx; ?>" data-value="<?= $row_scoreg1['s_score']; ?>"  value="<?php echo $score_value; ?>"  step="any" max="<?php echo $row['q1_score_rank_max']; ?>" min="<?= $row['q1_score_rank'] ?>" class="form-control input" id="<?= $index++; ?>"  onchange='updateTotal();'/> -->

                                            <input type="number" name="s_score[]" data-total="total" data-id="score<?php echo $idx; ?>" data-value="<?= $row_scoreg1['s_score']; ?>"  value="<?php echo $score_value; ?>"  step="any" max="<?php echo $row['q1_score_rank_max']; ?>" min="<?= $row['q1_score_rank'] ?>" class="form-control input" id="<?= $index++; ?>"/>

                                        </td>
                                    </tr> 
                                            <?php
                                        }
                                    ?>
                                    <!-- <tr>
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
                                    </tr>  -->
                                    <?php
                                    $totalScore = $totalScore+$row_scoreg1['s_score'];
                                    $i++;
                                    } while ($row_scoreg1 = mysql_fetch_assoc($scoreg1));
                                    }
                            ?>
                        </table>
                    </td>
                </tr>
                <tr  style="background-color: #59d7fd;" >
                <td colspan="3"></td>
            </tr>
                <script type="text/javascript">
    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function calculateAll() {
    var totalAmt = 0;
    var scores = $('input[data-id="score"]');
    $.each(scores, function (key, value) {
        var score = value.value;
        //console.log(score);
        if (score !== '') {
            score = parseFloat(value.value);
            totalAmt = totalAmt + score;
        }
    });
    console.log(totalAmt);
    $('#total').val(totalAmt);
}

function calculateAll2() {
    var totalAmt = 0;
    var scores = $('input[data-total="total"]');
    $.each(scores, function (key, value) {
        var score = value.value;
        //console.log(score);
        if (score !== '') {
            score = parseFloat(value.value);
            totalAmt = totalAmt + score;
        }
    });
    console.log(totalAmt);
    $('#total').val(totalAmt);
}

$(document).ready(function () {


    $('input[data-id="score<?= $idx; ?>"]').on('change', function () {
        // console.log('this: '+this.value);
            var flag = true;
            var idx = this.id;
            var score = parseFloat(this.value);
            if (score > parseFloat(this.max) || score < parseFloat(this.min)) {
                this.value = '';
                alert('คะแนนต้องอยู่ระหว่าง ' + parseFloat(this.min) + '-' + parseFloat(this.max));

                return false;
            }
            $('input[data-id="score<?= $idx; ?>"]').each(function() {
                
                if(this.id != idx){
                    console.log("id: "+this.id+",value:"+this.value);
                    this.value = "";
                }
              
            });
        // calculateAll();
        calculateAll2();
    });


});
</script>
            <?php } while ($row_showqg1list = mysql_fetch_assoc($showqg1list)); ?>
            <tr>
                <td align="right" colspan="3">
                    รวม 
                    <input name="total" type="text" class="rounded px-2 py-1" style=" border: 1px solid #ced4da; background-color: yellow; text-align: right; color:red" id="total" value="<?=$totalScore?>" required readonly="readonly">
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

<script type="text/javascript">
   $('#bt_submit').on('click', function () {
        var isCorrect = true;
        var tables = $("#main_tb").find('table');
        $.each(tables, function (key, table) {
            var inputs = $(this).find('input[data-id="score"]');
            var count = 0;
            $.each(inputs, function (key2, input) {
                var score = input.value;
                if (score === '') {
                    isCorrect = false;
                    count++;
                    return false;
                }

            });
            if (count > 0) {
                isCorrect = false;
                alert('กรุณากรอกให้ครบทุกข้อ');
                return false;
            }

        });
        if (isCorrect === true) {
            if (confirm('ยืนยันการประเมิน')) {
                $('#frm').submit();
            }
        }


    });
    
</script>

<!-- <script type="text/javascript" src="../js/validate_question_3.js"></script> -->