<form id="form1" name="form1" method="post" action="question3_save_db.php" class="form-horizontal">
  <div class="form-group">
      <div class="col-sm-2"> ชื่อประเภทคำถาม </div>
      <div class="col-sm-7">
        <input type="text" name="qg3_name" class="form-control"  required="required">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"> รายละเอียดคำถาม </div>
      <div class="col-sm-9">
        <input type="text" name="qg3_detail" class="form-control"  required="required">
      </div>
    </div>
     <div class="form-group">
      <div class="col-sm-2"> คะแนนเต็ม </div>
      <div class="col-sm-2">
        <input type="text" name="qg3_fullscore" class="form-control"  required="required">
      </div>
    </div>
   <!--  <div class="form-group">
      <div class="col-sm-2"> ช่วงคะแนน </div>
      <div class="col-sm-1">
         <input type="text" value="0" disabled="disabled" class="form-control"> 
      </div>
      <div class="col-sm-1" align="center">
        ถึง
      </div>

      <div class="col-sm-2">
        <input type="text" name="qg3_score_rank" class="form-control"   required="required">
      </div>
    </div> -->
     <div class="form-group">
      <div class="col-sm-2">   </div>
      <div class="col-sm-6">
        <button type="submit" class="btn btn-primary"> บันทึก </button>
      </div>
    </div>
  </div>
</form>
