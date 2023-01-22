<?php
/**
 * Plugin Name:       Recipe
 * Description:       A simple recipe plugin.
 * Version:           1.0
 * Author:            Digitonics Team
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       recipe
 */

if( ! defined( 'ABSPATH' ) ) exit;

// Setup
define( 'RECIPE_PLUGIN_URL', __FILE__ );

// Includes
include( 'inc/activate.php' );
include( 'inc/deactivate.php' );
include( 'inc/init.php' );
include( 'inc/content.php' );
include( 'inc/save-post.php' );
include( 'inc/enqueue.php' );
include( 'inc/rate-recipe.php' );
include( 'inc/admin/init.php' );
include( dirname( RECIPE_PLUGIN_URL ) . '/inc/widgets.php' );
include( 'inc/widgets/daily-recipe.php' );
include( 'inc/cron.php' );
include( 'inc/utility.php' );

// Hooks
register_activation_hook( __FILE__, 'recipe_activate_plugin' );
register_deactivation_hook( __FILE__, 'recipe_deactivate_plugin' );
add_action( 'init', 'recipe_init' );
add_action( 'save_post_recipe', 'recipe_save_post', 10, 3 );
add_filter( 'the_content', 'recipe_content' );
add_action( 'wp_enqueue_scripts', 'recipe_enqueue_scripts', 100 );
add_action( 'wp_ajax_recipe_rate_recipe', 'recipe_rate_recipe' );
add_action( 'wp_ajax_nopriv_recipe_rate_recipe', 'recipe_rate_recipe' );
add_action( 'admin_init', 'recipe_admin_init' );
add_action( 'widgets_init', 'recipe_widgets_init' );
add_action( 'recipe_daily_hook', 'recipe_daily_recipe' );
// Shortcodes