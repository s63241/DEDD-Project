<?php
require_once __DIR__ . '/../mpdf/vendor/autoload.php';
require_once('../Connections/conn.php');
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


$termnow = $_GET['term'];

$colname_showcomment = "-1";
if (isset($_GET['per_id'])) {
  $colname_showcomment = $_GET['per_id'];
}
mysql_select_db($database_conn, $conn);
$query_showcomment = sprintf("
  SELECT * FROM tbl_comment 
  WHERE c_per_id = %s 
  AND  c_comment1!='' 
  AND c_term='$termnow'
  ORDER BY c_id ASC", GetSQLValueString($colname_showcomment, "int"));
$showcomment = mysql_query($query_showcomment, $conn) or die(mysql_error());
$row_showcomment = mysql_fetch_assoc($showcomment);
$totalRows_showcomment = mysql_num_rows($showcomment);


$colname_showcomment2 = "-1";
if (isset($_GET['per_id'])) {
  $colname_showcomment2 = $_GET['per_id'];
}
mysql_select_db($database_conn, $conn);
$query_showcomment2 = sprintf("
  SELECT * FROM tbl_comment 
  WHERE c_per_id = %s 
  AND  c_comment2!=''
  AND c_term='$termnow' 
  ORDER BY c_id ASC", GetSQLValueString($colname_showcomment2, "int"));
$showcomment2 = mysql_query($query_showcomment2, $conn) or die(mysql_error());
$row_showcomment2 = mysql_fetch_assoc($showcomment2);
$totalRows_showcomment2 = mysql_num_rows($showcomment2);


$colname_rspersonel1 = "-1";
if (isset($_GET['per_id'])) {
  $colname_rspersonel1 = $_GET['per_id'];
}
mysql_select_db($database_conn, $conn);
$query_rspersonel1 = sprintf("SELECT * FROM tbl_personal WHERE p_id = %s", GetSQLValueString($colname_rspersonel1, "int"));
$rspersonel1 = mysql_query($query_rspersonel1, $conn) or die(mysql_error());
$row_rspersonel1 = mysql_fetch_assoc($rspersonel1);
$totalRows_rspersonel1 = mysql_num_rows($rspersonel1);
$per_id=$_GET['per_id'];

mysql_select_db($database_conn, $conn);
$query_sumg1 = "
SELECT SUM(s_score) AS TOTALSCORE 
FROM tbl_score 
WHERE ref_p_id=$per_id 
AND s_group_no=1
AND ref_q1_number<21
AND ref_dq_id='$termnow'

";
$sumg1 = mysql_query($query_sumg1, $conn) or die(mysql_error());
$row_sumg1 = mysql_fetch_assoc($sumg1);
$totalRows_sumg1 = mysql_num_rows($sumg1);




$query_sumg11 = "
SELECT SUM(s_score) AS TOTALSCORE1 
FROM tbl_score 
WHERE ref_p_id=$per_id 
AND s_group_no=1
AND ref_q1_number=21
AND ref_dq_id='$termnow'

";
$sumg11 = mysql_query($query_sumg11, $conn) or die(mysql_error());
$row_sumg11 = mysql_fetch_assoc($sumg11);
$totalRows_sumg11 = mysql_num_rows($sumg11);

$g11=$row_sumg1['TOTALSCORE'];
$g12=$row_sumg11['TOTALSCORE1'];
$totalg1=($g11+$g12);

$query_sumg2 = "
SELECT SUM(s_score) AS TG2SCORE 
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id=$per_id 
AND s.s_group_no=2
AND b.qg2_id=1
AND s.ref_dq_id='$termnow'

";
$sumg2 = mysql_query($query_sumg2, $conn) or die(mysql_error());
$row_sumg2 = mysql_fetch_assoc($sumg2);
$totalRows_sumg2 = mysql_num_rows($sumg2);


$query_sumg3 = "
SELECT SUM(s_score) AS TG2SCORE1 
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id=$per_id 
AND s.s_group_no=2
AND b.qg2_id=2
AND s.ref_dq_id='$termnow'

";
$sumg3 = mysql_query($query_sumg3, $conn) or die(mysql_error());
$row_sumg3 = mysql_fetch_assoc($sumg3);
$totalRows_sumg3 = mysql_num_rows($sumg3);

$query_sumg4 = "
SELECT SUM(s_score) AS TG2SCORE2 
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id=$per_id 
AND s.s_group_no=2
AND b.qg2_id=3
AND s.ref_dq_id='$termnow'

";
$sumg4 = mysql_query($query_sumg4, $conn) or die(mysql_error());
$row_sumg4 = mysql_fetch_assoc($sumg4);
$totalRows_sumg4 = mysql_num_rows($sumg4);

$query_sumg5 = "
SELECT SUM(s_score) AS TG2SCORE3 
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id=$per_id 
AND s.s_group_no=2
AND b.qg2_id=4
AND s.ref_dq_id='$termnow'

";
$sumg5 = mysql_query($query_sumg5, $conn) or die(mysql_error());
$row_sumg5 = mysql_fetch_assoc($sumg5);
$totalRows_sumg5 = mysql_num_rows($sumg5);

$query_sumg6 = "
SELECT SUM(s_score) AS TG2SCORE4 
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id=$per_id 
AND s.s_group_no=2
AND b.qg2_id=5
AND s.ref_dq_id='$termnow'

";
$sumg6 = mysql_query($query_sumg6, $conn) or die(mysql_error());
$row_sumg6 = mysql_fetch_assoc($sumg6);
$totalRows_sumg6 = mysql_num_rows($sumg6);

$query_sumg7 = "
SELECT SUM(s_score) AS TG2SCORE5 
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id=$per_id 
AND s.s_group_no=2
AND b.qg2_id=6
AND s.ref_dq_id='$termnow'
";
$sumg7 = mysql_query($query_sumg7, $conn) or die(mysql_error());
$row_sumg7 = mysql_fetch_assoc($sumg7);
$totalRows_sumg7 = mysql_num_rows($sumg7);

$g21=$row_sumg2['TG2SCORE'];
$g22=$row_sumg3['TG2SCORE1'];
$g23=$row_sumg4['TG2SCORE2'];
$g24=$row_sumg5['TG2SCORE3'];
$g25=$row_sumg6['TG2SCORE4'];
$g26=$row_sumg7['TG2SCORE5'];
$totalg20=($g21+$g22+$g23+$g24+$g25+$g26);


//q3-g2
$query_sumg3_1 = "
SELECT SUM(s_score) AS TG3SCORE1 
FROM tbl_score as  s
INNER JOIN tbl_q3 as a ON a.q3_id=s.ref_q1_number
INNER JOIN tbl_q3_group as b ON a.ref_qg3_id=b.qg3_id
WHERE s.ref_p_id=$per_id  
AND s.s_group_no=3
AND a.ref_qg3_id=1
AND s.ref_dq_id='$termnow'
";
$sumg3_1 = mysql_query($query_sumg3_1, $conn) or die(mysql_error());
$row_sumg3_1 = mysql_fetch_assoc($sumg3_1);

$query_sumg3_2 = "
SELECT SUM(s_score) AS TG3SCORE2 
FROM tbl_score as  s
INNER JOIN tbl_q3 as a ON a.q3_id=s.ref_q1_number
INNER JOIN tbl_q3_group as b ON a.ref_qg3_id=b.qg3_id
WHERE s.ref_p_id=$per_id  
AND s.s_group_no=3
AND a.ref_qg3_id=2
AND s.ref_dq_id='$termnow'
";
$sumg3_2 = mysql_query($query_sumg3_2, $conn) or die(mysql_error());
$row_sumg3_2 = mysql_fetch_assoc($sumg3_2);

$query_sumg3_3 = "
SELECT SUM(s_score) AS TG3SCORE3 
FROM tbl_score as  s
INNER JOIN tbl_q3 as a ON a.q3_id=s.ref_q1_number
INNER JOIN tbl_q3_group as b ON a.ref_qg3_id=b.qg3_id
WHERE s.ref_p_id=$per_id  
AND s.s_group_no=3
AND a.ref_qg3_id=3
AND s.ref_dq_id='$termnow'
";
$sumg3_3 = mysql_query($query_sumg3_3, $conn) or die(mysql_error());
$row_sumg3_3 = mysql_fetch_assoc($sumg3_3);

$TG3SCORE1 = $row_sumg3_1['TG3SCORE1'];
$TG3SCORE2 = $row_sumg3_2['TG3SCORE2'];
$TG3SCORE3 = $row_sumg3_3['TG3SCORE3'];
 
$g31=$row_sumg3_1['TG3SCORE1'];
$g32=$row_sumg3_2['TG3SCORE2'];
$g33=$row_sumg3_3['TG3SCORE3'];
$totalg30=($g31+$g32+$g33);
 // print_r($row_sumg4);

?>

<style type="text/css">
  @media print{
    #hid{

      display:none;
    }

  }
</style>

<br />


  <h4><?php echo $row_rspersonel1['p_firstname']; ?><?php echo $row_rspersonel1['p_name']; ?>&nbsp; <?php echo $row_rspersonel1['p_lastname']; ?>
    <?php echo 'รอบ'.$_GET['term'];?>
  </h4>
<table width="900" border="1">
  <tr>
    <td colspan="3"><center>ป.มสด.1 ผลสัมฤทธิ์ของงาน 70 คะแนน พิจารณาจากเกณฑ์ที่สำนักฯให้</center></td>
  </tr>
  <tr>
    <td>กิจกรรม/โครงการ/งาน</td>
    <td>คะแนนเต็ม</td>
    <td>คะแนนที่ได้</td>
  </tr>
  <tr>
    <td>1.ภาระงานและสัมฤทธิ์ตามข้อบังคับ และ หรือ ตามสัญญาจ้าง</td>
    <td>60 คะแนน</td>
    <td><?php echo $row_sumg1['TOTALSCORE'];?></td>
  </tr>
  <tr>
    <td>2.ผลสัมฤทธิ์ของงานตามภาระงานเพิ่มเติม</td>
    <td>10 คะแนน</td>
    <td><?php echo $row_sumg11['TOTALSCORE1'];?></td>
  </tr>
  <tr>
    <td>รวม</td>
    <td>70 คะแนน</td>
    <td><?php echo $totalg1;?></td>
  </tr>
</table>
<table width="900" border="1">
  <tr>
    <td colspan="7"><center>ป.มสด.2 พฤติกรรมการปฏิบัติงาน 30 คะแนน</center></td>
  </tr>
  <tr>
    <td>สมรรถนะหลัก</td>
    <td>คะแนนเต็ม</td>
    <td>คะแนนที่ได้</td>
    <td rowspan="8">&nbsp;</td>
    <td>สมรรถนะเฉพาะ</td>
    <td>คะแนนเต็ม</td>
    <td>คะแนนที่ได้</td>
  </tr>
  <tr>
    <td height="39">1.ความเป็นสวนดุสิต</td>
    <td>3</td>
    <td><?php echo $row_sumg2['TG2SCORE'];?></td>
    <td rowspan="2">1.ความรู้และทักษะที่จำเป็นสำหรับการปฏิบัติงานตามหน้าที่รับผิดชอบ</td>
    <td rowspan="2">9</td>
    <td rowspan="2"><?php echo $TG3SCORE1;?></td>
  </tr>
  <tr>
    <td>2.ความมุ่งมั่นสู่ความสำเร็จที่เป็นเลิศ</td>
    <td>2</td>
    <td><?php echo $row_sumg3['TG2SCORE1'];?></td>
  </tr>
  <tr>
    <td>3.การสั่งสมความเชี่ยวชาญในวิชาชีพ</td>
    <td>2</td>
    <td><?php echo $row_sumg4['TG2SCORE2'];?></td>
    <td rowspan="2">2.การพัฒนานวัตกรรมจากฐานความรู้</td>
    <td rowspan="2">3</td>
    <td rowspan="2"><?php echo $TG3SCORE2;?></td>
  </tr>
  <tr>
    <td>4.การสร้างเครือข่ายพันธมิตรและมิตร</td>
    <td>3</td>
    <td><?php echo $row_sumg5['TG2SCORE3'];?></td>
  </tr>
  <tr>
    <td>5.การดำรงตนบนฐานของวินัย คุณธรรม จรรยาบรรณวิชาชีพ</td>
    <td>3</td>
    <td><?php echo $row_sumg6['TG2SCORE4'];?></td>
    <td rowspan="2">3.การประยุกต์ใช้เทคโนโลยีในการปฏิบัติงาน</td>
    <td rowspan="2">3</td>
    <td rowspan="2"><?php echo $TG3SCORE3;?></td>
  </tr>
  <tr>
    <td>6.ความเข้าใจมหาวิทยาลัย</td>
    <td>2</td>
    <td><?php echo $row_sumg7['TG2SCORE5'];?></td>
  </tr>
  <tr>
    <td>รวม</td>
    <td>15</td>
    <td><?php echo $totalg20; ?></td>
    <td>รวม</td>
    <td>15</td>
    <td><?php echo $totalg30; ?></td>
  </tr>
</table>
<table width="900" border="1">
  <tr>
    <td colspan="5"><center>ป.มสด.3 (100 คะแนน)</center></td>
  </tr>
  <tr>
    <td width="171">องค์ประการประเมิน</td>
    <td width="303">คะแนนเต็ม</td>
    <td width="142">คะแนนที่ได้</td>
    <td width="170">รวมคะแนนที่ได้ (100)</td>
    <td width="80">ระดับผลการประเมิน</td>
  </tr>
  <tr>
    <td height="85">ผลสัมฤทธิ์ของงาน (ป.มสด.1)</td>
    <td>70 คะแนน</td>
    <td><?php echo $totalg1;?></td>
    <td rowspan="2">
      <?php 
      $tg20=$totalg20+$totalg30;
      $summary =  $tg20+$totalg1;
      echo $summary;

      

     ?>
      
    </td>
    <td rowspan="2">

      <?php 

      if($summary >=95){
        echo 'ดีเด่น';
      }elseif ($summary >=85) {
        echo 'ดีมาก';
        }elseif ($summary >=70) {
        echo 'ดี';
        }elseif ($summary >=60) {
        echo 'พอใช้';
        }elseif ($summary <60) {
        echo 'ต้องปรับปรุง';
      }

      ?>




    </td>
  </tr>
  <tr>
    <td height="88">พฤติกรรมการปฏิบัติงาน (ป.มสด.2)</td>
    <td>30 คะแนน</td>
    <td><?php echo $totalg20+$totalg30;?></td>
  </tr>
</table>

<h4> ความเห็นเพิ่มเติมของผู้ประเมิน </h4>
<?php  if($totalRows_showcomment >0){ ?>
<table border="1">
  <tr>
    <td>c_id</td>
    <td>ความเห็นเพิ่มเติมของผู้ประเมิน</td>
 
    <td>c_date</td>
  </tr>
  <?php $b = 1;  do { ?>
    <tr>
      <td><?php echo $b; ?></td>
      <td><?php echo $row_showcomment['c_comment1']; ?></td>
      <td><?php echo $row_showcomment['c_date']; ?></td>
    </tr>
    <?php $b++; } while ($row_showcomment = mysql_fetch_assoc($showcomment)); ?>
</table>
<?php  }else{ echo '-'; }  ?>




<h4> ข้อเสนอแนะเกี่ยวกับแนวทางพัฒนา </h4>
<?php if($totalRows_showcomment2>0){?>
<table border="1">
  <tr>
    <td>c_id</td>
 
    <td>ข้อเสนอแนะเกี่ยวกับแนวทางพัฒนา</td>
    <td>c_date</td>
  </tr>
  <?php $d = 1;  do { ?>
    <tr>
      <td><?php echo $d; ?></td>
      <td><?php echo $row_showcomment2['c_comment2']; ?></td>
      <td><?php echo $row_showcomment2['c_date']; ?></td>
    </tr>
    <?php $d++; } while ($row_showcomment2 = mysql_fetch_assoc($showcomment2)); ?>
</table>
<?php  }else{ echo '-'; }  ?>


<p>&nbsp;  </p>

<?php
mysql_free_result($sumg1);

mysql_free_result($showcomment);

mysql_free_result($rspersonel1);
?>

<p align="center">
  <button class="btn btn-info" onclick="window.print()" id="hid"> Print </button>
  </p>