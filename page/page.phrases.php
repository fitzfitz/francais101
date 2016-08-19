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
  
  <body id="" class="phrases disableScroll">
    
    <style type="text/css">
      .sayButton {border: none;
    background: #03A9F5; color: #fff; position: absolute; right: 0; top: 0; bottom: 0; width: 26px; text-align: center !important; box-shadow: -2px 0px 1px #aaaaaa;}
      .ph_en {font-size: 15px;}
      .ph_fr {;}
      .circleBtn {border: 0;}
      #menu-nav li a.inner-content {letter-spacing: normal; color: #000; position: relative; color: #fff;}
      #menu-nav li a.inner-content, #menu-nav li a.inner-content * {font-size: 17px; font-family: 'Khand', sans-serif; text-align: inherit;}
    </style>
    <!--=============================================== PopUps ==========================================-->
    <div id="menu-nav" class="ftz-pop-in-full type1" style="top: 0; max-height: 99999px; background: #F3ECEC;">
      <a href="javascript:history.go(-1);"; style="display: block; height: 44px; background: #03A9F5; margin-bottom: 10px; position: relative; z-index: 1;"><div class="menu-button circleBtn ftz-pop-out-full"><i class="fa fa-arrow-left"></i></div></a>
        <ul style="top: 50%; min-height: 100%; padding: 50px 0 12px; margin-top: -50px;">
          <?php
            include ('../config/db.config.php');
            $id_Lesson = $_GET["id_Lesson"];
            $query = mysql_query("SELECT fr_lesson_cat.*, fr_phrases.* FROM fr_lesson_cat INNER JOIN fr_phrases ON fr_lesson_cat.id_Lesson = fr_phrases.id_Lesson WHERE fr_phrases.id_Lesson='$id_Lesson'") or die(mysql_error());
            if (mysql_num_rows($query) == 0) {
              echo '<p style="text-align: center; color: #fff;">Sorry, No Data Available</center>';
            }
            else {
              while($data_les = mysql_fetch_assoc($query)){
                //echo '<li style="text-align: center;"><a class="inner-content green bold" style="padding: 0;"><span class="spkFr">'. $data_les['lesson_title'] .'</span></a></li>';
                echo '<li style="padding: 0 15px 10px;">
                        <a class="inner-content randomColorDiv" style="padding: 15px 26px 15px 15px;">
                          <span class="ph_fr" style="font-size: 20px">'. $data_les['phrases_fr'] .'</span>
                          ';?>
                          <script type="text/javascript">
                             jQuery(document).ready(function(){
                               jQuery('#gspeech<?php echo $data_les['id_phrases'];?>').on('click', function(){
                                  var text = jQuery('input[name="text<?php echo $data_les['id_phrases'];?>"]').val();
                                  responsiveVoice.speak("" + text +"", "French Female");
                               });
                             });
                          </script>
                          <input type="hidden" name="text<?php echo $data_les['id_phrases'];?>" value="<?php echo $data_les['phrases_fr'];?>" />
                          <button id="gspeech<?php echo $data_les['id_phrases'];?>" class="sayButton">🔊</button>
                          <?php echo '
                          <span class="ph_en" style="display: block; font-size: 15px;border-top: 1px solid; padding-top: 11px; margin-top: 8px;">'. $data_les['phrases_en'] .'</span>
                        </a>
                      </li>';
              }
            }
          ?>
        </ul>
    </div>
    <!--=============================================== End of PopUps ==========================================-->

   
  </body>
</html>



















