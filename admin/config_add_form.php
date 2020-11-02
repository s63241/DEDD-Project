<form id="form1" name="form1" method="post" action="config_add_form_db.php" class="form-horizontal">
  <div class="form-group">
      <div class="col-sm-3 control-label"> รอบการประเมิน </div>
      <div class="col-sm-3">
        <input type="text" name="dq_name" class="form-control"  required="required" placeholder=" ตย.2/2561">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4 control-label"> วันเริ่มต้น - สิ้นสุดการประเมิน </div>
      <div class="col-sm-4">
        เปิด <br />
        <input type="date" name="dq_date_open3" class="form-control"  required="required">
      </div>
      <div class="col-sm-3">
        ปิด <br />
        <input type="date" name="dq_date_close3" class="form-control"  required="required">
      </div>
    </div>

      <div class="form-group">
      <div class="col-sm-3 control-label"> เจ้าหน้าที่ </div>
      <div class="col-sm-3">
        เปิด <br />
        <input type="date" name="dq_date_open1" class="form-control"  required="required">
      </div>
      <div class="col-sm-3">
        ปิด <br />
        <input type="date" name="dq_date_close1" class="form-control"  required="required">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-3 control-label"> ห้วหน้าฝ่าย  </div>
      <div class="col-sm-3">
        เปิด <br />
        <input type="date" name="dq_date_open2" class="form-control"  required="required">
      </div>
      <div class="col-sm-3">
        ปิด <br />
        <input type="date" name="dq_date_close2" class="form-control"  required="required">
      </div>
    </div>

     <div class="form-group">
      <div class="col-sm-3">   </div>
      <div class="col-sm-6">
        <button type="submit" class="btn btn-primary"> บันทึก </button>
      </div>
    </div>
  </div>
</form>
