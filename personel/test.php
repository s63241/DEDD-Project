<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . '/../mpdf/vendor/autoload.php';
require_once('../Connections/conn.php');
?>
<?php

$mpdf = new mPDF();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();