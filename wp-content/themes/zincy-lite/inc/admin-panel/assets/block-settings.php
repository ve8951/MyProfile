<?php

/**
 * 
 * Block above footer Settings Zincy Lite
 * 
 */
 
function zincy_lite_customizer_block( $wp_customize ) {
    $wp_customize->add_panel( 
        'block_above_footer_panel',
         array(
            'priority' => 40,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'description' => __( 'Note: Block above footer is replaced by widget area in widget section.' , 'zincy-lite'),
            'title' => __( 'Block Above Footer', 'zincy-lite' ),
        ) 
    );
    
    //Select the category to display as Testimonials.
    $wp_customize->add_section( 
        'zincylite_category_testimonials' , 
        array(
            'title'       => __( 'Block Settings', 'zincy-lite'),
            'priority'    => 20,
            'description' => __( 'Enable/Disable Block Above Footer.' , 'zincy-lite' ),
            'panel' => 'block_above_footer_panel',
        ) 
    );
    
    //Enable disable feature section in homepage.    
    $wp_customize->add_setting(
        'block_above_footer',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control( 
        'block_above_footer',
        array(
            'label' => __( 'Check To Enable', 'zincy-lite' ),
            'section' => 'zincylite_category_testimonials',
            'description' => __( 'Choose category to display as testimonials.' , 'zincy-lite'),
            'type' => 'checkbox',
        )
     );
    
    //Select the category to display as Testimonials
    $wp_customize->add_setting( 
        'zincylite_testimonials',
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
        );

    $wp_customize->add_control( new Zincy_Lite_Category_Dropdown( $wp_customize, 
        'zincylite_testimonials', 
        array(
            'section' => 'zincylite_category_testimonials',
            'settings'   => 'zincylite_testimonials',
            ) 
    ) );
    
    
    //Gallery Images Code.    
    $wp_customize->add_setting(
        'gallery_image_code',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
            )
    );
    
    $wp_customize->add_control( 
        'gallery_image_code',
        array(
            'label' => __( 'Gallery Short Code.' , 'zincy-lite' ),
            'section' => 'zincylite_category_testimonials',
            'description' => __( 'Example: [gallery link="file" ids="203,204,205,206,207,208"]' , 'zincy-lite'),
            'type' => 'textarea',
        )
     );    
}
add_action( 'customize_register', 'zincy_lite_customizer_block' );