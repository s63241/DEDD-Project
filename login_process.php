<?php require_once('Connections/connNew.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: login.php");
}
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['accesscheck'])) {
    $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
$connect = $conn;
$username = $_POST['p_username'];
$password = $_POST['p_password'];

$userGroup = normalUser($username, $password);
if ($userGroup != null) {
    validateLocation($username, $userGroup);
} else {
    $userGroup = ldapUser($username, $password);
    if ($userGroup != null) {
        validateLocation($username, $userGroup);
    } else {
        header("Location: login.php");
    }
}

function normalUser($username, $password) {
    global $connect;
    $query = 'SELECT ref_l_id FROM tbl_personal WHERE p_username=? AND p_password=?';
    $num_row = 0;
    $userGroup = '';
    if ($stmt = $connect->prepare($query)) {
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $stmt->store_result();
        $num_row = $stmt->num_rows;

        if ($num_row == 0) {
            $stmt->close();
            $_SESSION["msg_login_error"] = "ไม่พบบัญชีผู้ใช้งานหรือ username กับ password ไม่ตรงกัน";
            return null;
        } else {
            $stmt->bind_result($ref_l_id);
            $stmt->fetch();
            $userGroup = $ref_l_id;
            $stmt->close();
            return $userGroup;
        }
    } else {
        die("Failed to prepare query");
    }
    return null;
}

function ldapUser($username, $password) {
    try {
        $ADUsername = $username;

        $ad = @ldap_connect('sdu-ldap.dusit.ac.th', "389") or die("Error");
        $r = @ldap_search($ad, 'dc=dusit,dc=ac,dc=th', 'uid=' . $ADUsername);
        if (!$r) {
            $_SESSION["msg_login_error"] = "ไม่พบผู้ใช้งานในระบบ LDAP";
            return null;
        } else {
            $result = @ldap_get_entries($ad, $r);
            if (!isset($result[0])) {
                $_SESSION["msg_login_error"] = "ไม่พบผู้ใช้งานในระบบ LDAP";
                return null;
            } else {
                if (@ldap_bind($ad, $result[0]['dn'], $password)) {
                    $NameArray = explode(" ", $result[0]["displayname"][0]);
                    $BODArray = explode("-", $result[0]["birthdate"][0]);
                    $BOD = (intval($BODArray[2]) - 543) . "-" . $BODArray[1] . "-" . $BODArray[0];
                    $firstName = $NameArray[0];
                    $lastName = $NameArray[1];
                    $UserID = $result[0]["idcode"][0];
                    $UserType = $result[0]["employeetype"][0];
                    $Phone = $result[0]["telephonenumber"][0];
                    $Mail = $result[0]["mail"][0];

                    //Check ldap user have permission
                    global $connect;
                    $query = 'SELECT ref_l_id FROM tbl_personal WHERE p_firstname=? AND p_lastname=?';
                    $num_row = 0;
                    $userGroup = '';

                    $stmt = $connect->prepare($query);
                    $stmt->bind_param('ss', $firstName, $lastName);
                    $stmt->execute();
                    $stmt->store_result();
                    $num_row = $stmt->num_rows;

                    if ($num_row > 0) {
                        $stmt->bind_result($ref_l_id);
                        $stmt->fetch();
                        $userGroup = $ref_l_id;
                        $stmt->close();
                        return $userGroup;
                    } else {
                        $stmt->close();
                        $_SESSION["msg_login_error"] = "คุณไม่มีสิทธิใช้งานระบบ กรุณาแจ้งผู้ดูแลระบบ";
                        return null;
                    }
                } else {
                    $_SESSION["msg_login_error"] = "ไม่พบผู้ใช้งานในระบบ LDAP";
                    return null;
                }
            }
        }
    } catch (Exception $ex) {
        return null;
    }
}

function validateLocation($username, $loginStrGroup) {
    $_SESSION['MM_Username'] = $username;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
    $roleID = $loginStrGroup;
    $MM_redirectLoginSuccess = 'login.php';
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
}

?>