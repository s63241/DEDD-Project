<?php
if (!isset($_SESSION)) {
    session_start();
}
#$SITE_URL = 'http://127.0.0.1/Project_180363/5811011802082/dusit/';
$SITE_URL = 'http://127.0.0.1/Project/';

?>

<!-- Bootstrap core CSS -->
<link href="<?= $SITE_URL ?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- Custom fonts for this template -->
<link href="<?= $SITE_URL ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?= $SITE_URL ?>assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<!-- Custom styles for this template -->
<link href="<?= $SITE_URL ?>assets/css/landing-page.css" rel="stylesheet">
<link href="<?= $SITE_URL ?>assets/thaifont/prompt-master/css/fonts.css" rel="stylesheet">
<script src="<?=$SITE_URL?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?=$SITE_URL?>assets/js/jquery.validate.min.js"></script>