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
        <?php require_once('../Connections/connNew.php'); ?>
        <?php
        $id = $_GET['id'];
        $query = 'SELECT title,fullname,email,mobile,description FROM tbl_contacts WHERE id=?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $num_row = $stmt->num_rows;
        $stmt->bind_result($title,$fullname,$email,$mobile,$description);
        $stmt->fetch();
        $stmt->close();
        ?>
        <section class="bg-light" style="padding-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php include('menu.php'); ?>
                    </div>
                    <div class="col-md-9">
                        <a href="contact_list.php" class="btn btn-info"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> กลับ</a>
                        <hr>
                        <h3 class="prompt-400 text-primary"><i class="fa fa-envelope" aria-hidden="true"></i> <?=$title?></h3>
                        <p><strong>จากคุณ </strong><?=$fullname?>&nbsp;&nbsp;&nbsp;<strong>โทร </strong><?=$mobile?> </p>
                        <p><strong>ข้อความ</strong></p>
                        <p><?=$description?></p>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once("../layouts/footer.php"); ?>
    </body>
</html>