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
<title>Idioms</title>
<?php include ('../header.php'); ?>
</head>
<body id="admin" class="admin">

<div id="contentCont">
 <div id="content">
 <?php include ('../menu12345.php'); ?>
    <table align="center" cellpadding="7" cellspacing="5">
    <tr>
    	<th colspan="5">
    		<?php 
    			$alphas = range('a', 'z');
            
	            echo '<div style="margin: 15px 0;">';
	            foreach($alphas as $value){
	                echo '<a style="padding: 0 5px; text-transform: uppercase;" href=?letter='.$value.' class="alpPag">'.$value.'</a>';
	            }
	            echo '</div>';
    		?>
    	</th>
    </tr>
    <tr>
    	<th colspan="5">Idioms</th>
    </tr>
	    <td>Id</td>
	    <td>Idiom</td>
	    <td>Meaning</td>
	    <td>Type</td>
	    <td>Operation</td>
    </tr>
 
 
 <?php
 error_reporting(0);
 $letter = $_GET['letter'];
 $query = mysql_query("SELECT * FROM fr_sentences where sentences_type = 'idiom' AND sentences LIKE '$letter%'");
 $query2 = mysql_query("SELECT * FROM fr_sentences where sentences_type = 'idiom'");
 $row2 = mysql_fetch_assoc($query2);
 ?>
 			<form name="AddNewSentences" method="POST" action="sqls.php">
 		<tr>
	    	<td><input type="text" name="idSentences"></input><input type="hidden" name="letter" value="<?php echo $letter; ?>"></input></td>
	    	<td><input type="text" name="Sentences"></input></td>
	        <td><input type="text" name="SentencesMeaning"></input></td>
	        <td><select name="SentencesType"> <?php echo'<option value="'.$row2["sentences_type"].'" selected>'.$row2["sentences_type"].'</option>'; ?></select></td>
	  		<td align="center"><button name="AddNewSentences">Add</button></td>
	    </tr>
	  		</form>
<?php
 while($row=mysql_fetch_assoc($query))
 {
  ?>
        <tr>
	        <td><?php echo $row['id_sentences']; ?></td>
	        <td><?php echo $row['sentences']; ?></td>
	        <td><?php echo $row['sentences_mean']; ?></td>
	        <td><?php echo $row['sentences_type']; ?></td>
	  		<td align="center">
	  			<form name="DelSentences" method="POST" action="sqls.php">
	  				<input type="hidden" name="idSentences" value="<?php echo $row['id_sentences']; ?>"></input><input type="hidden" name="letter" value="<?php echo $letter; ?>"></input>
	  				<button name="DelSentences" onclick="return confirm('Are you sure you want to delete <?php echo $row['sentences']; ?> ?')">Del</button>
	  			</form><button onclick="location.href='idioms.php?letter=<?php echo $letter; ?>&idSentences=<?php echo $row['id_sentences']; ?>#editPopUp'">Edit</button>
	  		</td>
        </tr>
        
        <?php
 }
 ?>
    </table>
    </div>
</div>

</body>
</html>

<div id="editPopUp" class="editPopUp">
	<?php 
		$idSentences = $_GET['idSentences'];
		$query3 = mysql_query("SELECT * FROM fr_sentences where id_sentences = '$idSentences'");
		$row3 = mysql_fetch_assoc($query3);
	?>
	<div><a href="#close" title="Close" class="close">X</a>
	<span style="display: block; text-align: center; font-weight: bold; padding: 10px 0;">Edit - <?php echo $row3['sentences']; ?></span>
		<form name="EditSentences" method="POST" action="sqls.php">
			<input type="hidden" name="letter" value="<?php echo $letter; ?>"></input>
			<input type="text" name="idSentences" value="<?php echo $idSentences; ?>"></input>
		    <input type="text" name="Sentences" value="<?php echo $row3['sentences']; ?>"></input>
		    <input type="text" name="SentencesMeaning" value="<?php echo $row3['sentences_mean']; ?>"></input>
		    <select name="SentencesType"> <?php echo'<option value="'.$row3["sentences_type"].'" selected>'.$row3["sentences_type"].'</option>'; ?></select>
		  	<button name="EditSentences">SUBMIT</button>
	  	</form>
	</div>
</div>



<?php
}
else {
	header("Location: ../index.php");
	die();
}
?>