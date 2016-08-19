<?php
    $jsondata = file_get_contents("../config/listing.json");
    $json = json_decode($jsondata,true);
?>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0," />
    <link href='https://fonts.googleapis.com/css?family=Khand&subset=latin,devanagari,latin-ext' rel='stylesheet' type='text/css'>
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
  
  <body id="content" class="lessonarticle disableScroll">
    <style type="text/css">
      #menu-nav li a.inner-content, #menu-nav li a.inner-content * {font-size:; font-family: 'Khand', sans-serif; text-align: inherit;}
    </style>
    <!--=============================================== PopUps ==========================================-->
    <div id="menu-nav" class="ftz-pop-in-full type1" style="top: 0; max-height: 99999px; background: #F3ECEC;">
      <a href="javascript:history.go(-1);"; style="display: block; height: 44px; background: #03A9F5; margin-bottom: 10px; position: relative; z-index: 1;"><div class="menu-button circleBtn ftz-pop-out-full"><i class="fa fa-arrow-left"></i></div></a>
        <ul style="top: 50%; min-height: 100%; padding: 50px 0 12px; margin-top: -50px;">
          <?php
            include ('../config/db.config.php');
            $id_Lesson = $_GET["id_Lesson"];
            $query = mysql_query("SELECT fr_lesson_cat.*, fr_post.* FROM fr_lesson_cat INNER JOIN fr_post ON fr_lesson_cat.id_Lesson = fr_post.id_Lesson WHERE fr_post.id_Lesson='$id_Lesson'") or die(mysql_error());
            if (mysql_num_rows($query) == 0) {
              echo '<p style="text-align: center; color: #fff;">Sorry, No Data Available</center>';
            }
            else {
              while($data_les = mysql_fetch_assoc($query)){
                echo '<li style="text-align: center;"><a class="inner-content green bold" style="padding: 0;"><span class="spkFr" style="font-size: 25px;">'. $data_les['lesson_title'] .'</span></a></li>';
                echo '<li><a class="inner-content" style="letter-spacing: normal; color: #000; background: #fff;">'. $data_les['article'] .'</a></li>';
              }
            }
          ?>
        </ul>
    </div>
    <!--=============================================== End of PopUps ==========================================-->


    <script>setTimeout(responsiveVoice.speak("Welcome"),15000);</script>
    <script type="text/javascript">
      jQuery('.spkFr').click(function() { // Attach this function to all mouseenter events for 'a' tags 
        responsiveVoice.setDefaultVoice("French Female");
        responsiveVoice.cancel(); // Cancel anything else that may currently be speaking
        responsiveVoice.speak(jQuery(this).text()); // Speak the text contents of all nodes within the current 'a' tag
      });
    </script>
  </body>
</html>



















