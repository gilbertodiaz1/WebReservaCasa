<?php
session_start();
include("includes/db.conn.php");
include("includes/conf.class.php");
include("language.php");
if (isset($_REQUEST["error_code"]))
    $errorCode = $bsiCore->ClearInput($_REQUEST["error_code"]);
else
    $errorCode = 9;
$erroMessage = array();
$erroMsg[9] = BOOKING_FAILURE_ERROR_9;
$erroMsg[13] = BOOKING_FAILURE_ERROR_13;
$erroMsg[22] = BOOKING_FAILURE_ERROR_22;
$erroMsg[25] = BOOKING_FAILURE_ERROR_25;
$erroMsg[26] = BOOKING_FAILURE_ERROR_26;
if (isset($_GET['rescode'])) {
    $erroMsg[$errorCode] = $_GET['rescode'];
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $bsiCore->config['conf_hotel_name']; ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="grey lighten-4">
<nav class="grey lighten-3" role="navigation">
    <div class="container">
        <div class="nav-wrapper">
            <a href="home.php" class="brand-logo gold-text text-darken-3">Gold Coast Condo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse gold-text text-darken-3">
                <i class="mdi-navigation-menu"></i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="gold-text text-darken-3" href='<?php echo URL_INDEX; ?>'>Inicio</a>
                </li>
                <li>
                    <a class="gold-text text-darken-3" href="gallery.php">Galer&iacute;a</a>
                </li>
                <li
                    ><a class="gold-text text-darken-3" href="contact.php">Contacto</a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a class="gold-text text-darken-3" href='<?php echo URL_INDEX; ?>'>Inicio</a>
                </li>
                <li><a class="gold-text text-darken-3" href="gallery.php">Galería</a>
                </li>
                <li><a class="gold-text text-darken-3" href="contact.php">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container" style="min-height: 600px;">
    <div class="row">
        <div class="col s12">
            <h2 class="center-align"><?php echo BOOKING_FAILURE_TEXT; ?></h2>
            <!-- start of search row -->
            <div class="container">
                <div class="row">
                    <div class="col s12 center-align">
                        <div class="card-panel red center-align">
                            <span class="white-text">
                                <h5><?php echo $erroMsg[$errorCode]; ?> </h5>
                                <br>
                            </span>
                        </div>
                        <div style="width:100%;">
                            <button id="registerButton" class="btn waves-effect waves-light" type="button"
                                    onClick="window.location.href='<?php echo URL_INDEX; ?>'"><?php echo BACK_TO_HOME; ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of search row -->
        </div>
    </div>
</div>
<br><br>
<footer class="page-footer grey lighten-2">
    <div class="footer-copyright grey darken-4">
        <div class="container">
            &reg; 2015 Copyright <a class="white-text" href="#">IUCoding</a>
        </div>
    </div>
</footer>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/init.js"></script>
<script>
    function langchange(lng) {
        window.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>?lang=' + lng;
    }
</script>
</body>
</html>
