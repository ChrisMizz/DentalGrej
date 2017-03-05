<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!--My Css -->
  <link rel="stylesheet" href="Style.css">
  <title>DentalGrej</title>
  <link rel="icon" type="image/png" href="Logo.ico">
</head>
<body>
    <nav>
    <div class="nav-wrapper">
      <img class="brand-logo center" src="Logo.png">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#">Log ind</a></li>
            <li class="active"><a href="Registrer.php">Registrer</a></li>
        </ul>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="Index.html">Startside</a></li>
            <li><a href="Produkter.html">Produkter</a></li>
            <li><a href="#">Kontakt Os</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="Index.html">Startside</a></li>
            <li><a href="Produkter.html">Produkter</a></li>
            <li><a href="#">Log ind</a></li>
            <li class="active"><a href="Registrer.php">Registrer</a></li>
            <li><a href="#">Kontakt Os</a></li>
        </ul>
    </div>
  </nav>
    <div id="reg-box" class="container">
    <div id="index-info" class "container">
    <form id='register' action='register.php' method='post' accept-charset='UTF-8'>
       <fieldset >
            <legend>Opret profil</legend>
            <div id="regTabel">
                <input type='hidden' name='submitted' id='submitted' value='1'/>
                <label for='name' >Fulde navn*: </label>
                <input type='text' name='name' id='name' maxlength="50" />
                <label for='email' >Email addresse*:</label>
                <input type='text' name='email' id='email' maxlength="50" />
                <label for='password' >Adgangskode*:</label>
                <input type='password' name='password' id='password' maxlength="50" />
                <label for='adress' >Adresse*:</label>
                <input type='text' name='adress' id='adress' maxlength="50" />
                <label for='postnummer' >Postnummer*:</label>
                <input type='text' name='billing_postcode' id='billing_postcode' maxlength="4" />
                <label for='By' >By*:</label>
                <input type='text' name='billing_city' id='billing_city' maxlength="50" />
                <input type='submit' name='Submit' value='Opret' class="btn" />
            </div>
        </fieldset>
    </form>
    </div>
    </div>
<?php








?>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="main.js"></script>
</body>
</html>