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
  
  <body id="sentencesLists" class="disableScroll">
    
    <style type="text/css">
      .circleBtn {border: 0;}
      #menu-nav ul * {font-family: 'Khand', sans-serif;}
    </style>

    <div id="menu-nav" class="ftz-pop-in-full type1" style="top: 0; max-height: 99999px; background: #F3ECEC;">
      <div style="display: block; height: 44px; background: #03A9F5; margin-bottom: 10px; position: relative; z-index: 1; width: 100%;">
        <a onclick="location.replace('../main.php')" ; style=""><div class="menu-button circleBtn ftz-pop-out-full"><i class="fa fa-arrow-left"></i></div></a>
        <div class="learnMenu ftz-pop-trigger-full" style=""><div class="menu-button circleBtn" style="right: 10px; left: auto;"><i class="fa fa-search"></i></div></div>
      </div>
        
        <ul style="top:0; min-height:100%; padding:50px 0 12px; margin-top:-50px; transform:none; left:0;">
          <?php
            
            include ('../config/db.config.php');
            $alphas = array('All', 'a', 'à', 'b', 'c', 'ç', 'd', 'e', 'é', 'ê', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
            
            echo '<div class="alphasPag">';
            foreach($alphas as $value){
                echo '<a href="javascript:void();" class="alpPag">'.$value.'</a>';
            }
            echo '</div>';
            $querySentences = mysql_query("SELECT * FROM fr_sentences WHERE sentences_type='idiom' ORDER BY sentences ASC") or die(mysql_error());

            if (mysql_num_rows($querySentences) == 0) {
              echo '<p style="text-align: center; color: #fff;">Sorry, No Data Available</center>';
            }
            else {
              echo "<div class='sentencesCont'>";
              while($data_les = mysql_fetch_assoc($querySentences)){
                echo '<pre><a href="page.sentences.php?id_sentences='.$data_les['id_sentences'].'" class="sentencesData">'.$data_les['sentences'].'</a></pre>';
              }
              echo "</div>";
            }
          ?>
        </ul>
    </div>
<script type="text/javascript">
  jQuery(function () {
      var _alphabets = jQuery('.alpPag');
      var _contentRows = jQuery('.sentencesCont pre');
       
      _alphabets.click(function () {
          var _letter = jQuery(this), _text = jQuery(this).text(), _count = 0;
          if(_text == 'All') _text = '.';
          _alphabets.removeClass("active");
          _letter.addClass("active");
       
          _contentRows.hide();
          _contentRows.each(function (i) {
              var _cellText = jQuery(this).children('a.sentencesData').eq(0).text();
              if (RegExp('^' + _text).test(_cellText)) {
                  _count += 1;
                  jQuery(this).fadeIn(400);
              }
          });
      });
  });
</script>



    <!--=============================================== Search ==========================================-->
    <script type="text/javascript">
      function searchq() {
        var searchTxt = jQuery("input[name='search']").val();
        jQuery.post("../search.php", {searchSentences: searchTxt}, function(output) {
          jQuery("#output").html(output);
        });
      }
    </script>

    <div id="menu-search" class="ftz-pop-in-full type1">
      <div class="menu-button circleBtn ftz-pop-out-full"><i class="fa fa-close"></i></div>
      <input type="text" name="search" placeholder="Search Lesson" onkeydown="searchq();" />
      <ul>
        <div id="output" style="color: #fff; height: 100%; overflow: auto;">
          
        </div>
      </ul>
    </div>
    <!--=============================================== End of Search ==========================================-->

   
  </body>
</html>



















