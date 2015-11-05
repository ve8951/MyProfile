<?php
/**
 * 
 * General Settings Zincy Lite
 * 
 */
function zincy_lite_customizer_general( $wp_customize ) {
    $wp_customize->add_panel( 
        'general_setting',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'General Setting', 'zincy-lite' ),
        ) 
    );
    
    // Responsive setting checkbox
    $wp_customize->add_section(
        'responsive_design',
        array(
            'title' => __( 'Responsive Settings' , 'zincy-lite' ),
            'description' => __( 'Disable Responsive Design?' , 'zincy-lite' ),
            'priority' => 10,
            'panel' => 'general_setting',
        )
    );
    
    $wp_customize->add_setting(
        'disable_responsive_design',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'disable_responsive_design',
        array(
            'label' => __( 'Check To Disable' , 'zincy-lite' ),
            'section' => 'responsive_design',
            'type' => 'checkbox',
        )
    );
    
    //Web page layout selection
    $wp_customize->add_setting(
        'webpage_layout_choose',
        array(
            'default'=>'fullwidth',
            'sanitize_callback' => 'webpage_layout_radio_sanitize',
            )
    );
    
    $wp_customize->add_control(
        'webpage_layout_choose',
        array(
            'label' => __( 'Choose Web Page Layout?' , 'zincy-lite' ),
            'section' => 'responsive_design',
            'type' => 'radio',
            'choices' => array(
                            'fullwidth' => __( 'Fullwidth' , 'zincy-lite' ),
                            'boxed' => __( 'Boxed' , 'zincy-lite' ),
                            ),
        )
    );
    
    $wp_customize->add_section(
        'search_box',
        array(
            'title' => __( 'Search Setting' , 'zincy-lite' ),
            'description' => __( 'Show search box in header?' , 'zincy-lite' ),
            'priority' => 20,
            'panel' => 'general_setting',
        )
    );
    
    //Search in header
    $wp_customize->add_setting(
        'search_box_header',
        array(
            'default'=> '1',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'search_box_header',
        array(
            'label' => __( 'Check to enable' , 'zincy-lite' ),
            'section' => 'search_box',
            'type' => 'checkbox',
        )
    );
    
    //Header Text..............
    $wp_customize->add_section( 
        'zincylite_header' , 
        array(
            'title'       => __( 'Header Settings' , 'zincy-lite' ),
            'priority'    => 35,
            'panel' => 'general_setting',
        ) 
    );
    
    //Favicon selection
    $wp_customize->add_setting( 
        'favicon_image',
        array(
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'favicon_image', array(
        'label'    => __( 'Upload Favicon', 'zincy-lite' ),
        'section'  => 'zincylite_header',
        'description' => __( 'Upload favicon(.png) with size of 16px X 16px' , 'zincy-lite' ),
        'settings' => 'favicon_image',
        ) 
    ));
    
    
    //Header text
    $wp_customize->add_setting( 
        'header_text',
        array(
            'default' => 'Call us: 1234567XXX',
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_kses_post', 
        ) 
    );
    
    $wp_customize->add_control( 
        'header_text' ,
        array(
            'label'    => __( 'Edit Header Text' , 'zincy-lite' ),
            'description' => __( 'Html content is allowed as header text.' , 'zincy-lite' ),
            'section'  => 'zincylite_header',
            'type' => 'textarea',
        ) 
    );
    
    
    //top header bg_color
    $wp_customize->add_setting( 
        'top_header_bgcolor',
        array(
            'default' => '#fff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color', 
        ) 
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize ,
        'top_header_bgcolor' ,
        array(
            'label' => __( 'Top Header Background' , 'zincy-lite' ),
            'description'    => __( 'choose top header background color' , 'zincy-lite' ),
            'section'  => 'zincylite_header',
        ) 
    ) );
    
    //top header bg_color
    $wp_customize->add_setting( 
        'top_header_color',
        array(
            'default' => '#222',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color', 
        ) 
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize ,
        'top_header_color' ,
        array(
            'label' => __( 'Top Header Color' , 'zincy-lite' ),
            'description'    => __( 'choose top header color' , 'zincy-lite' ),
            'section'  => 'zincylite_header',
        ) 
    ) );
    
    //menu alignment
    $wp_customize->add_section( 
        'zincylite_menu' , 
        array(
            'title'       => __( 'Menu Settings' , 'zincy-lite' ),
            'priority'    => 40,
            'panel' => 'general_setting',
        ) 
    );

    $wp_customize->add_setting( 
        'menu_alignment',
        array(
            'default' => 'right',
            'transport' => 'refresh',
            'sanitize_callback' => 'zincylite_menu_sanitize', 
        ) 
    );
    
    $wp_customize->add_control( 
        'menu_alignment' ,
        array(
            'label' => __( 'Menu Alignment' , 'zincy-lite' ),
            'description'    => __( 'Choose the menu allignment as left, right or center' , 'zincy-lite' ),
            'section'  => 'zincylite_menu',
            'type' => 'select',
            'choices' => array(
                            'left' => __( 'Left' , 'zincy-lite' ),
                            'center' => __( 'Center' , 'zincy-lite' ),
                            'right' => __( 'Right' , 'zincy-lite' ),
                            ),
        ) 
    );
    
    //menu bg_color
    $wp_customize->add_setting( 
        'menu_bgcolor',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color', 
        ) 
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize ,
        'menu_bgcolor' ,
        array(
            'label' => __( 'Menu Background Color' , 'zincy-lite' ),
            'description'    => __( 'choose menu background color' , 'zincy-lite' ),
            'section'  => 'zincylite_menu',
        ) 
    ) );
    
    //menu bg_pattern
    $wp_customize->add_setting( 
        'menu_bgimage',
        array(
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url', 
        ) 
    );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize ,
        'menu_bgimage' ,
        array(
            'label' => __( 'Menu Background' , 'zincy-lite' ),
            'description'    => __( 'choose menu background pattern' , 'zincy-lite' ),
            'section'  => 'zincylite_menu',
        ) 
    ) );
    
    //menu color
    $wp_customize->add_setting( 
        'menu_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color', 
        ) 
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize ,
        'menu_color' ,
        array(
            'label' => __( 'Menu Color' , 'zincy-lite' ),
            'description'    => __( 'choose menu color' , 'zincy-lite' ),
            'section'  => 'zincylite_menu',
        ) 
    ) );
    
    //Details page settings
    $wp_customize->add_section( 
        'zincylite_details_section' , 
        array(
            'title'       => __( 'Details Page/Post Settings' , 'zincy-lite' ),
            'priority'    => 55,
            'description' => __( 'Choose the settings for the details/listing page of the post.' , 'zincy-lite' ),
            'panel' => 'general_setting',
        ) 
    );

    $wp_customize->add_setting( 
        'zincylite_details_feature_image',
        array(
            'default' => '1',
            'sanitize_callback' => 'zincylite_sanitize_text', 
        ) 
    );
    
    $wp_customize->add_control( 
        'zincylite_details_feature_image' ,
        array(
            'label'    => __( 'Check to enable' , 'zincy-lite' ),
            'description' => __( 'Check to enable the post feature image in details page' , 'zincy-lite' ),
            'section'  => 'zincylite_details_section',
            'type' => 'checkbox',
        ) 
    ); 
    
    $wp_customize->add_setting( 
        'zincylite_details_date_author',
        array(
            'default' => '1',
            'sanitize_callback' => 'zincylite_sanitize_text', 
        ) 
    );
    
    $wp_customize->add_control( 
        'zincylite_details_date_author' ,
        array(
            'label'    => __( 'Check to enable' , 'zincy-lite' ),
            'description' => __( 'Check to enable the post date and author in details page' , 'zincy-lite' ),
            'section'  => 'zincylite_details_section',
            'type' => 'checkbox',
        ) 
    ); 
    
    //Footer text
    $wp_customize->add_section( 
        'zincylite_footer' , 
        array(
            'title'       => __( 'Footer Settings' , 'zincy-lite' ),
            'priority'    => 55,
            'panel' => 'general_setting',
        ) 
    );

    $wp_customize->add_setting( 
        'footer_text',
        array(
            'default' => 'Zincy lite',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincylite_sanitize_text', 
        ) 
    );
    
    $wp_customize->add_control( 
        'footer_text' ,
        array(
            'label'    => __( 'Edit Footer Text' , 'zincy-lite' ),
            'description' => __( 'html content is allowed as footer text.' , 'zincy-lite' ),
            'section'  => 'zincylite_footer',
            'type' => 'text',
        ) 
    ); 
}
add_action( 'customize_register', 'zincy_lite_customizer_general' );