<?php
session_unset();
session_start();
//error_reporting(0);
?>
<?php
if(isset($_SESSION["user_name"])) {
?>



<?php
	include ('../../config/db.config.php');
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content Template</title>
<?php include ('../header.php'); ?>
</head>
<body id="admin" class="admin">

<div id="contentCont">
 <div id="content">
 <?php include ('../menu12345.php'); ?>
Content Slider :
<textarea style="display: block; width: 100%; height: 230px; resize: unset;">
<div id="ContentSlider">
	<span class="control_next control">></span>
	<span class="control_prev control"><</span>
	<ul class="ContentSliderItemCont">
  		<li class="ContSliderArticle">
  			<span class="titleSlider">TitleContentSlider</span>
  			[Content]
  		</li>
  		<li class="ContSliderArticle">
  			<span class="titleSlider">TitleContentSlider</span>
  			[Content]
  		</li>
  	</ul>
</div>
</textarea>
<br /><br />

Image Slider :
<textarea style="display: block; width: 100%; height: 230px; resize: unset;">
<div class="imgSliderCont">
	<span class="imgSliderNext imgSliderControl">></span>
	<span class="imgSliderPrev imgSliderControl"><</span>
	<div class="imgSlider">
		<div class="imgSliderItem" style="display: inline-block;">
			<img src="" />
			<span class="imgSliderItemDesc"></span>
		</div>
		<div class="imgSliderItem">
			<img src="" />
			<span class="imgSliderItemDesc"></span>
		</div>
	</div>
</div>
</textarea>
<br /><br />

Accordion :
<textarea style="display: block; width: 100%; height: 230px; resize: unset;">
<div class="accordion">
	<div class="accordion-section">
		<span class="accordion-section-title" href="#accordion-1">Accordion Section #1</span>
		<div id="accordion-1" class="accordion-section-content">
			<p>[CONTENT HERE]</p>
		</div>
	</div>
	<div class="accordion-section">
		<span class="accordion-section-title" href="#accordion-2">Accordion Section #2</span>
		<div id="accordion-2" class="accordion-section-content">
			<p>[CONTENT HERE]</p>
		</div>
	</div>
</div>
</textarea>
<br /><br />

Content Slider with Accordion :
<textarea style="display: block; width: 100%; height: 485px; resize: unset;">
<div id="ContentSlider">
  <span class="control_next">></span>
  <span class="control_prev"><</span>
  <ul class="ContentSliderItemCont">
 	<li class="ContSliderArticle">
 	    <span class="titleSlider"></span>
	    <img src="" />
	    <div class="accordion">
	        <div class="accordion-section">
	          	<span class="accordion-section-title" href="#accordion-1"></span>
	          	<div id="accordion-1" class="accordion-section-content">
	            
	        	</div>
	    	</div>
	    	<div class="accordion-section">
	        	<span class="accordion-section-title" href="#accordion-2"></span>
	        	<div id="accordion-2" class="accordion-section-content">
	            
	        	</div>
	    	</div>
	    	<div class="accordion-section">
	        	<span class="accordion-section-title" href="#accordion-3"></span>
	        	<div id="accordion-3" class="accordion-section-content">
	            
	        	</div>
	    	</div>
	    </div>
 	</li>
 		
  </ul>
</div>
</textarea>
<br /><br />

 </div>
</div>

</body>
</html>




<?php
}
else {
	header("Location: ../index.php");
	die();
}
?>