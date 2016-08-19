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
  
  <body id="sentences" class="disableScroll">
    
    <style type="text/css">
      .circleBtn {border: 0;}
      /* #menu-nav ul * {font-family: 'Khand', sans-serif;} */
    </style>
    <!--=============================================== PopUps ==========================================-->
    <div id="menu-nav" class="ftz-pop-in-full type1" style="top: 0; max-height: 99999px; background: #F3ECEC;">
      <a href="javascript:history.go(-1);"; style="display: block; height: 44px; background: #03A9F5; margin-bottom: 10px; position: relative; z-index: 1;"><div class="menu-button circleBtn ftz-pop-out-full"><i class="fa fa-arrow-left"></i></div></a>
        <ul style="top: 50%; min-height: 100%; padding: 50px 0 12px; margin-top: -50px;">
          <script type="text/javascript">
             jQuery(document).ready(function(){
               jQuery('#gspeech').on('click', function(){
                  var text = jQuery('input[name="text"]').val();
                  responsiveVoice.speak("" + text +"", "French Female");
               });
             });
          </script>
          <?php
             
            include ('../config/db.config.php');
            $id_sentences = $_GET['id_sentences'];
           
            $data_sen = mysql_fetch_assoc( mysql_query("SELECT * FROM fr_sentences WHERE id_sentences='$id_sentences'"));
            echo '<input type="hidden" name="text" value="'.$data_sen['sentences'].'" />';
              echo "<div class='sentencesCont'>";
                echo '<div class="sentencesData"><span class="text">'.$data_sen['sentences'].'</span><div id="gspeech" class="speak"><i style="display: table-cell; vertical-align: middle;" class="fa fa-volume-up"></i></div></div>';
                echo '<div class="sentencesDataMean">'.$data_sen['sentences_type'].'. '.$data_sen['sentences_mean'].'</div>';
              echo "</div>";
          ?>
        </ul>
    </div>
    <!--=============================================== End of PopUps ==========================================-->

   
  </body>
</html>



















