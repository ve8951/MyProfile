/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

 ( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
    //Header text.
    wp.customize( 'header_text', function( value ) {
    	value.bind( function( to ) {
    		$( '.header-text' ).text( to );
    	} );
    } );
    
    //Footer text
    wp.customize( 'footer_text', function( value ) {
    	value.bind( function( to ) {
    		$( '.copyright-inner' ).text( to );
    	} );
    } );
    
    //header text fonts
    wp.customize( 'heading_typography', function( value ) {
    	value.bind( function( to ) {
    		$( 'h1, h2 , h3 , h4 , h5 , h6' ).css( 'font-family' , to );
    	} );
    } );
    
    wp.customize( 'typography_format_h1', function( value ) {
    	value.bind( function( to ) {
    		$( 'h1' ).css( 'font-size' , to+'px' );
    	} );
    } );
    
    wp.customize( 'typography_format_h1', function( value ) {
    	value.bind( function( to ) {
    		$( '#top-section h1 .entry-header h1' ).css( 'font-size' , to+'px' );
    	} );
    } );
    
    wp.customize( 'typography_format_h2', function( value ) {
    	value.bind( function( to ) {
    		$( 'h2' ).css( 'font-size' , to+'px' );
    	} );
    } );
    
    wp.customize( 'typography_format_h3', function( value ) {
    	value.bind( function( to ) {
    		$( 'h3' ).css( 'font-size' , to+'px' );
    	} );
    } );
    
    wp.customize( 'typography_format_h4', function( value ) {
    	value.bind( function( to ) {
    		$( 'h4' ).css( 'font-size' , to+'px' );
    	} );
    } );
    
    wp.customize( 'typography_format_h5', function( value ) {
    	value.bind( function( to ) {
    		$( 'h5' ).css( 'font-size' , to+'px' );
    	} );
    } );
    
    wp.customize( 'typography_format_h6', function( value ) {
    	value.bind( function( to ) {
    		$( 'h6' ).css( 'font-size' , to+'px' );
    	} );
    } );
    
    //color settings
    wp.customize( 'typography_color_h1', function( value ) {
    	value.bind( function( to ) {
    		$( 'h1' ).css( 'color' , to );
    	} );
    } );
    
    wp.customize( 'typography_color_h1', function( value ) {
    	value.bind( function( to ) {
    		$( '#top-section h1' ).css( 'color' , to );
    	} );
    } );
    
    wp.customize( 'typography_color_h2', function( value ) {
    	value.bind( function( to ) {
    		$( 'h2' ).css( 'color' , to );
    	} );
    } );
    
    wp.customize( 'typography_color_h3', function( value ) {
    	value.bind( function( to ) {
    		$( 'h3' ).css( 'color' , to );
    	} );
    } );
    
    wp.customize( 'typography_color_h4', function( value ) {
    	value.bind( function( to ) {
    		$( 'h4' ).css( 'color' , to );
    	} );
    } );
    
    wp.customize( 'typography_color_h5', function( value ) {
    	value.bind( function( to ) {
    		$( 'h5' ).css( 'color' , to );
    	} );
    } );
    
    wp.customize( 'typography_color_h6', function( value ) {
    	value.bind( function( to ) {
    		$( 'h6' ).css( 'color' , to );
    	} );
    } );
    
    //body text fonts
    wp.customize( 'body_typography', function( value ) {
    	value.bind( function( to ) {
    		$( 'body' ).css( 'font-family' , to );
    	} );
    } );
    
    wp.customize( 'typography_size_body', function( value ) {
    	value.bind( function( to ) {
    		$( 'body' ).css( 'font-size' , to+'px' );
    	} );
    } );
    
    wp.customize( 'typography_color_body', function( value ) {
    	value.bind( function( to ) {
    		$( 'body' ).css( 'color' , to );
    	} );
    } );

} )( jQuery );
