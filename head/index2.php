<?php include('acc.php');
if($img==''){
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <?php include('css.php');?>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php include('banner.php');?>
        </div>
        <div class="col-md-2" id="hid">
          <?php
          $p=$_GET['p'];
          if($p=='report'){}else{
          include('menu.php');
          }
          ?>
        </div>
        <div class="col-md-10">
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