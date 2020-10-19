
<h4>::เพิ่มรูปภาพโปรไฟล์::</h4>
<img src="../img/<?php echo $img;?>" width="100px">
<form action="form_upload_img_db.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <label for="p_img"></label>
  <input type="file" name="p_img" id="p_img" required />
  <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
  <input type="submit" name="button" id="button" value="Submit" />
</form>
