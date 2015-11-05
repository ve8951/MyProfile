<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ZincyLite
 */
?>
<!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalabe=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.min.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<header id="masthead" class="site-header <?php do_action( 'zincylite_menu_alignment' ); ?>">
			<div class="top-right clearfix">
				<div class="zl-wrapper">
					<?php 
					do_action( 'zincylite_header_text' ); 
					?>
					<?php
					if ( is_active_sidebar( 'language-option' ) ) {
						dynamic_sidebar( 'language-option' );
					}
					?>
					<?php
					/** 
					* @hooked zincylite_social_cb - 10
					*/
					if(get_theme_mod('social_link_header') == '1'){
						do_action( 'zincylite_social_links' ); 
					}?>
					<?php

					if(get_theme_mod('search_box_header') == '1'){ 
						get_search_form();
					}
					?>
				</div>   	
			</div>
			<div id="top-header">
				<div class="zl-wrapper">
					<div class="site-branding">				
						<?php if ( get_header_image() ) { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>"/>
						</a>
						<?php }else{ ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<h1 class="site-title"><?php echo bloginfo('title'); ?></h1>
						</a>
						<div class="site-description"><?php echo bloginfo('description'); ?></div>
						<?php } ?>		
						
					</div><!-- .site-branding -->
					<div class="right-header clearfix">
						<nav id="site-navigation" class="main-navigation <?php do_action( 'zincylite_menu_alignment' ); ?>">
							<h1 class="menu-toggle">&nbsp;</h1>
							<?php wp_nav_menu( array( 
							'theme_location' => 'primary' ) ); ?>
						</nav><!-- #site-navigation -->
						<!--<div class="desk-nav">
							<ul>
								<li><a href="#">
									<div class="desk-nav-box">
										<div class="desk-nav-bx-frnt">Home</div>
										<div class="desk-nav-bx-bck">Home</div>
									</div>
								</a></li>
								<li><a href="#">
									<div class="desk-nav-box">
										<div class="desk-nav-bx-frnt">Home</div>
										<div class="desk-nav-bx-bck">Home</div>
									</div>
								</a></li>
							</ul>
						</div>-->
					</div><!-- .right-header -->
				</div><!-- .zl-wrapper -->
			</div><!-- #top-header -->
		</header><!-- #masthead -->

<section id="slider-banner">
	<?php 
	if(is_home() || is_front_page() ){
		do_action( 'zincylite_bxslider' ); 
	}?>
</section><!-- #slider-banner -->
<?php
if((is_home() || is_front_page()) && 'page' == get_option( 'show_on_front' )){	
	$zincylite_content_id = "content";	
}elseif(is_home() || is_front_page() ){
	$zincylite_content_id = "home-content";
}else{
	$zincylite_content_id ="content";
} ?>
<div id="<?php echo esc_attr($zincylite_content_id); ?>" class="site-content">
