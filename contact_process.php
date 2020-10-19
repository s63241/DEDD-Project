<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $titile = $_POST['title'];
    $description = $_POST['description'];

    date_default_timezone_set("Asia/Bangkok");
    $created = new DateTime();
    $created = $created->format('Y-m-d H:i:s');
    
    require_once('Connections/connNew.php');
    $sql = "INSERT INTO tbl_contacts (fullname,email,mobile,title,description,created) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $fullName, $email, $mobile, $titile, $description, $created); //s - string, b - blob, i - int, etc
    $stmt->execute();

    //printf("%d Row inserted.\n", $stmt->affected_rows);
    $conn->close();

    if ($stmt->affected_rows > 0) {
        $_SESSION["msg_save_success"] = "ส่งคำร้องเรียบร้อยแล้ว";
       
    }
}
header("Location: contact.php");