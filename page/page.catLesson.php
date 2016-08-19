<?php
    $jsondata = file_get_contents("../config/listing.json");
    $json = json_decode($jsondata,true);
?>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0," />
    <title></title>

    <?php
      foreach ($json['css'] as $css) {
        echo '<link rel="stylesheet" type="text/css" href="../css/'.$css['name'].'" />';
      }
      foreach ($json['javascript'] as $js) {
        echo '<script src="../js/'.$js['name'].'" type="text/javascript"></script>';
      }
    ?>
  </head>
  
  <body id="categoryLes" class="disableScroll">
    <!--=============================================== PopUps ==========================================-->
    <div id="menu-nav" class="ftz-pop-in-full type1" style="top: 0; max-height: 99999px; background: #F3ECEC;">

      <a href="javascript:history.go(-1);"; style="display: block; height: 44px; background: #03A9F5; margin-bottom: 10px; position: relative; z-index: 1;"><div class="menu-button circleBtn ftz-pop-out-full"><i class="fa fa-arrow-left"></i></div></a>
        <ul style="top: 50%; min-height: 100%; padding: 40px 0 12px; margin-top: -50px;">
          <?php
            include ('../config/db.config.php');
            $id_cat = $_GET["id_cat"];
            $query = mysql_query("SELECT * FROM fr_lesson_cat WHERE id_cat='$id_cat' ORDER BY id_Lesson ASC") or die(mysql_error());
            $row = mysql_fetch_assoc( mysql_query("SELECT * FROM fr_category WHERE id_cat='$id_cat'") );
            echo '<div class="CatPic" style="background-image: url(../'.$row['pic'].');"><span class="CatTitle">'.$row['cat_name'].'</span></div>';

            if (mysql_num_rows($query) == 0) {
              if ($id_cat == 'CAT002') {
                echo "<span class='bold' style='text-align: center; display: block; margin: 0 15px;'>Select Your Categories</span>";
              }
              else {
                echo '<p style="text-align: center; color: #fff;">Sorry, No Data Available</center>';
              }
            }
            else {
              while($data_les = mysql_fetch_assoc($query)){
                if ($id_cat == 'CAT001') {
                  echo '<li><a class="randomColorBorder" href="page.lesson.php?id_Lesson=';?><?php echo $data_les['id_Lesson'].'">'. $data_les['lesson_title'] .'</a></li>';
                }
                elseif ($id_cat == 'CAT003') {
                  echo '<li><a class="randomColorBorder" href="page.phrases.php?id_Lesson=';?><?php echo $data_les['id_Lesson'].'">'. $data_les['lesson_title'] .'</a></li>';
                }
                elseif ($id_cat == 'CAT004') {
                  echo '<li><a class="randomColorBorder" href="page.lesson.php?id_Lesson=';?><?php echo $data_les['id_Lesson'].'">'. $data_les['lesson_title'] .'</a></li>';
                }
              }
            }
            if ($id_cat == 'CAT002') {
              $alphas = range('a', 'z');
                  echo '<div class="alphasPag">';
                  foreach($alphas as $value){
                      echo '<a href=page.sentencesLists.php?letter='.$value.' class="alpPag">'.$value.'</a>';
                  }
                  echo '</div>';
            }
          ?>
        </ul>
    </div>
    <!--=============================================== End of PopUps ==========================================-->
  </body>
</html>




















