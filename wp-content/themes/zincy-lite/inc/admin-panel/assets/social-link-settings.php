<?php
/**
 * 
 * Social Link Settings Panel Start
 * 
 */
function zincy_lite_customizer_social( $wp_customize ) {
    $wp_customize->add_panel( 
        'social_link_panel',
         array(
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Social Link Settings', 'zincy-lite' ),
        ) 
    );
    
    //Option to enable/disable social links in header/footer.
    $wp_customize->add_section(
        'social_link_section',
        array(
            'title' => __( 'Enable/Disable Social Link' , 'zincy-lite' ),
            'priority' => 10,
            'panel' => 'social_link_panel',
        )
    );
    
    $wp_customize->add_setting(
        'social_link_header',
        array(
            'default' => '',
            'sanitize_callback' => 'zincy_sanitize_checkbox',
            )
    );
    
    $wp_customize->add_control(
        'social_link_header',
        array(
            'label' => __( 'Check To Enable' , 'zincy-lite' ),
            'description' => __( 'Enable social link in header' , 'zincy-lite' ),
            'section' => 'social_link_section',
            'type' => 'checkbox',
        )
    );
    
    //Social links settings to input url.
    $wp_customize->add_section(
        'social_link_option',
        array(
            'title' => __( 'Social Link/Url Settings', 'zincy-lite' ),
            'description' => __( "Put your social url below.. Leave blank if you don't want to show it." , 'zincy-lite' ),
            'priority' => 20,
            'panel' => 'social_link_panel',
        )
    );
    
    //facebook
    $wp_customize->add_setting(
        'facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'facebook',
        array(
            'label' => __( 'Facebook' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    ); 
    
    //twitter
    $wp_customize->add_setting(
        'twitter',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'twitter',
        array(
            'label' => __( 'Twitter' , 'zincy-lite' ), 
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Google Plus
    $wp_customize->add_setting(
        'google_plus',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'google_plus',
        array(
            'label' => __( 'Google plus' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Youtube  
    $wp_customize->add_setting(
        'youtube',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'youtube',
        array(
            'label' => __( 'Youtube' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Pinterest
    $wp_customize->add_setting(
        'pinterest',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'pinterest',
        array(
            'label' => __( 'Pinterest' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Linkedin
    $wp_customize->add_setting(
        'linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'linkedin',
        array(
            'label' => __( 'Linkedin' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Flickr
    $wp_customize->add_setting(
        'flickr',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'flickr',
        array(
            'label' => __( 'Flickr' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_setting(
        'vimeo',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
   
    //Vimeo
    $wp_customize->add_control(
        'vimeo',
        array(
            'label' => __( 'Vimeo' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Stumbleupon
    $wp_customize->add_setting(
        'stumbleupon',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'stumbleupon',
        array(
            'label' => __( 'Stumbleupon' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Instagram
    $wp_customize->add_setting(
        'instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'instagram',
        array(
            'label' => __( 'Instagram' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Social Cloud
    $wp_customize->add_setting(
        'sound_cloud',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'sound_cloud',
        array(
            'label' => __( 'Sound Cloud' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Skype    
    $wp_customize->add_setting(
        'skype',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'skype',
        array(
            'label' => __( 'Skype' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Tumbler
    $wp_customize->add_setting(
        'tumblr',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'tumblr',
        array(
            'label' => __( 'Tumblr' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Myspace
    $wp_customize->add_setting(
        'myspace',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'myspace',
        array(
            'label' => __( 'Myspace' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );
    
    //Rss
    $wp_customize->add_setting(
        'rss',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            )
    );
    
    $wp_customize->add_control(
        'rss',
        array(
            'label' => __( 'RSS' , 'zincy-lite' ),
            'section' => 'social_link_option',
            'type' => 'text',
        )
    );   
}
add_action( 'customize_register', 'zincy_lite_customizer_social' );
