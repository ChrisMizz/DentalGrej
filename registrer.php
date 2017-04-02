<?php
    session_start();
    require_once 'connect_db.php';

    $name = mysqli_real_escape_string($_POST["name"]);
    $email = mysqli_real_escape_string($_POST["email"]);
    $password = mysqli_real_escape_string($_POST["password"]);
    $adress = mysqli_real_escape_string($_POST["adress"]);
    $billing_postcode = mysqli_real_escape_string($_POST["billing_postcode"]);
    $billing_city = mysqli_real_escape_string($_POST["billing_city"]);
   
    $sql = "INSERT INTO Bruger (`Navn`, `Email`, `Adgangskode`, `Adresse`, `Postnummer`, `By`)
    VALUES ('" . $name . "','" . $email . "','" . $password . "','" . $adress . "','" . $billing_postcode . "','" . $billing_city . "')";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: regHandler.php');
        //echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
    } else {
        echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
    }
?>
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
    <title>DentalGrej - Registrer</title>
    <link rel="icon" type="image/png" href="Logo.ico">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="Main.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <nav>
    <div class="nav-wrapper">
      <img class="brand-logo center" src="Logo.png">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="login.php">Log ind</a></li>
        </ul>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="Index.html">Startside</a></li>
            <li><a href="Produkter.html">Produkter</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="Index.html">Startside</a></li>
            <li><a href="Produkter.html">Produkter</a></li>
            <li><a href="login.php">Log ind</a></li>
        </ul>
    </div>
  </nav>
 
<!--
Her starter vi en FORM
//-->
 
  <div id="reg-box" class="container">
    <div id="index-info" class "container">
    <form id='register' method='post'>
<div>
    <p>Din(e) valgte pakke(r)</p>
    <ul id="show-cart">
    <li>???????</li>
    </ul>
    <div>Antal valgte pakker <span id="count-cart">X</span></div>
    <div>Beløb: <span id="total-cart"></span>DKK</div>
</div>
    <script>
$(".add-to-cart").click(function(event){
		event.preventDefault();
		var name = $(this).attr("data-name");
		var price = Number($(this).attr("data-price"));

		shoppingCart.addItemToCart(name, price, 1);
		displayCart();
});

$("#clear-cart").click(function(event){
		shoppingCart.clearCart();
		displayCart();
});

function displayCart() {
		var cartArray = shoppingCart.listCart();
		console.log(cartArray);
		var output = "";
			for (var i in cartArray) {
				output += "<li>"
					+cartArray[i].name
                    +" <input disabled class='item-count' data-name='"
                    +cartArray[i].name
                    +"' value='"+cartArray[i].count+"' >"
					+"</li>";
			}
		$("#show-cart").html(output);
		$("#count-cart").html( shoppingCart.countCart() );
		$("#total-cart").html( shoppingCart.totalCart() );
}

$("#show-cart").on("click", ".delete-item", function(event){
		var name = $(this).attr("data-name");
		shoppingCart.removeItemFromCartAll(name);
		displayCart();
});

$("#show-cart").on("click", ".subtract-item", function(event){
		var name = $(this).attr("data-name");
		shoppingCart.removeItemFromCart(name);
		displayCart();
});

$("#show-cart").on("click", ".plus-item", function(event){
		var name = $(this).attr("data-name");
		shoppingCart.addItemToCart(name, 0, 1);
		displayCart();
});

$("#show-cart").on("change", ".item-count", function(event){
		var name = $(this).attr("data-name");
		var count = Number($(this).val());
		shoppingCart.setCountForItem(name, count);
		displayCart();
});

displayCart();

$("#formSubmit").submit(function(){
	if ($('.item-count').val() >= 1) {
		return true;
	}
	else {
		alert('Du skal vælge mindst en pakke')
		return false;
		}
})
</script>
       <fieldset>
            <legend>Opret profil</legend>
            <div id="regTabel">
                <input type='hidden' name='submitted' id='submitted' value='1'/>
                <label for='name' >Fulde navn*: </label>
                <input type='text' name='name' id='name' maxlength="50" required/>
                <label for='email' data-error="wrong" data-success="right">Email addresse*:</label>
                <input type='email' name='email' id='email' maxlength="50" class="validate" required/>
                <label for='password' >Adgangskode*:</label>
                <input type='password' name='password' id='password' maxlength="50" required/>
                <label for='adress' >Adresse*:</label>
                <input type='text' name='adress' id='adress' maxlength="50" required/>
                <label for='postnummer' >Postnummer*:</label>
                <input type='text' name='billing_postcode' id='billing_postcode' maxlength="4" required/>
                <label for='By' >By*:</label>
                <input type='text' name='billing_city' id='billing_city' maxlength="50" required/>
                <input type='submit' name='Submit' value='Opret' class="btn" />
            </div>
        </fieldset>
    </form>
    </div>
    </div>
</body>
</html>