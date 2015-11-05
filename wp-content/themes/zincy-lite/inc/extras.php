<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package ZincyLite
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function zincylite_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'zincylite_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function zincylite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'zincylite_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string The filtered title.
     */
    function zincylite_wp_title( $title, $sep ) {
            if ( is_feed() ) {
                    return $title;
            }

            global $page, $paged;

            // Add the blog name
            $title .= get_bloginfo( 'name', 'display' );

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) ) {
                    $title .= " $sep $site_description";
            }

            // Add a page number if necessary:
            if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
                    $title .= " $sep " . sprintf( __( 'Page %s', 'zincy-lite' ), max( $paged, $page ) );
            }

            return $title;
    }
    add_filter( 'wp_title', 'zincylite_wp_title', 10, 2 );

    /**
     * Title shim for sites older than WordPress 4.1.
     *
     * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
     * @todo Remove this function when WordPress 4.3 is released.
     */
    function zincylite_render_title() {
            ?>
            <title><?php wp_title( '|', true, 'right' ); ?></title>
            <?php
    }
    add_action( 'wp_head', 'zincylite_render_title' );
endif;

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function zincylite_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'zincylite_setup_author' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function zincylite_widgets_init() {        
    register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'zincy-lite' ),
		'id'            => 'left-sidebar',
		'description'   => __( 'Display items in the Left Sidebar of the inner pages', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    register_sidebar(array(
        'name' => __('Language Options', 'zincy-lite'),
        'id' => 'language-option',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'zincy-lite' ),
		'id'            => 'right-sidebar',
		'description'   => __( 'Display items in the Right Sidebar of the inner pages', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Event Sidebar', 'zincy-lite' ),
		'id'            => 'event-sidebar',
		'description'   => __( 'Display items in the Left Sidebar of the inner pages', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Subcribe New Letter', 'zincy-lite' ),
		'id'            => 'newsletter-sidebar',
		'description'   => __( 'Display items in the below the welcome section', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Widget Area Above Map', 'zincy-lite' ),
		'id'            => 'zincy-above-google-map',
		'description'   => __( 'Display items above the google map section.', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Footer Google Map', 'zincy-lite' ),
		'id'            => 'zincy-google-map',
		'description'   => __( 'Add Text widget with google map api to show google map in footer.', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Block One', 'zincy-lite' ),
		'id'            => 'footer-1',
		'description'   => __( 'Display items in First Footer Area', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Block Two', 'zincy-lite' ),
		'id'            => 'footer-2',
		'description'   => __( 'Display items in Second Footer Area', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Block Three', 'zincy-lite' ),
		'id'            => 'footer-3',
		'description'   => __( 'Display items in Third Footer Area', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Block Four', 'zincy-lite' ),
		'id'            => 'footer-4',
		'description'   => __( 'Display items in Fourth Footer Area', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Above Footer Block One', 'zincy-lite' ),
		'id'            => 'textblock-1',
		'description'   => __( 'Display items in the left just above the footer', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Above Footer Block Two', 'zincy-lite' ),
		'id'            => 'textblock-2',
		'description'   => __( 'Display items in the middle just above the footer and replaces default gallery', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Above Footer Block Three', 'zincy-lite' ),
		'id'            => 'textblock-3',
		'description'   => __( 'Display items in the Right just above the footer and replaces Testimonials', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    register_sidebar( array(
		'name'          => __( 'Above Footer Block Four', 'zincy-lite' ),
		'id'            => 'textblock-4',
		'description'   => __( 'Display items in the Right most block just above the footer', 'zincy-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'zincylite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function zincylite_scripts() {
	$query_args = array(
		'family' => 'Open+Sans:400,400italic,300italic,300,600,600italic|Lato:400,100,300,700|Signika:400,300,600,700|Droid+Sans:400,700',
	);
	
	wp_enqueue_style( 'zincylite-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'zincylite-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'zincylite-fancybox-css', get_template_directory_uri() . '/css/nivo-lightbox.css' );
	wp_enqueue_style( 'zincylite-bx-slider-style', get_template_directory_uri() . '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'zincylite-hover-style', get_template_directory_uri() . '/css/hover.css' );
	wp_enqueue_style( 'zincylite-woo-commerce-style', get_template_directory_uri() . '/css/woocommerce.css' );
	wp_enqueue_style( 'zincylite-font-style', get_template_directory_uri() . '/css/fonts.css' );
	wp_enqueue_style( 'zincylite-style', get_stylesheet_uri() );

	wp_enqueue_script( 'zincylite-bx-slider-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.1', true );
	wp_enqueue_script( 'zincylite-fancybox-js', get_template_directory_uri() . '/js/nivo-lightbox.min.js', array('jquery'), '2.1', true );
	wp_enqueue_script( 'zincylite-jquery-actual-js', get_template_directory_uri() . '/js/jquery.actual.min.js', array('jquery'), '1.0.16', true );
	wp_enqueue_script( 'zincylite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'zincylite-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

/**
* Loads up responsive css if it is not disabled
*/
    if(get_theme_mod( 'disable_responsive_design') != 1){
        wp_enqueue_style( 'zincylite-responsive', get_template_directory_uri() . '/css/responsive.css' );    
    }
}
add_action( 'wp_enqueue_scripts', 'zincylite_scripts' );

/**
* Loads up favicon
*/
function zincylite_add_favicon(){
    global $zincylite_options;
    $zincylite_options = get_theme_mod('favicon_image');
    if(!empty($zincylite_options)){
        echo '<link rel="shortcut icon" type="image/png" href="'. $zincylite_options .'"/>';    
    }
}
add_action('wp_head', 'zincylite_add_favicon');


function zincylite_social_cb(){ 
    $facebook = get_theme_mod('facebook');
    $twitter = get_theme_mod('twitter');
    $google_plus = get_theme_mod('google_plus');
    $youtube = get_theme_mod('youtube');
    $pinterest = get_theme_mod('pinterest');
    $linkedin = get_theme_mod('linkedin');
    $flickr = get_theme_mod('flickr');
    $vimeo = get_theme_mod('vimeo');
    $stumbleupon = get_theme_mod('stumbleupon');
    $sound_cloud = get_theme_mod('sound_cloud');
    $skype = get_theme_mod('skype');
    $tumblr = get_theme_mod('tumblr');
    $myspace = get_theme_mod('myspace');
    $rss = get_theme_mod('rss');
    $instagram = get_theme_mod('instagram');
	?>
	<div class="socials">
	<?php if($facebook != ''){ ?>
	<a href="<?php echo esc_url($facebook); ?>" class="facebook" title="Facebook" target="_blank"><span class="font-icon-social-facebook"></span></a>
	<?php } ?>

	<?php if($twitter != ''){ ?>
	<a href="<?php echo esc_url($twitter); ?>" class="twitter" title="Twitter" target="_blank"><span class="font-icon-social-twitter"></span></a>
	<?php } ?>

	<?php if($google_plus != ''){ ?>
	<a href="<?php echo esc_url($google_plus); ?>" class="gplus" title="Google Plus" target="_blank"><span class="font-icon-social-google-plus"></span></a>
	<?php } ?>

	<?php if($youtube != ''){ ?>
	<a href="<?php echo esc_url($youtube); ?>" class="youtube" title="Youtube" target="_blank"><span class="font-icon-social-youtube"></span></a>
	<?php } ?>

	<?php if($pinterest != ''){ ?>
	<a href="<?php echo esc_url($pinterest); ?>" class="pinterest" title="Pinterest" target="_blank"><span class="font-icon-social-pinterest"></span></a>
	<?php } ?>

	<?php if($linkedin != ''){ ?>
	<a href="<?php echo esc_url($linkedin); ?>" class="linkedin" title="Linkedin" target="_blank"><span class="font-icon-social-linkedin"></span></a>
	<?php } ?>

	<?php if($flickr){ ?>
	<a href="<?php echo esc_url($flickr); ?>" class="flickr" title="Flickr" target="_blank"><span class="font-icon-social-flickr"></span></a>
	<?php } ?>

	<?php if($vimeo != ''){ ?>
	<a href="<?php echo esc_url($vimeo); ?>" class="vimeo" title="Vimeo" target="_blank"><span class="font-icon-social-vimeo"></span></a>
	<?php } ?>

	<?php if($stumbleupon != ''){ ?>
	<a href="<?php echo esc_url($stumbleupon); ?>" class="stumbleupon" title="Stumbleupon" target="_blank"><span class="font-icon-social-stumbleupon"></span></a>
	<?php } ?>

	<?php if($instagram != ''){ ?>
	<a href="<?php echo esc_url($instagram); ?>" class="instagram" title="Instagram" target="_blank"><span class="fa fa-instagram"></span></a>
	<?php } ?>

	<?php if($sound_cloud != ''){ ?>
	<a href="<?php echo esc_url($sound_cloud); ?>" class="sound-cloud" title="Sound Cloud" target="_blank"><span class="font-icon-social-soundcloud"></span></a>
	<?php } ?>

	<?php if($skype != ''){ ?>
	<a href="<?php echo "skype:".esc_attr($skype); ?>" class="skype" title="Skype"><span class="font-icon-social-skype"></span></a>
	<?php } ?>

	<?php if($tumblr != ''){ ?>
	<a href="<?php echo esc_url($tumblr); ?>" class="tumblr" title="Tumblr"><span class="font-icon-social-tumblr"></span></a>
	<?php } ?>

	<?php if($myspace != ''){ ?>
	<a href="<?php echo esc_url($myspace); ?>" class="myspace" title="Myspace"><span class="font-icon-social-myspace"></span></a>
	<?php } ?>

	<?php if($rss){ ?>
	<a href="<?php echo esc_url($rss); ?>" class="rss" title="RSS" target="_blank"><span class="font-icon-rss"></span></a>
	<?php } ?>
	</div>
<?php } 

add_action( 'zincylite_social_links', 'zincylite_social_cb', 10 );	


function zincylite_header_text_cb(){
    global $zincy_header;
    $zincy_header = get_theme_mod('header_text' , 'Call us: 9840055XXX');
    echo '<div class="header-text">'.$zincy_header.'</div>';
}

add_action('zincylite_header_text','zincylite_header_text_cb', 10);

function zincylite_menu_alignment_cb(){
	global $zincylite_options;
    $zincylite_alignment_class = get_theme_mod( 'menu_alignment' , 'right' );
    if($zincylite_alignment_class=="left"){
        $zincylite_alignment_class = "menu-left";    
    }
    elseif($zincylite_alignment_class=="center"){
        $zincylite_alignment_class = "menu-center";    
    }
    elseif($zincylite_alignment_class=="right"){
        $zincylite_alignment_class = "menu-right";
    }
    else{
        $zincylite_alignment_class = "menu-right";  
    }
	echo esc_attr($zincylite_alignment_class);
}

add_action('zincylite_menu_alignment','zincylite_menu_alignment_cb', 10);


function zincylite_excerpt( $zincylite_content , $zincylite_letter_count ){
	$zincylite_striped_content = strip_shortcodes($zincylite_content);
	$zincylite_excerpt = mb_substr($zincylite_striped_content, 0, $zincylite_letter_count );
	if($zincylite_striped_content > $zincylite_excerpt){
		$zincylite_excerpt .= "...";
	}
	return $zincylite_excerpt;
}

function zincy_lite_slider_overlay(){
    global $zincylite_slider;
    $zincylite_slider_overlay = get_theme_mod('slider_overlay');
    $zincylite_text_overlay = get_theme_mod('slider_text_overlay');
    $zincylite_text_overlay_color = get_theme_mod('slider_text_overlay_color');
    $slider_overlay_image= '';
    if($zincylite_slider_overlay == 'show'){
        $slider_overlay_image = '1';
    }   
    ?>
        <?php if($slider_overlay_image == '1' || $zincylite_text_overlay == 'show' ):?>
        <style type="text/css">
            <?php /*if($slider_overlay_image == '1'): ?>
            .slider-caption{
                <?php
                        echo 'background: url('.get_template_directory_uri().'/css/images/caption-bg.png)';
                ?>
                }
            <?php endif; */ ?>
            <?php if($zincylite_text_overlay == 'show'): ?>
            .slider-caption .zl-container-slider{
                <?php
                    if($zincylite_text_overlay_color != ''){
                        echo 'background:' .$zincylite_text_overlay_color .';';
                        echo 'opacity: 0.7;'; 
                    }
                ?>
            }
            <?php endif; ?>
        </style>
        <?php endif; ?>
    <?php
}
add_action('wp_head', 'zincy_lite_slider_overlay');

function zincy_lite_bxslider_cb(){
    global $post;
    $read_more = get_theme_mod('slider_callto_action_text' , 'Learn More');
    (get_theme_mod('slider_pager_option') == 'yes') ? ($a='true') : ($a='false');
    (get_theme_mod('slider_control_option') == 'yes') ? ($b='true') : ($b='false');
    (get_theme_mod('slider_transition') == 'slide') ? ($c='horizontal') : ($c='fade');
    (get_theme_mod('slider_auto_transition') == 'yes') ? ($d='true') : ($d='false');
	(get_theme_mod('slider_speed') != '') ? ($e = get_theme_mod('slider_speed')) : ($e = '3000');
    (get_theme_mod('slider_pause') != '') ? ($f = get_theme_mod('slider_pause')) : ($f = '4000' );
	if( get_theme_mod('slider_option') != '1') { 
	if(( get_theme_mod('slider_one') != '' ) 
		|| (get_theme_mod('slider_two') != '') 
		|| (get_theme_mod('slider_three') != '')
		|| (get_theme_mod('slider_four') != '') 
		|| (get_theme_mod('slider_category') != '')
	){

	?>
		<script type="text/javascript">
        jQuery(function(){
			jQuery('.bx-slider').bxSlider({
				pager:<?php echo esc_attr($a); ?>,
				controls:<?php echo esc_attr($b); ?>,
				mode:'<?php echo esc_attr($c); ?>',
				auto :<?php echo esc_attr($d); ?>,
                speed:<?php echo esc_attr($e);?>,
				pause:<?php echo esc_attr($f); ?>,
			});
		});
        </script>
    <?php 

        if(get_theme_mod('slider_type_choose') == 'option1'){
        	if( (get_theme_mod('slider_one') != '' ) || (get_theme_mod('slider_two') != '' )|| (get_theme_mod('slider_three') != '' ) || (get_theme_mod('slider_four') != '' )){
        		$sliders = array(get_theme_mod('slider_one' , '0') ,get_theme_mod('slider_two' , '0') , get_theme_mod('slider_three' , '0') , get_theme_mod('slider_four' , '0'));
				$remove = array(0);
                $removeone = array('');
			    $sliders = array_diff($sliders, $remove); 
                $sliders = array_diff($sliders, $removeone); 
                ?>

			    <div class="bx-slider">
			    <?php
			    foreach ($sliders as $slider){
				$args = array (
				'p' => $slider
				);

					$loop = new WP_query( $args );
					if($loop->have_posts()){ 
					while($loop->have_posts()) : $loop-> the_post(); 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-image', false );
					?>
					<div class="slides">
						
							<img alt="<?php echo get_the_title(); ?>" src="<?php echo esc_url($image[0]); ?>">
							
							<?php if(get_theme_mod('slider_captions' , 'show') == 'show'):?>
							<div class="zl-wrapper">
                                <div class="slider-caption">
    								<div class="zl-container-slider">
    									<h1 class="caption-title"><?php the_title();?></h1>
    									<h2 class="caption-description"><?php echo get_the_content();?></h2>
                                        <a href="<?php the_permalink(); ?>"><?php echo $read_more; ?></a>
    								</div>
    							</div>
                            </div>
							<?php  endif; ?>
			
		            </div>
					<?php endwhile;
					}
				} ?>
			    </div>
        	<?php
        	}

        }elseif (get_theme_mod('slider_type_choose') == 'option2' && get_theme_mod('slider_category') != '' ) { ?>
        	<div class="bx-slider">
			<?php
			$loop = new WP_Query(array(
					'cat' => get_theme_mod('slider_category'),
					'posts_per_page' => -1
				));
				if($loop->have_posts()){ 
				while($loop->have_posts()) : $loop-> the_post(); 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-image', false ); 
				?>
				<div class="slides">
						
					<img alt="<?php echo get_the_title(); ?>" src="<?php echo esc_url($image[0]); ?>">
							
					<?php if(get_theme_mod('slider_captions' , 'show')=='show'):?>
					<div class="zl-wrapper">
                        <div class="slider-caption">
    						<div class="zl-container-slider">
    							<h1 class="caption-title"><?php the_title();?></h1>
    							<h2 class="caption-description"><?php echo get_the_content();?></h2>
                                <a href="<?php the_permalink(); ?>"><?php echo $read_more; ?></a> 
    						</div>
    					</div>
                    </div>
					<?php  endif; ?>
			
		            </div>
					<?php endwhile;
					} ?>
			</div>
        <?php
    	   }
    	}
    }//slider_option end
}//zincylite_bxslider_cb end


add_action('zincylite_bxslider','zincy_lite_bxslider_cb', 10);

function zincy_lite_layout_class($classes){
	global $post;
		if( is_404()){
	$classes[] = ' ';
	}elseif(is_singular()){
	$post_class = get_post_meta( $post -> ID, 'zincylite_sidebar_layout', true );
	$classes[] = $post_class;
	}else{
	$classes[] = 'right-sidebar';	
	}
	return $classes;
}

add_filter( 'body_class', 'zincy_lite_layout_class' );

function zincy_lite_web_layout($classes){
     global $zincylite_options;
     $zincylite_layout_option  = get_theme_mod('webpage_layout_choose' , 'fullwidth');
     if($zincylite_layout_option != ''){
        switch ( $zincylite_layout_option ) {
            case 'fullwidth':
                break;
            case 'boxed':
                $classes[] = "boxed-layout";
                break;
        }
     }
     return $classes;
}    
    

add_filter( 'body_class', 'zincy_lite_web_layout' );

function zincy_lite_custom_css(){
	echo '<style type="text/css">';
		echo esc_html(get_theme_mod('custom_css'));
	echo '</style>';
}

add_action('wp_head','zincy_lite_custom_css');

function zincy_lite_call_to_action_cb(){
	$zincylite_options = get_theme_mod('call_to_action_text');
    $zincy_callto_action_option = get_theme_mod('call_to_action_option');
	if(!empty( $zincylite_options) && $zincy_callto_action_option== '1' ){
	?>
	<section id="call-to-action">
	<div class="zl-wrapper">
		<p><?php echo get_theme_mod('call_to_action_text'); ?></p>
		<a class="action-btn" href="<?php echo esc_url(get_theme_mod('call_to_action_link')); ?>"><?php echo get_theme_mod('call_to_action_readmore'); ?></a>
	</div>
	</section>
	<?php
	}
}

add_action('zincylite_call_to_action','zincy_lite_call_to_action_cb', 10);

function zincy_lite_exclude_cat_from_blog($query) {
	$zincylite_exclude_cat = array(get_theme_mod('zincylite_event') , get_theme_mod('slider_category'), get_theme_mod('zincylite_portfolio'));
	if(!empty($zincylite_exclude_cat)):
	$cats = array();
	foreach($zincylite_exclude_cat as $value){
	    if(!empty($value) && $value != 0){
	        $cats[] = -$value; 
	    }
	}
	if(!empty($cats)){
	    $category = join( "," , $cats);
	    if ( $query->is_home() ) {
	    $query->set('cat', $category);
	    }
	}
	return $query;
	endif;
}

add_filter('pre_get_posts', 'zincy_lite_exclude_cat_from_blog'); 

function zincy_lite_remove_header_info() {
	remove_action('wp_head', 'qtrans_header');
}
add_action('init', 'zincy_lite_remove_header_info');

function zincy_lite_fonts_cb(){
     $http = 'http';
     echo "<link href='".$http."://fonts.googleapis.com/css?family=Arimo:400,700|Open+Sans:400,700,600italic,300|Roboto+Condensed:300,400,700|Roboto:300,400,700|Slabo+27px|Oswald:400,300,700|Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic|Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic|PT+Sans:400,700,400italic,700italic|Droid+Sans:400,700|Raleway:400,100,200,300,500,600,700,800,900|Droid+Serif:400,700,400italic,700italic|Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic|Montserrat:400,700|Roboto+Slab:400,100,300,700|Merriweather:400italic,400,900,300italic,300,700,700italic,900italic|Lora:400,700,400italic,700italic|PT+Sans+Narrow:400,700|Bitter:400,700,400italic|Lobster|Yanone+Kaffeesatz:400,200,300,700|Arvo:400,700,400italic,700italic|Oxygen:400,300,700|Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900|Dosis:200,300,400,500,600,700,800|Ubuntu+Condensed|Playfair+Display:400,700,900,400italic,700italic,900italic|Cabin:400,500,600,700,400italic,500italic,600italic|Muli:300,400,300italic,400italic' rel='stylesheet' type='text/css'>";   
}
add_action('wp_footer', 'zincy_lite_fonts_cb');                       