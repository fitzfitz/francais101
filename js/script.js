jQuery(document).ready(function(){
  //French Speaking
    jQuery('.spkFr, .example').click(function() { // Attach this function to all mouseenter events for 'a' tags 
        responsiveVoice.setDefaultVoice("French Female");
        responsiveVoice.cancel(); // Cancel anything else that may currently be speaking
        responsiveVoice.speak(jQuery(this).text()); // Speak the text contents of all nodes within the current 'a' tag
    });
  //Random Color
    jQuery(".randomColorDiv").each(function() {
        var hue = 'rgb(' + (Math.floor((256-240)*Math.random()) + 2) + ',' + (Math.floor((256-199)*Math.random()) + 130) + ',' + (Math.floor((256-199)*Math.random()) + 130) + ')';
        jQuery(this).css("background-color", hue);
    });
    jQuery(".randomColorTxt").each(function() {
        var hue = 'rgb(' + (Math.floor((256-240)*Math.random()) + 2) + ',' + (Math.floor((256-199)*Math.random()) + 130) + ',' + (Math.floor((256-199)*Math.random()) + 130) + ')';
        jQuery(this).css("color", hue);
    });
    jQuery(".randomColorBorder").each(function() {
        var hue = 'rgb(' + (Math.floor((256-240)*Math.random()) + 2) + ',' + (Math.floor((256-199)*Math.random()) + 130) + ',' + (Math.floor((256-199)*Math.random()) + 130) + ')';
        jQuery(this).css("border-color", hue);
    });
  //Learn Menu
    jQuery(".learnMenu.ftz-pop-trigger-full").click(function(){
        jQuery(".ftz-pop-in-full.type1").addClass('ftz-pop-shrink');
        jQuery("body").addClass('hidden');
    });
    jQuery(".ftz-pop-out-full").click(function(){
        jQuery(".ftz-pop-in-full.type1").removeClass('ftz-pop-shrink');
        jQuery("body").removeClass('hidden');
    });
  
  //TheMenu
    jQuery(".rightMenuToggle").click(function(){
        jQuery(this).toggleClass('rightshrink');
        jQuery("body").toggleClass('rightShrink');
    });
  
  //Scroll Page Button
    jQuery(".scrollBtn.scrollDown").click(function(){
        jQuery('body').animate({
            scrollTop:jQuery(document).height()
        });
    });
    jQuery(".scrollBtn.scrollTop").click(function(){
        jQuery('body').animate({
            scrollTop:-(jQuery(document).height())
        });
    });
  
  //Disabling Mouse Wheel
    jQuery("body.disableScroll").bind("mousewheel", function() {
        return false;
    });
    
  //Disable Swiping for Mobile (touchSwipe.js)
    jQuery("html").swipe( {
        swipeStatus:function(event, phase, direction, distance, fingerCount) {
            return true;
        }
    });
    
  //Ftz Rotate
    jQuery(".ftz-rotate-trig").click(function(e) {
        jQuery(this).addClass('ftz-rotate');
        e.preventDefault();
    });
    jQuery(".ftz-rotate-close").click(function(e) {
        jQuery('.ftz-rotate-trig').removeClass('ftz-rotate');
        e.stopPropagation();
    });
  
  //Show ID to PopUp
    jQuery(".listing-desc").click(function(){
     jQuery("#dataIdLearn").val(jQuery(this).data('id'));
    });
});

jQuery("#rightMenu-exit").click(function(){
    window.close();
});

jQuery(function(){
	var menu = jQuery('nav[role="navigation');
    jQuery(window).scroll(function () {
        var y = jQuery(this).scrollTop();
        var homeH,z,homeHOffset;
        homeH = homeHOffset = 0;
        if(document.getElementById("header")) {
        	homeH = jQuery('#header').outerHeight();        	      	
        	homeHOffset = jQuery('#header').offset().top; 
        }
        
        var headerH = jQuery('nav[role="navigation').outerHeight();
        z = homeHOffset + homeH - headerH;
        if (y >= z) {
            menu.removeClass('first-nav').addClass('second-nav');
        }
        else{
            menu.removeClass('second-nav').addClass('first-nav');
        }
    });
});

//Content Slider
jQuery(document).ready(function () {
    var slideCount = jQuery('#ContentSlider ul li').length;
    var slideWidth = jQuery('a.inner-content').width() - 30;
    var slideHeight = jQuery('#ContentSlider ul li.ContSliderArticle').height();
    var sliderUlWidth = slideCount * slideWidth;
    
    jQuery('#ContentSlider, #ContentSlider ul li.ContSliderArticle').css({ width: slideWidth });
    
    jQuery('#ContentSlider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
    
    //jQuery('#ContentSlider ul li:last-child').prependTo('#ContentSlider ul');

    function moveLeft(slider) {
        slider = jQuery(slider);
        slider.find('ul').animate({
            left: +slideWidth
        }, 200, function () {
            slider.find('ul li.ContSliderArticle:last-child').prependTo(slider.find('ul'));
            slider.find('ul').css('left', '');
        });
    };

    function moveRight(slider) {
        slider = jQuery(slider);
        slider.find('ul').animate({
            left: -slideWidth
        }, 200, function () {
            slider.find('ul li.ContSliderArticle:first-child').appendTo(slider.find('ul'));
            slider.find('ul').css('left', '');
        });
    };

    jQuery('span.control_prev').click(function () {
        moveLeft(jQuery(this).parent());
    });

    jQuery('span.control_next').click(function () {
        moveRight(jQuery(this).parent());
    });

});    

//Image Slider
jQuery(document).ready(function () {
    var currentIndex = 0,
      items = jQuery('.imgSlider .imgSliderItem'),
      itemAmt = items.length;

    function cycleItems() {
      var item = jQuery('.imgSlider .imgSliderItem').eq(currentIndex);
      items.hide();
      item.css('display','block');
    }

    var autoSlide = setInterval(function() {
      currentIndex += 1;
      if (currentIndex > itemAmt - 1) {
        currentIndex = 0;
      }
      cycleItems();
    }, 800000);

    jQuery('.imgSliderNext').click(function() {
      clearInterval(autoSlide);
      currentIndex += 1;
      if (currentIndex > itemAmt - 1) {
        currentIndex = 0;
      }
      cycleItems();
    });

    jQuery('.imgSliderPrev').click(function() {
      clearInterval(autoSlide);
      currentIndex -= 1;
      if (currentIndex < 0) {
        currentIndex = itemAmt - 1;
      }
      cycleItems();
    });
});