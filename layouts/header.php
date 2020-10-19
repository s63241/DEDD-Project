
<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?= $SITE_URL ?>assets\img\logo\logo.png" height="60" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto prompt-400">

                <?php if (isset($_SESSION['MM_Username']) && $_SESSION['MM_Username'] != '') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $SITE_URL ?>logout.php">ออกจากระบบ </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $SITE_URL ?>login.php">เข้าสู่ระบบ</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead -->
<header class="masthead text-center">
    <div class="overlay" style="background-image: url('<?= $SITE_URL ?>assets/img/cover1.jpg');background-repeat: no-repeat;background-position: center; "></
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto text-primary">
                
            </div>

        </div>
    </div>
</header>