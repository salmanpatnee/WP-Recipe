<?php
function recipe_enqueue_scripts() {
    wp_register_style( 'rateit-css', plugins_url('/assets/rateit/rateit.css', RECIPE_PLUGIN_URL ) );
    wp_enqueue_style( 'rateit-css' );

    wp_register_script( 'rateit-js', plugins_url( '/assets/rateit/jquery.rateit.min.js', RECIPE_PLUGIN_URL ), array( 'jquery' ), '1.0', true );
    wp_register_script( 'recipe-main', plugins_url( '/assets/js/main.js', RECIPE_PLUGIN_URL ), array( 'jquery', 'rateit-js' ), '1.0', true );
    
    wp_localize_script( 'recipe-main', 'recipe_obj', array(
        'ajax_url'  => admin_url( 'admin-ajax.php' )
    ) );
    
    wp_enqueue_script( 'rateit-js');
    wp_enqueue_script( 'recipe-main');
}