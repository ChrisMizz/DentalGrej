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
    <div id="reg-box" class="container">
    <div id="index-info" class "container">
    <form id="register" action="payHandler.php" method="POST">
        <fieldset>
        <legend>Betaling</legend>
        <div id="regTabel">
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <label for='cardnumber' >Kortnummer (16 cifre)*: </label>
        <input type='text' name='cardnumber' id='cnumber' maxlength="16" value="1231231231231230" disabled/>
        <label for='udløbsdato' >Udløbsdato*:</label>
        <input type='month' name='udløbsdato' class="datepicker"id='uddato' disabled/><br><br>
        <label for='sikkerhedskode' >Sikkerhedskode*:</label>
        <input type='text' name='sikkerhedskode' id='skode' maxlength="3" disabled/>
        <input type='submit' name='Submit' value='Betal' class="btn" />
        </div>
        </fieldset>
        <script>
            $(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
});
            var $input = $('.datepicker').pickadate()
            // Use the picker object directly.
            var picker = $input.pickadate('picker')
            // Using a string along with the parsing format (defaults to `format` option).
            picker.set('select', '2016-04', { format: 'yyyy-mm' })
        </script>
        
    </form>
    </div>
    </div>
</body>
<?php







?>