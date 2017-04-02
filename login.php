<?php
session_start();
if(isset($_SESSION["loggedIn"])) {
  header("location: profil.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--My Css -->
    <link rel="stylesheet" href="Style.css">
    <title>DentalGrej - Login</title>
    <link rel="icon" type="image/png" href="Logo.ico">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="main.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <nav>
    <div class="nav-wrapper">
      <img class="brand-logo center" src="Logo.png">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li class="active"><a href="login.php">Log ind</a></li>
        </ul>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="Index.html">Startside</a></li>
            <li><a href="Produkter.html">Produkter</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="Index.html">Startside</a></li>
            <li><a href="Produkter.html">Produkter</a></li>
            <li class="active"><a href="login.php">Log ind</a></li>
        </ul>
    </div>
  </nav>
    <div id="login-box" class="container">
    <div id="index-info" class "container">
    <form id='login' method='post' accept-charset='UTF-8'>
       <fieldset>
            <legend>Log ind</legend>
            <div id="loginTabel">
                <input type='hidden' name='submitted' id='submitted' value='1'/>
                <label for='email' data-error="wrong" data-success="right">Email addresse*:</label>
                <input type='email' name='email' id='email' maxlength="50" class="validate"/>
                <label for='password' >Adgangskode*:</label>
                <input type='password' name='password' id='password' maxlength="50" />
                <input type='submit' name='Submit' value='Log ind' class="btn" />
            </div>
        </fieldset>
    </form>
    </div>
    </div>
<?php
require_once 'connect_db.php';



$email = mysqli_real_escape_string($_POST['email']);
$password = mysqli_real_escape_string($_POST['password']);



$dbUserInfo = "SELECT Adgangskode FROM Bruger WHERE Email='$email' AND Adgangskode='$password'";


$tjek = mysqli_query($conn, $dbUserInfo);
$rows = mysqli_num_rows($tjek);

if ($rows == 1) {

    $_SESSION["loggedIn"] = $email; 
    header("Location: profil.php");
    exit;
}else {

echo "Der opstod en fejl";

}




?>
</body>
</html>