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
  
  <body class="disableScroll">
    <!--=============================================== Wrapper ==========================================-->
    <div id="wrapper">
      <!--=============================================== Header ==========================================-->
      <?php require_once('inc/rightMenu.php');  ?>      
      
      
      <!--=============================================== Section ==========================================-->
      <section id="home-content-top" class="section-fullheight">
        <section class="home-inside-wrap">
          <?php
            include ('config/db.config.php');
            
            $query = mysql_query("SELECT * FROM fr_category ORDER BY id_cat ASC") or die(mysql_error());
            if (mysql_num_rows($query) == 0) {
              echo 'Sorry, No Data Available';
            }
            else {
              while($data_cat = mysql_fetch_assoc($query)){
                echo '<div class="listings col-ftz col-ftz-1 ftz-rotate-trig" style="background-image: url('.$data_cat["pic"].'); background-size: cover; background-position: center center;">';
                  echo '<a href="javascript:void(0);" class="listings-link">';
                    echo '<div class="listing-image randomColorDiv">';
                      /*echo '<img src="images/'.$home_content_top['picture'].'" />';*/
                      echo '<i class="fa fa-graduation-cap" style="font-size: 25px; margin-top: 35%; margin-left: 4px;"></i>';
                    echo '</div>';
                    echo '<div class="listing-name">';
                      echo '<span style="color: white;"> '. $data_cat['cat_name'] .' </span>';
                    echo '</div>';
                  echo '</a>';
                  if ($data_cat['id_cat'] == 'CAT002') {
                    echo '<div class="listing-desc ftz-rotate-back" data-id="7" onclick="location.href=';?>'page/page.sentencesLists.php'<?php echo '"><div class="desc">'.$data_cat['cat_desc'].'</div><a class="ftz-rotate-close"><i class="fa fa-close"></i></a>';
                  }
                  else {
                    echo '<div class="listing-desc ftz-rotate-back" data-id="7" onclick="location.href=';?>'page/page.catLesson.php?id_cat=<?php echo $data_cat['id_cat'] ?>'<?php echo ';"><div class="desc">'.$data_cat['cat_desc'].'</div><a class="ftz-rotate-close"><i class="fa fa-close"></i></a>';
                  }
                  echo '</div>';
                echo '</div>';
              }
            }
                
          ?>
        </section>
        <!-- <div class="scrollBtn circleBtn scrollTop"><i class="fa fa-angle-up"></i></div> -->
      </section>
      <!--=============================================== End of Section ==========================================-->
      
      
      
    
    </div>
    <!--=============================================== End of Wrapper ==========================================-->
    
    <!--=============================================== Search ==========================================-->
    <script type="text/javascript">
      function searchq() {
        var searchTxt = jQuery("input[name='search']").val();
        jQuery.post("search.php", {searchVal: searchTxt}, function(output) {
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




















