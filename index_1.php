<?php require_once('Connections/conn.php'); ?>
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
$query_Recordset1 = "SELECT * FROM tbl_complain";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
    session_start();
}
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
    $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
if (isset($_POST['p_username'])) {
    $loginUsername = $_POST['p_username'];
    $password = $_POST['p_password'];
    $MM_fldUserAuthorization = "ref_l_id";
    $MM_redirectLoginSuccess = "admin/index.php";
//$MM_redirectLoginFailed = "personel/index.php";
    $MM_redirectLoginFailed = "index.php";
    $MM_redirecttoReferrer = false;
    mysql_select_db($database_conn, $conn);
    $LoginRS__query = sprintf("SELECT p_username, p_password, ref_l_id FROM tbl_personal WHERE p_username=%s AND p_password=%s", GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));
    $LoginRS = mysql_query($LoginRS__query, $conn) or die(mysql_error());
    $loginFoundUser = mysql_num_rows($LoginRS);
    $_LoginSuccess = true;
    if ($loginFoundUser) {
        $loginStrGroup = mysql_result($LoginRS, 0, 'ref_l_id');
        if (PHP_VERSION >= 5.1) {
            session_regenerate_id(true);
        } else {
            session_regenerate_id();
        }
//declare two session variables and assign them
        $_SESSION['MM_Username'] = $loginUsername;
        $_SESSION['MM_UserGroup'] = $loginStrGroup;
        if (isset($_SESSION['PrevUrl']) && false) {
            $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
        }
    } else {
//5811011802071
//25390709
        try {
            $ADUsername = $loginUsername;
            /*
              if( substr($ADUsername,0,1)!="u" )
              {
              $ADUsername="u".$ADUsername;
              }
             */
            $ad = @ldap_connect('sdu-ldap.dusit.ac.th', "389") or die("Error");
            $r = @ldap_search($ad, 'dc=dusit,dc=ac,dc=th', 'uid=' . $ADUsername);
            if (!$r) {
                $_LoginSuccess = false;
            } else {
                $result = @ldap_get_entries($ad, $r);
                if (!isset($result[0])) {
                    $_LoginSuccess = false;
                } else {
                    if (@ldap_bind($ad, $result[0]['dn'], $password)) {
                        $NameArray = explode(" ", $result[0]["displayname"][0]);
                        $BODArray = explode("-", $result[0]["birthdate"][0]);
                        $BOD = (intval($BODArray[2]) - 543) . "-" . $BODArray[1] . "-" . $BODArray[0];
                        $FirstName = $NameArray[0];
                        $LastName = $NameArray[1];
                        $UserID = $result[0]["idcode"][0];
                        $UserType = $result[0]["employeetype"][0];
                        $Phone = $result[0]["telephonenumber"][0];
                        $Mail = $result[0]["mail"][0];
                        $sqlCheckExist = "select * from tbl_personal where p_username = '$loginUsername'";
                        $dataUser = mysql_query($sqlCheckExist);
                        if (mysql_num_rows($dataUser) > 0) {
                            $user = mysql_fetch_assoc($dataUser);
                            $loginStrGroup = $user["ref_l_id"];
                        } else {
                            $loginStrGroup = "4";
//$sqlInsertNewUser = "insert into tbl_personal (ref_d_id,ref_l_id,ref_po_id,p_username,p_password,p_firstname,p_name
//                        ,p_lastname,p_sex,p_phone,p_email,p_address,p_status,p_birthday,p_img,p_sex) values(
//                             '1'
//                            ,'4'
//                            ,'1'
//                            ,'$loginUsername'
//                            ,'$password'
//                            ,''
//                            ,'$FirstName'
//                            ,'$LastName'
//                            ,''
//                            ,'$Phone'
//                            ,'$Mail'
//                            ,''
//                            ,'»¯ÔºÑµÔ¡ÒÃ'
//                            ,'$BOD'
//                            ,'user.jpg'
//                            ,'ªÒÂ'
//                        );";
                            $sqlInsertNewUser = "INSERT INTO tbl_personal
(ref_l_id,
ref_d_id,
ref_po_id,
p_username,
p_password,
p_sex,
p_firstname,
p_name,
p_lastname,
p_address,
p_phone,
p_email,
p_birthday,
p_status,
p_img)
VALUES
('1',
'4',
'1',
'$loginUsername',
'$password',
'ªÒÂ',
'¹ÒÂ',
'$FirstName',
'$LastName',
' ',
'$Phone',
'$Mail',
'$BOD',
'»¯ÔºÑµÔ¡ÒÃ',
'user.jpg'
)";
                            mysql_query($sqlInsertNewUser);
                        }
                        if (PHP_VERSION >= 5.1) {
                            session_regenerate_id(true);
                        } else {
                            session_regenerate_id();
                        }
//declare two session variables and assign them
                        $_SESSION['MM_Username'] = $loginUsername;
                        $_SESSION['MM_UserGroup'] = $loginStrGroup;
                    } else {
                        $_LoginSuccess = false;
                    }
                }
            }
        } catch (Exception $ex) {
            $_LoginSuccess = false;
        }
    }
    if ($_LoginSuccess) {
        $roleID = intval($_SESSION['MM_UserGroup']);
        if ($roleID == 1) {
            $MM_redirectLoginSuccess = "admin/index.php";
        } else if ($roleID == 2) {
            $MM_redirectLoginSuccess = "head/index.php";
        } else if ($roleID == 3) {
            $MM_redirectLoginSuccess = "boss/index.php";
        } else if ($roleID == 4) {
            $MM_redirectLoginSuccess = "personel/index.php";
        }
        header("Location: " . $MM_redirectLoginSuccess);
    } else {
        header("Location: " . $MM_redirectLoginFailed);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Login</title>
        <?php include('css.php'); ?>
        <style>
            .main{
                position:fixed;
                left:0;
                right:0;
                top:0;
                bottom:0;
                background-image:url(img/bg.jpg);
                background-position: center top;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
                background-repeat:no-repeat;
            }
            .login{
                padding:10px 30px;
                border-radius:5px;
                background:rgba(255, 255, 255, 0.85);
            }
            .box{
                display:table;
                width:100%;
                height:100%;
            }
            .inner-box{
                vertical-align:middle;
                line-height:100%;
                display:table-cell;
                width:100%;
                height:100%;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="box">
                <div class="inner-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="login">
                                    <h3 align="center">
                                        <span class="glyphicon glyphicon-lock"></span>
                                        เข้าสู่ระบบ</h3>
                                    <br />
                                    <form  name="formlogin" action="<?php echo $loginFormAction; ?>" method="POST" id="login" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input name="p_username" type="text" required class="form-control" id="p_username" placeholder="Username" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input name="p_password" type="password" required class="form-control" id="p_password" placeholder="Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary" id="btn">
                                                    <span class="glyphicon glyphicon-log-in"></span>
                                                    &nbsp;
                                                    ลงชื่อเข้าใช้
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="login">
                                    <h3>::ข่าวสาร/ประชาสัมพันธ์::</h3>
                                    <?php include('news_list_index.php'); ?>
                                    <p align="right">
                                        <a href="news.php?p=all" class="btn btn-primary btn-sm pull-right">แสดงทั้งหมด</a>
                                    </p>
                                    <br /><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
mysql_free_result($Recordset1);
?>
<?php include('footer.php'); ?>