<?php
session_start();
$message="";
if(count($_POST)>0) {
include ('../config/db.config.php');
$result = mysql_query("SELECT * FROM fr_admin WHERE login_name='" . $_POST["userName"] . "' and key_login = '". $_POST["password"]."'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["user_id"] = $row[id_admin];
$_SESSION["user_name"] = $row[login_name];
} else {
$message = "Invalid Username or Password!";
header("Location:index.php");
}
}
if(isset($_SESSION["user_id"])) {
header("Location:index.php");
}
?>