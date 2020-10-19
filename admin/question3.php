<?php include('acc.php'); ?>
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
        <section class="bg-light" style="padding-top: 20px;">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-3">
                        <?php include('menu.php'); ?>
                    </div>
                    <div class="col-md-9">
                        <?php
                        $p = $_GET['p'];
                        if ($p == 'add') {
                            include('question3_add_form.php');
                        } elseif ($p == 'edit') {
                            include('question3_edit_form.php');
                        } elseif ($p == 'add_q') {
                            include('question3_add_q_form.php');
                        } elseif ($p == 'edit_q3_q') {
                            include('question3_edit_q3_form.php');
                        } else {
                            include('question3_list.php');
                        }
                        ?>

                    </div>
                </div>
            </div>
        </section>
        <?php require_once("../layouts/footer.php"); ?>
    </body>
</html>