<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ระบบประเมินผลการปฏิบัติงานบุคลากร</title>
        <?php require_once("../layouts/header_asset.php"); ?>
    </head>
    <body>
        <?php require_once("../layouts/header.php"); ?>
        <?php require_once('../Connections/conn.php'); ?>
        <?php
        mysql_select_db($database_conn, $conn);
        $q = "SELECT * FROM tbl_contacts order by created DESC";
        $result = mysql_query($q, $conn) or die(mysql_error());
        ?>
        <section class="bg-light" style="padding-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php include('menu.php'); ?>
                    </div>
                    <div class="col-md-9">
                        <h3 class="prompt-400 text-primary"><i class="fa fa-envelope" aria-hidden="true"></i> จัดการคำร้อง</h3>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>วันที่</th>
                                    <th>เรื่อง</th>
                                    <th>ผู้ติดต่อ</th>
                                    <th>โทร</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                <?php while ($row = mysql_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?=$count?></td>
                                        <td><?=$row['created']?></td>
                                        <td><?=$row['title']?></td>
                                        <td><?=$row['fullname']?></td>
                                        <td><?=$row['mobile']?></td>
                                        <td>
                                            <a href="contact_view.php?id=<?=$row['id']?>" class="btn btn-info">อ่าน</a>
                                  
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                <?php } ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </section>
        <?php require_once("../layouts/footer.php"); ?>
    </body>
</html>