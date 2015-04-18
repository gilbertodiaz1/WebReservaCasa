<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Bienvenidos</title>
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }
    main {
      flex: 1 0 auto;
    }
  </style>
</head>
<body>
 <nav class="grey lighten-3" role="navigation">
  <div class="container">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo gold-text text-darken-3">Gold Coast Condo</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse gold-text text-darken-3"><i class="mdi-navigation-menu"></i></a>
      <ul class="right hide-on-med-and-down">
        <li><a class="gold-text text-darken-3" href="index.php">Home</a></li>
        <li><a class="gold-text text-darken-3" href="gallery.html">Galery</a></li>
        <li><a class="gold-text text-darken-3" href="contact.php">Contact</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a class="gold-text text-darken-3" href="index.php">Home</a></li>
        <li><a class="gold-text text-darken-3" href="gallery.html">Galery</a></li>
        <li><a class="gold-text text-darken-3" href="contact.php">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
 <div class="slider slider-600">
  <ul class="slides slides-600">
    <li>
      <img src="images/IMG_7295.JPG"> <!-- random image -->
      <!-- <div class="caption center-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div> -->
    </li>
    <li>
      <img src="images/IMG_7304.JPG"> <!-- random image -->
      <!-- <div class="caption center-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div> -->
    </li>
    <li>
      <img src="images/IMG_7298.JPG"> <!-- random image -->
      <!-- <div class="caption center-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div> -->
    </li>
    <li>
      <img src="images/IMG_7314.JPG"> <!-- random image -->
     <!--  <div class="caption center-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div> -->
    </li>
    <li>
      <img src="images/IMG_7312.JPG"> <!-- random image -->
      <!-- <div class="caption center-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div> -->
    </li>
  </ul>
</div>
</div>
<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12 l7 justify-align">
        <div class="icon-block">
          <h2 class="center light-amber-text"></h2>
          <h3>Description</h3>
          <p class="justify">This beautiful and privately owned Town House at Gold Coast offers 2 Bedrooms and 3 bathrooms, each with their own closets, a Full kitchen, laundry facilities, a nice living room and dining area all with Air Conditioning and tastefully decorated expressing a elegant and modern atmosphere. More over there is a private sitting area in the enclosed garden.
          </p>
          <p class="justify">
            Cable TV, wireless internet, coffee and tea making facility and more are included making this a very comfortable town house overlooking one of the swimming pools. This beautiful accommodation is located within a secure and gated community which includes 2 swimming pools, barbecue grill and showers. The spacious townhouses have a fully equipped kitchen and private parking and is only 3 minutes away from Aruba's most beautiful beaches, including Boca Catalina, great for snorkelling,  Arashi Beach and Palm Beach. Numerous restaurants and island activities are located on a 5 minutes drive.
          </p>

          <p class="justify">
            <h5>Rates</h5>
            Weekly rate low season April 16 - December 15:US$ 995,-
            Weekly rate high season December 16 - April 28:US$ 1195,- 
          </p>
          <p class="justify">
            During your stay the use of water and electricity is included for the amount of US$ 125,- per week.
            Final cleaning costs are US$ 125,- and the security deposit is US$ 400,-
          </p>
          <p class="justify">
            Between December 16th 2014 and Januari 2nd 2015 we apply a minimum stay of 2 weeks
            During Holiday Season a surcharge of US$ 200,- per week is applicable. 
          </p>
          <p class="justify">
            <h5>Holiday season</h5>
            Christmas 16th of December 2014 until 4th of January 2015
            Carnival 8th of February until 22nd of February 2015
            Easter March 29th until 12th of April 2015

            A tourist information package will be provided upon arrival!</p>
          </div>
        </div>
        <div class="col s12 l5">
          <div class="row center">
            <h4>Enquiry Form</h4>
          </div>
          <div class="row">
            <form method="post">
              <div class="row">
                <div class="input-field col s12">
                  <i class="mdi-action-account-circle prefix"></i>
                  <input id="first_name" type="text" class="validate" name="first_name">
                  <label for="first_name">Name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="mdi-communication-email prefix"></i>
                  <input id="email" type="email" class="validate" name="email">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s8">
                  <i class="mdi-communication-call prefix"></i>
                  <input id="phone" type="text" class="validate" name="phone">
                  <label for="phone">Phone</label>
                </div>
                <div class="input-field col s4">
                  <select id="people" name="people" class="browser-default">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
              </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <i class="mdi-notification-event-available prefix"></i>
                  <input name="checkin" id="checkin" type="text" class="datepicker picker__input" readonly="" tabindex="-1" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="birthdate_root">
                  <label for="checkin">CheckIn</label>
                </div>
                 <div class="input-field col s6">
                  <i class="mdi-notification-event-available prefix"></i>
                  <input name="checkout" id="checkout" type="text" class="datepicker picker__input" readonly="" tabindex="-1" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="birthdate_root">
                  <label for="checkout">CheckOut</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <button class="btn waves-effect waves-gold gold" type="submit" name="sender" id="bSummit">Submit
                  <i class="mdi-content-send right"></i>
                  </button>
                  <div id="loading" style="display: none;" class="preloader-wrapper small active">
                    <div class="spinner-layer spinner-yellow-only">
                      <div class="circle-clipper left">
                        <div class="circle"></div>
                      </div><div class="gap-patch">
                        <div class="circle"></div>
                      </div><div class="circle-clipper right">
                        <div class="circle"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
    <h3>Carateristicas</h3>
    <br>
      <div class="row">
        <div class="col s12 m3">
          <div class="center promo">
            <i class="medium mdi-maps-my-location"></i>
            <h5 class="promo-caption">Ubicacion</h5>
            <ul class="">
              <li>País: Aruba</li>
              <li>Zona residencial: Gold Coast</li>
              <li>Casa: Diamante 63</li>
          </ul>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="center promo">
            <i class="medium mdi-action-home"></i>
            <h5 class="promo-caption">Casa Townhouse</h5>
            <p>Townhouses de dos pisos con dos cuartos, tres baños, sala, cocina, comedor, lavanderia y patio.</p>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="center promo">
            <i class="medium mdi-maps-local-hotel"></i>
            <h5 class="promo-caption">Comodidades</h5>
            <ul class="">
              <li>Aire Acondicionado.</li>
              <li>Utencilios de cocina.</li>
              <li>Toallas</li>
              <li>Almohadas, sabanas y cobertores.</li>
              <li>Internet</li>
              <li>Tv por Cable</li>
            </ul>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="center promo">
            <i class="medium mdi-maps-local-attraction"></i>
            <h5 class="promo-caption">Disfrute</h5>
            <p>Pisina principal y parrilleras principales dentro del mismo Conjunto Residencial.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col s12 m3">
          <div class="center promo">
            <i class="medium mdi-notification-dnd-forwardslash"></i>
            <h5 class="promo-caption">Prohibido fumar dentro de la casa.</h5>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="center promo">
            <i class="medium mdi-social-group"></i>
            <h5 class="promo-caption">Maximo 5 Personas</h5>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="center promo">
            <i class="medium mdi-maps-local-grocery-store"></i>
            <h5 class="promo-caption">Formas de pago</h5>
            <ul class="">
              <li>Transferencia.</li>
              <li>PayPal.</li>
              <li>Tarjeta de credito.</li>
            </ul>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="center promo">
            <i class="medium mdi-maps-store-mall-directory"></i>
            <h5 class="promo-caption">Datos Adicionales</h5>
            <ul>
              <li>Playa a 5 minutos en carro y 12-15 minutos a pie.</li>
              <li>Cerca de las zonas hoteleras, restaurantes, centro de compras y clubs nocturnos.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="page-footer grey lighten-2">
    <!-- <div class="container">
      <div class="row">
        <div class="col l9 s12">
          <h5 class="gold-text text-darken-3">Lorem ipsum.</h5>
          <p class="gold-text text-darken-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor cupiditate fuga laboriosam saepe aperiam officia libero eos ducimus, accusantium blanditiis recusandae nihil corporis sint quo, voluptas quam, obcaecati modi illo.</p>
        </div>
        <div class="col l3 s12">
          <h5 class="gold-text text-darken-3">Connect</h5>
          <ul>
            <li><a class="gold-text text-darken-3" href="#!">Link 1</a></li>
            <li><a class="gold-text text-darken-3" href="#!">Link 2</a></li>
            <li><a class="gold-text text-darken-3" href="#!">Link 3</a></li>
            <li><a class="gold-text text-darken-3" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div> -->
    <div class="footer-copyright grey darken-4">
     <div class="container">
       © 2015 Copyright <a class="white-text" href="#">IUCoding</a>
     </div>
   </div>
 </footer>

 <script src="js/jquery-1.11.1.min.js"></script>
 <script src="js/bin/materialize.js"></script>
 <script src="js/toasts.js"></script>
<script src="js/init.js"></script>
</body>
</html>
