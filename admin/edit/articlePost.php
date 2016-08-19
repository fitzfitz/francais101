<?php
session_unset();
session_start();
//error_reporting(0);
?>
<?php
if(isset($_SESSION["user_name"])) {
?>
<?php include ('../header.php'); ?>
<script type="text/javascript">
	window.onload = function () {
		var textPost = document.getElementById('textPost');
		var livepreview = document.getElementById('livepreview');

		textPost.onkeydown = function () {
			livepreview.innerHTML = textPost.value;
		}
		textPost.onkeypress  = function(e) {
			if (e.keyCode == "") {
				textPost.value = textPost.value + "<br />";
			}
		}
	}
</script>
<body id="admin" class="admin">
<style type="text/css">
	::-webkit-scrollbar {display: block !important;}
	body {overflow: auto;}
	#textPost {width: 100%; border: 1px solid #ccc; height: 450px; padding: 10px; border-radius: 15px; resize: none; outline: none;}
	#livepreview {width: 320px; border: 20px solid #ccc; padding: 15px 0px 15px 15px; height: 450px; overflow: scroll; margin: auto; text-align: none; border-radius: 15px; position: relative;}
	.EdGramTitle {display: block; font-weight: bold; margin: 15px 0 15px 0px;}
</style>
<div id="contentCont">
<?php include ('../menu12345.php'); ?>

<?php
	include ('../../config/db.config.php');
	$idLesson = $_GET['idLesson'];

	$query = mysql_query("SELECT * FROM fr_post INNER JOIN fr_lesson_cat ON fr_post.id_Lesson = fr_lesson_cat.id_Lesson where fr_post.id_Lesson='$idLesson'") or die(mysql_error());
	$row=mysql_fetch_assoc($query);

	if (mysql_num_rows($query) == 0) {
		?>
			<div class="contentCont" style="width: 80%; text-align: center; margin: auto;">
			There's no post yet
			<?php
				$query2 = mysql_query("SELECT * FROM fr_lesson_cat WHERE id_Lesson='$idLesson'");
				$row2=mysql_fetch_assoc($query2);
			?>
			<form method="POST" name="CreatePostGram" action="sqls.php">
				<input type="hidden" name="idLesson" value="<?php echo $idLesson; ?>"></input><input type="hidden" name="idCat" value="<?php echo $row2['id_cat']; ?>"></input>
				<button name='CreatePostGram'>Create Post</button>
			</form>
		</div><?php
	}else {	
		echo '<form method="POST" name="NewArticleGram" action="sqls.php">';
		echo '';
		echo '<span class="EdGramTitle"> Title: <input type="text" value="'.$row['lesson_title'].'" name="ArticleTitle" style="min-width: 320px; width: 100%; padding: 5px; margin: 15px 0;" /></span>';
		echo '<textarea id="textPost" name="article">'.$row['article'].'</textarea><br /><br />';
		echo '<input type="hidden" name="idLesson" value="'.$idLesson.'"></input><input type="hidden" name="idCat" value="'.$row['id_cat'].'"></input>';
		echo '<div id="content"><div id="livepreview"> Live preview here</div></div><br /><br />';
		echo '<button name="NewArticleGram">Submit</button>';
		echo '';
		echo '</form>';
	}
?>
</div>
</body>
<script type="text/javascript">
	jQuery('.spkFr').click(function() { // Attach this function to all mouseenter events for 'a' tags 
		responsiveVoice.setDefaultVoice("French Female");
		responsiveVoice.cancel(); // Cancel anything else that may currently be speaking
		responsiveVoice.speak(jQuery(this).text()); // Speak the text contents of all nodes within the current 'a' tag
	});
</script>
<?php
}
else {
	header("Location: ../index.php");
	die();
}
?>