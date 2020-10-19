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
    
    <?php
    $p=$_GET['p'];
    if($p=='report'){}else{
    include('css.php');
    }
    ?>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if($p=='report'){}else{include('banner.php');}?>
        </div>
        <div class="col-md-2" id="hid">
          <?php
          
          if($p=='report'){}else{
          include('menu.php');
          }
          ?>
        </div>
        <div class="col-md-10" style="margin-top: 20px">
          <?php
          $p=$_GET['p'];
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
          //include('reportbk.php');
          
          //include('');
          }else{
          include('listpersonal.php');
          } ?>
        </div>
      </div>
    </div>
    
  </body>
</html>
<?php  // include('footer.php');?>