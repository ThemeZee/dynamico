/**
 * Customizer Live Preview
 *
 * Reloads changes on Theme Customizer Preview asynchronously for better usability
 *
 * @package Dynamico
 */

( function( $ ) {

	// Site Title textfield.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site Description textfield.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Site Title checkbox.
	wp.customize( 'dynamico_theme_options[site_title]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'site-title-hidden' );
			} else {
				$( 'body' ).removeClass( 'site-title-hidden' );
			}
		} );
	} );

	// Site Description checkbox.
	wp.customize( 'dynamico_theme_options[site_description]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'site-description-hidden' );
			} else {
				$( 'body' ).removeClass( 'site-description-hidden' );
			}
		} );
	} );

	// Theme Layout.
	wp.customize( 'dynamico_theme_options[theme_layout]', function( value ) {
		value.bind( function( newval ) {
			if ( 'wide' === newval ) {
				$( 'body' ).addClass( 'wide-theme-layout' );
				$( 'body' ).removeClass( 'centered-theme-layout' );
			} else {
				$( 'body' ).addClass( 'centered-theme-layout' );
				$( 'body' ).removeClass( 'wide-theme-layout' );
			}
		} );
	} );

	// Box Shadow checkbox.
	wp.customize( 'dynamico_theme_options[box_shadow]', function( value ) {
		value.bind( function( newval ) {
			if ( true === newval ) {
				$( 'body' ).addClass( 'has-box-shadow' );
			} else {
				$( 'body' ).removeClass( 'has-box-shadow' );
			}
		} );
	} );

	// Sidebar Position.
	wp.customize( 'dynamico_theme_options[sidebar_position]', function( value ) {
		value.bind( function( newval ) {
			if( false === $( 'body' ).hasClass( '.page-template-template-sidebar-right' ) ) {
				if ( 'left-sidebar' === newval ) {
					$( 'body' ).addClass( 'sidebar-left' );
				} else {
					$( 'body' ).removeClass( 'sidebar-left' );
				}
			}
		} );
	} );

	// Blog Layout.
	wp.customize( 'dynamico_theme_options[blog_layout]', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).removeClass( 'blog-layout-horizontal-list' );
			$( 'body' ).removeClass( 'blog-layout-horizontal-list-alt' );
			$( 'body' ).removeClass( 'blog-layout-vertical-list' );
			$( 'body' ).removeClass( 'blog-layout-two-column-grid' );
			$( 'body' ).removeClass( 'blog-layout-three-column-grid' );

			if ( 'horizontal-list' === newval || 'horizontal-list-alt' === newval ) {
				$( 'body' ).addClass( 'blog-layout-horizontal-list' );
			} else if ( 'vertical-list' === newval || 'vertical-list-alt' === newval ) {
				$( 'body' ).addClass( 'blog-layout-vertical-list' );
			} else if ( 'two-column-grid' === newval ) {
				$( 'body' ).addClass( 'blog-layout-two-column-grid' );
			} else if ( 'three-column-grid' === newval ) {
				$( 'body' ).addClass( 'blog-layout-three-column-grid' );
			}

			if ( 'horizontal-list-alt' === newval ) {
				$( 'body' ).addClass( 'blog-layout-horizontal-list-alt' );
			}
		} );
	} );

	// Read More Link textfield.
	wp.customize( 'dynamico_theme_options[read_more_link]', function( value ) {
		value.bind( function( to ) {
			$( 'a.more-link' ).text( to );
		} );
	} );

	// Post Date checkbox.
	wp.customize( 'dynamico_theme_options[meta_date]', function( value ) {
		value.bind( function( newval ) {
			if( ! $( 'body' ).hasClass( 'single-post' ) ) {
				if ( false === newval ) {
					$( 'body' ).addClass( 'date-hidden' );
				} else {
					$( 'body' ).removeClass( 'date-hidden' );
				}
			}
		} );
	} );

	// Post Author checkbox.
	wp.customize( 'dynamico_theme_options[meta_author]', function( value ) {
		value.bind( function( newval ) {
			if( ! $( 'body' ).hasClass( 'single-post' ) ) {
				if ( false === newval ) {
					$( 'body' ).addClass( 'author-hidden' );
				} else {
					$( 'body' ).removeClass( 'author-hidden' );
				}
			}
		} );
	} );

	// Post Categories checkbox.
	wp.customize( 'dynamico_theme_options[meta_categories]', function( value ) {
		value.bind( function( newval ) {
			if( ! $( 'body' ).hasClass( 'single-post' ) ) {
				if ( false === newval ) {
					$( 'body' ).addClass( 'categories-hidden' );
				} else {
					$( 'body' ).removeClass( 'categories-hidden' );
				}
			}
		} );
	} );

	// Post Comments checkbox.
	wp.customize( 'dynamico_theme_options[meta_comments]', function( value ) {
		value.bind( function( newval ) {
			if( ! $( 'body' ).hasClass( 'single-post' ) ) {
				if ( false === newval ) {
					$( 'body' ).addClass( 'comments-hidden' );
				} else {
					$( 'body' ).removeClass( 'comments-hidden' );
				}
			}
		} );
	} );

	// Single Post Date checkbox.
	wp.customize( 'dynamico_theme_options[single_meta_date]', function( value ) {
		value.bind( function( newval ) {
			if( $( 'body' ).hasClass( 'single-post' ) ) {
				if ( false === newval ) {
					$( 'body' ).addClass( 'date-hidden' );
				} else {
					$( 'body' ).removeClass( 'date-hidden' );
				}
			}
		} );
	} );

	// Single Post Author checkbox.
	wp.customize( 'dynamico_theme_options[single_meta_author]', function( value ) {
		value.bind( function( newval ) {
			if( $( 'body' ).hasClass( 'single-post' ) ) {
				if ( false === newval ) {
					$( 'body' ).addClass( 'author-hidden' );
				} else {
					$( 'body' ).removeClass( 'author-hidden' );
				}
			}
		} );
	} );

	// Single Post Categories checkbox.
	wp.customize( 'dynamico_theme_options[single_meta_categories]', function( value ) {
		value.bind( function( newval ) {
			if( $( 'body' ).hasClass( 'single-post' ) ) {
				if ( false === newval ) {
					$( 'body' ).addClass( 'categories-hidden' );
				} else {
					$( 'body' ).removeClass( 'categories-hidden' );
				}
			}
		} );
	} );

	// Single Post Comments checkbox.
	wp.customize( 'dynamico_theme_options[single_meta_comments]', function( value ) {
		value.bind( function( newval ) {
			if( $( 'body' ).hasClass( 'single-post' ) ) {
				if ( false === newval ) {
					$( 'body' ).addClass( 'comments-hidden' );
				} else {
					$( 'body' ).removeClass( 'comments-hidden' );
				}
			}
		} );
	} );

	// Post Tags checkbox.
	wp.customize( 'dynamico_theme_options[meta_tags]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'tags-hidden' );
			} else {
				$( 'body' ).removeClass( 'tags-hidden' );
			}
		} );
	} );

	// Post Navigation checkbox.
	wp.customize( 'dynamico_theme_options[post_navigation]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'post-navigation-hidden' );
			} else {
				$( 'body' ).removeClass( 'post-navigation-hidden' );
			}
		} );
	} );

	// Footer textfield.
	wp.customize( 'dynamico_theme_options[footer_text]', function( value ) {
		value.bind( function( to ) {
			$( '.site-info .footer-text' ).text( to );
		} );
	} );

	// Credit Link checkbox.
	wp.customize( 'dynamico_theme_options[credit_link]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'credit-link-hidden' );
			} else {
				$( 'body' ).removeClass( 'credit-link-hidden' );
			}
		} );
	} );

} )( jQuery );
