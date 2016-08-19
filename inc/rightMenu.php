<nav role="navigation">
  <div role="navigation">
    <div class="learnMenu ftz-pop-trigger-full left"><i class="fa fa-search circleBtn"></i></div>
    <div class="home-title logo">Français <span class="red">101</span></div>
    <div class="rightMenuToggle ftz-pop-trigger-full right"><i class="fa fa-ellipsis-v circleBtn"></i></div>
  </div>
</nav> 
<div class="rightMenu">
  <div class="rightMenu-wrap">
    <h3 class="title">MENU</h3>
    <ul>
      <?php
        foreach ($json['rightMenu'] as $right_Menu) {
          echo '<li><a class="'.$right_Menu['class'].'" href="'.$right_Menu['link'].'"><i class="fa '.$right_Menu['fontawesome'].'" style="color: '.$right_Menu['custom-color'].';"></i><span class="rightMenuTitle">'.$right_Menu['title'].'</span></a></li>';
        }
      ?>
    </ul>
  </div>
</div>