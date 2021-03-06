<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <title>Contacto</title>
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body onload="LoadGmaps()">
    <nav class="grey lighten-3" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
                <a href="home.php" class="brand-logo gold-text text-darken-3">Gold Coast Condo</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse gold-text text-darken-3">
                    <i class="mdi-navigation-menu"></i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a class="gold-text text-darken-3" href="home.php">Inicio</a>
                    </li>
                    <li>
                        <a class="gold-text text-darken-3" href="gallery.php">Galería</a>
                    </li>
                    <li
                        ><a class="gold-text text-darken-3" href="contact.php">Contacto</a>
                    </li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a class="gold-text text-darken-3" href="home.php">Inicio</a>
                    </li>
                    <li><a class="gold-text text-darken-3" href="gallery.php">Galería</a>
                    </li>
                    <li><a class="gold-text text-darken-3" href="contact.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <div class="row">
                <div class="col l12 s12 center">
                    <h1>Contacto</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <div class="row">
                <form method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input id="first_name" type="text" class="validate">
                            <label for="first_name">Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="mdi-communication-email prefix"></i>
                            <input id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="mdi-editor-mode-edit prefix"></i>
                            <input id="subject" type="text" class="validate">
                            <label for="subject">Asunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="mdi-editor-mode-edit prefix"></i>
                            <textarea id="message" class="materialize-textarea" rows="80"></textarea>
                            <label for="message">Mensaje</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <button class="btn waves-effect waves-gold gold" type="submit" name="sender2" id="bSummitContact">Enviar
                                <i class="mdi-content-send right"></i>
                            </button>
                            <div id="loading" style="display: none;" class="preloader-wrapper small active">
                                <div class="spinner-layer spinner-yellow-only">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="gap-patch">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="section">
            <div class="row">
                <div class="col s12">
                    <div id="MyGmaps" style="width:100%;height:500px;border:1px solid #CECECE;"></div>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer grey lighten-2">
        <div class="footer-copyright grey darken-4">
            <div class="container">
                &reg; 2015 Copyright <a class="white-text" href="#">IUCoding</a>
            </div>
        </div>
    </footer>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bin/materialize.js"></script>
    <script src="js/toasts.js"></script>
    <script src="js/init.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        function LoadGmaps() {
            var myLatlng = new google.maps.LatLng(12.5996847, -70.0417618);
            var myOptions = {
                zoom: 17,
                center: myLatlng,
                disableDefaultUI: true,
                panControl: true,
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.DEFAULT
                },

                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                },
                streetViewControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById("MyGmaps"), myOptions);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: "Costa Bravo, Aruba"
            });
        }
    </script>
</body>

</html>