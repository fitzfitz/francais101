<?php
session_unset();
session_start();
//error_reporting(0);
?>
<?php
if(isset($_SESSION["user_name"])) {
?>



<?php
	include ('../../config/db.config.php');
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Phrass</title>
<?php include ('../header.php'); ?>
</head>
<body id="admin" class="admin">

<div id="contentCont">
 <div id="content">
 <?php include ('../menu12345.php'); ?>
    <table align="center" cellpadding="7" cellspacing="5">
    <tr>
    	<th colspan="5">Phrass</th>
    </tr>
	    <td>Id Lesson</td>
	    <td>Category</td>
	    <td>Phrass Title</td>
	    <td>Operations</td>
    </tr>
 
 
 <?php
 $query = mysql_query("SELECT * FROM fr_lesson_cat INNER JOIN fr_category ON fr_lesson_cat.id_cat = fr_category.id_cat where fr_category.id_cat='CAT003'");
 $query2 = mysql_query("SELECT * FROM fr_lesson_cat INNER JOIN fr_category ON fr_lesson_cat.id_cat = fr_category.id_cat where fr_category.id_cat='CAT003'");
 $row2 = mysql_fetch_assoc($query2);
 
 while($row=mysql_fetch_assoc($query))
 {
  ?>
        <tr>
	        <td><?php echo $row['id_Lesson']; ?></td>
	        <td><?php echo $row['cat_name']; ?></td>
	        <td><?php echo $row['lesson_title']; ?></td>
	  		<td align="center">
	  			<form name="DelPhrases" method="POST" action="sqls.php">
	  				<input type="hidden" name="idLesson" value="<?php echo $row['id_Lesson']; ?>"></input>
	  				<button name="DelPhrasesCat" onclick="return confirm('Are you sure you want to delete <?php echo $row['lesson_title']; ?> ?')">Del</button>
	  			</form><button onclick="location.href='phrasesPost.php?idLesson=<?php echo $row['id_Lesson']; ?>'">Manage</button>
	  		</td>
        </tr>
        
        <?php
 }
 ?>
 			<form name="AddNewPhrases" method="POST" action="sqls.php">
 		<tr>
	    	<td><input type="text" name="idLesson"></input></td>
	        <td><input type="hidden" name="idCat" value="<?php echo $row2['id_cat']; ?>"></input><?php echo $row2['cat_name']; ?></td>
	        <td><input type="text" name="Lesson_title"></input></td>
	  		<td align="center"><button name="AddNewPhrases">Add</button></td>
	    </tr>
	  		</form>
    </table>
    </div>
</div>
</body>
</html>




<?php
}
else {
	header("Location: ../index.php");
	die();
}
?>