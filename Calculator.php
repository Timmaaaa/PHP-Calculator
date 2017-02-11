<?php
#if($_GET){
#   if($_GET["key"] >= 0){                                #if button pressed
#      $Tdisplay = $_GET["Display"] . $_GET["key"];          #combine pressed key with what's currently in the display e.g"10" . "-"
#     echo $_GET["Display"]. " | " .$_GET["key"]. " | " .$Tdisplay;
#}if($_GET["key"] == "="){
#   echo "<br>" . "rechne..";
#  preg_match_all("/([0-9]{1,})([\+|\-])*/", $_GET["Display"], $zahlen);
# #Uses regular expressions to get whole numbers and operators...
#$numbersSorted = array();
#        foreach ($zahlen[1] as $index => $value) {          #...only from arrays $zahlen[1]&[2]...
#           $numbersSorted[] = $value;
#          if ($zahlen[2][$index] != '') {
#             $numbersSorted[] = $zahlen[2][$index];
#        }
#   }
#  $summe = 0;
# for ($i=0; $i < count($numbersSorted); $i++) {     #...and sorts it in order to $numbersSorted.
#    if ($i == 0) {
#       $summe = $numbersSorted[$i];
#  }
# $operator = $numbersSorted[$i + 1];
#$operand = $numbersSorted[$i + 2 ];
#            echo "<br/> " . $i . " --> " . $summe . " " . $operator . " " . $operand;
#           if ($operator == '+') {
#              $summe = $summe + $operand;
#         } else {
#            $summe = $summe - $operand;
#       }
#      #if($i != ""){
#     $i++;
#    #}
#}
#       echo "<br/> SUMME --> " . $summe;
#      echo "<br/>---------------<pre>";  
#     print_r($zahlen);
#    echo "<br/>--------------------";
#   print_r($numbersSorted);
#  echo "</pre>-------------------";
#    };}
#print "<br>";
#if (isset($_GET){print_r($_GET)};
?>

<?php


#echo "<br/>---------------<pre>";
#if (isset($_GET)){print_r($_GET)};
#echo "</pre>-------------------";



$Display = "";

if (isset($_GET['key'])) {
     if ($_GET['key'] != "=") {
         $Display = $_GET['Display'] . $_GET['key'];
     }
     else {                                             #Logic
         preg_match_all("/([0-9]*)([\+\*\/\-]*)/", $_GET["Display"], $zahlen);    #Uses regular expressions to get whole numbers and operators...
         $numbersSorted = array();
         foreach ($zahlen[1] as $index => $value) {          #...only from arrays $zahlen[1]&[2]...
             $numbersSorted[] = $value;
             if ($zahlen[2][$index] != '') {
                 $numbersSorted[] = $zahlen[2][$index];
             }
         }
         print_r($numbersSorted);
         $needle = array("*","/");
         $value_1 = 0;
<?php
 #if($_GET){
 #   if($_GET["key"] >= 0){                                #if button pressed 
 #      $Tdisplay = $_GET["Display"] . $_GET["key"];          #combine pressed key with what's currently in the display e.g"10" . "-"
 #     echo $_GET["Display"]. " | " .$_GET["key"]. " | " .$Tdisplay;
#}if($_GET["key"] == "="){
 #   echo "<br>" . "rechne..";
 #  preg_match_all("/([0-9]{1,})([\+|\-])*/", $_GET["Display"], $zahlen);
 # #Uses regular expressions to get whole numbers and operators...
 #$numbersSorted = array();
 #        foreach ($zahlen[1] as $index => $value) {          #...only from arrays $zahlen[1]&[2]...
 #           $numbersSorted[] = $value;
 #          if ($zahlen[2][$index] != '') {
 #             $numbersSorted[] = $zahlen[2][$index];
 #        }
 #   }
 #  $summe = 0;
 # for ($i=0; $i < count($numbersSorted); $i++) {     #...and sorts it in order to $numbersSorted.
 #    if ($i == 0) {
 #       $summe = $numbersSorted[$i];
 #  }
 # $operator = $numbersSorted[$i + 1];
 #$operand = $numbersSorted[$i + 2 ];
 #            echo "<br/> " . $i . " --> " . $summe . " " . $operator . " " . $operand;
 #           if ($operator == '+') {
 #              $summe = $summe + $operand;
 #         } else {
 #            $summe = $summe - $operand;
 #       }
 #      #if($i != ""){
 #     $i++;
 #    #}
 #}
 #       echo "<br/> SUMME --> " . $summe;
 #      echo "<br/>---------------<pre>";  
 #     print_r($zahlen);
 #    echo "<br/>--------------------";
 #   print_r($numbersSorted);
 #  echo "</pre>-------------------";
 #    };}
 #print "<br>";
 #if (isset($_GET){print_r($_GET)};
 #echo "<br/>---------------<pre>";
 #if (isset($_GET)){print_r($_GET)};
 #echo "</pre>-------------------";
 
 $Display = "";
 if (isset($_GET['key'])) {
      if ($_GET['key'] != "=") {
          $Display = $_GET['Display'] . $_GET['key'];
      }
      else {                                             #Logic
          preg_match_all("/([0-9]*)([\+\*\/\-]*)/", $_GET["Display"], $zahlen);    #Uses regular expressions to get whole numbers and operators...
          $numbersSorted = array();
          foreach ($zahlen[1] as $index => $value) {          #...only from arrays $zahlen[1]&[2]...
              if ($value != '') {
                  $numbersSorted[] = $value;
              }
              if ($zahlen[2][$index] != '') {
                  $numbersSorted[] = $zahlen[2][$index];
              }
          }
          print_r($numbersSorted);
          $needle = "*";
          $value_1 = 0;
          $value_2 = 0;
          $operator = "";
          for ($i=0; isset($numbersSorted[$i+2]) == true; $i++) {     #...and sorts it in order to $numbersSorted.
              if (array_search($needle, $numbersSorted) != false){
                  $value_1 = $numbersSorted[array_search($needle, $numbersSorted)-1];
                  $operator= $numbersSorted[array_search($needle, $numbersSorted)];
                  $value_2 = $numbersSorted[array_search($needle, $numbersSorted)+1];
              }
              elseif ($i == 0) {
                  $value_1 = $numbersSorted[$i];
              }
              if (isset($numbersSorted[$i+2])) {
                  $operator = $numbersSorted[$i + 1];
                  $value_2 = $numbersSorted[$i + 2];
              }
              echo "<br>" . "rechne.." . "<br>" ;
              echo "<br> " . $i . " --> " . $value_1 . " " . $operator . " " . $value_2 . "<br/>";
              switch($operator){
                  case "+":
                      $value_1 = $value_1 + $value_2;
                  break;
                  case "-":
                      $value_1 = $value_1 - $value_2;
                  break;
                  case "*":
                      $value_1 = $value_1 * $value_2;
                  break;
                  case "/":
                      $value_1 = $value_1 / $value_2;
                  break;
              }
              #if($i != ""){
              $i++;
              #}
          }
          $Display = $value_1;
      }
 }

 ?>
 <!DOCTYPE html>
 <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>
          PHP Calculator
      </title>
      <style type="text/css">
      </style>
 </head>
 <body>
      <?php # https://regex101.com/ ([0-9]+)([\+|\-]*)?>
      <form method="get">
          <input type="text"
          name="Display"
          value=
          <?php echo $Display?> >
          <br>
          <input type="submit" name="key" value="7">
          <input type="submit" name="key" value="8">
          <input type="submit" name="key" value="9">
          <input type="submit" name="key" value="+">
          <button type="reset">C</button>
          <!--this button doesn't work somehow pls help -->
          <br>
          <input type="submit" name="key" value="4">
          <input type="submit" name="key" value="5">
          <input type="submit" name="key" value="6">
          <input type="submit" name="key" value="-">
          <br>
          <input type="submit" name="key" value="1">
          <input type="submit" name="key" value="2">
          <input type="submit" name="key" value="3">
          <input type="submit" name="key" value="*"> <!-- I want to do the core before the multiplication logic -->
          <br>
          <input type="submit" name="key" value="0">
          <input type="submit" name="key" value=",">
          <input type="submit" name="key" value="=">
          <input type="submit" name="key" value="/"> <!-- -->
          <br>
      </form>
 </body>
 </html> 
         <input type="submit" name="key" value="7">
         <input type="submit" name="key" value="8">
         <input type="submit" name="key" value="9">
         <input type="submit" name="key" value="+">
         <button type="reset">C</button>
         <!--this button doesn't work somehow pls help -->
         <br>
         <input type="submit" name="key" value="4">
         <input type="submit" name="key" value="5">
         <input type="submit" name="key" value="6">
         <input type="submit" name="key" value="-">
         <br>
         <input type="submit" name="key" value="1">
         <input type="submit" name="key" value="2">
         <input type="submit" name="key" value="3">
         <input type="submit" name="key" value="*"> <!-- I want to do the core before the multiplication logic -->
         <br>
         <input type="submit" name="key" value="0">
         <input type="submit" name="key" value=",">
         <input type="submit" name="key" value="=">
         <input type="submit" name="key" value="/"> <!-- -->
         <br>
     </form>
</body>
</html>
