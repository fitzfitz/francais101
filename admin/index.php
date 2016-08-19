<?php
session_unset();
session_start();
//error_reporting(0);
?>
<html>
<head>
<title>Admin Page</title>
<?php include ('header.php'); ?>
</head>
<body id="admin">


<?php
   if(isset($_SESSION["user_name"])) {
      echo '<div id="contentCont">';
      include ('menu12345.php');
      echo '<span class="adminWelcome">Welcome admin '.$_SESSION["user_name"].'</span>';
?>
   


</div>



<?php
   }
   else {
?>



<form name="frmUser" method="post" action="login.php" class="loginForm">
<div class="message"></div>
<table border="0" cellpadding="0" cellspacing="20" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Enter Login Details</td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td><input type="text" name="userName"></td>
</tr>
<tr class="tablerow">
<td align="right">Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr class="tablefooter">
<td align="right" colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>

<?php 
   }
?>


</body></html>