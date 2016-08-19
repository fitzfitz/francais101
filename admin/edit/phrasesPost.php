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
<title>Phrases Post</title>
<?php include ('../header.php'); ?>
</head>
<body id="admin" class="admin">

<div id="contentCont">
 <div id="content">
 <?php include ('../menu12345.php'); ?>
 
 <?php
 error_reporting(0);
 $idLesson = $_GET['idLesson'];
 $idPhrases = $_GET['idPhrases'];
 $query = mysql_query("SELECT * FROM fr_phrases INNER JOIN fr_lesson_cat ON fr_phrases.id_Lesson = fr_lesson_cat.id_Lesson where fr_phrases.id_Lesson='$idLesson'");
 $query2 = mysql_query("SELECT * FROM fr_lesson_cat where id_Lesson='$idLesson'");
 $query3 = mysql_query("SELECT * FROM fr_phrases INNER JOIN fr_lesson_cat ON fr_phrases.id_Lesson = fr_lesson_cat.id_Lesson where fr_phrases.id_phrases='$idPhrases'");
 $row2 = mysql_fetch_assoc($query2);
 $row3 = mysql_fetch_assoc($query3);
?>

    <table align="center" cellpadding="7" cellspacing="5">
    <tr>
    	<th colspan="4" style="position: relative;">
	    	<form name="phrasesTitleChange" method="POST" action="sqls.php" style="margin: 0; display: block;">
	    		<input type="hidden" name="idPhrases" value="<?php echo $idLesson; ?>"></input>
	    		<input type="text" style="width: 100%; padding: 5px 65px 6px 7px; font-weight: bold;" value="<?php echo $row2['lesson_title']; ?>" name="phraseTitle" />
	    		<button name="phrasesTitleChange" style="position: absolute; top: 0; right: 0; padding: 5.5px;">Change</button>
	    	</form>
    	</th>
    </tr>
	    <td>Id Phrases</td>
	    <td>Phrases Francais</td>
	    <td>Phrases English</td>
	    <td>Operations</td>
    </tr>


<?php
 
 while($row=mysql_fetch_assoc($query))
 {
  ?>
        <tr>
	        <td><?php echo $row['id_phrases']; ?></td>
	        <td><?php echo $row['phrases_fr']; ?></td>
	        <td><?php echo $row['phrases_en']; ?></td>
	  		<td align="center">
	  			<form name="DelPhrasesRow" method="POST" action="sqls.php">
	  				<input type="hidden" name="idPhrases" value="<?php echo $row['id_phrases']; ?>"></input><input type="hidden" name="idLesson" value="<?php echo $row['id_Lesson']; ?>"></input>
	  				<button name="DelPhrasesRow" onclick="return confirm('Are you sure you want to delete  this phrase : <?php echo $row['phrases_fr']; ?> ?')">Del</button>
	  			</form><button onclick="location.href='phrasesPost.php?idLesson=<?php echo $row['id_Lesson']; ?>&idPhrases=<?php echo $row['id_phrases']; ?>'">Edit</button>
	  		</td>
        </tr>
        
        <?php
 }
 ?>
 			<form name="AddNewPhrasesRow" method="POST" action="sqls.php">
 		<tr>
	    	<td><input type="text" name="idPhrases" /></td>
            <td><input type="text" name="phrasesFr" /></td>
	        <td><input type="text" name="phrasesEn" /><input type="hidden" value="<?php echo $idLesson; ?>" name="idLesson"></input></td>
	  		<td align="center"><button name="AddNewPhrasesRow">Add</button></td>
	    </tr>
	  		</form>
 			<form name="EditPhrasesRow" method="POST" action="sqls.php">
	    <tr>
	    	<td><input type="text" name="idPhrases" value="<?php echo $row3['id_phrases']; ?>" /></td>
            <td><input type="text" name="phrasesFr" value="<?php echo $row3['phrases_fr']; ?>" /></td>
	        <td><input type="text" name="phrasesEn" value="<?php echo $row3['phrases_en']; ?>" /><input type="hidden" value="<?php echo $idLesson; ?>" name="idLesson"></input></td>
	  		<td align="center"><button name="EditPhrasesRow">Submit</button></td>
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