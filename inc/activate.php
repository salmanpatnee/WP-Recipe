<?php
function recipe_activate_plugin() {
    if( version_compare( get_bloginfo( 'version'), '5.0', '<' ) ) {
        wp_die( __( 'Please update wordpress to use this plugin.', 'recipe' ) );
    }

    global $wpdb;
    $createSQL      =   "
    CREATE TABLE `" . $wpdb->prefix . "recipe_ratings` (
        `ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `recipe_id` BIGINT(20) UNSIGNED NOT NULL,
        `rating` FLOAT(3,2) UNSIGNED NOT NULL,
        `user_ip` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB " . $wpdb->get_charset_collate() . ";";

    require( ABSPATH . "/wp-admin/includes/upgrade.php" );
    dbDelta( $createSQL );

    wp_schedule_event( time(), 'daily', 'recipe_daily_hook' );
}