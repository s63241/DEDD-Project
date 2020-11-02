<h3 class="text-primary prompt-400"><i class="fa fa-bookmark" aria-hidden="true"></i> ข้อมูลบุคส่วนตัว</h3>
<table class="table table-hover">
    <tbody>
        <tr>
            <td class="text-right"><strong>ชื่อ</strong></td>
            <td class="text-left"><?=$name?></td>
        </tr>
        <tr>
            <td class="text-right"><strong>นามสกุล</strong></td>
            <td class="text-left"><?=$lname?></td>
        </tr>
        <tr>
            <td class="text-right"><strong>ตำแหน่ง</strong></td>
            <td class="text-left"><?=$row_rsmember['po_name']?></td>
        </tr>
        <tr>
            <td class="text-right"><strong>เบอร์โทร</strong></td>
            <td class="text-left"><?=$row_rsmember['p_phone'];?></td>
        </tr>
        <tr>
            <td class="text-right"><strong>อีเมล์</strong></td>
            <td class="text-left"><?=$row_rsmember['p_email'];?></td>
        </tr>
        <tr>
            <td class="text-right"><strong>หน่วยงาน</strong></td>
            <td class="text-left"><?=$row_rsmember['d_name']?></td>
        </tr>
        
    </tbody>
</table>

