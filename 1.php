<?php
$filename = "info.txt";
$fd = fopen ($filename, "r");
$contents = fread ($fd,filesize ($filename));

fclose ($fd);
$delimiter = "\n";
$splitcontents = explode($delimiter, $contents);
$counter = "";
?>
<font color="blue" face="arial" size="4">Complete File Contents</font>
<hr>
<?
echo $contents;
?>

<br><br>
<font color="blue" face="arial" size="4">Split File Contents</font>
<hr>
<?
foreach ( $splitcontents as $color )
{
  $delimiter1 = " ";
  $splitcontents1 = explode($delimiter1, $color);
  foreach ( $splitcontents1 as $colornew )
  {
    $counter = $counter+1;
    echo "<b>Split $counter: </b> $colornew <br>";
  }
}

?>
