<script type="text/javascript">
  jQuery(".randomColorBorder").each(function() {
      var hue = 'rgb(' + (Math.floor((256-240)*Math.random()) + 2) + ',' + (Math.floor((256-199)*Math.random()) + 130) + ',' + (Math.floor((256-199)*Math.random()) + 130) + ')';
      jQuery(this).css("border-color", hue);
  });
</script>

<?php 
include ('config/db.config.php');
$output = '';

if(isset($_POST['searchVal'])) {
  $searchq = str_replace("'", "''", $_POST['searchVal']);
  //$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

  $query = mysql_query("SELECT * FROM fr_category INNER JOIN fr_lesson_cat ON fr_category.id_cat = fr_lesson_cat.id_cat WHERE lesson_title LIKE '%$searchq%'") or die(mysql_error());
  $count = mysql_num_rows($query);
  if ($count == 0) {
    $output = 'Sorry, there is no result';
  }
  else {
    while ($row = mysql_fetch_array($query)) {
      $title = $row['lesson_title'];
      $cat = $row['cat_name'];
      $idCat = $row['id_cat'];
      $idLess = $row['id_Lesson'];
      if ($idCat == 'CAT002') {
        $output = '';
      }else {
        if ($idCat == 'CAT003') {
          $output .= '<a href="page/page.phrases.php?id_Lesson='.$idLess.'" class="searchResultCont randomColorBorder"><div class="searchResult">'.$title.'</div><div class="searchResultCat">'.$cat.'</div></a>';
        }
        else {
          $output .= '<a href="page/page.lesson.php?id_Lesson='.$idLess.'" class="searchResultCont randomColorBorder"><div class="searchResult">'.$title.'</div><div class="searchResultCat">'.$cat.'</div></a>';
        }
      }
    }
  }
}

elseif (isset($_POST['searchSentences'])) {
  $searchq = str_replace("'", "''", $_POST['searchSentences']);
  //$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

  $query = mysql_query("SELECT * FROM fr_sentences WHERE sentences LIKE '%$searchq%'") or die(mysql_error());
  $count = mysql_num_rows($query);
  if ($count == 0) {
    $output = 'Sorry, there is no result';
  }
  else {
    while ($row = mysql_fetch_array($query)) {
      $sent = $row['sentences'];
      $idSent = $row['id_sentences'];
        
        $output .= '<a href="page.sentences.php?id_sentences='.$idSent.'" class="searchResultCont randomColorBorder"><div class="searchResult">'.$sent.'</div></a>';
    }
  }
}
echo ($output);
?>