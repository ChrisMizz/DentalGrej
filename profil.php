<?php
session_start();

//Tjekker om brugeren er logget ind, hvis de ikke er logget ind, så bliver de send til forsiden
if(isset($_SESSION["loggedIn"])) {
  //echo "Det virker";
}

else {
  //Vi havde problemer med at logge ind, derfor kunne vi kke sætte en session
  //derfor er vi nød til at kommenterer nedenstående kode ud

  //header("location: index.html");
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
  <title>DentalGrej</title>
  <link rel="icon" type="image/png" href="Logo.ico">
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="main.js"></script>
  <!-- Latest compiled and minified CSS -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
  <nav class="Produkt-nav">
    <div class="nav-wrapper">
      <img class="brand-logo center" src="Logo.png">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="logout.php">Log ud</a></li>
        </ul>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li><a href="Index.html">Startside</a></li>
          <li><a href="Produkter.html">Produkter</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="Index.html">Startside</a></li>
          <li><a href="Produkter.html">Produkter</a></li>
          <li><a href="logout.php">Log ud</a></li>
        </ul>
    </div>
  </nav>
<button onclick="topFunction()" id="top-btn" title="Go to top">&#x21E7 Top</button>
<form id="formSubmit" class="myForm" action="registrer.php">
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
</form>
  </body>
</html>
