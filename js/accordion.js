jQuery(document).ready(function() {
	jQuery('.accordion-section-title').append('<i class="accordion-arrow"></i>')
	function close_accordion_section() {
		jQuery('.accordion .accordion-section-title, .accordion .accordion-arrow').removeClass('active');
		jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
	}

	jQuery('.accordion-section-title, .accordion-arrow').click(function(e) {
		// Grab current anchor value
		var currentAttrValue = jQuery(this).attr('href');

		if(jQuery(e.target).is('.active')) {
			close_accordion_section();
		}else {
			close_accordion_section();

			// Add active class to section title
			jQuery(this).addClass('active');
			// Open up the hidden content panel
			jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
		}

		e.preventDefault();
	});
});