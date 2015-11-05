<?php
/**
 * 
 * Theme Info Zincy Lite
 * 
 */

function zincy_lite_customizer_themeinfo( $wp_customize ) {
	$wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Theme Information' , 'zincy-lite' ),
		'priority'    => 500,
		));

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'zincy_sanitize_text',
		));

	$zincy_lite_desc_theme_opt = "";
	$zincy_lite_desc_theme_opt .= "<strong>".__('Need help?','zincy-lite')."</strong><br />";
	$zincy_lite_desc_theme_opt .= "<span>".__('View documentation','zincy-lite').' : </span> <a target="_blank" href="'.esc_url('http://8degreethemes.com/documentation/zincy-lite/').'">'.__('here','zincy-lite').'</a> <br />';
	$zincy_lite_desc_theme_opt .= "<span>".__('Suggort forum','zincy-lite').' : </span><a target="_blank" href="'.esc_url('http://8degreethemes.com/support/forum/zincy-lite/').'">'.__('here','zincy-lite').'</a> <br />';
	$zincy_lite_desc_theme_opt .= "<span>".__('View Video tutorials','zincy-lite').' : </span><a target="_blank" href="'.esc_url('https://www.youtube.com/watch?list=PLyv2_zoytm1ifr1RwkKCsePhS6v5ynylV&v=HhSeA4TyvXQ').'">'.__('here','zincy-lite').'</a> <br />';
	$zincy_lite_desc_theme_opt .= "<span>".__('Email us','zincy-lite').' : </span><a target="_blank" href="'.esc_url('mailto:support@8degreethemes.com').'">support@8degreethemes.com</a> <br />';
	$zincy_lite_desc_theme_opt .= "<span>".__('More Details','zincy-lite').' : </span><a target="_blank" href="'.esc_url('http://8degreethemes.com/').'">'.__('here','zincy-lite').'</a>';

	$wp_customize->add_control( new Theme_Info_Custom_Control( $wp_customize ,'theme_info_theme',array(
		'label' => __( 'About Zincy Lite' , 'zincy-lite' ),
		'section' => 'theme_info',
		'description' => $zincy_lite_desc_theme_opt
		)));

	$wp_customize->add_setting('theme_info_more_theme',array(
		'default' => '',
		'sanitize_callback' => 'zincy_sanitize_text',
		));

	$zincy_lite_desc_theme_opt = '<a class="8dt-view-more-themes" target="_blank" href="'.admin_url().'themes.php?page=zincy-lite-themes">'.__('View','zincy-lite').'</a> <br />';
	// $zincy_lite_desc_theme_opt = '<a target="_blank" href="'.esc_url('http://8degreethemes.com/wordpress-themes/wimpie-lite/').'">'.__('Wimpie Lite','zincy-lite').'</a> <br />';
	// $zincy_lite_desc_theme_opt .= '<a target="_blank" href="'.esc_url('http://8degreethemes.com/wordpress-themes/hamza-lite/').'">'.__('Hamza Lite','zincy-lite').'</a> <br />';
	// $zincy_lite_desc_theme_opt .= '<a target="_blank" href="'.esc_url('http://8degreethemes.com/wordpress-themes/aglee-lite/').'">'.__('Aglee Lite','zincy-lite').'</a> <br />';

	$wp_customize->add_control( new Theme_Info_Custom_Control( $wp_customize ,'theme_info_more_theme',array(
		'label' => __( 'More Themes' , 'zincy-lite' ),
		'section' => 'theme_info',
		'description' => $zincy_lite_desc_theme_opt
		)));

	$wp_customize->add_setting('theme_info_pro_theme',array(
		'default' => '',
		'sanitize_callback' => 'zincy_sanitize_text',
		));

	$zincy_lite_desc_theme_opt = '<a target="_blank" href="http://8degreethemes.com/wordpress-themes/zincy-pro">'.__('Zincy PRO','zincy-lite').'</a> <br />';

	$wp_customize->add_control( new Theme_Info_Custom_Control( $wp_customize ,'theme_info_pro_theme',array(
		'label' => __( 'PRO Themes' , 'zincy-lite' ),
		'section' => 'theme_info',
		'description' => $zincy_lite_desc_theme_opt
		)));

	$wp_customize->add_setting('theme_info_useful_plugins',array(
		'default' => '',
		'sanitize_callback' => 'zincy_sanitize_text',
		));

	$zincy_lite_desc_theme_opt = '<a target="_blank" href="'.esc_url('http://8degreethemes.com/wordpress-plugins/8-degree-coming-soon-page/').'">'.__('8Degree Coming Soon Page','zincy-lite').'</a> <br />';

	$zincy_lite_desc_theme_opt .= '<a target="_blank" href="'.esc_url('http://8degreethemes.com/wordpress-plugins/8-degree-notification-bar/').'">'.__('8Degree Notification Bar','zincy-lite').'</a> <br />';

	$wp_customize->add_control( new Theme_Info_Custom_Control( $wp_customize ,'theme_info_useful_plugins',array(
		'label' => __( 'Useful Plugins' , 'zincy-lite' ),
		'section' => 'theme_info',
		'description' => $zincy_lite_desc_theme_opt
		)));

}
add_action( 'customize_register', 'zincy_lite_customizer_themeinfo' );


if(class_exists( 'WP_Customize_control')){

	class Theme_Info_Custom_Control extends WP_Customize_Control
	{
    	/**
       	* Render the content on the theme customizer page
       	*/
       	public function render_content()
       	{
       		?>
       		<label>
       			<strong class="customize-text_editor"><?php echo esc_html( $this->label ); ?></strong>
       			<br />
       			<span class="customize-text_editor_desc">
       				<?php echo wp_kses_post( $this->description ); ?>
       			</span>
       		</label>
       		<?php
       	}
    }//editor close
}//class close