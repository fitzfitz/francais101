<?php
include ('../../config/db.config.php');

// Grammar
	if(isset($_POST['AddNewGram'])) {
		$idLesson = $_POST['idLesson'];
		$Lesson_title = $_POST['Lesson_title'];
		$idCat = $_POST['idCat'];

		$query = "INSERT INTO fr_lesson_cat(id_Lesson, Lesson_title, id_cat) VALUES('$idLesson','$Lesson_title','$idCat')";
		if ($idCat == 'CAT001') {
			if(mysql_query($query)) {
			 	header("Location: grammarPost.php?idLesson=$idLesson");
				die();
			}else {
				header("Location: grammar.php");
				die();
			}
		}
		elseif ($idCat == 'CAT004') {
			if(mysql_query($query)) {
			 	header("Location: articlePost.php?idLesson=$idLesson");
				die();
			}else {
				header("Location: article.php");
				die();
			}
		}else {
			header("Location: ../index.php");
			die();
		}
	}

	if(isset($_POST['DelGram'])) {
		$idLesson = $_POST['idLesson'];
		$idCat = $_POST['idCat'];
		
		echo $idLesson;

		$query="DELETE FROM fr_lesson_cat WHERE id_Lesson='$idLesson'";

		$query2="DELETE FROM fr_post WHERE id_Lesson='$idLesson'";
 		mysql_query($query);
 		mysql_query($query2);

 		if ($idCat == 'CAT001') {
			header("Location: grammar.php");
		}
		if ($idCat == 'CAT004') {
			header("Location: article.php");
		}else {
			header("Location: ../index.php");
			die();
		}
	}
	if(isset($_POST['CreatePostGram'])) {
		$idLesson = $_POST['idLesson'];
		$idCat = $_POST['idCat'];

		$query = "INSERT INTO fr_post(article, id_Lesson) VALUES(' ','$idLesson')";
		if ($idCat == 'CAT001') {
			if(mysql_query($query)) {
			 	header("Location: grammarPost.php?idLesson=$idLesson");
				die();
			}else {
				header("Location: grammar.php");
				die();
			}
		}
		elseif ($idCat == 'CAT004') {
			if(mysql_query($query)) {
			 	header("Location: articlePost.php?idLesson=$idLesson");
				die();
			}else {
				header("Location: article.php");
				die();
			}
		}else {
			header("Location: ../index.php");
			die();
		}

	}
	if(isset($_POST['NewArticleGram'])) {
		$article = $_POST['article'];
		$idLesson = $_POST['idLesson'];
		$articleTitle = $_POST['ArticleTitle'];
		$idCat = $_POST['idCat'];
		
		$str = str_replace("'", "''", $article);

		//echo '<textarea style="width:80%; height: 800px;">'.$str.'</textarea>';

		$query = "UPDATE fr_post SET article='$str' WHERE id_Lesson='$idLesson'";

		$query2 = "UPDATE fr_lesson_cat SET Lesson_title='$articleTitle' WHERE id_Lesson='$idLesson'";
		mysql_query($query);
 		mysql_query($query2);

 		if ($idCat == 'CAT001') {
			header("Location: grammar.php");
			die();
		}
		if ($idCat == 'CAT004') {
			header("Location: article.php");
			die();
		}else {
			header("Location: ../index.php");
			die();
		}
 		
	}

// Phrases
	if(isset($_POST['AddNewPhrases'])) {
		$idLesson = $_POST['idLesson'];
		$Lesson_title = $_POST['Lesson_title'];
		$idCat = $_POST['idCat'];

		$query = "INSERT INTO fr_lesson_cat(id_Lesson, Lesson_title, id_cat) VALUES('$idLesson','$Lesson_title','$idCat')";
		if(mysql_query($query)) {
		 	header("Location: phrasesPost.php?idLesson=$idLesson");
			die();
		}else {
			header("Location: phrases.php");
			die();
		}
	}
	if(isset($_POST['AddNewPhrasesRow'])) {
		$idPhrases = $_POST['idPhrases'];
		$phrasesFr = $_POST['phrasesFr'];
		$phrasesEn = $_POST['phrasesEn'];
		$idLesson = $_POST['idLesson'];

		$query = "INSERT INTO fr_phrases(id_phrases, phrases_fr, phrases_en, id_Lesson) VALUES('$idPhrases','$phrasesFr','$phrasesEn','$idLesson')";
		if(mysql_query($query)) {
		 	header("Location: phrasesPost.php?idLesson=$idLesson");
			die();
		}else {
			header("Location: phrases.php");
			die();
		}
	}
	if(isset($_POST['EditPhrasesRow'])) {
		$idPhrases = $_POST['idPhrases'];
		$phrasesFr = $_POST['phrasesFr'];
		$phrasesEn = $_POST['phrasesEn'];
		$idLesson = $_POST['idLesson'];

		$query = "UPDATE fr_phrases SET id_phrases = '$idPhrases', phrases_fr = '$phrasesFr', phrases_en = '$phrasesEn' WHERE id_phrases='$idPhrases' ";
		if(mysql_query($query)) {
		 	header("Location: phrasesPost.php?idLesson=$idLesson");
			die();
		}else {
			header("Location: phrases.php");
			die();
		}
	}
	if(isset($_POST['DelPhrasesCat'])) {
		$idLesson = $_POST['idLesson'];

		echo $idLesson;

		$query="DELETE FROM fr_lesson_cat WHERE id_Lesson='$idLesson'";

		//$query2="DELETE FROM fr_post WHERE id_Lesson='$idLesson'";
 		mysql_query($query);
 		//mysql_query($query2);
 		header("Location: phrases.php");
		die();
	}
	if(isset($_POST['DelPhrasesRow'])) {
		$idPhrases = $_POST['idPhrases'];
		$idLesson = $_POST['idLesson'];

		$query="DELETE FROM fr_phrases WHERE id_phrases='$idPhrases'";
 		mysql_query($query);
 		header("Location: phrasesPost.php?idLesson=$idLesson");
		die();
	}
	if(isset($_POST['phrasesTitleChange'])) {
		$idLesson = $_POST['idPhrases'];
		$phraseTitle = $_POST['phraseTitle'];

		$query = "UPDATE fr_lesson_cat SET Lesson_title='$phraseTitle' WHERE id_Lesson='$idLesson'";
		mysql_query($query);
 		header("Location: phrasesPost.php?idLesson=$idLesson");
	}

//Sentences
	if(isset($_POST['AddNewSentences'])) {
		$letter = $_POST['letter'];
		$idSentences = $_POST['idSentences'];
		$Sentences = str_replace("'", "''", $_POST['Sentences']);
		$SentencesMeaning = str_replace("'", "''", $_POST['SentencesMeaning']);
		$SentencesType = $_POST['SentencesType'];
		
		$query = " INSERT INTO fr_sentences (id_sentences, sentences, sentences_mean, sentences_type) VALUES ('$idSentences',LOWER('$Sentences'),'$SentencesMeaning','$SentencesType') ";
		if(mysql_query($query)) {
		 	header("Location: idioms.php?letter=$letter");
			die();
		}else {
			//header("Location: idioms.php");
			//die();
			$error = mysql_error();
			echo $error;
		}
	}
	if(isset($_POST['DelSentences'])) {
		$letter = $_POST['letter'];
		$idSentences = $_POST['idSentences'];

		$query = "DELETE FROM fr_sentences WHERE id_sentences='$idSentences'";
		mysql_query($query);
		
		header("Location: idioms.php?letter=$letter");
		die();
	}
	if(isset($_POST['EditSentences'])) {
		$letter = $_POST['letter'];
		$idSentences = $_POST['idSentences'];
		$Sentences = str_replace("'", "''", $_POST['Sentences']);
		$SentencesMeaning = str_replace("'", "''", $_POST['SentencesMeaning']);
		$SentencesType = $_POST['SentencesType'];

		$query = "UPDATE fr_sentences SET id_sentences = '$idSentences', sentences = LOWER('$Sentences'), sentences_mean = '$SentencesMeaning', sentences_type = '$SentencesType' WHERE id_sentences = '$idSentences'";
		if(mysql_query($query)) {
		 	header("Location: idioms.php?letter=$letter");
			die();
		}else {
			//header("Location: idioms.php");
			//die();
			$error = error_reporting(1);
			echo $error;
		}
	}
?>
