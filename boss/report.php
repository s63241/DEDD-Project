<?php

require_once __DIR__ . '/../mpdf/vendor/autoload.php';
require_once('../Connections/conn.php');
?>
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

function DateThai($strDate) {
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

$colname_rsmember = "-1";
if (isset($_SESSION['MM_Username'])) {
    $colname_rsmember = $_SESSION['MM_Username'];
}

$p_id = $_GET['p_id'];
mysql_select_db($database_conn, $conn);
$query_rsmember = sprintf("
  SELECT * FROM tbl_personal as p

  INNER JOIN tbl_department as d  ON p.ref_d_id=d.d_id 
  INNER JOIN tbl_position as s   ON p.ref_po_id=s.po_id 
  

  WHERE p.p_id = %d", GetSQLValueString($p_id, "int"));
$rsmember = mysql_query($query_rsmember, $conn) or die(mysql_error());
$row_rsmember = mysql_fetch_assoc($rsmember);
$totalRows_rsmember = mysql_num_rows($rsmember);

//Get question date
mysql_select_db($database_conn, $conn);
$q = 'select * from tbl_date_q';
$questionDateResult = mysql_query($q, $conn) or die(mysql_error());

//end

$img = $row_rsmember['p_img'];
$ref_d_id = $row_rsmember['ref_d_id'];
$p_id = $row_rsmember['p_id'];
$c_per_id = $row_rsmember['p_id'];
$p_password = $row_rsmember['p_password'];
$pname = $row_rsmember['p_firstname'] . $row_rsmember['p_name'] . ' ' . $row_rsmember['p_lastname'];
$departmentName = $row_rsmember['d_name'];
$position = $row_rsmember['po_name'];
$name = $row_rsmember['p_name'];
$lname = $row_rsmember['p_lastname'];





$termnow = $_GET['term'];
mysql_select_db($database_conn, $conn);
$query_sumg1 = "SELECT SUM(s_score) AS TOTALSCORE "
        . "FROM tbl_score "
        . "WHERE ref_p_id='$p_id' "
        . "AND s_group_no=1 "
        . "AND ref_q1_number < 21  "
        . "AND ref_dq_id='$termnow' ";
//print_r($query_sumg1);
$sumg1 = mysql_query($query_sumg1, $conn) or die(mysql_error());
$row_sumg1 = mysql_fetch_assoc($sumg1);
$totalRows_sumg1 = mysql_num_rows($sumg1);

$query_sumg11 = "SELECT SUM(s_score) AS TOTALSCORE1 "
        . "FROM tbl_score "
        . "WHERE ref_p_id='$p_id' "
        . "AND s_group_no=1 "
        . "AND ref_q1_number=21 "
        . "AND ref_dq_id='$termnow' ";

$sumg11 = mysql_query($query_sumg11, $conn) or die(mysql_error());
$row_sumg11 = mysql_fetch_assoc($sumg11);
$totalRows_sumg11 = mysql_num_rows($sumg11);
$g11 = $row_sumg1['TOTALSCORE'];
$g12 = $row_sumg11['TOTALSCORE1'];
$totalg1 = ($g11 + $g12);
$query_sumg2 = "
SELECT SUM(s_score) AS TG2SCORE
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id='$p_id'
AND s.s_group_no=2
AND b.qg2_id=1
AND ref_dq_id='$termnow'
";
$sumg2 = mysql_query($query_sumg2, $conn) or die(mysql_error());
$row_sumg2 = mysql_fetch_assoc($sumg2);
$totalRows_sumg2 = mysql_num_rows($sumg2);
$query_sumg3 = "
SELECT SUM(s_score) AS TG2SCORE1
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id='$p_id'
AND s.s_group_no=2
AND b.qg2_id=2
AND ref_dq_id='$termnow'
";
$sumg3 = mysql_query($query_sumg3, $conn) or die(mysql_error());
$row_sumg3 = mysql_fetch_assoc($sumg3);
$totalRows_sumg3 = mysql_num_rows($sumg3);
$query_sumg4 = "
SELECT SUM(s_score) AS TG2SCORE2
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id='$p_id'
AND s.s_group_no=2
AND b.qg2_id=3
AND ref_dq_id='$termnow'
";
$sumg4 = mysql_query($query_sumg4, $conn) or die(mysql_error());
$row_sumg4 = mysql_fetch_assoc($sumg4);
$totalRows_sumg4 = mysql_num_rows($sumg4);
$query_sumg5 = "
SELECT SUM(s_score) AS TG2SCORE3
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id='$p_id'
AND s.s_group_no=2
AND b.qg2_id=4
AND ref_dq_id='$termnow'
";
$sumg5 = mysql_query($query_sumg5, $conn) or die(mysql_error());
$row_sumg5 = mysql_fetch_assoc($sumg5);
$totalRows_sumg5 = mysql_num_rows($sumg5);
$query_sumg6 = "
SELECT SUM(s_score) AS TG2SCORE4
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id='$p_id'
AND s.s_group_no=2
AND b.qg2_id=5
AND ref_dq_id='$termnow'
";
$sumg6 = mysql_query($query_sumg6, $conn) or die(mysql_error());
$row_sumg6 = mysql_fetch_assoc($sumg6);
$totalRows_sumg6 = mysql_num_rows($sumg6);
$query_sumg7 = "
SELECT SUM(s_score) AS TG2SCORE5
FROM tbl_score as  s
INNER JOIN tbl_q2 as a ON a.q2_id=s.ref_q1_number
INNER JOIN tbl_q2_group as b ON a.ref_qg2_id=b.qg2_id
WHERE s.ref_p_id='$p_id'
AND s.s_group_no=2
AND b.qg2_id=6
AND ref_dq_id='$termnow'
";
$sumg7 = mysql_query($query_sumg7, $conn) or die(mysql_error());
$row_sumg7 = mysql_fetch_assoc($sumg7);
$totalRows_sumg7 = mysql_num_rows($sumg7);
$g21 = $row_sumg2['TG2SCORE'];
$g22 = $row_sumg3['TG2SCORE1'];
$g23 = $row_sumg4['TG2SCORE2'];
$g24 = $row_sumg5['TG2SCORE3'];
$g25 = $row_sumg6['TG2SCORE4'];
$g26 = $row_sumg7['TG2SCORE5'];
$totalg20 = ($g21 + $g22 + $g23 + $g24 + $g25 + $g26);
//q3-g2
$query_sumg3_1 = "
SELECT SUM(s_score) AS TG3SCORE1
FROM tbl_score as  s
INNER JOIN tbl_q3 as a ON a.q3_id=s.ref_q1_number
INNER JOIN tbl_q3_group as b ON a.ref_qg3_id=b.qg3_id
WHERE s.ref_p_id='$p_id'
AND s.s_group_no=3
AND a.ref_qg3_id=1
AND ref_dq_id='$termnow'
";
$sumg3_1 = mysql_query($query_sumg3_1, $conn) or die(mysql_error());
$row_sumg3_1 = mysql_fetch_assoc($sumg3_1);
$query_sumg3_2 = "
SELECT SUM(s_score) AS TG3SCORE2
FROM tbl_score as  s
INNER JOIN tbl_q3 as a ON a.q3_id=s.ref_q1_number
INNER JOIN tbl_q3_group as b ON a.ref_qg3_id=b.qg3_id
WHERE s.ref_p_id='$p_id'
AND s.s_group_no=3
AND a.ref_qg3_id=2
AND ref_dq_id='$termnow'
";
$sumg3_2 = mysql_query($query_sumg3_2, $conn) or die(mysql_error());
$row_sumg3_2 = mysql_fetch_assoc($sumg3_2);
$query_sumg3_3 = "
SELECT SUM(s_score) AS TG3SCORE3
FROM tbl_score as  s
INNER JOIN tbl_q3 as a ON a.q3_id=s.ref_q1_number
INNER JOIN tbl_q3_group as b ON a.ref_qg3_id=b.qg3_id
WHERE s.ref_p_id='$p_id'
AND s.s_group_no=3
AND a.ref_qg3_id=3
AND ref_dq_id='$termnow'
";
$sumg3_3 = mysql_query($query_sumg3_3, $conn) or die(mysql_error());
$row_sumg3_3 = mysql_fetch_assoc($sumg3_3);
$TG3SCORE1 = $row_sumg3_1['TG3SCORE1'];
$TG3SCORE2 = $row_sumg3_2['TG3SCORE2'];
$TG3SCORE3 = $row_sumg3_3['TG3SCORE3'];
$g31 = $row_sumg3_1['TG3SCORE1'];
$g32 = $row_sumg3_2['TG3SCORE2'];
$g33 = $row_sumg3_3['TG3SCORE3'];
$totalg30 = ($g31 + $g32 + $g33);
// print_r($row_sumg4);
mysql_select_db($database_conn, $conn);
$query_showcomment = sprintf("
SELECT * FROM tbl_comment
WHERE c_per_id = '$c_per_id'
AND  c_comment1!=''
AND c_term='$termnow'
ORDER BY c_id ASC", GetSQLValueString("", "int"));
$showcomment = mysql_query($query_showcomment, $conn) or die(mysql_error());
$row_showcomment = mysql_fetch_assoc($showcomment);
$totalRows_showcomment = mysql_num_rows($showcomment);
mysql_select_db($database_conn, $conn);
$query_showcomment2 = sprintf("
SELECT * FROM tbl_comment
WHERE c_per_id = '$c_per_id'
AND  c_comment2!=''
AND c_term='$termnow'
ORDER BY c_id ASC", GetSQLValueString("", "int"));
$showcomment2 = mysql_query($query_showcomment2, $conn) or die(mysql_error());
$row_showcomment2 = mysql_fetch_assoc($showcomment2);
$totalRows_showcomment2 = mysql_num_rows($showcomment2);
?>
<?php

$mpdf = new mPDF();
$tb1 = '
<style>
body{
    font-family: "Garuda";
    font-size: 9pt; 
}
tr{
    border:1px solid #000;padding:4px;
}
td{
    border-right:1px solid #000;padding:4px;
}
</style>
<h4 style="text-align: center;padding:0px;margin:0px;">แบบสรุปการประเมินผลการปฏิบัติราชการของมหาวิทยาลัยสวนดุสิต</h4>
<p style="text-align: center;padding:0px;margin:0px;"><strong>หน่วยงาน</strong> ' . $departmentName . '</p>
<table width="100%" >';
$countdate = 0;
while ($row = mysql_fetch_array($questionDateResult, MYSQL_ASSOC)) {
    $tb1 = $tb1 . '<tr style="border:none;">
        <td style="border:none;" width="30%">' . ($countdate == 0 ? 'รอบ​การ​ประ​เมิน' : '') . '</td>
        <td style="border:none;" width="30%"><input type="checkbox" '.($termnow==$row['dq_name']?'checked="checked"':'').'/> รอบที่ ' . $row['dq_name'] . '</td>
        <td style="border:none;">วันที่ ' . DateThai($row['dq_date_open1']) . ' ถึง ' . DateThai($row['dq_date_close1']) . '</td>
    </tr>';
    $countdate++;
}

$tb1 = $tb1 . '</table>
<table width="100%" >
    <tr style="border:none;">
        <td style="border:none;" width="50%"><strong>ผู้รับการประเมิน</strong> ' . $pname . '</td>
        <td style="border:none;"><strong>ตำแหน่ง</strong> ' . $position . '</td>
        
    </tr>
    <tr style="border:none;">
        <td style="border:none;"><strong>ชื่อผู้ประเมิน</strong></td>
        <td style="border:none;">ตำแหน่ง</td>
        
    </tr>
</table>
<table id="bg-table" width="100%" style="border-collapse: collapse;margin-top:8px;">
  <tr style="">
    <td style="" colspan="3"><center>ป.มสด.1 ผลสัมฤทธิ์ของงาน 70 คะแนน พิจารณาจากเกณฑ์ที่สำนักฯให้</center></td>
  </tr>
  <tr style="">
    <td style="text-align: center;"><b>กิจกรรม/โครงการ/งาน</b></td>
    <td style="text-align: center;"><b>คะแนนเต็ม</b></td>
    <td style="text-align: center;"><b>คะแนนที่ได้</b></td>
  </tr>
  <tr style="">
    <td style="">1.ภาระงานและสัมฤทธิ์ตามข้อบังคับ และ หรือ ตามสัญญาจ้าง</td>
    <td style="">60 คะแนน</td>
    <td style="text-align:right;">' . $row_sumg1['TOTALSCORE'] . '</td>
  </tr>
  <tr style="">
    <td style="">2.ผลสัมฤทธิ์ของงานตามภาระงานเพิ่มเติม</td>
    <td style=""> 10 คะแนน</td>
    <td style="text-align:right;">' . $row_sumg11['TOTALSCORE1'] . '</td>
  </tr>
  <tr style="">
    <td style="text-align:center;">รวม</td>
    <td style="">70 คะแนน</td>
    <td style="text-align:right;">' . $totalg1 . '</td>
  </tr>
</table>'
;
$tb2 = '<table id="bg-table" width="100%" style="border-collapse: collapse;margin-top:8px;">
  <tr style="">
    <td style="text-align:center;" colspan="7"><b>ป.มสด.2 พฤติกรรมการปฏิบัติงาน 30 คะแนน</b></td>
  </tr>
  <tr>
    <td style="text-align:center;"><b>สมรรถนะหลัก</b></td>
    <td style="text-align:center;"><b>คะแนนเต็ม</b></td>
    <td style="text-align:center;"><b>คะแนนที่ได้</b></td>
    <td style="text-align:center;" rowspan="8">&nbsp;</td>
    <td style="text-align:center;"><b>สมรรถนะเฉพาะ</b></td>
    <td style="text-align:center;"><b>คะแนนเต็ม</b></td>
    <td style="text-align:center;"><b>คะแนนที่ได้</b></td>
  </tr>
  <tr style="">
    <td style="" height="39">1.ความเป็นสวนดุสิต</td>
    <td style="text-align:center;">3</td>
    <td style="text-align:center;">' . $row_sumg2['TG2SCORE'] . '</td>
    <td style="" rowspan="2">1.ความรู้และทักษะที่จำเป็นสำหรับการปฏิบัติงานตามหน้าที่รับผิดชอบ</td>
    <td style="text-align:center;" rowspan="2">9</td>
    <td style="text-align:center;" rowspan="2">' . $TG3SCORE1 . '</td>
  </tr>
  <tr style="">
    <td style="">2.ความมุ่งมั่นสู่ความสำเร็จที่เป็นเลิศ</td>
    <td style="text-align:center;">2</td>
    <td style="text-align:center;">' . $row_sumg3['TG2SCORE1'] . '</td>
  </tr>
  <tr style="">
    <td style="">3.การสั่งสมความเชี่ยวชาญในวิชาชีพ</td>
    <td style="text-align:center;">2</td>
    <td style="text-align:center;">' . $row_sumg4['TG2SCORE2'] . '</td>
    <td style="" rowspan="2">2.การพัฒนา</td>
    <td style="text-align:center;" rowspan="2">3</td>
    <td style="text-align:center;" rowspan="2">' . $TG3SCORE2 . '</td>
  </tr>
  <tr style="">
    <td style="">4.การสร้างเครือข่ายพันธมิตรและมิตร</td>
    <td style="text-align:center;">3</td>
    <td style="text-align:center;">' . $row_sumg5['TG2SCORE3'] . '</td>
  </tr>
  <tr style="">
    <td style="">5.การดำรงตนบนฐานของวินัย คุณธรรม จรรยาบรรณวิชาชีพ</td>
    <td style="text-align:center;">3</td>
    <td style="text-align:center;">' . $row_sumg6['TG2SCORE4'] . '</td>
    <td style="" rowspan="2">3.การประยุกต์ใช้เทคโนโลยีในการปฏิบัติงาน</td>
    <td style="text-align:center;" rowspan="2">3</td>
    <td style="text-align:center;" rowspan="2">' . $TG3SCORE3 . '</td>
  </tr>
  <tr style="">
    <td style="">6.ความเข้าใจมหาวิทยาลัย</td>
    <td style="text-align:center;">2</td>
    <td style="text-align:center;">' . $row_sumg7['TG2SCORE5'] . '</td>
  </tr>
  <tr style="">
    <td style="">รวม</td>
    <td style="text-align:center;">15</td>
    <td style="text-align:center;">' . $totalg20 . '</td>
    <td style="text-align:center;">รวม</td>
    <td style="text-align:center;">15</td>
    <td style="text-align:center;">' . $totalg30 . '</td>
  </tr>
</table>';
$tg20 = $totalg20 + $totalg30;
$summary = $tg20 + $totalg1;
$tb3 = '
<table id="bg-table" width="100%" style="border-collapse: collapse;margin-top:8px;">
  <tr style="">
    <td style="text-align:center;" colspan="5"><b>ป.มสด.3 (100 คะแนน)</b></td>
  </tr>
  <tr style="">
    <td style="text-align:center;" width="171"><b>องค์ประการประเมิน</b></td>
    <td style="text-align:center;" width="303"><b>คะแนนเต็ม</b></td>
    <td style="text-align:center;" width="142"><b>คะแนนที่ได้</b></td>
    <td style="text-align:center;" width="170"><b>รวมคะแนนที่ได้ (100)</b></td>
    <td style="text-align:center;" width="80"><b>ระดับผลการประเมิน</b></td>
  </tr>
  <tr style="">
    <td style="" height="85">ผลสัมฤทธิ์ของงาน</td>
    <td style="text-align:center;" >70 คะแนน</td>
    <td style="text-align:center;">' . $totalg1 . '</td>
    <td style="text-align:center;" rowspan="2">
      
      ' . $summary . '
    </td>';
if ($summary >= 95) {
    $msg = "ดีเด่น";
} elseif ($summary >= 85) {
    $msg = "ดีมาก";
} elseif ($summary >= 70) {
    $msg = "ดี";
} elseif ($summary >= 60) {
    $msg = "พอใช้";
} elseif ($summary < 60) {
    $msg = "ต้องปรับปรุง";
}
$tol = ($totalg20 + $totalg30);
$tb3_1 = '
    <td style=" text-align:center;" rowspan="2">
      ' . $msg . '
    </td>
  </tr>
  <tr style="">
    <td style="" height="88">พฤติกรรมการปฏิบัติงาน (ป.มสด.2)</td>
    <td style="text-align:center;">30 คะแนน</td>
    <td style="text-align:center;">' . $tol . '</td>
  </tr>
</table>
<h4> ความเห็นเพิ่มเติมของผู้ประเมิน </h4>';
if ($totalRows_showcomment > 0) {
    $tb4 = '
<table id="bg-table" width="100%" style="border-collapse: collapse;margin-top:8px;">
  <tr style="">
    <td style="text-align:center;">No.</td>
    <td style="text-align:center;">ความเห็นเพิ่มเติมของผู้ประเมิน</td>
    
    <td style="text-align:center;">ว/ด/ป</td>
  </tr>';
    $b = 1;
    do {
        $tb4_1 = '
  <tr style="">
    <td style="text-align:center;">' . $b . '</td>
    <td style="">' . $row_showcomment['c_comment1'] . '</td>
    
    <td style="text-align:center;">' . $row_showcomment['c_date'] . '</td>
  </tr>
  ';
        $b++;
    } while ($row_showcomment = mysql_fetch_assoc($showcomment));
    $tb4_2 = '</table>';
} else {
    
}
$tb5 = '<h4> ข้อเสนอแนะเกี่ยวกับแนวทางพัฒนา </h4>';
if ($totalRows_showcomment2 > 0) {
    $tb5_1 = '<table id="bg-table" width="100%" style="border-collapse: collapse;smargin-top:8px;">
  <tr style="">
    <td style="">No.</td>
    <td style="">ข้อเสนอแนะเกี่ยวกับแนวทางพัฒนา</td>
    <td style="">ว/ด/ป</td>
  </tr>';
    $d = 1;
    do {
        $tb5_2 = '<tr style="">
    <td style="">' . $d . '</td>
    
    <td style="">' . $row_showcomment2['c_comment2'] . '</td>
    <td style="">' . $row_showcomment2['c_date'] . '</td>
  </tr>';
        $d++;
    } while ($row_showcomment2 = mysql_fetch_assoc($showcomment2));
    $tb5_3 = '</table>';
} else {
    
}

$strFooter = '<h4 style="text-align: center;">ผู้ประเมินและผู้รับการประเมินได้เห็นชอบผลการประเมินร่วมกันแล้วจึงได้ลงลายมือชื่อไว้เป็นหลักฐาน</h4>';
$strFooter = $strFooter . '<table width="100%">'
        . '<tr>'
        . '<td style="border:none;text-align: left;" width="50%">'
        . 'ลายมือชื่อ...................................(ผู้ประเมิน)<br/>'
        . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(...............................................)<br/>'
        . 'วันที่........เดือน.....................พ.ศ..............'
        . '</td>'
        . '<td style="border:none;text-align: right;" width="50%">'
        . 'ลายมือชื่อ...................................(ผู้รับการประเมิน)<br/>'
        . '(...............................................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>'
        . 'วันที่.......เดือน..................พ.ศ..............&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        . '</td>'
        . '</tr>'
        . '<tr>'
        . '<td style="border:none;text-align: left;" colspan="2">'
        . 'ลายมือชื่อ...................................(ในกรณีที่ผู้รับการประเมินไม่ยอมลงลายมือชื่อรับทราบผลการประเมิน)<br/>'
        . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(...............................................)<br/>'
        . 'วันที่........เดือน.....................พ.ศ..............'
        . '</td>'
        . '</tr>'
        . '</table>';
mysql_free_result($sumg1);
$mpdf->WriteHTML($tb1);
$mpdf->WriteHTML($tb2);
$mpdf->WriteHTML($tb3);
$mpdf->WriteHTML($tb3_1);
if ($totalRows_showcomment > 0) {
    $mpdf->WriteHTML($tb4);
    $mpdf->WriteHTML($tb4_1);
    $mpdf->WriteHTML($tb4_2);
}
$mpdf->WriteHTML($tb5);
if ($totalRows_showcomment2 > 0) {
    $mpdf->WriteHTML($tb5_1);
    $mpdf->WriteHTML($tb5_2);
    $mpdf->WriteHTML($tb5_3);
}
$mpdf->WriteHTML($strFooter);
$mpdf->Output();
?>