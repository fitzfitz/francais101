<?php 
  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'francais_db';
  
  $conn = mysql_connect($hostname, $username, $password) or die("Sorry, Failed To Connect to Database!");
  mysql_set_charset('utf8',$conn);
  mysql_select_db($dbname, $conn) or die("No Database Chosen!");
?>