<?php

/**
 * 
 * Default Settings Zincy Lite
 * 
 */
 
function zincy_lite_customizer_default( $wp_customize ) {
    $wp_customize->add_panel( 
        'wp_default_panel',
         array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Default Settings', 'zincy-lite' ),
            'description' => __( 'Default section provided by wordpress customizer.', 'zincy-lite' ),
        ) 
    );

    
    $wp_customize->get_section( 'title_tagline' )->panel    = 'wp_default_panel';
    $wp_customize->get_section( 'colors' )->panel           = 'wp_default_panel';
    $wp_customize->get_section( 'header_image' )->panel     = 'wp_default_panel';
    $wp_customize->get_section( 'background_image' )->panel = 'wp_default_panel';
    $wp_customize->get_section( 'static_front_page' )->panel= 'wp_default_panel';
    
    
    /**
 * 
 * Tools section
 * 
 */ 
    $wp_customize->add_section(
        'tools_section',
        array(
            'title' => __( 'Tools' , 'zincy-lite' ),
            'priority' => 110,
        )
    ); 
    
    $wp_customize->add_setting(
        'custom_css',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_html'
            )
    );
    
    $wp_customize->add_control(
        'custom_css',
        array(
            'label' => __( 'Custom Css' , 'zincy-lite'),
            'section' => 'tools_section',
            'description' => __( 'Put your custom CSS', 'zincy-lite' ),
            'type' => 'textarea',
        )
    );
    
    //blog settings
    $wp_customize->add_section(
        'blog_section',
        array(
            'title' => __( 'Blog Settings', 'zincy-lite' ),
            'priority' => 100,
        )
    ); 
    
    $wp_customize->add_setting(
        'blog_category_settings',
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general'
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Category_Dropdown( $wp_customize,
        'blog_category_settings',
        array(
            'label' => __( 'Select the category to display as bolg.' , 'zincy-lite' ),
            'section' => 'blog_section',
        )
    ) );
    
    $wp_customize->add_setting(
        'blog_category_layout',
        array(
            'default' => 'layout1',
            'sanitize_callback' => 'zincylite_blog_layout_sanitize',
            )
    );
    
    $wp_customize->add_control(
        'blog_category_layout',
        array(
            'label' => __( 'Choose the Blog layout.' , 'zincy-lite' ),
            'section' => 'blog_section',
            'type' => 'radio',
            'choices' => array(
                            'layout1' => __( 'Layout 1' , 'zincy-lite' ),
                            'layout2' => __( 'Layout 2' , 'zincy-lite' ),
                            'layout3' => __( 'Layout 3' , 'zincy-lite' ),
                            'layout4' => __( 'Layout 4' , 'zincy-lite' ),
                            )
        )
    );
    
}
add_action( 'customize_register', 'zincy_lite_customizer_default' );