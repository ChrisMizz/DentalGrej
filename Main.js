$(function() {
  // Her har vi gjort så når man trykker på knappen "Om Os" så scroller den der ned
  $('.btn').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html,body').animate({ //Her fra kører den en animation ned til punktet og ikke bare hopper der ned
          scrollTop: target.offset().top
        }, 1400); // Her bestemmer man hastigheden for hvor hurtigt den scroller
        return false;
      }
    }
  });
});

// Her har vi fjernet scrollbaren i højre siden

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) { //Ved at ændre tallet, kan man bestemme hvornår (top knappen) skal komme frem
        document.getElementById("top-btn").style.display = "block";
    } else {
        document.getElementById("top-btn").style.display = "none";
    }
}

// Hvis man trykker på knappen "top" bliver man sendt op til toppen af siden.
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
  /* ******************************************************* */
  //Dette er hvor vi alle ens pakker bliver valgt, og hvor den gemmer dem
var shoppingCart = (function () {
    var cart = [];
    function Item(name, price, count) {
        this.name = name //Dette er navnene på pakkerne
        this.price = price //Dette er prisen fra pakkerne 
        this.count = count //Her samlerer den prisen fra alle valgte pakker
    }
    function saveCart() { //Denne funktion gemmer de valgte pakker i en localStorage
        localStorage.setItem("shoppingCart", JSON.stringify(cart));
    }
    function loadCart() { //Denne funktion viser vej til hvor man kan hente localStorage fra
        cart = JSON.parse(localStorage.getItem("shoppingCart"));
        if (cart === null) {
            cart = []
        }
    }
    loadCart(); //Her henter den de gemte data

    var obj = {};

    obj.addItemToCart = function (name, price, count) {
        for (var i in cart) {
            if (cart[i].name === name) {
                cart[i].count += count;
                saveCart();
                return;
            }
        }

        var item = new Item(name, price, count);
        cart.push(item);
        saveCart();
    };

    obj.setCountForItem = function (name, count) {
        for (var i in cart) {
            if (cart[i].name === name) {
                cart[i].count = count;
                break;
            }
        }
        saveCart();
    };

// Denne funktion gør så man kan fjerne en af sine pakker
    obj.removeItemFromCart = function (name) { 
        for (var i in cart) {
            if (cart[i].name === name) { 
                cart[i].count--; 
                if (cart[i].count === 0) {
                    cart.splice(i, 1);
                }
                break;
            }
        }
        saveCart();
    };

// Denne funktion gør så man kan helt slette de valgte pakker
    obj.removeItemFromCartAll = function (name) { 
        for (var i in cart) { 
            if (cart[i].name === name) {
                cart.splice(i, 1);
                break;
            }
        }
        saveCart();
    };

    obj.countCart = function () { // Denne funktion tæller det antal valgte pakker
        var totalCount = 0;
        for (var i in cart) {
            totalCount += cart[i].count;
        }

        return totalCount;
    };

    obj.totalCart = function () { //Denne funktion finder den total pris på alle valgte pakker
        var totalCost = 0;
        for (var i in cart) {
            totalCost += cart[i].price * cart[i].count; //Her finder den hvor mange pakker er der valgt * prisen fra hver pakke
        }
        return totalCost.toFixed(2);
    };

    obj.listCart = function () { 
        var cartCopy = [];
        for (var i in cart) {
            var item = cart[i];
            var itemCopy = {};
            for (var p in item) {
                itemCopy[p] = item[p];
            }
            itemCopy.total = (item.count).toFixed(2); //Dette gør så inputet viser det antal valgte pakker 
            cartCopy.push(itemCopy);
        }
        return cartCopy;
    };
    return obj;
})();
