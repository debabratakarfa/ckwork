<?php
$filename = "info.txt";
$handle = fopen($filename, "r"); 
$read = file_get_contents($filename); //read
$lines = explode("\n", $read);//get
$i= 1;
foreach($lines as $key => $value){
  $cols[$i] = explode("\t", $value);
  $i++;
}
echo "<pre>";
print_r($cols); //explore results
echo "</pre>";
?>
