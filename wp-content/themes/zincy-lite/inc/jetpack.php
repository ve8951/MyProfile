<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package ZincyLite
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function zincy_lite_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'zincy_lite_jetpack_setup' );
