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
  
  <body id="sentences">
    
    <style type="text/css">
      .circleBtn {border: 0;}
    </style>
    <!--=============================================== PopUps ==========================================-->
    <div id="menu-nav" class="ftz-pop-in-full type1" style="top: 0; max-height: 99999px; background: #F3ECEC;">
      <a href="javascript:history.go(-1);" style="display: block; height: 44px; background: #03A9F5; margin-bottom: 10px; position: relative; z-index: 1;"><div class="menu-button circleBtn ftz-pop-out-full"><i class="fa fa-arrow-left"></i></div></a>
        <ul style="top: 50%; min-height: 100%; padding: 50px 0 12px; margin-top: -50px;">

    
          <div class='sentencesCont' style="font-family: 'Khand', sans-serif;">
              <div class="sentencesData"><span class="text">About</span></div>
              <div class="sentencesDataMean" style="min-height: 90%;">
                  <center>
                      <span style="font-size: 30px; color: #03A9F5;">Français </span><span style="font-size: 30px; color: red;">101 </span>
                      <br /><br />
                      Copyright &copy; All Rights Reserved
                      <br /><br /><br />
                      Send comments/feedback to 
                      <br />
                      <span style="color: #03A9F5;">fitzgeralmedia@gmail.com</span>
                      <br /><br /><br />
                      Credits
                      <br />
                      Developer: <span style="color: #03A9F5;">Fitzgeral</span>
                      <br />
                      Designer: <span style="color: #03A9F5;">Fitzgeral</span>
                      <br />
                      Content Manager: <span style="color: #03A9F5;">Fitzgeral</span>
                  </center>
              </div>
          </div>
        </ul>
    </div>
    <!--=============================================== End of PopUps ==========================================-->

   
  </body>
</html>



















