
    <div class="list-group">
  <a href="index.php" class="list-group-item list-group-item-action active">
   MENU
  </a>
  <a href="page.php" class="list-group-item list-group-item-action">หน้าหลัก</a>
  <a href="index.php?p=updatepassword" class="list-group-item list-group-item-action">ข้อมูลบุคลากร</a>
  <a href="index.php?p=se&term=<?php echo $row_peroidassess['dq_name']; ?>&pid=<?php echo $p_id;?>" class="list-group-item list-group-item-action">แบบประเมินตนเอง</a>
  <a href="index.php?p=list" class="list-group-item list-group-item-action">ตรวจสอบสถานะ</a>
  <a href="../logout.php" class="list-group-item list-group-item-danger">ออกจากระบบ</a>
</div>