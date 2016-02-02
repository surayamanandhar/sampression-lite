/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

function google_web_fonts() {

	//return wp.customize._value;
	//return wp.customize( 'title_font' )();
	var font_script =  document.getElementById('sampression-google-fonts');
	if (typeof(font_script) != 'undefined' && font_script != null) {
		font_script.parentNode.removeChild(font_script);
	}
	var title = wp.customize._value.title_font().split(':');
	var body = wp.customize._value.body_font().split(':');
	if(title[0] == body[0]) {
		var WebFontConfig = {
			google: { families: [ title[0] + '::latin' ] }
		};
	} else {
		var WebFontConfig = {
			google: { families: [ title[0] + '::latin', body[0] + '::latin' ] }
		};
	}

	var wf = document.createElement('script');
	wf.setAttribute("id", "sampression-google-fonts");
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
}

function font_family( to ) {
	var font_ = '', font = '', style_ = '', style = '';
	if(to.indexOf(':') === -1) {
		font_ = to.split('=');
		font = font_[0].replace('+', ' ');
		style = font_[1];
	} else {
		font_ = to.split(':');
		font = font_[0].replace('+', ' ');
		style_ = font_[1].split('=');
		style = style_[1];
	}
	return '"'+font+'", '+style;
}


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
	// Body background cover
	wp.customize( 'sampression_background_cover', function( value ) {
		value.bind( function( to ) {
			if(to == true) {
				$('#content-wrapper').css('background-size', 'cover');
			} else {
				$('#content-wrapper').css('background-size', 'initial');
			}
		} );
	} );

	// Header text font.
	wp.customize( 'title_font', function( value ) {
		value.bind( function( to ) {
			google_web_fonts();
			var family = font_family( to );
			$( '#site-title a, article.post .post-title a, body.single article.post .post-title, body.page article.post .post-title' ).css( {
				'font-family': family
			});
		});
	});

	// Header text color.
	wp.customize( 'title_textcolor', function( value ) {
		value.bind( function( to ) {
            //console.log(to);
			if ( 'blank' === to ) {
				$( '#site-title, #site-description' ).css( {
					'display': 'none'
				});
			} else {
                //console.log(to);
                $( '#site-title, #site-description' ).css( {
					'display': 'block'
				});
				$( '#site-title a, article.post .post-title a, body.single article.post .post-title, body.page article.post .post-title' ).css( {
					'color': to
				});
			}
		} );
	} );

	// Body text font.
	wp.customize( 'body_font', function( value ) {
		value.bind( function( to ) {
			google_web_fonts();
			var family = font_family( to );
			$('p').css({
				'font-family': family
			});
			
		});
	});

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
            $('a:link, a:visited, .meta, .meta a, #top-nav ul a:link, #top-nav ul a:visited, #primary-nav ul.nav-listing li a').not('#site-title a, article.post .post-title a, .sm-top a').css({'color' : to });
            $('#primary-nav ul.nav-listing li a span').css({'backgroundColor' : to });
            
		} );
	} );
	//Custom CSS
	wp.customize( 'sampression_custom_css', function( value ) {
		value.bind( function( to ) {
			$( '#sampression-custom-css' ).html( to );
		} );
	} );

} )( jQuery );
