<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Oberfläche ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<!DOCtype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            PHP Taschenrechner
        </title>
        <style type="text/css">
        </style>
    </head>
    
    <body>
        <h1>
            PHP-Taschenrecher
        </h1>
        <h5>
            Bitte beachten Sie, dass dieser Taschenrechner <br>
            zunächst nur 2 Werte miteinander berechnen kann.
        </h5>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Eingabe ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->     
<?php

$Eingabe = "";

if (isset($_GET['key'])) {
    if ($_GET['key'] != "=") {
        $Eingabe = $_GET['Eingabe'] . $_GET['key'];
          
        if (preg_match("/[\*\/]{2}/",$Eingabe)) {
            $Eingabe = substr($Eingabe, 0, -2) . substr($Eingabe, -1);
        } 
          
    }  #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Unterteilung in [Zahl, Operator, Zahl] ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    else {
        if ($_GET['Eingabe'] == "") {
        echo "Sie müssen eine Rechung eingeben um zu rechnen";
        }
        else {
            
    preg_match_all("/([0-9]*)([\+\*\/\-]*)/", $_GET["Eingabe"], $zahlen);    #https://regex101.com/ "/([0-9]*)([\+\*\/\-]*)/   ([0-9]*[\.]*)*([\+\*\/\-]*)"
    $numbersSorted = array();
           
	foreach ($zahlen[1] as $index => $value) {                               #...only from arrays $zahlen[1]&[2]...
         if ($value != '') {
             $numbersSorted[] = $value;
         }
         if ($zahlen[2][$index] != '') {
             $numbersSorted[] = $zahlen[2][$index];
         }
         
    } #end foreach~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Rechenlogik ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            #print_r($zahlen) . "<br>";
      $summe = "";
    $value_1 = $numbersSorted[0];
   $operator = $numbersSorted[1];
    $value_2 = $numbersSorted[2];
        
        switch($operator){                                     
                   case "+":
                       $summe = $value_1 + $value_2;
                       $Eingabe = $summe;
                   break;
                   case "-":
                       $summe = $value_1 - $value_2;
                       $Eingabe = $summe;
                   break;
                   case "*":
                       $summe = $value_1 * $value_2;
                       $Eingabe = $summe;
                   break;
                   case "/":
                       if ($value_2 == 0) {
                           $Eingabe = "ERROR Division by 0!"; }
                       else {
                           $summe = $value_1 / $value_2;
                           $Eingabe = $summe;
                       }
                   break;
                   default:
                       echo "please define an calculation" ."<br/>";    
      }
    }
  } #end else    
} #end isset
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Rechenverlauf ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        if (isset($numbersSorted)) {
            #echo "<br>";
            #print_r($numbersSorted);
            if ($value_2 == 0) {
            }
            else {
                echo $value_1 . "<br>" . $operator . "    " . $value_2 . "<br>" . "__________" . "<br>" . "Summe = " . $summe . "<br>" . "=========";
            }
        } else {
         echo "<br>" . "<br>" . "<br>" . "<br>" . "<br>";
        }
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Oberfläche ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        ?>
        <form method="get">
            <input type = "text"
                   name = "Eingabe"
                   value = <?php echo $Eingabe?> >            
            <br>
            <input type="submit" name="key" value="7">
            <input type="submit" name="key" value="8">
            <input type="submit" name="key" value="9">
            <input type="submit" name="key" value="+">
            <input type="reset" value="C">
            <!-- -->
            <br>
            <input type="submit" name="key" value="4">
            <input type="submit" name="key" value="5">
            <input type="submit" name="key" value="6">
            <input type="submit" name="key" value="-">
            <br>
            <input type="submit" name="key" value="1">
            <input type="submit" name="key" value="2">
            <input type="submit" name="key" value="3">
            <input type="submit" name="key" value="*">
            <!-- -->
            <br>
            <input type="submit" name="key" value="0">
            <input type="submit" name="key" value=".">
            <input type="submit" name="key" value="=">
            <input type="submit" name="key" value="/">
            <!-- -->
            <br>
        </form>
        
    </body>
</html>
