<?php 
  $hostname = 'sql310.byethost8.com';
  $username = 'b8_17013636';
  $password = 'fitzgeral125';
  $dbname = 'b8_17013636_francais_db';
  
  $conn = mysql_connect($hostname, $username, $password) or die("Sorry, Failed To Connect to Database!");
  mysql_set_charset('utf8',$conn);
  mysql_select_db($dbname, $conn) or die("No Database Chosen!");
?>