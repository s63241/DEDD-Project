<?php // require_once('../Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
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
<script type="text/javascript">
  function updateTotal() {
    var total = 0;//
    var list = document.getElementsByClassName("input");
    var values = [];
    for(var i = 0; i < list.length; ++i) {
        values.push(parseFloat(list[i].value));
    }
    total = values.reduce(function(previousValue, currentValue, index, array){
        return previousValue + currentValue;
    });
    document.getElementById("total").value = total;    
}
</script>
<h4> ชุดที่ 2 </h4>
<form action="se_g2_db.php" method="post" name="ev" class="form-horizontal" id="frm">
  <table border="1" class="table" id="main_tb">
    <tr class="info">
     <td>ข้อ</td>
      <td>หัวข้อ</td>
      <td>รายละเอียดการประเมิน</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_showqg1list['qg2_id']; ?></td>
      <td><?php echo $row_showqg1list['qg2_name']; ?>
      </td>
      <td><?php echo $row_showqg1list['qg2_detail']; ?>
        
        <?php
        
        
          $qg2_id = $row_showqg1list['qg2_id'];
        $query_rsquint1 = "SELECT * FROM tbl_q2 WHERE ref_qg2_id = $qg2_id ORDER BY q2_number ASC";
        $rsquint1 = mysql_query($query_rsquint1, $conn) or die(mysql_error());
        $row_rsquint1 = mysql_fetch_assoc($rsquint1);
        $totalRows_rsquint1 = mysql_num_rows($rsquint1);
        $term = $_GET['term'];
        $colname_scoreg1 = "-1";
        if (isset($_GET['p_id'])) {
        $colname_scoreg1 = $_GET['p_id'];
        }
        mysql_select_db($database_conn, $conn);
        $query_scoreg1 = sprintf("
        SELECT *
        FROM tbl_score as c, tbl_q2 as g, tbl_q2_group as d
        WHERE c.ref_p_id = %s  AND c.ref_dq_id='$lastterm'
        AND c.ref_q1_number=g.q2_id
        AND g.ref_qg2_id=d.qg2_id
        AND c.s_group_no=2
        AND g.ref_qg2_id=$qg2_id
        ", GetSQLValueString($colname_scoreg1, "int"));
        $scoreg1 = mysql_query($query_scoreg1, $conn) or die(mysql_error());
        $row_scoreg1 = mysql_fetch_assoc($scoreg1);
        $totalRows_scoreg1 = mysql_num_rows($scoreg1);
        // echo '<pre>';
          // print_r($row_scoreg1);
        // echo '</pre>';
        ?>
        <table width="100%" border="1" class="table table-hovered">
          <tr>
            <td>ระดับ</td>
            <td>คะแนน</td>
            <td>รายละเอียดการพิจารณา</td>
            <td>ใส่คะแนน</td>
          </tr>
          <?php if($totalRows_rsquint1 > 0){ do { ?>
          <tr>
            <td><?php echo $row_rsquint1['q2_number']; ?></td>
            <td><?php echo $row_rsquint1['q2_score_rank']; ?></td>
            <td><?php echo $row_rsquint1['q2_detail']; ?></td>
            <td>
              <!--      <input type="hidden" name="ref_p_id"  value="<?php echo $p_id;?>" />
              <input type="hidden" name="ref_dq_id"  value="1/2561" />
              <input type="hidden" name="s_p_id_1"  value="<?php echo $p_id;?>" />
              <input type="hidden" name="s_ip1" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
              -->
              <input type="hidden" name="s_group_no" value="2" />
              <input type="hidden" name="s_p_id_2"  value="<?php echo $p_id;?>" />
              <input type="hidden" name="s_p_id_1"  value="<?php echo $_GET['p_id']; ?>" />
              <input type="hidden" name="s_ip2" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
              <input type="hidden" name="s_dateq2" value="<?php echo date('Y-m-d H:i:s');?>" />
              <input type="hidden" name="s_group_no" value="2" />
              <!--  <input type="text" name="ref_q1_number[]" required="required"  value="<?php echo $row_scoreg1['s_id']; ?>" />
              -->
              <input type="number" data-id="score" data-value="<?= $row_scoreg1['s_score']?>" name="s_score[<?php echo $row_rsquint1['q2_id']; ?>]" required="required" max="<?= $row_rsquint1['q2_score_rank']; ?>" min="0" value="<?php echo $row_scoreg1['s_score'];?>" step="any"  class="form-control input" />
              <input type="hidden" name="ref_dq_id" value="<?php echo $_GET['term']; ?>" />
              
              
              <!--
              <input type="hidden" name="ref_q1_number[]" required="required"  value="<?php// echo $row_rsquint1['q2_id']; ?>" />
              <input type="number" name="s_score[]" required="required" max="<?php //echo $row_rsquint1['q2_score_rank']; ?>" min="0" class="form-control" step="0.01"/> -->
            </td>
          </tr>
          <?php } while ($row_rsquint1 = mysql_fetch_assoc($rsquint1))  ;}  ?>
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
<script type="text/javascript" src="../js/validate_question_3.js"></script>