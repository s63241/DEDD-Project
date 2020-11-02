<?php include('acc.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
    <?php require_once("../layouts/header_asset.php"); ?>
    <?php include('css.php');?>
  </head>
  <body>
    <?php require_once("../layouts/header.php"); ?>
    <div class="container">
  <div class="row py-3">

  <div class="col-md-3">
      <?php include('menu.php');?>
  </div>
    <div class="col-md-9">
     <?php 

       
        include('form_upload_img.php');
        

       ?>
        
    </div>
  </div>
</div>
   
  </body>
</html>
<?php include('footer.php');?>