<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'twentytwentyone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentytwentyone', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'footer'  => __( 'Secondary menu', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'twentytwentyone' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'twentytwentyone' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'twentytwentyone' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'twentytwentyone' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'twenty_twenty_one_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twenty_twenty_one_content_width', 750 );
}
add_action( 'after_setup_theme', 'twenty_twenty_one_content_width', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'twenty-twenty-one-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array( 'twenty-twenty-one-ie11-polyfills' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'twenty-twenty-one-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_scripts' );

/**
 * Enqueue block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {

	wp_enqueue_script( 'twentytwentyone-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'twentytwentyone_block_editor_script' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twenty_twenty_one_skip_link_focus_fix' );

/** Enqueue non-latin language styles
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages() {
	$custom_css = twenty_twenty_one_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twenty-twenty-one-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages' );

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'twentytwentyone_customize_preview_init' );

/**
 * Enqueue scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts' );

/**
 * Calculate classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
	$classes = apply_filters( 'twentytwentyone_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'twentytwentyone_add_ie_class' );



//START Delete??
// Our custom post type function
// function create_posttype() {
 
//     register_post_type( 'launches',
    // CPT Options
//         array(
//             'labels' => array(
//                 'name' => __( 'Launches' ),
//                 'singular_name' => __( 'Launch' )
//             ),
//             'public' => true,
//             'has_archive' => true,
//             'rewrite' => array('slug' => 'launches'),
//             'show_in_rest' => true,
 
//         )
//     );
// }
// // Hooking up our function to theme setup
// add_action( 'init', 'create_posttype' );
// //END Delete??


// //creation of custom post type for the launches
// add_action( 'init', 'launches_cpt' );
// function launches_cpt() {
//     $args = array(
//       'public'       => true,
//       'show_in_rest' => true,
//       'label'        => 'Launches2'
// 	//   'capability_type' => 'post'
//     );
//     register_post_type( 'launch2', $args );
// }

// function get_launches_from_api(){

// 	$results = wp_remote_get('https://api.spacexdata.com/v3/launches') 
	
// 	echo '<pre>';
// 	print_r($results);
// 	echo '</pre>';
// 	die();
// }

// function get_launches_from_api(){
// 	$current_page = ( ! empty($_POST['current_page']) ) ? $_POST['current_page'] : 1;
// 	$launches = [];

// 	$results = wp_remote_retrieve_body( wp_remote_get('https://api.spacexdata.com/v3/launches/?page='))
// 	. $current_page. '&per_page=50'));

// 	$results = json_decode( $results ); 


// 	if( ! is_array ( $results ) || empty( $results ) ){
// 		return false;
// 	}

// 	wp_remote_post( admin_url('admin-ajax.php?action=get_launches_from_api'), [
	
// 	] );

// }


/**
 * Register a launch post type, with REST API support
 *
 * Based on example at: https://codex.wordpress.org/Function_Reference/register_taxonomy
 * 
 * It mostly let the user add categories to the launches
 */
// add_action( 'init', 'my_book_taxonomy', 30 );
// function my_book_taxonomy() {
 
//   $labels = array(
//     'name'              => _x( 'Type of launch', 'taxonomy general name' ),
//     'singular_name'     => _x( 'Launch type', 'taxonomy singular name' ),
//     'search_items'      => __( 'Search types os launches' ),
//     'all_items'         => __( 'All Launches' ),
//     'parent_item'       => __( 'Parent Launch' ),
//     'parent_item_colon' => __( 'Parent Launch:' ),
//     'edit_item'         => __( 'Edit Launch' ),
//     'update_item'       => __( 'Update Launch' ),
//     'add_new_item'      => __( 'Add New Launch' ),
//     'new_item_name'     => __( 'New Launch Name' ),
//     'menu_name'         => __( 'Launch' ),
//   );
 
//   $args = array(
//     'hierarchical'          => true,
//     'labels'                => $labels,
//     'show_ui'               => true,
//     'show_admin_column'     => true,
//     'query_var'             => true,
//     'rewrite'               => array( 'slug' => 'genre' ),
//     'show_in_rest'          => true,
//     'rest_base'             => 'launch',
//     'rest_controller_class' => 'WP_REST_Terms_Controller',
//   );
 
//   register_taxonomy( 'launch', array( 'launch2' ), $args );
 
// }


/*-----------------Breweries

add_action( 'init', 'register_brewery_cpt');
function register_brewery_cpt() {
	register_post_type('brewery', [
		'label' => 'Breweries',
		'public' => true,
		'capability_type' => 'post'
	]);
}


if( ! wp_next_scheduled('update_brewery_list') ){
	wp_schedule_event(time(), 'weekly', 'get_breweries_from_api');
}//weekly updates the breweries (if there's anything new)


add_action('wp_ajax_nopriv_get_breweries_from_api', 'get_breweries_from_api');//let us run the API wether we are not logged in
add_action('wp_ajax_get_breweries_from_api', 'get_breweries_from_api');//or wether we are
function get_breweries_from_api(){

	$file = get_stylesheet_directory() . '/report.txt';
	$current_page = ( ! empty($_POST['current_page']) ) ? $_POST['current_page'] : 1;
	$breweries = [];

	$results = wp_remote_retrieve_body( wp_remote_get('https://api.openbrewerydb.org/breweries/?page=' . $current_page. '&per_page=50'));
	file_put_contents($file, "Current Page: " . $current_page. "\n\n", FILE_APPEND);


	$results = json_decode($results);

	if ( ! is_array( $results ) || empty ( $results ) ){
		return false;
	}

	$breweries[] = $results;

	foreach( $breweries[0] as $brewery ){ //we can work individually with each brewery

		$brewery_slug = sanitize_title($brewery->name . '-' . $brewery->id);

	
		$existing_brewery = get_page_by_path($brewery_slug, 'OBJECT', 'brewery');

		if( $existing_brewery === null ){

			$inserted_brewery = wp_insert_post([
				'post_name' => $brewery_slug,
				'post_title' => $brewery_slug,
				'post_type' => 'brewery',
				'post_status' => 'publish'
			]);


			if ( is_wp_error( $inserted_brewery ) ) {
				continue;
			}

			$fillable = [
				'field_60955a3161500' => 'name',
				'field_60955a4661501' => 'brewery_type',
				'field_60955a5761502' => 'street',
				'field_60955a6a61503' => 'city',
				'field_60955a7361504' => 'state',
				'field_60955a7b61505' => 'postal_code',
				'field_60955a8d61506' => 'country',
				'field_60955a9261507' => 'longitude',
				'field_60955a9e61508' => 'latitude',
				'field_60955aa761509' => 'phone',
				'field_60955ab06150a' => 'website',
				'field_60955abc6150b' => 'updated_at',
			];

			foreach ( $fillable as $key => $name ) {
				update_field( $key, $brewery->$name, $inserted_brewery );
			}
		}else {

			$existing_brewery_id = $existing_brewery->ID;
			$existing_brewery_timestamp = get_field('updated_at', $existing_brewery_id);

			if( $brewery->updated_at >= $existing_brewery_timestamp ){
				$fillable = [
					'field_60955a3161500' => 'name',
					'field_60955a4661501' => 'brewery_type',
					'field_60955a5761502' => 'street',
					'field_60955a6a61503' => 'city',
					'field_60955a7361504' => 'state',
					'field_60955a7b61505' => 'postal_code',
					'field_60955a8d61506' => 'country',
					'field_60955a9261507' => 'longitude',
					'field_60955a9e61508' => 'latitude',
					'field_60955aa761509' => 'phone',
					'field_60955ab06150a' => 'website',
					'field_60955abc6150b' => 'updated_at',
				];
	
				foreach ( $fillable as $key => $name ) {
					update_field( $key, $brewery->$name, $existing_brewery_id );
				}
			}


		}

	}

	$current_page = $current_page + 1;
	wp_remote_post( admin_url('admin-ajax.php?action=get_breweries_from_api'), [
		'blocking' => false,
		'sslverify' => false, 
		'body' => [
			'current_page' => $current_page
		]
	] );

}
-----------------Breweries-----------------*/

/*----------------------------------------------launches---------------------------------------------*/

add_action( 'init', 'register_launch_cpt');
function register_launch_cpt() {
	register_post_type('launch', [
		'label' => 'Launches',
		'public' => true,
		'capability_type' => 'post'
	]);
}//creating custom post type


if( ! wp_next_scheduled('update_launch_list') ){
	wp_schedule_event(time(), 'weekly', 'get_launches_from_api');
}//weekly updates the launches (if there's anything new)


add_action('wp_ajax_nopriv_get_launches_from_api', 'get_launches_from_api');//let us run the API wether we are not logged in
add_action('wp_ajax_get_launches_from_api', 'get_launches_from_api');//or wether we are
function get_launches_from_api(){

	$file = get_stylesheet_directory() . '/report.txt';
	$current_page = ( ! empty($_POST['current_page']) ) ? $_POST['current_page'] : 1;
	$launches = [];

	$results = wp_remote_retrieve_body( wp_remote_get('https://api.spacexdata.com/v3/launches/?page=' . $current_page. '&per_page=50'));
	file_put_contents($file, "Current Page: " . $current_page. "\n\n", FILE_APPEND);


	$results = json_decode($results); //decode

	if ( ! is_array( $results ) || empty ( $results ) ){
		return false;
	}

	$launches[] = $results;

	foreach( $launches[0] as $launch ){ //we can work individually with each launch

		$launch_slug = sanitize_title($launch->mission_name . '-' . $launch->flight_number);

		/*-- Start making sure the content is updated */
		$existing_launch = get_page_by_path($launch_slug, 'OBJECT', 'launch');

		if( $existing_launch === null ){

			$inserted_launch = wp_insert_post([
				'post_name' => $launch_slug,
				'post_title' => $launch_slug,
				'post_type' => 'launch',
				'post_status' => 'publish'
			]); //Get all data and create a new custom post type


			if ( is_wp_error( $inserted_launch ) ) {
				continue;
			}

			$fillable = [
				'field_6095932a53d5e' => 'flight_number',
				'field_6095b25d0f9d9' => 'mission_name',
				'field_6095b2720f9da' => 'launch_year',
			];

			foreach ( $fillable as $key => $name ) {
				update_field( $key, $launch->$name, $inserted_launch ); //update_field is from ACF plugin
			}
		}else {

			$existing_launch_id = $existing_launch->ID;
			$existing_launch_timestamp = get_field('updated_at', $existing_launch_id);

			if( $launch->updated_at >= $existing_launch_timestamp ){
				$fillable = [
					'field_6095932a53d5e' => 'flight_number',
					'field_6095b25d0f9d9' => 'mission_name',
					'field_6095b2720f9da' => 'launch_year',
				];
	
				foreach ( $fillable as $key => $name ) {
					update_field( $key, $launch->$name, $existing_launch_id );
				}
			}


		}

	}

	$current_page = $current_page + 1;
	wp_remote_post( admin_url('admin-ajax.php?action=get_launches_from_api'), [
		'blocking' => false,
		'sslverify' => false, //to work locally, so we don't have to verify the SSL
		'body' => [
			'current_page' => $current_page
		]
	] );

}