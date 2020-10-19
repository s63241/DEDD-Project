<h3>::ข้อมูลส่วนตัว::</h3>
<form action="form_update_password_db.php" method="post" enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal">
	
<div class="form-group">
		<div class="col-sm-2">
			ชื่อ
		</div>
		<div class="col-sm-4">
  <input type="text" name="p_password1" disabled="disabled" value="<?php echo $name;?>" class="form-control"/>
</div>
</div>

<div class="form-group">
	<div class="col-sm-2">
			นามสกุล
		</div>
		<div class="col-sm-4">
  <input type="text" name="p_password1" disabled="disabled" value="<?php echo $lname;?>" class="form-control"/>
</div>
</div>

<div class="form-group">
	<div class="col-sm-2">
			ตำแหน่ง   
		</div>
		<div class="col-sm-4">
  <input type="text" name="p_password1" disabled="disabled" value="<?php echo $row_rsmember['po_name'];?>" class="form-control">
</div>
</div>

<div class="form-group">
	<div class="col-sm-2">
			เบอร์โทร 
		</div>
		<div class="col-sm-4">
  <input type="text" name="p_password1" disabled="disabled" value="<?php echo $row_rsmember['p_phone'];;?>" class="form-control"/>
</div>
</div>
<div class="form-group">
	<div class="col-sm-2">
			อีมเล์ 
		</div>
		<div class="col-sm-4">
  <input type="text" name="p_password1" disabled="disabled" value="<?php echo $row_rsmember['p_email'];;?>" class="form-control"/>
</div>
</div>

<div class="form-group">
	<div class="col-sm-2">
			หน่วยงาน  
		</div>
		<div class="col-sm-4">
  <input type="text" name="p_password1" disabled="disabled" value="<?php echo $row_rsmember['d_name'];?>" class="form-control">
</div>
</div>

 
<!-- 



	<div class="form-group">
		<div class="col-sm-4">
  <input type="text" name="p_password1" disabled="disabled" value="<?php echo $p_password;?>" class="form-control"/>
</div>
</div>
<div class="form-group">
		<div class="col-sm-4">
  <input type="text" name="p_password" required  class="form-control"/>
</div>
</div> -->
<!--   <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
  <input type="submit" name="button" id="button" value="Submit" /> -->
</form>
