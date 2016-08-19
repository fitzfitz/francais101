<?php
    $jsondata = file_get_contents("config/listing.json");
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
        echo '<link rel="stylesheet" type="text/css" href="css/'.$css['name'].'" />';
      }
      foreach ($json['javascript'] as $js) {
        echo '<script src="js/'.$js['name'].'" type="text/javascript"></script>';
      }
    ?>
  </head>
  
  <body>
    <!--=============================================== Wrapper ==========================================-->
    <div id="wrapper">
      <!--=============================================== Header ==========================================-->
      <header id="header" class="section-fullheight">
        <section class="home-inside-wrap">
          <div class="home-title logo">Français <span class="red">101</span></div>
          
          <a href="main.php" class="getStarted">Get Started</a>
        </section>
      </header>
  </body>
</html>




















