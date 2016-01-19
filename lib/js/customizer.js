/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
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
            //console.log(to);
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
                console.log(to);
				$( '.site-title a, .site-description, h3.post-title a, h2.post-title' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	// Body text color.
	wp.customize( 'body_textcolor', function( value ) {
		value.bind( function( to ) {
            //console.log(to);
            $('#post-listing article.post .entry p').css({
            	'color' : to
            });
		} );
	} );
	//Link color
	wp.customize( 'link_color', function( value ) {
		value.bind( function( to ) {
            //console.log(to);
            $('.meta a:link, .meta a:visited, .meta, .meta a, a:link, a:visited').css({
            	'color' : to
            });
		} );
	} );
	//Custom CSS
	wp.customize( 'sampression_custom_css', function( value ) {
		value.bind( function( to ) {
			$( '#sampression-custom-css' ).html( to );
		} );
	} );

} )( jQuery );
