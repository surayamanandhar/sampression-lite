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
                //console.log(to);
				$( '#site-title a, article.post .post-title a' ).css( {
					'color': to
				} );
			}
		} );
	} );
	// Body text color.
	wp.customize( 'body_textcolor', function( value ) {
		value.bind( function( to ) {
            //console.log(to);
            $('body').css({
            	'color' : to
            });
		} );
	} );
	//Link color
	wp.customize( 'link_color', function( value ) {
		value.bind( function( to ) {
            //console.log(to);
            $('a:link, a:visited, .meta, .meta a, #top-nav ul a:link, #top-nav ul a:visited, #primary-nav ul.nav-listing li a, .post-author:before, .posted-on:before, .edit:before, .cats:before, .tags:before, .cats:before, .count-comment:before').not('#site-title a, article.post .post-title a, .sm-top a').css({'color' : to });
            $('#primary-nav ul.nav-listing li a span').css({'backgroundColor' : to });
            $('.button, button, input[type="submit"], input[type="reset"], input[type="button"]').css({'backgroundColor' : to });
            
		} );
	} );
	//Custom CSS
	wp.customize( 'sampression_custom_css', function( value ) {
		value.bind( function( to ) {
			$( '#sampression-custom-css' ).html( to );
		} );
	} );

} )( jQuery );
