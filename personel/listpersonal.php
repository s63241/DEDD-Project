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
SELECT * FROM tbl_score as c,  tbl_personal as p, tbl_position as n 
WHERE c.ref_p_id=$p_id
AND p.ref_po_id=n.po_id
AND c.ref_p_id=p.p_id
GROUP BY c.ref_dq_id
ORDER BY c.s_id DESC";
$rspersonal = mysql_query($query_rspersonal, $conn) or die(mysql_error());
$row_rspersonal = mysql_fetch_assoc($rspersonal);
$totalRows_rspersonal = mysql_num_rows($rspersonal);
//AND s_p_id_2 !=''  ใส่ในหน้า ผอ.
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
<h3> ::HISTORY OF ASSESS::</h3>
<table id="example" class="display" cellspacing="0">
    <thead>
        <tr class="success">
            <td width="3%">No.</td>
            <td width="50%">ชื่อ-สกุล</td>
            <td width="10%">รอบ</td>
            <td width="20%">สถานะ</td>
            <td width="10%"><center>รายงาน</center></td>
</tr>
</thead>
<?php if ($totalRows_rspersonal > 0) {
    $i = 1;
    do { ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td>
                <b>
        <?php echo $row_rspersonal['p_firstname'] . $row_rspersonal['p_name'] . ' ' . $row_rspersonal['p_lastname']; ?></b> 
                ตำแหน่ง : <?php echo $row_rspersonal['po_name']; ?>
            </td>
            <td><?php echo $row_rspersonal['ref_dq_id']; ?></td>
            <td>
                <?php
                $id1 = $row_rspersonal['s_p_id_1'];
                $id2 = $row_rspersonal['s_p_id_2'];
                $id3 = $row_rspersonal['s_p_id_3'];
                // echo $id1. ' -' .$id2. '- '.$id3;
                if ($id1 != 0 & $id2 == 0 & $id3 == 0) {
                    echo 'ตัวเองประเมินแล้ว';
                } elseif ($id1 != 0 & $id2 != 0 & $id3 == 0) {
                    echo 'หัวหน้าฝ่ายประเมินแล้ว';
                } elseif ($id1 != 0 & $id2 != 0 & $id3 != 0) {
                    echo 'ผอ. ประเมินแล้ว';
                }
                ?>

            </td>
            <td class="info">
                <?php
                // if ($id1!=0 & $id2==0 & $id3==0) {
                ?>
                <a href="report.php?p_id=<?=$row_rspersonal['p_id']?>&p=report&term=<?php echo $row_rspersonal['ref_dq_id']; ?>" class="btn btn-info" target="_blank">
                    <span class="glyphicon glyphicon-signal"></span> เปิดดู</a>
                    <?php
                    //echo 'ตัวเองประเมินแล้ว';
                    // }elseif ($id1!=0 & $id2!=0 & $id3==0) {
                    // echo 'หัวหน้าฝ่ายประเมินแล้ว';
                    // }elseif ($id1!=0 & $id2!=0 & $id3!=0) {
                    //echo 'ผอ. ประเมินแล้ว';
                    // }
                    ?>
                    <?php
                    //  $s_p_id_2 = $row_rspersonal['s_p_id_2'];
                    //  $ref_p_id = $row_rspersonal['ref_p_id'];
                    // // echo $s_p_id_2;
                    //  if($s_p_id_2==0){ 
                    ?>
                  <!-- <a href="index.php?p=g1&p_id=<?php echo $ref_p_id; ?>" class="btn btn-info">เข้าประเมิน</a> -->

                <?php
                // }else{
                //   echo '-';
                //  }
                ?>


            </td>
        </tr>
        <?php $i++;
    } while ($row_rspersonal = mysql_fetch_assoc($rspersonal));
} ?>
</table>
<?php
mysql_free_result($rspersonal);
?>