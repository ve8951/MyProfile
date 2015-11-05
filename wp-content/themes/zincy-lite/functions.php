<?php
/**
 * ZincyLite functions and definitions
 *
 * @package ZincyLite
 */
if ( is_admin() ) : // Load only if we are viewing an admin page

function zincy_lite_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'zincylite_custom_js', get_template_directory_uri().'/inc/admin-panel/js/custom.js', array( 'jquery' ),'',true );
	wp_enqueue_script( 'of-media-uploader', get_template_directory_uri().'/inc/admin-panel/js/media-uploader.js', array( 'jquery' ) );
	wp_enqueue_style( 'zincylite_admin_style',get_template_directory_uri().'/inc/admin-panel/css/admin.css', '1.0', 'screen' );
}
add_action('admin_enqueue_scripts', 'zincy_lite_admin_scripts');
endif;

if ( ! function_exists( 'zincylite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zincylite_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	/**
	 * Global content width.
	 */
	if (!isset($content_width))
		$content_width = 750; /* pixels */

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ZincyLite, use a find and replace
	 * to change 'zincy-lite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'zincy-lite', get_template_directory() . '/languages' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();	

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/* 
     * Let WordPress manage the document title. 
     * By adding theme support, we declare that this theme does not use a 
     * hard-coded <title> tag in the document head, and expect WordPress to 
     * provide it for us. 
     */ 
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

    add_image_size( 'slider-image', 1280, 585, true); //slider image
    add_image_size( 'blog-image-big', 585, 410, true); //blog image large
    add_image_size( 'blog-image-small', 290, 210, true); //blog image small
	add_image_size( 'event-thumbnail', 135, 100, true); //Latest News Events Small Image
	add_image_size( 'featured-thumbnail', 350, 245, true); //Featured Image
	add_image_size( 'portfolio-thumbnail', 415, 235, true); //Portfolio Image
    add_image_size( 'portfolio-side-thumbnail', 80 , 80, true); //Portfolio Image
    add_image_size( 'post-thumbnail', 626, 203 , true); //post Image
    add_image_size( 'testimonials-thumbnails', 150 , 150, true); //Testimonials Image
    add_image_size( 'latest-post-thumbnails', 110 , 110, true); //latest-event Image
    add_image_size( 'testimonials-home', 52 , 52 , true); //testimonials Image
    add_image_size( 'featured-thumbnails-home', 273 , 206 , true); //featured Image home
    add_image_size( 'blog-layout-four-image', 870 , 300 , true);//blog image for layout four	
    add_image_size( 'event-list-thumb', 150 , 150 , true);//events list thumbnails
    

	// This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
    	'primary' => __( 'Primary Menu', 'zincy-lite' ),
    	) );

	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'zincylite_custom_background_args', array(
    	'default-color' => 'ffffff',
    	'default-image' => '',
    	) ) );
    
    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support( 'html5', array(
    	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    	) );

}
endif; // zincylite_setup
add_action( 'after_setup_theme', 'zincylite_setup' );

/**
 * Implement the Theme Option feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Implement the custom metabox feature
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Customizer additions.
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer_Options default-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/default-settings.php';

/**
 * Customizer_Options general-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/general-settings.php';

/**
 * Customizer_Options typography-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/typography-settings.php';

/**
 * Customizer_Options sider-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/slider-settings.php';

/**
 * Customizer_Options homepage-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/homepage-settings.php';

/**
 * Customizer_Options homepage-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/block-settings.php';

/**
 * Customizer_Options social-link-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/social-link-settings.php';

/**
 * Customizer_Options sidebar-settings.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/sidebar-settings.php';
/**
 * Theme Info theme-info.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/theme-info.php';

/**
 * Customizer_Options sanitizer.php
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/admin-panel/assets/sanitizer.php';

/**
 * Customizer_Options additions.
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/category-dropdown.php'; 

/**
 * Customizer_Options additions.
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/typography-dropdown.php'; 

/**
 * Customizer_Options post dropdown.
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/post-dropdown.php';
/**
 * Customizer_Options layout dropdown.
 *
 * @since ZincyLite
 */
require get_template_directory() . '/inc/layout-dropdown.php';

/**
 * 
 * dynamic stylesheet
 * 
 */
require get_template_directory() . '/css/styles.php';


/**
 * 8Degree More Themes
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Add stylesheet and JS for upsell page.
function zincy_lite_upsell_style() {
	wp_enqueue_style( 'upsell-style', get_template_directory_uri() . '/css/upsell.css');
}

// Add upsell page to the menu.
function zincy_lite_add_upsell() {
	$page = add_theme_page(
		__( 'More Themes', 'zincy-lite' ),
		__( 'More Themes', 'zincy-lite' ),
		'administrator',
		'zincy-lite-themes',
		'zincy_lite_display_upsell'
	);

	add_action( 'admin_print_styles-' . $page, 'zincy_lite_upsell_style' );
}
add_action( 'admin_menu', 'zincy_lite_add_upsell', 11 );

// Define markup for the upsell page.
function zincy_lite_display_upsell() {

	// Set template directory uri
	$directory_uri = get_template_directory_uri();
	?>
	<div class="wrap">
		<div class="container-fluid">
			<div id="upsell_container">  
				<div class="row">
					<div id="upsell_header" class="col-md-12">
						<h2>
							<a href="http://8degreethemes.com/" target="_blank">
								<img src="http://8degreethemes.com/wp-content/uploads/2015/05/logo.png"/>
							</a>
						</h2>

						<h3><?php _e( 'Product of 8Degree Themes', 'zincy-lite' ); ?></h3>
					</div>
				</div>

				<div id="upsell_themes" class="row">
					<?php
					// Set the argument array with author name.
					$args = array(
						'author' => '8degreethemes',
					);

					// Set the $request array.
					$request = array(
						'body' => array(
							'action'  => 'query_themes',
							'request' => serialize( (object)$args )
						)
					);
					$themes = zincy_lite_get_themes( $request );
					$active_theme = wp_get_theme()->get( 'Name' );
					$counter = 1;

					// For currently active theme.
					foreach ( $themes->themes as $theme ) {
						if( $active_theme == $theme->name ) {?>

							<div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4">
								<div class="image-container">
									<img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>

									<div class="theme-description">
										<p><?php echo $theme->description; ?></p>
									</div>
								</div>
								<div class="theme-details active">
									<span class="theme-name"><?php echo $theme->name . ':' . __( 'Current theme', 'zincy-lite' ); ?></span>
									<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>">Customize</a>
								</div>
							</div>

						<?php
						$counter++;
						break;
						}
					}

					// For all other themes.
					foreach ( $themes->themes as $theme ) {
						if( $active_theme != $theme->name ) {

							// Set the argument array with author name.
							$args = array(
								'slug' => $theme->slug,
							);

							// Set the $request array.
							$request = array(
								'body' => array(
									'action'  => 'theme_information',
									'request' => serialize( (object)$args )
								)
							);

							$theme_details = zincy_lite_get_themes( $request );
							?>

							<div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4 <?php echo $counter % 3 == 1 ? 'no-left-megin' : ""; ?>">
								<div class="image-container">
									<img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>

									<div class="theme-description">
										<p><?php echo $theme->description; ?></p>
									</div>
								</div>
								<div class="theme-details">
									<span class="theme-name"><?php echo $theme->name; ?></span>

									<!-- Check if the theme is installed -->
									<?php if( wp_get_theme( $theme->slug )->exists() ) { ?>

										<!-- Show the tick image notifying the theme is already installed. -->
										<img data-toggle="tooltip" title="<?php _e( 'Already installed', 'zincy-lite' ); ?>" data-placement="bottom" class="theme-exists" src="<?php echo $directory_uri ?>/images/8dt-right.png"/>

										<!-- Activate Button -->
										<a  class="button button-primary activate right"
											href="<?php echo wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . $theme->slug );?>" >Activate</a>
									<?php }
									else {

										// Set the install url for the theme.
										$install_url = add_query_arg( array(
												'action' => 'install-theme',
												'theme'  => $theme->slug,
											), self_admin_url( 'update.php' ) );
									?>
										<!-- Install Button -->
										<a data-toggle="tooltip" data-placement="bottom" title="<?php echo 'Downloaded ' . number_format( $theme_details->downloaded ) . ' times'; ?>" class="button button-primary install right" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" ><?php _e( 'Install Now', 'zincy-lite' ); ?></a>
									<?php } ?>

									<!-- Preview button -->
									<a class="button button-secondary preview right" target="_blank" href="<?php echo $theme->preview_url; ?>"><?php _e( 'Live Preview', 'zincy-lite' ); ?></a>
								</div>
							</div>
							<?php
							$counter++;
						}
					}?>
				</div>
			</div>
		</div>
	</div>
<?php
}

// Get all 8Degree themes by using API.
function zincy_lite_get_themes( $request ) {

	// Generate a cache key that would hold the response for this request:
	$key = 'zincy-lite_' . md5( serialize( $request ) );

	// Check transient. If it's there - use that, if not re fetch the theme
	if ( false === ( $themes = get_transient( $key ) ) ) {

		// Transient expired/does not exist. Send request to the API.
		$response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

		// Check for the error.
		if ( !is_wp_error( $response ) ) {

			$themes = unserialize( wp_remote_retrieve_body( $response ) );

			if ( !is_object( $themes ) && !is_array( $themes ) ) {

				// Response body does not contain an object/array
				return new WP_Error( 'theme_api_error', 'An unexpected error has occurred' );
			}

			// Set transient for next time... keep it for 24 hours should be good
			set_transient( $key, $themes, 60 * 60 * 24 );
		}
		else {
			// Error object returned
			return $response;
		}
	}
	return $themes;
}


/**
 * 
 * more then 4 product
 * 
 */
 add_filter('loop_shop_columns', 'loop_columns'); 
if (!function_exists('loop_columns')) { 

function loop_columns() { 
    $xr = 4; 
    return $xr; 
  }
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
} 