<?php
session_start();
$out = array();
$value = "chat.py ".$_GET['msg'];
$command = escapeshellcmd($value);
$output = exec($command,$out,$result);
$a=0;
foreach($out as $line) {	
    if($a!=0){	
 echo $line."\n <br>";}
 $a=1;		 
}
?>