jQuery(function(){

  jQuery('.testimonial-slider').bxSlider({
   controls:false,
   auto:true,
   pager: true,
   speed:1000,
 });

  //jQuery(window).resize(function(){
//    jQuery('.slider-caption').each(function(){
//      //var bxslider_height = jQuery('.bx-viewport').actual('outerHeight');
////      var bxmid = bxslider_height/2;
////      //console.log(bxmid);
////      var cap_height = jQuery(this).children('.zl-container-slider').actual( 'outerHeight' );
////      var cap_mid = cap_height/2;
////      //console.log(cap_mid);
////      var tp_margin = parseInt(bxmid)-parseInt(cap_mid)+parseInt(50);
//      jQuery(this).css('margin-top','-280px');
//    });
//  }).resize();
  

  jQuery('.commentmetadata').after('<div class="clear"></div>');

  jQuery('.menu-toggle').click(function(){
    jQuery('#site-navigation .menu').slideToggle('slow');
  });
  
  jQuery('.thumbnail-gallery .gallery-item a').each(function(){
    jQuery(this).addClass('fancybox-gallery').attr('data-lightbox-gallery','gallery');
  });
  
  jQuery(".fancybox-gallery").nivoLightbox();
  
  jQuery('.search-box i.fa-search').click(function() {
    jQuery('.search-box .zincy-search').toggleClass('active');
  });
  
  jQuery('.zincy-search .close-icon').click(function() {
    jQuery('.search-box .zincy-search').removeClass('active');
  });
});
