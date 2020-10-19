<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ระบบประเมินผลการปฏิบัติงานบุคลากร</title>
        <?php require_once("layouts/header_asset.php"); ?>
    </head>
    <body>
        <?php require_once("layouts/header.php"); ?>
        <!-- Icons Grid -->
        <section class="bg-light" style="padding-top: 20px;">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h3 class="prompt-400 text-primary"><i class="fa fa-envelope" aria-hidden="true"></i> คำร้อง/ติดต่อผู้ดูแลระบบ</h3>
                        <div class="row">

                            <div class="col-md-7">
                                <?php if (isset($_SESSION["msg_save_success"]) && $_SESSION["msg_save_success"] != '') { ?>
                                    <div class="alert alert-success" role="alert" onclick="this.style.display = 'none'">
                                        <?= $_SESSION['msg_save_success'] ?>
                                    </div>
                                    <?php unset($_SESSION['msg_save_success']); ?>
                                <?php } ?>
                                <form action="contact_process.php" method="POST" id="frm" name="frm">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ชื่อ-นามสกุล <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="fullname" name="fullname">
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleFormControlInput1">อีเมล์</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">โทร <b class="text-danger">*</b></label>
                                            <input type="mobile" class="form-control" id="mobile" name="mobile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">หัวข้อ <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="">รายละเอียด <b class="text-danger">*</b></label>
                                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">ส่งคำร้อง</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-5">
                                <image src="assets/img/contact.jpg" class="w-100"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once("layouts/footer.php"); ?>
        <script>
            $(function () {

                $("#frm").validate({
                    rules: {
                        fullname: {
                            required: true
                        },
                        mobile: {
                            required: true
                        },
                        email: {
                            required: false
                        },
                        title:{
                            required: true
                        },
                        description:{
                            required: true
                        }
                    },
                    messages: {
                        fullname: {
                            required: "กรุณาระบุชื่อ-นามสกุล"
                        },
                        mobile: {
                            required: "กรุณาระบุหมายเลขโทรศัพท์"
                        },
                        title:{
                            required: "กรุณาระบุหัวข้อ"
                        },
                        description:{
                            required: "กรุณาระบุรายละเอียด"
                        }
                    },
                    submitHandler: function (form) {
                        form.submit();
                    }
                });
            });
        </script>
    </body>
</html>