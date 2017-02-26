<?php

$Display = "";

 if (isset($_GET['key'])) {
       if ($_GET['key'] != "=") {
           $Display = $_GET['Display'] . $_GET['key'];
       }
	   else {                                             #Logic
           preg_match_all("/([0-9]*)([\+\*\/\-]*)/", $_GET["Display"], $zahlen);    #Uses regular expressions to get whole numbers and operators...     https://regex101.com/ "/([0-9]*)([\+\*\/\-]*)/"
           $numbersSorted = array();
           
		   foreach ($zahlen[1] as $index => $value) {                   #...only from arrays $zahlen[1]&[2]...
               if ($value != '') {
                   $numbersSorted[] = $value;
               }
               if ($zahlen[2][$index] != '') {
                   $numbersSorted[] = $zahlen[2][$index];
               }
           }
           print_r($numbersSorted);                                     #...and sorts it in order to $numbersSorted.
           
           
           $multiplicaion = "*";
           $division      = "/";
           $value_1  = 0 ;
           $value_2  = 0 ;
           $operator = "";
           
           
           for ($i = 0; isset($numbersSorted[$i+1]) == true; $i++) {   # multiplication logic
            
               if (array_search($multiplicaion, $numbersSorted) != false){
                   $value_1  = $numbersSorted[array_search($multiplicaion, $numbersSorted)-1];
                   $operator = $numbersSorted[array_search($multiplicaion, $numbersSorted)  ];
                   $value_2  = $numbersSorted[array_search($multiplicaion, $numbersSorted)+1];
                                     
               }
               else {
                   if(isset($numbersSorted[$i - 1])) {
                   $value_1  = $numbersSorted[$i - 1];
                       echo $numbersSorted[$i];
                   $operator = $numbersSorted[$i];
                   }
               }    
                                                                       #visual feedback
               echo "<br>" . "rechne..";
               echo "<br>" . $i ." --> ". $value_1 ." ". $operator ." ". $value_2 ."<br/>";
               
               switch($operator){                                      #calculation
                   case "+":
                       $value_1 = $value_1 + $value_2;
                   break;
                   case "-":
                       $value_1 = $value_1 - $value_2;
                   break;
                   case "*":
                       $value_1 = $value_1 * $value_2;
                       $numbersSorted[array_search($multiplicaion, $numbersSorted)-1] = $value_1;
                       $value_2  = $value_1;
                   
                       unset($numbersSorted[array_search($multiplicaion, $numbersSorted)]  );
                       unset($numbersSorted[array_search($multiplicaion, $numbersSorted)+1]);
                   break;
                   case "/":
                       $value_1 = $value_1 / $value_2;
                   break;
                    default:
                       echo "dedicated \$i is not an operator" ."<br/>";
               }
               echo $value_1 ."<br/>";
               
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
           <input type="reset" value="C">
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
           <input type="submit" name="key" value="*"> <!-- -->
           <br>
           <input type="submit" name="key" value="0">
           <input type="submit" name="key" value=",">
           <input type="submit" name="key" value="=">
           <input type="submit" name="key" value="/"> <!-- -->
           <br>
       </form>
  </body>
  </html>
