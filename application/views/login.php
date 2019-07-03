<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>LOGIN</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>themes/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>themes/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url() ?>themes/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>themes/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>themes/css/style-responsive.css" rel="stylesheet" />
    <script src="<?php echo base_url()  ?>themes/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>themes/js/miniNotification.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-body">

    <div class="container">
        <!-- <img alt ="salah" scr="<?php echo base_url()?> themes/img/avatar1.jpg" width="200px" height="200px"> -->
        <center><img src="<?php echo base_url('themes/img/logo.gif'); ?>" width="100px" height="100px" style="margin : 50px 0px -40px 0px;"/></center>
        <form class="form-signin" action="<?php echo site_url(). '/login/loginProcess' ?>" method="post">
            <h2 class="form-signin-heading">masuk ke si bpptkg</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
                <input type="password" class="form-control" required name="password" placeholder="Password">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit">Masuk</button>
            </div>

        </form>

    </div>
    <div id="notification">
        <p>
            <b>
                <?php
                if (isset($_SESSION['notif'])) {
                    echo $_SESSION['notif'];
                }
                ?>
            </b>
        </p>
    </div>
    <?php
    if (isset($_SESSION['notif'])) {
        ?>
        <script type="text/javascript">
            $(function() {
                $('#notification').miniNotification();
            });
        </script>
        <?php
        unset($_SESSION['notif']);
    }
    ?>
</body>

</html>