/**
 * Custom scripts needed for the colorpicker, image button selectors,
 * and navigation tabs.
 */

 jQuery(document).ready(function($) {

 	function zincylite_tabs() {

		// Hides all the .group sections to start
		$('.group').hide();

		// Find if a selected tab is saved in localStorage
		var active_tab = '';
		//if ( typeof(localStorage) != 'undefined' ) {
		//	active_tab = localStorage.getItem("active_tab");
		//}

		// If active tab is saved and exists, load it's .group
		if (active_tab != '' && $(active_tab).length ) {
			$(active_tab).fadeIn();
			$(active_tab + '-tab').addClass('nav-tab-active');
		} else {
			$('.group:first').fadeIn();
			$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
		}

		// Bind tabs clicks
		$('.nav-tab-wrapper a').click(function(evt) {

			evt.preventDefault();

			// Remove active class from all tabs
			$('.nav-tab-wrapper a').removeClass('nav-tab-active');

			$(this).addClass('nav-tab-active').blur();

			var group = $(this).attr('href');

			//if (typeof(localStorage) != 'undefined' ) {
			//	localStorage.setItem("active_tab", $(this).attr('href') );
			//}

			$('.group').hide();
			$(group).fadeIn();


		});
	}

	$('#single_post_slider').click(function(){
		$('.post-as-slider').show();
		$('.cat-as-slider').hide();
	});

	$('#cat_post_slider').click(function(){
		$('.cat-as-slider').show();
		$('.post-as-slider').hide();
	});

	if($('#single_post_slider input').is(':checked')){
		$('.post-as-slider').show();
	}

	if($('#cat_post_slider input').is(':checked')){
		$('.cat-as-slider').show();
	}

	// Loads tabbed sections if they exist
	if ( $('.nav-tab-wrapper').length > 0 ) {
		zincylite_tabs();
	}

	$('.ap-popup-bg, .ap-popup-close').click(function(){
		$('.ap-popup-bg, .ap-popup-wrapper').fadeOut();
	});

	$('#upload-btn').click(function(){
		$('#form_options').attr('action','');
	});

	$('#accordion-panel-wp_default_panel').prepend(
    		'<div class="user_sticky_note">'+
    		'<h3 class="sticky_title">Need help?</h3>'+
    		'<span class="sticky_info_row"><label class="row-element">View demo: </label> <a href="http://8degreethemes.com/demo/zincy-lite/" target="_blank">here</a>'+
    		'<span class="sticky_info_row"><label class="row-element">View documentation: </label><a href="http://8degreethemes.com/documentation/zincy-lite/" target="_blank">here</a></span>'+
    		'<span class="sticky_info_row"><label class="row-element">Support forum: </label><a href="https://8degreethemes.com/support/forum/zincy-lite/" target="_blnak">here</a></span>'+
    		'<span class="sticky_info_row"><label class="row-element">Email us: </label><a href="mailto:support@8degreethemes.com">support@8degreethemes.com<a/></span>'+
    		'<span class="sticky_info_row"><label class="more-detail row-element">More Details: </label><a href="https://8degreethemes.com/wordpress-themes/" target="_blank">here</a></span>'+
    		'</div>'
    		);

	var upgrade_notice = '<a class="upgrade-pro" target="_blank" href="https://8degreethemes.com/wordpress-themes/zincy-pro/"><img src="http://8degreethemes.com/demo/upgrade-zincy-lite.jpg" alt="UPGRADE TO ZINCY PRO" /></a>';
    upgrade_notice += '<a class="upgrade-pro-demo" target="_blank" href="http://8degreethemes.com/demos/?theme=zincy-pro">ZINCY PRO DEMO</a>';
    jQuery('#customize-info .preview-notice').append(upgrade_notice);

	
});


