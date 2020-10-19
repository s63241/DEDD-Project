
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
        <section class="features-icons bg-light">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <?php if (isset($_SESSION["msg_login_error"]) && $_SESSION["msg_login_error"] != '') { ?>
                            <div class="alert alert-danger text-center" role="alert" onclick="this.style.display = 'none'">
                                <?= $_SESSION['msg_login_error'] ?>
                            </div>
                            <?php unset($_SESSION['msg_login_error']); ?>
                        <?php } ?>
                        <form name="formlogin" action="login_process.php" method="POST" id="frm" class="form-horizontal" novalidate="novalidate">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input name="p_username" type="text" required class="form-control" id="p_username" placeholder="Username" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input name="p_password" type="password" required class="form-control" id="p_password" placeholder="Password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-block btn-primary" id="btn">
                                        <span class="glyphicon glyphicon-log-in"></span>
                                        ลงชื่อเข้าใช้
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once("layouts/footer.php"); ?>
        <script>
            $(function () {

                $("#frm").validate({
                    rules: {
                        p_username: {
                            required: true
                        },
                        p_password: {
                            required: true
                        }
                    },
                    messages: {
                        p_username: {
                            required: "กรุณาระบุ username"
                        },
                        p_password: {
                            required: "กรุณาระบุ password"
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

