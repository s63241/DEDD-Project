<?php require_once('../Connections/conn.php'); ?>
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
$query_rspersonal = "
SELECT * FROM tbl_score as c,  tbl_personal as p, tbl_position as n, tbl_department as d  
WHERE c.ref_p_id=p.p_id
AND p.ref_po_id=n.po_id
AND p.ref_d_id=d.d_id
AND p.ref_d_id=$hid
GROUP BY c.skey
ORDER BY c.s_id DESC";
$rspersonal = mysql_query($query_rspersonal, $conn) or die(mysql_error());
$row_rspersonal = mysql_fetch_assoc($rspersonal);
$totalRows_rspersonal = mysql_num_rows($rspersonal);
//AND s_p_id_2 !=''  ใส่ในหน้า ผอ.
//AND c.ref_p_id!=$p_id
//GROUP BY p.p_id
/*
  SELECT * FROM tbl_score as c,  tbl_personal as p
  WHERE c.ref_p_id=p.p_id
  AND p.ref_d_id=$ref_d_id
  AND c.ref_dq_id = '$lastterm'
  GROUP BY c.skey
  ORDER BY c.s_id DESC
 */
?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">


</script>
<script>

    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>
<h3> ::ตรวจสอบสถานะของตนเองและประเมินเจ้าหน้าที่::</h3>
<table id="example" class="display" cellspacing="0">
    <thead>
        <tr class="success">
            <th width="3%">ลำดับ</th>
            <th width="60%">ชื่อ-สกุล</th>
            <th width="10%">รอบ</th>
            <th width="25%">สถานะ</th>
            <th width="10%">ประเมิน</th>
            <th width="10%"><center>รายงาน</center></th>
</tr>
</thead>
<?php $k = 1;
do { ?>
    <tr>
        <td><?php echo $k; //row_rspersonal['s_id'];  ?></td>
        <td>
            <b style="color:blue"> <?php echo $row_rspersonal['p_firstname'] . $row_rspersonal['p_name'] . ' ' . $row_rspersonal['p_lastname']; ?>
            </b> 
            ตำแหน่ง :  <?php echo $row_rspersonal['po_name']; ?>
            <br /><?php echo $row_rspersonal['d_name']; ?>
        </td>
        <td><?php echo $row_rspersonal['ref_dq_id']; ?></td>
        <td>
            <?php
            $id1 = $row_rspersonal['s_p_id_1'];
            $id2 = $row_rspersonal['s_p_id_2'];
            $id3 = $row_rspersonal['s_p_id_3'];
            // echo $id1. ' -' .$id2. '- '.$id3;
            if ($id1 != 0 & $id2 == 0 & $id3 == 0) {
                echo 'รอหัวหน้าฝ่ายประเมิน';
            } elseif ($id1 != 0 & $id2 != 0 & $id3 == 0) {
                echo 'หัวหน้าฝ่ายประเมินแล้ว';
            } elseif ($id1 != 0 & $id2 != 0 & $id3 != 0) {
                echo 'ผอ.ประเมินแล้ว';
            }
            ?>
        </td>
        <td>
            <?php
            $s_p_id_2 = $row_rspersonal['s_p_id_2'];
            $ref_p_id = $row_rspersonal['ref_p_id'];

            //echo $s_p_id_2;

            if ($s_p_id_2 == 0) {
                ?>
                <a href="index.php?p=g1&p_id=<?php echo $ref_p_id; ?>&term=<?php echo $lastterm; ?>" class="btn btn-primary btn-xs" target="_blank">ประเมิน</a>

                <?php
            } else {
                echo '-';
            }
            ?>


        </td>
        <td>
            <?php
            // echo $s_p_id_2;
            // if($s_p_id_2==0){
            //   echo '-';
            // }else{
            ?>
            <a href="report.php?p=report&term=<?php echo $row_rspersonal['ref_dq_id']; ?>&p_id=<?php echo $ref_p_id; ?>" class="btn btn-info btn-xs" target="_blank">
                <span class="glyphicon glyphicon-signal">
                    เปิดดู</a>
    <?php //}
    ?>


        </td>
    </tr>
    <?php $k++;
} while ($row_rspersonal = mysql_fetch_assoc($rspersonal)); ?>
</table>
<?php
mysql_free_result($rspersonal);
?>