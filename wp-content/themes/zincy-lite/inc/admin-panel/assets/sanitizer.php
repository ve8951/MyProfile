<?php

/**
 * 
 * Sanitizer Zincy Lite
 * 
 */
//website layout sanitize
function webpage_layout_radio_sanitize($input) {
		$valid_keys = array(
			'fullwidth' => __('fullwidth', 'zincy-lite'),
			'boxed' => __('boxed', 'zincy-lite')
			);
		if ( array_key_exists( $input, $valid_keys)) {
			return $input;
		} else {
			return '';
		}
	}
 //blog layout sanitize   
 function zincylite_blog_layout_sanitize($input){
        $valid_keys = array(
			'layout1' => __( 'layout1', 'zincy-lite' ),
			'layout2' => __( 'layout2', 'zincy-lite' ),
            'layout3' => __( 'layout3', 'zincy-lite' ),
			'layout4' => __( 'layout4', 'zincy-lite' ),
			);
		if ( array_key_exists( $input, $valid_keys)) {
			return $input;
		} else {
			return 'layout1';
		} 
 }
 
//menu sanitize 
function zincylite_menu_sanitize($input) {
		$valid_keys = array(
			'left' => __( 'left', 'zincy-lite' ),
			'center' => __( 'center', 'zincy-lite' ),
            'right' => __( 'right', 'zincy-lite' )
			);
		if ( array_key_exists( $input, $valid_keys)) {
			return $input;
		} else {
			return 'left';
		}
	}
 //layout sanitize
function zincylite_homepage_layout_sanitize( $input ) {
       $valid_keys = array(
			'default' => __( 'default', 'zincy-lite' ),
			'layout1' => __( 'layout1', 'zincy-lite' ),
            'layout2' => __( 'layout2', 'zincy-lite' )
			);
		if ( array_key_exists( $input, $valid_keys)) {
			return $input;
		} else {
			return 'default';
		}
    } 
 //slider choose sanitize
function slider_choose_radio_sanitize($input) {
		$valid_keys = array(
			'option1' => __( 'option1', 'zincy-lite' ),
			'option2' => __( 'option2', 'zincy-lite' )
			);
		if ( array_key_exists( $input, $valid_keys)) {
			return $input;
		} else {
			return 'option1';
		}
	}
 //pager sanitization
function zincylite_pager_radio_sanitize($input) {
		$valid_keys = array(
			'yes' => __( 'yes', 'zincy-lite' ),
			'no' => __( 'no', 'zincy-lite' )
			);
		if ( array_key_exists( $input, $valid_keys)) {
			return $input;
		} else {
			return 'yes';
		}
	}  
 //slide fade sanitization
function zincylite_slide_fade_radio_sanitize($input) {
		$valid_keys = array(
			'fade' => __( 'fade', 'zincy-lite' ),
			'slide' => __( 'slide', 'zincy-lite' )
			);
		if ( array_key_exists( $input, $valid_keys)) {
			return $input;
		} else {
			return 'slide';
		}
	}     
 //hide show radio sanitize
function zincylite_show_hide_radio_sanitize($input) {
		$valid_keys = array(
			'show' => __( 'show', 'zincy-lite' ),
			'hide' => __( 'hide', 'zincy-lite' )
			);
		if ( array_key_exists( $input, $valid_keys)) {
			return $input;
		} else {
			return 'show';
		}
	}   
//Integer Sanitize in the customizer
function zincylite_sanitize_integer( $input ) {
	return absint( $input );
} 

//Checkbox sanitization zincy customizer
function zincy_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}   

//General dropdown sanitize for integer value
function zincy_sanitize_dropdown_general( $input ) {
    return absint( $input );
}

//Sanitize input text general
function zincylite_sanitize_text( $input ){
    return wp_kses_post( force_balance_tags( $input ) );
}  

function zincy_sanitize_text( $input ){
    return wp_kses_post( force_balance_tags( $input ) );
}         