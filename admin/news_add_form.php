<h4>::เพิ่มข่าวสาร/ประชาสัมพันธ์::</h4>
<form id="form1" name="form1" method="post" action="news_add_form_db.php" enctype="multipart/form-data" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-1 control-label"> หัวข้อ </div>
    <div class="col-sm-7">
      <input type="text" name="n_title" class="form-control" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1 control-label">
      รายละเอียด
    </div>
    <div class="col-sm-10">
      <textarea name="n_detail" id="txtMessage" class="ckeditor" cols="69" rows="5"></textarea>
    </div>
  </div>
  <div class="form-group">
      <div class="col-sm-1">
          รูปภาพประกอบ
      </div>
      <div class="col-sm-4">
          <input type="file" name="n_img" required accept="image/*">
      </div>
  </div>
    <div class="form-group">
      <div class="col-sm-1">
         แนบไฟล์
      </div>
      <div class="col-sm-3">
          <input type="file" name="n_file">
      </div>
      <div class="col-sm-3">
        (ไฟล์ ms office, pdf)
      </div>
  </div>
<div class="form-group">
  <div class="col-sm-1">   </div>
  <div class="col-sm-6">
    <button type="submit" class="btn btn-primary"> บันทึก </button>
  </div>
</div>
</div>
</form>