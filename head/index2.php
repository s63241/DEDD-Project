<?php
include('acc.php');
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
        <?php
        $p = $_GET['p'];
        if ($p == 'report') {
            
        } else {
            include('css.php');
        }
        ?>
    </head>
    <body>
        <?php require_once("../layouts/header.php"); ?>
        <section class="features-icons bg-light" style="padding-top: 20px">
            <div class="container">
                <div class="row">
                    <div class="col-md-3" id="hid">
                        <?php
                        if ($p == 'report') {
                            
                        } else {
                            include('menu.php');
                        }
                        ?>
                    </div>
                    <div class="col-md-9">
                        <br />
          <?php
          $p=$_GET['p'];
          if($p=='se'){
          include('self_g1.php');
          }elseif($p=='se2'){
          include('self_g2.php');
          }elseif($p=='se3'){
          include('self_g3.php');
          }elseif($p=='report'){
          include('report.php');
          }?>
        </div>
      </div>
    </div>
    
  </body>
</html>
<?php include('footer.php');?>