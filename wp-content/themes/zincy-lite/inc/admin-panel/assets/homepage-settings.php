<?php

function zincy_lite_customizer_homepage( $wp_customize ) {
    $wp_customize->add_panel( 
        'homepage_settings',
         array(
            'priority' => 40,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Homepage Setting', 'zincy-lite' ),
        ) 
    );
    
    //Select the post to display as welcome post
    $wp_customize->add_section( 
        'zincylite_welcome_post' , 
        array(
            'title'       => __( 'Welcome Post Settings' , 'zincy-lite' ),
            'priority'    => 20,
            'description' => __( 'Select the post to display as welcome post.' , 'zincy-lite' ),
            'panel' => 'homepage_settings',
        ) 
    );
    
    $wp_customize->add_setting( 
        'welcome_post',
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
        );

    $wp_customize->add_control( new Zincy_Lite_Post_Dropdown( $wp_customize, 
        'welcome_post', 
        array(
        'section' => 'zincylite_welcome_post',
        'settings'   => 'welcome_post',
        ) 
    ) );
    
    //option to show welcome content as full content.
    $wp_customize->add_setting(
        'full_content',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'full_content',
        array(
            'label' => __( 'Check To Enable Full Content' , 'zincy-lite' ),
            'description' => __( 'Check to show welcome post content as full content.' , 'zincy-lite' ),
            'section' => 'zincylite_welcome_post',
            'type' => 'checkbox',
        )
    );
    
    
    //Number of character to display in welcome post character settings.
    $wp_customize->add_setting(
        'character_number',
        array(
            'default' => '650',
            'sanitize_callback' => 'zincylite_sanitize_integer',
            )
    );
    
    $wp_customize->add_control(
        'character_number',
        array(
            'label' => __( 'Welcome Post Excerpt Character' , 'zincy-lite' ),
            'section' => 'zincylite_welcome_post',
            'description' => __( 'Select the number of character as welcome post excerpt character' , 'zincy-lite' ),
            'type' => 'number',
        )
    );
    
    //Read more button text for welcome post.
    $wp_customize->add_setting(
        'read_more',
        array(
            'default' => 'Read More',
            'sanitize_callback' => 'zincylite_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'read_more',
        array(
            'label' => __( 'Read More Text' , 'zincy-lite' ),
            'description' => __( "Leave blank if you don't want to show read more!" , 'zincy-lite' ),
            'section' => 'zincylite_welcome_post',
            'type' => 'text',
        )
    );
    
    //Welcome post width settings fullwidth.
    $wp_customize->add_setting(
        'welcome_post_width',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'welcome_post_width',
        array(
            'label' => __( 'Check to Enable Full Width' , 'zincy-lite' ),
            'section' => 'zincylite_welcome_post',
            'type' => 'checkbox',
            'description' => __( 'Note: The welcome post will cover the full width if enable ,and sidebar beside welcome post will get disabled.' , 'zincy-lite' ),
        )
    );
    
     
    
    //Select the category to display as Events.
    $wp_customize->add_section( 
        'zincylite_category_event' , 
        array(
            'title'       => __( 'Events Settings' , 'zincy-lite' ),
            'priority'    => 40,
            'description' => __( 'Select the category to display as Events.' , 'zincy-lite' ),
            'panel' => 'homepage_settings',
        ) 
    );
    
    $wp_customize->add_setting( 
        'zincylite_event', 
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            ) 
        );

    $wp_customize->add_control( new Zincy_Lite_Category_Dropdown( $wp_customize, 
        'zincylite_event', 
        array(
        'section' => 'zincylite_category_event',
        'settings'   => 'zincylite_event',
        ) 
    ) );
    
    
    
    //No of Items to display in Event/News Category beside Welcome Post    
    $wp_customize->add_setting(
        'show_event_number',
        array(
            'default' => '3',
            'sanitize_callback' => 'zincylite_sanitize_integer',
            
            )
    );
    
    
    $wp_customize->add_control(
        'show_event_number',
        array(
            'section' => 'zincylite_category_event',
            'description' => __( 'Choose Number Of Events? No of Items to display in latest event ininner page sidebar' , 'zincy-lite' ),
            'type' => 'number',
        )
    );
    
    //Events date settings......    
    $wp_customize->add_setting(
        'show_event_date',
        array(
            'default' => '1',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'show_event_date',
        array(
            'label' => __( 'Check To Enable Date' , 'zincy-lite' ),
            'description' => __( 'Check to show date in latest events.' , 'zincy-lite' ),
            'section' => 'zincylite_category_event',
            'type' => 'checkbox',
        )
    );    
    
    //Call To action
     $wp_customize->add_section(
        'call_to_action_section',
        array(
            'title' => __( 'Call To Action' , 'zincy-lite' ),
            'priority' => 120,
            'panel' => 'homepage_settings',
        )
    );
    
    $wp_customize->add_setting(
        'call_to_action_option',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control( 
        'call_to_action_option',
        array(
            'label' => __( 'Check To Enable' , 'zincy-lite' ),
            'section' => 'call_to_action_section',
            'description' => __( '' , 'zincy-lite' ),
            'type' => 'checkbox',
        )
     );
    
    $wp_customize->add_setting(
        'call_to_action_text',
        array(
            'default' => 'Check Our Zincy Pro Theme - A premium version of Zincy Lite',
            'sanitize_callback' => 'wp_kses_post',
            )
    );
    
    $wp_customize->add_control( 
        'call_to_action_text',
        array(
            'label' => __( 'Text' , 'zincy-lite' ),
            'section' => 'call_to_action_section',
            'description' => __( 'Html content is allowed as call to action text, use custom css through tools sections.' , 'zincy-lite' ),
            'type' => 'textarea',
        )
     );
     
     //Call to action read more button text.
     $wp_customize->add_setting(
        'call_to_action_readmore',
        array(
            'default' => 'Check Now',
            'sanitize_callback' => 'zincylite_sanitize_text',
            )
    );
    
    $wp_customize->add_control( 
        'call_to_action_readmore',
        array(
            'label' => __( 'Read More Button Text' , 'zincy-lite' ),
            'section' => 'call_to_action_section',
            'type' => 'text',
        )
     );
     
     //Call to action link settings.
     $wp_customize->add_setting(
        'call_to_action_link',
        array(
            'default' => 'http://8degreethemes.com/zincy-pro/',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control( 
        'call_to_action_link',
        array(
            'label' => __( 'Read More Button link' , 'zincy-lite' ),
            'section' => 'call_to_action_section',
            'type' => 'text',
        )
     );
    
    
    //Feature Post settings.......
    $wp_customize->add_section(
        'feature_post_section',
        array(
            'title' => __( 'Service Settings' , 'zincy-lite' ),
            'priority' => 60,
            'panel' => 'homepage_settings',
        )
    );
    
    $wp_customize->add_setting(
        'feature_post_icon',
        array(
            'default' => '1',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'feature_post_icon',
        array(
            'label' => __( 'Check To Enable Small Icon' , 'zincy-lite' ),
            'section' => 'feature_post_section',
            'type' => 'checkbox',
        )
    );
    
    //Font awesome big icon in feature post.    
    $wp_customize->add_setting(
        'feature_post_icon_big',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'feature_post_icon_big',
        array(
            'label' => __( 'Check To Enable Large Icon' , 'zincy-lite' ),
            'section' => 'feature_post_section',
            'description' => '',
            'type' => 'checkbox',
        )
    );
    
    //feature post selction
    $wp_customize->add_setting(
        'feature_post_one',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Post_Dropdown( $wp_customize , 'feature_post_one',
        array(
            'label' => __( 'Service Post 1' , 'zincy-lite' ),
            'section' => 'feature_post_section',
            'type' => 'select',
        )
    ) );
    
    //icon
    $wp_customize->add_setting(
        'feature_post_one_icon',
        array(
            'default' => '',
            'sanitize_callback' => 'zincylite_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'feature_post_one_icon',
        array(
            'section' => 'feature_post_section',
            'description' => __( 'Font Awesome icon name Example: fa-trophy' , 'zincy-lite'),
            'type' => 'text',
        )
    );
    
    $wp_customize->add_setting(
        'feature_post_two',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Post_Dropdown( $wp_customize , 
        'feature_post_two',
        array(
            'label' => __( 'Service Post 2' , 'zincy-lite' ),
            'section' => 'feature_post_section',
            'type' => 'select',
        )
    ) );
    
    //icon
    $wp_customize->add_setting(
        'feature_post_two_icon',
        array(
            'default' => '',
            'sanitize_callback' => 'zincylite_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'feature_post_two_icon',
        array(
            'section' => 'feature_post_section',
            'description' => __( 'Font Awesome icon name Example: fa-trophy' , 'zincy-lite' ),
            'type' => 'text',
        )
    );
    
    $wp_customize->add_setting(
        'feature_post_three',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Post_Dropdown( $wp_customize , 
        'feature_post_three',
        array(
            'label' => __( 'Service Post 3' , 'zincy-lite' ),
            'section' => 'feature_post_section',
            'type' => 'select',
        )
    ) );
    
    //icon
    $wp_customize->add_setting(
        'feature_post_three_icon',
        array(
            'default' => '',
            'sanitize_callback' => 'zincylite_sanitize_text',
            )
    );
    
    $wp_customize->add_control(
        'feature_post_three_icon',
        array(
            'section' => 'feature_post_section',
            'description' => __( 'Font Awesome icon name Example: fa-trophy' , 'zincy-lite' ),
            'type' => 'text',
        )
    );
    
    //Feature read more button text.....
    $wp_customize->add_setting(
        'feature_read_more',
        array(
            'default' => 'Read More',
            'sanitize_callback' => 'zincylite_sanitize_text'
            )
    );
    
    $wp_customize->add_control( 
        'feature_read_more',
        array(
            'label' => __( 'Read More Text' , 'zincy-lite' ),
            'section' => 'feature_post_section',
            'description' => __( "Leave blank if you don't want to show read more!" , 'zincy-lite' ),
            'type' => 'text',
        )
     );
     
     //latest blog section
     $wp_customize->add_section(
        'latestblog_above_callaction_section',
        array(
            'title' => __( 'Block Above Call To Action' , 'zincy-lite' ),
            'priority' => 60,
            'description' => __( '' , 'zincy-lite' ),
            'panel' => 'homepage_settings',
        )
    );
    
    $wp_customize->add_setting(
        'blog_above_callaction_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'zincy_sanitize_checkbox'
            )
    );
    
    $wp_customize->add_control( 
        'blog_above_callaction_option',
        array(
            'label' => __( 'Enable Latest Blog Section' , 'zincy-lite' ),
            'section' => 'latestblog_above_callaction_section',
            'description' => __( "" , 'zincy-lite' ),
            'type' => 'checkbox',
        )
     );
    
    $wp_customize->add_setting(
        'blog_above_callaction_title',
        array(
            'default' => 'Our Latest Blogs',
            'sanitize_callback' => 'zincylite_sanitize_text'
            )
    );
    
    $wp_customize->add_control( 
        'blog_above_callaction_title',
        array(
            'label' => __( 'Block Title' , 'zincy-lite' ),
            'section' => 'latestblog_above_callaction_section',
            'description' => __( "" , 'zincy-lite' ),
            'type' => 'text',
        )
     );
     
     $wp_customize->add_setting(
        'blog_above_callaction_desc',
        array(
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean imaximus metus.',
            'sanitize_callback' => 'wp_kses_post'
            )
    );
    
    $wp_customize->add_control( 
        'blog_above_callaction_desc',
        array(
            'label' => __( 'Block Description' , 'zincy-lite' ),
            'section' => 'latestblog_above_callaction_section',
            'description' => __( "" , 'zincy-lite' ),
            'type' => 'textarea',
        )
     );
     
     $wp_customize->add_setting(
        'blog_above_callaction_cat',
        array(
            'sanitize_callback' => 'zincy_sanitize_dropdown_general',
            )
    );
    
    $wp_customize->add_control( new Zincy_Lite_Category_Dropdown( $wp_customize, 
        'blog_above_callaction_cat',
        array(
            'section' => 'latestblog_above_callaction_section',
            'type' => 'select',
        )
    ) );
     
}
add_action( 'customize_register', 'zincy_lite_customizer_homepage' );