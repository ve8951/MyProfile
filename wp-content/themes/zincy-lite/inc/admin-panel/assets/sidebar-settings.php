<?php
/**
 * 
 * Sidebar Settings Zincy Lite
 * 
 */
function zincy_lite_customizer_sidebar( $wp_customize ) {
 /**
 * 
 * Sidebar Settings Panel Start
 * 
 */
    $wp_customize->add_panel( 
        'sidebar_option_panel',
         array(
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Sidebar Settings', 'zincy-lite' ),
        ) 
    );
    
    //Left sidebar settings.
    $wp_customize->add_section(
        'left_sidebar_section',
        array(
            'title' => __( 'Left Sidebar Settings' , 'zincy-lite' ),
            'priority' => 10,
            'panel' => 'sidebar_option_panel',
        )
    );
    
    $wp_customize->add_setting(
        'left_sidebar_event',
        array(
            'default' => '1',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'left_sidebar_event',
        array(
            'label' => __( 'Check To Enable' , 'zincy-lite' ),
            'section' => 'left_sidebar_section',
            'description' => __( 'Uncheck to disable the latest event in left sidebar' , 'zincy-lite' ),
            'type' => 'checkbox',
        )
    ); 
    
    //portfolio settings
    $wp_customize->add_setting(
        'left_sidebar_portfolio',
        array(
            'default' => '1',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'left_sidebar_portfolio',
        array(
            'label' => __( 'Check To Enable' , 'zincy-lite' ),
            'section' => 'left_sidebar_section',
            'description' => __( 'Uncheck to disable the portfolio in left sidebar' , 'zincy-lite' ),
            'type' => 'checkbox',
        )
    );
    
    //Right sidebar settings.
    $wp_customize->add_section(
        'right_sidebar_section',
        array(
            'title' => __( 'Right Sidebar Settings' , 'zincy-lite' ),
            'priority' => 10,
            'panel' => 'sidebar_option_panel',
        )
    );
    
    $wp_customize->add_setting(
        'right_sidebar_event',
        array(
            'default' => '1',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'right_sidebar_event',
        array(
            'label' => __( 'Check To Enable' , 'zincy-lite' ),
            'section' => 'right_sidebar_section',
            'description' => __( 'Uncheck to disable the latest event in right sidebar' , 'zincy-lite' ),
            'type' => 'checkbox',
        )
    ); 
    
    //Portfolio settings
    $wp_customize->add_setting(
        'right_sidebar_portfolio',
        array(
            'default' => '1',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'right_sidebar_portfolio',
        array(
            'label' => __( 'Check To Enable', 'zincy-lite' ),
            'section' => 'right_sidebar_section',
            'description' => __( 'Uncheck to disable the portfolio in right sidebar' , 'zincy-lite' ),
            'type' => 'checkbox',
        )
    );
    
    //Option to choose portfolio categroy.
    $wp_customize->add_section(
        'sidebar_category',
        array(
            'title' => __( 'Portfolio Category', 'zincy-lite' ),
            'priority' => 30,
            'description' => __( 'Choose category to view as portfolio.' , 'zincy-lite' ),
            'panel' => 'sidebar_option_panel',
        )
    );
    
    $wp_customize->add_setting( 
        'zincylite_portfolio',
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
        );

    $wp_customize->add_control( new Zincy_Lite_Category_Dropdown( $wp_customize, 
        'zincylite_portfolio', 
        array(
        'section' => 'sidebar_category',
        'settings'   => 'zincylite_portfolio',
        ) 
    ) );
    
    $wp_customize->add_setting(
        'view_all_text',
        array(
            'default' => 'View All',
            'sanitize_callback' => 'zincy_sanitize_text'
            )
    );
    
    $wp_customize->add_control(
        'view_all_text',
        array(
            'label' => __( 'View All Text' , 'zincy-lite' ),
            'section' => 'sidebar_category',
            'description' => __( "Leave blank if you don't want to show view all text" , 'zincy-lite' ),
            'type' => 'text',
        )
    );   
}
add_action( 'customize_register', 'zincy_lite_customizer_sidebar' );