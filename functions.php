<?php
/**
 * Sharp functions and definitions
 *
 * @package Sharp
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'sharp_activate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sharp_activate_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sharp, use a find and replace
	 * to change 'sharp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sharp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sharp' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sharp_activate_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // sharp_activate_setup
add_action( 'after_setup_theme', 'sharp_activate_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sharp_activate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sharp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'sharp_activate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sharp_activate_scripts() {
	wp_enqueue_style( 'sharp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sharp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'sharp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sharp_activate_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'sharp_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function sharp_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'               => 'JSON REST API', // The plugin name.
            'slug'               => 'json-rest-api', // The plugin slug (typically the folder name).
            //'source'             => get_stylesheet_directory() . '/lib/plugins/json-rest-api.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

        // This is an example of how to include a plugin from a private repo in your theme.
        // array(
        //     'name'               => 'TGM New Media Plugin', // The plugin name.
        //     'slug'               => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
        //     'source'             => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
        //     'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        //     'external_url'       => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
        // ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        // array(
        //     'name'      => 'BuddyPress',
        //     'slug'      => 'buddypress',
        //     'required'  => false,
        // ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => 'You MUST activate the API to use this theme',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

//add scripts, including angular.js
add_action('wp_enqueue_scripts', 'sharp_enqueue_scripts');
function sharp_enqueue_scripts() {

  $template_directory = get_bloginfo('template_directory');

  /*
   *
   * Enqueue Angular.js
   *
  */

  // register AngularJS
  wp_register_script('angular-core', $template_directory . '/bower_components/angular/angular.min.js', array(), null, false);

  // register AngularJS Route
  wp_register_script('angular-route', $template_directory . '/bower_components/angular-route/angular-route.min.js', array('angular-core'), null, false);

  // register Angular app.js, which has a dependency on angular-core
  wp_register_script('sharp-app', $template_directory . '/js/app.js', array('angular-core', 'angular-route'), null, false);

  // register Angular controllers.js, which has a dependency on angular-core
  wp_register_script('sharp-controllers', $template_directory . '/js/controllers.js', array('angular-core', 'angular-route'), null, false);

  // register Angular directives.js, which has a dependency on angular-core
  wp_register_script('sharp-directives', $template_directory . '/js/directives.js', array('angular-core', 'angular-route'), null, false);

  // register Angular filters.js, which has a dependency on angular-core
  wp_register_script('sharp-filters', $template_directory . '/js/filters.js', array('angular-core', 'angular-route'), null, false);    

  // register Angular services.js, which has a dependency on angular-core
  wp_register_script('sharp-services', $template_directory . '/js/services.js', array('angular-core', 'angular-route'), null, false);      

  // enqueue all scripts
  wp_enqueue_script('angular-core');
  wp_enqueue_script('sharp-app');
  wp_enqueue_script('sharp-controllers');
  wp_enqueue_script('sharp-directives');
  wp_enqueue_script('sharp-filters');
  wp_enqueue_script('sharp-services');

  // we need to create a JavaScript variable to store our API endpoint...   
  wp_localize_script( 'angular-core', 'AppAPI', array( 'url' => get_bloginfo('wpurl').'/wp-json/') ); // this is the API address of the JSON API plugin

  // ... and useful information such as the theme directory and website url
  wp_localize_script( 'angular-core', 'BlogInfo', array( 'url' => get_bloginfo('template_directory').'/', 'site' => get_bloginfo('wpurl')) );

  /*
   *
   * Enqueue Twitter Bootstrap
   *
  */

  wp_register_style( 'bootstrap-css', $template_directory . '/bower_components/bootstrap/dist/css/bootstrap.css' );
  wp_register_script( 'bootstrap-js', $template_directory . '/bower_components/bootstrap/dist/js/bootstrap.js', array('jquery') );

  wp_enqueue_style( 'bootstrap-css' );
  wp_enqueue_script('bootstrap-js');

}

class Angular_WP_Widget_Archives extends WP_Widget {

  public function __construct() {
    $widget_ops = array('classname' => 'angular_js_widget_archive', 'description' => __( 'A monthly archive of posts compatible with the Angular.js Sharp theme.') );
    parent::__construct('angular_js_archives', __('Angular.js Archives'), $widget_ops);
  }

  public function widget( $args, $instance ) {
    $c = ! empty( $instance['count'] ) ? '1' : '0';
    $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

    /** This filter is documented in wp-includes/default-widgets.php */
    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Archives' ) : $instance['title'], $instance, $this->id_base );

    echo $args['before_widget'];
    if ( $title ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }

    if ( $d ) {?>
      <select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
        <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option>

        <?php
        /**
         * Filter the arguments for the Archives widget drop-down.
         *
         * @since 2.8.0
         *
         * @see wp_get_archives()
         *
         * @param array $args An array of Archives widget drop-down arguments.
         */
        wp_get_archives( apply_filters( 'widget_archives_dropdown_args', array(
          'type'            => 'monthly',
          'format'          => 'option',
          'show_post_count' => $c,
          'echo'            => 0,
          'format'          => 'custom'
        ) ) );?>
      </select><?php
    } else {?>
      <ul><?php
      /**
       * Filter the arguments for the Archives widget.
       *
       * @since 2.8.0
       *
       * @see wp_get_archives()
       *
       * @param array $args An array of Archives option arguments.
       */
      
      $archives_to_show = wp_get_archives( 
        apply_filters( 
          'widget_archives_args', 
          array(
            'type'            => 'monthly',
            'show_post_count' => $c,
            'echo'            => 0,
            'format'          => 'custom',
            'before'          => '',
            'after'           => ''
          ) 
        ) 
      );
    
      //load anchor element up using DOMDocument class
      $dom = new DOMDocument;
      $dom->loadHTML($archives_to_show);
      foreach ($dom->getElementsByTagName('a') as $node) {
          
          //get href element of anchor
          $link = $node->getAttribute( 'href' ) . '/';

          //get month from href - match /mm/
          preg_match ( '/\/\d{2}\//', $link, $matches );
          $month = str_replace( '/', '', $matches[0] );

          //get year from href - match /yyyy/
          preg_match ( '/\/\d{4}\//', $link, $matches );
          $year = str_replace( '/', '', $matches[0] );          

          //output new link with angular click function
          echo '<li><a href="#/date/' . $month . '/' . $year . '">' . $node->nodeValue . '</a></li>';

      }

       ?>
      </ul><?php
    }

    echo $args['after_widget'];
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['count'] = $new_instance['count'] ? 1 : 0;
    $instance['dropdown'] = $new_instance['dropdown'] ? 1 : 0;

    return $instance;
  }

  public function form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
    $title = strip_tags($instance['title']);
    $count = $instance['count'] ? 'checked="checked"' : '';
    $dropdown = $instance['dropdown'] ? 'checked="checked"' : '';?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
    <p>
      <input class="checkbox" type="checkbox" <?php echo $dropdown; ?> id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>" /> <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e('Display as dropdown'); ?></label>
      <br/>
      <input class="checkbox" type="checkbox" <?php echo $count; ?> id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" /> <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show post counts'); ?></label>
    </p><?php
  }

}

// Register and load the widget
add_action( 'widgets_init', 'angular_archive_load_widget');
function angular_archive_load_widget() {
  register_widget( 'Angular_WP_Widget_Archives' );
}