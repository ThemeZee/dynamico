/**
 * Page Template Switcher
 * 
 * Updates body classes on Gutenberg Editor when page templates are changed.
 * 
 * @package Dynamico
 */

/**
 * WordPress dependencies
 */
const { registerPlugin } = wp.plugins;
const { Component } = wp.element;
const { compose } = wp.compose;
const { withSelect } = wp.data;

/**
 * Page Template Switcher Editor Plugin
 */
class pageTemplateBodyClass extends Component {
	componentDidUpdate() {
		const {
			pageTemplate,
			postType,
		} = this.props;

		// Return early if post type is not a static page.
		if ( ! postType || 'page' !== postType.slug ) {
			return null;
		}

		const fullWidthClass = 'dynamico-fullwidth-page-layout';
		const noTitleClass = 'dynamico-page-title-hidden';

		if ( 'templates/template-fullwidth.php' === pageTemplate ) {
			document.body.classList.add( fullWidthClass );
			document.body.classList.remove( noTitleClass );
		} else if ( 'templates/template-no-title.php' === pageTemplate ) {
			document.body.classList.add( noTitleClass );
			document.body.classList.remove( fullWidthClass );
		} else if ( 'templates/template-fullwidth-no-title.php' === pageTemplate ) {
			document.body.classList.add( fullWidthClass );
			document.body.classList.add( noTitleClass );
		} else if ( 'templates/template-sidebar-left-no-title.php' === pageTemplate ) {
			document.body.classList.add( noTitleClass );
			document.body.classList.remove( fullWidthClass );
		} else if ( 'templates/template-sidebar-right-no-title.php' === pageTemplate ) {
			document.body.classList.add( noTitleClass );
			document.body.classList.remove( fullWidthClass );
		} else {
			document.body.classList.remove( fullWidthClass );
			document.body.classList.remove( noTitleClass );
		}
	}

	render() {
		return null;
	}
}

const plugin = compose(
	withSelect( ( select ) => {
		const { getEditedPostAttribute } = select( 'core/editor' );
		const { getPostType } = select( 'core' );

		return {
			pageTemplate: getEditedPostAttribute( 'template' ),
			postType: getPostType( getEditedPostAttribute( 'type' ) ),
		};
	} ),
)( pageTemplateBodyClass );

/**
 * Register plugin in Editor
 */
registerPlugin( 'dynamico-page-template-switcher', {
	render: plugin,
} );
