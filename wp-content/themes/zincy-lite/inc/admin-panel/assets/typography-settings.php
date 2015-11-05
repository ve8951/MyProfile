<?php
/**
 * 
 * Typography Settings Zincy Lite
 * 
 */
 
function zincy_lite_customizer_typography( $wp_customize ) {
    $wp_customize->add_panel( 
        'typography_panel',
         array(
            'priority' => 110,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'description' => __( 'Choose unlimated color and fonts/typography settings.' , 'zincy-lite' ),
            'title' => __( 'Typography Settings', 'zincy-lite' ),
        ) 
    );
    
    //typogarphy settings
    $wp_customize->add_section( 
        'zincylite_typography_option' , 
        array(
            'title'       => __( 'Typography Options' , 'zincy-lite' ),
            'priority'    => 20,
            'panel' => 'typography_panel',
        ) 
    );
    
    //heading typography   
    $wp_customize->add_setting(
        'heading_typography',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_text',
            'transport' => 'postMessage',
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Typography_Dropdown( $wp_customize ,
        'heading_typography',
        array(
            'label' => __( 'Choose Fonts for Heading Text.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_option',
            'description' => __( 'Choose a font for the heading H1, H2, H3, H4, H5, H6 text' , 'zincy-lite' ),
            'type' => 'select',
        )
     ) );
     
     //heading typography   
    $wp_customize->add_setting(
        'body_typography',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Typography_Dropdown( $wp_customize ,
        'body_typography',
        array(
            'label' => __('Choose Fonts for Body Text.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_option',
            'description' => 'Choose fonts for body text.',
            'type' => 'select',
        )
     ) );
     
     //typography formating
     $wp_customize->add_section( 
        'zincylite_typography_format' , 
        array(
            'title'       => __( 'Typography Formating' , 'zincy-lite' ),
            'priority'    => 20,
            'description' => '',
            'panel' => 'typography_panel',
        ) 
    );
    
    
    //heading typography formating h1  
    $wp_customize->add_setting(
        'typography_format_h1',
        array(
            'default' => '26',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincylite_sanitize_integer',
            )
    );
    
    $wp_customize->add_control(
        'typography_format_h1',
        array(
            'label' => __( 'Choose Fonts Size for H1 Text.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
            'type' => 'number',
        )
     );
     
      //text color h1
     $wp_customize->add_setting(
        'typography_color_h1',
        array(
            'default' => '#000000',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 
        'typography_color_h1',
        array(
            'label' => __( 'Choose Text Color.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
        )
     ) );
     
     //heading typography formating h2  
    $wp_customize->add_setting(
        'typography_format_h2',
        array(
            'default' => '24',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'typography_format_h2',
        array(
            'label' => __( 'Choose Fonts Size for H2 Text.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
            'type' => 'number',
        )
     );
     
      //text color h2
     $wp_customize->add_setting(
        'typography_color_h2',
        array(
            'default' => '#000000',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 
        'typography_color_h2',
        array(
            'label' => __( 'Choose Text Color.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
        )
     ) );
     
     //heading typography formating h3  
    $wp_customize->add_setting(
        'typography_format_h3',
        array(
            'default' => '22',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'typography_format_h3',
        array(
            'label' => __( 'Choose Fonts Size for H3 Text.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
            'type' => 'number',
        )
     );
     
      //text color h3
     $wp_customize->add_setting(
        'typography_color_h3',
        array(
            'default' => '#000000',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 
        'typography_color_h3',
        array(
            'label' => __( 'Choose Text Color.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
        )
     ) );
     
     //heading typography formating h4  
    $wp_customize->add_setting(
        'typography_format_h4',
        array(
            'default' => '20',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'typography_format_h4',
        array(
            'label' => __( 'Choose Fonts Size for H4 Text.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
            'type' => 'number',
        )
     );
     
      //text color h4
     $wp_customize->add_setting(
        'typography_color_h4',
        array(
            'default' => '#000000',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 
        'typography_color_h4',
        array(
            'label' => __( 'Choose Text Color.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
        )
     ) );
     
     
     //heading typography formating h5  
    $wp_customize->add_setting(
        'typography_format_h5',
        array(
            'default' => '18',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'typography_format_h5',
        array(
            'label' => __( 'Choose Fonts Size for H5 Text.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
            'type' => 'number',
        )
     );     
     
      //text color h5
     $wp_customize->add_setting(
        'typography_color_h5',
        array(
            'default' => '#000000',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 
        'typography_color_h5',
        array(
            'label' => __( 'Choose Text Color.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
        )
     ) );
     
     //heading typography formating h6  
    $wp_customize->add_setting(
        'typography_format_h6',
        array(
            'default' => '16',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'typography_format_h6',
        array(
            'label' => __( 'Choose Fonts Size for H6 Text.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
            'type' => 'number',
        )
     );
     
     //text color h6
     $wp_customize->add_setting(
        'typography_color_h6',
        array(
            'default' => '#000000',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 
        'typography_color_h6',
        array(
            'label' => __( 'Choose Text Color.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_format',
        )
     ) );
     
     
     //body fonts size
     $wp_customize->add_setting(
        'typography_size_body',
        array(
            'default' => '14',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control( 
        'typography_size_body',
        array(
            'label' => __( 'Body Fonts Size.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_option',
            'type' => 'number',
        )
     );
     
     //body text color
     $wp_customize->add_setting(
        'typography_color_body',
        array(
            'default' => '#000000',
            'transport' => 'postMessage',
            'sanitize_callback' => 'zincy_sanitize_text',
            )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 
        'typography_color_body',
        array(
            'label' => __( 'Choose Text Color.' , 'zincy-lite' ),
            'section' => 'zincylite_typography_option',
        )
     ) );
     
}
add_action( 'customize_register', 'zincy_lite_customizer_typography' );