<?php
include('acc.php');
$p = $_GET['p'];
if ($img == '') {
// include('img.php');
    echo "<script type='text/javascript'>";
    echo "window.location='img.php';";
    echo "</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ระบบประเมินผลการปฏิบัติงานบุคลากร</title>
        <?php require_once("../layouts/header_asset.php"); ?>
        
    </head>
    <body>
        <?php require_once("../layouts/header.php"); ?>
        <section class="bg-light" style="padding-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3" id="hid">
                        <?php
                        if ($p == 'report') {
                            include('menu.php');
                        } else {
                            include('menu.php');
                        }
                        ?>
                    </div>
                    <div class="col-md-9">
                        <br />
          <?php
          if($p=='updatepassword'){
          include('form_update_password.php');
          }elseif ($p=='g1') {
          include('se_g1.php');
          }elseif ($p=='g2') {
          include('se_g2.php');
          }elseif ($p=='g3') {
          include('se_g3.php');
          }elseif ($p=='report') {
          include('report.php');
          }elseif ($p=='list') {
          include('listpersonal.php');
          }elseif ($p=='list2') {
          include('listpersonal2.php');
          }else{
          include('page.php');
          } 

          ?>
        </div>
      </div>
    </div>
    
  </body>
</html>
<?php  // include('footer.php');?>