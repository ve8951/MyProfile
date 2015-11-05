<?php

function zincy_lite_customizer_slider( $wp_customize ) {
    $wp_customize->add_panel( 
        'slider_settings',
         array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'description' => __( 'Homepage slider settings, change the following options to control the slider' , 'zincy-lite' ),
            'theme_supports' => '',
            'title' => __( 'Slider Settings', 'zincy-lite' ),
        ) 
    );
    
    // select slider type............
    $wp_customize->add_section(
        'slider_type',
        array(
            'title' => __( 'Banner Settings' , 'zincy-lite' ),
            'priority' => 15,
            'panel' => 'slider_settings',
        )
    );
    
    $wp_customize->add_setting(
        'slider_type_choose',
        array(
            'default' => 'option1',
            'sanitize_callback' => 'slider_choose_radio_sanitize'
            )
    );
    
    $wp_customize->add_control(
        'slider_type_choose',
        array(
            'label' => __( 'Choose Banner Type' , 'zincy-lite' ),
            'section' => 'slider_type',
            'type' => 'radio',
            'choices' => array(
                             'option1' => __( 'Single Posts as a Slider' , 'zincy-lite' ),
                             'option2' => __( 'Category Posts as a Slider' , 'zincy-lite' ),
                             )
        )
    );
    
    
    //Slider Post Choose
    $wp_customize->add_section(
        'slider_page_choose_section',
        array(
            'title' => __( 'Banner Selection(Page)' , 'zincy-lite' ),
            'priority' => 15,
            'description' => __( 'Note: Enable single post as slider in banner setting section to enable post as slider.' , 'zincy-lite' ),
            'panel' => 'slider_settings',
        )
    );
    
    $wp_customize->add_setting(
        'slider_one',
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Post_Dropdown( $wp_customize, 
        'slider_one',
        array(
            'label' => __( 'Choose Slider 1' , 'zincy-lite' ),
            'section' => 'slider_page_choose_section',
            'type' => 'select',
        )
    ) );
    
    $wp_customize->add_setting(
        'slider_two',
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Post_Dropdown( $wp_customize, 'slider_two',
        array(
            'label' => __( 'Choose Slider 2' , 'zincy-lite' ),
            'section' => 'slider_page_choose_section',
            'type' => 'select',
        )
    ) );
    
    
    $wp_customize->add_setting(
        'slider_three',
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Post_Dropdown( $wp_customize, 'slider_three',
        array(
            'label' => __( 'Choose Slider 3' , 'zincy-lite' ),
            'section' => 'slider_page_choose_section',
            'type' => 'select',
        )
    ) );
    
    
    $wp_customize->add_setting(
        'slider_four',
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Post_Dropdown( $wp_customize, 
        'slider_four',
        array(
            'label' => __( 'Choose Slider 4' , 'zincy-lite' ),
            'section' => 'slider_page_choose_section',
            'type' => 'select',
        )
    ) );
    
    //slider category choose
    $wp_customize->add_section(
        'slider_category_choose_section',
        array(
            'title' => __( 'Banner Selection(Category)' , 'zincy-lite' ),
            'priority' => 20,
            'description' => __( 'Note: Enable category as slider in banner setting section to enable category as slider.' , 'zincy-lite' ),
            'panel' => 'slider_settings',
        )
    );
    
    $wp_customize->add_setting(
        'slider_category',
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general'
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Category_Dropdown( $wp_customize, 
        'slider_category',
        array(
            'section' => 'slider_category_choose_section',
            'type' => 'select',
        )
    ) );
    
    
    
    // Slider General Settings............
    $wp_customize->add_section(
        'slider_general_settings',
        array(
            'title' => __( 'General Settings' , 'zincy-lite' ),
            'priority' => 10,
            'description' => __( 'Enable/Disable Slider.' , 'zincy-lite' ),
            'panel' => 'slider_settings',
        )
    );
    
    //enable/disable slider in homepage
    $wp_customize->add_setting(
        'slider_option',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'slider_option',
        array(
            'label' => __( 'Check To Disable', 'zincy-lite' ),
            'description' => __( 'Check to disable the slider in homepage' , 'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'checkbox',
        )
    ); 
    
    //Slider pagination settings
    $wp_customize->add_setting(
        'slider_pager_option',
        array(
            'default' => 'yes',
            'sanitize_callback' => 'zincylite_pager_radio_sanitize',
            )
    );
    
    $wp_customize->add_control(
        'slider_pager_option',
        array(
            'description' => __( 'Show Slider Pager (Navigation dots)' , 'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                            'yes' => __( 'Yes', 'zincy-lite' ),
                            'no' => __( 'No' , 'zincy-lite' ),
                            )
        )
    ); 
    
    //Slider control settings
    $wp_customize->add_setting(
        'slider_control_option',
        array(
            'default' => 'yes',
            'sanitize_callback' => 'zincylite_pager_radio_sanitize',
            )
    );
    
    $wp_customize->add_control(
        'slider_control_option',
        array(
            'description' => __( 'Show Slider Controls (Arrows)' , 'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                            'yes' => __( 'Yes' , 'zincy-lite' ),
                            'no' => __( 'No' , 'zincy-lite' ),
                            )
        )
    );   
    
    //Slider transition settings
    $wp_customize->add_setting(
        'slider_transition',
        array(
            'default' => 'slide',
            'sanitize_callback' => 'zincylite_slide_fade_radio_sanitize',
            )
    );
    
    $wp_customize->add_control(
        'slider_transition',
        array(
            'description' => __( 'Slider Transition - fade/slide' , 'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                            'fade' => __( 'Fade' , 'zincy-lite' ),
                            'slide' => __( 'Slide' , 'zincy-lite' ),
                            )
        )
    );  
    
    //Slider auto transition settings.   
    $wp_customize->add_setting(
        'slider_auto_transition',
        array(
            'default' => 'yes',
            'sanitize_callback' => 'zincylite_pager_radio_sanitize',
            )
    );
    
    $wp_customize->add_control(
        'slider_auto_transition',
        array(
            'description' => __( 'Slider auto Transition' ,'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                            'yes' => __( 'Yes' , 'zincy-lite' ),
                            'no' => __( 'No' , 'zincy-lite' ),
                            )
        )
    );  
    
    //Option to control slider speed.
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default' => '3000',
            'sanitize_callback' => 'zincylite_sanitize_integer',
            )
    );
    
    $wp_customize->add_control(
        'slider_speed',
        array(
            'label' => __( 'Choose slider speed?' , 'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'text',
        )
    );
    
    //Option to control slider pause.    
    $wp_customize->add_setting(
        'slider_pause',
        array(
            'default' => '4000',
            'sanitize_callback' => 'zincylite_sanitize_integer',
            )
    );
    
    $wp_customize->add_control(
        'slider_pause',
        array(
            'label' => __( 'Choose slider pause time?' , 'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'text',
        )
    );
    
    //Caption control setting in slider.
    $wp_customize->add_setting(
        'slider_captions',
        array(
            'default' => 'show',
            'sanitize_callback' => 'zincylite_show_hide_radio_sanitize',
            )
    );
    
    $wp_customize->add_control(
        'slider_captions',
        array(
            'label' => __( 'Show/hide slider captions' , 'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                            'show' => __( 'Show' , 'zincy-lite' ),
                            'hide' => __( 'Hide' , 'zincy-lite' ),
                            )
        )
    );
    
    //Caption control setting in slider.
    $wp_customize->add_setting(
        'slider_callto_action_text',
        array(
            'default' => 'Learn More',
            'sanitize_callback' => 'zincylite_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'slider_callto_action_text',
        array(
            'label' => __( 'Slider Read More Text' , 'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'text',
        )
    );
    
    //slider overlay.
    /*$wp_customize->add_setting(
        'slider_overlay',
        array(
            'default' => 'show',
            'sanitize_callback' => 'zincylite_show_hide_radio_sanitize',
            )
    );
    
    $wp_customize->add_control(
        'slider_overlay',
        array(
            'label' => __( 'Enable/Disable Slider Overlay' , 'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                            'show' => __( 'Enable' , 'zincy-lite' ),
                            'hide' => __( 'Disable' , 'zincy-lite' ),
                            )
        )
    );*/
    
    //slider text overlay.
    $wp_customize->add_setting(
        'slider_text_overlay',
        array(
            'default' => 'show',
            'sanitize_callback' => 'zincylite_show_hide_radio_sanitize',
            )
    );
    
    $wp_customize->add_control(
        'slider_text_overlay',
        array(
            'label' => __( 'Enable/Disable Text Overlay' , 'zincy-lite' ),
            'section' => 'slider_general_settings',
            'type' => 'radio',
            'choices' => array(
                            'show' => __( 'Enable' , 'zincy-lite' ),
                            'hide' => __( 'Disable' ,'zincy-lite' ),
                            )
        )
    );
    
    //slider text overlay color.
    $wp_customize->add_setting(
        'slider_text_overlay_color',
        array(
            'sanitize_callback' => 'zincylite_sanitize_text',
            )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
        'slider_text_overlay_color', 
    	array(
    		'label'      => __( 'Text Overlay Color', 'zincy-lite' ),
    		'section'    => 'slider_general_settings',
            'settings' => 'slider_text_overlay_color',
    	) ) 
    );
}
add_action( 'customize_register', 'zincy_lite_customizer_slider' );
