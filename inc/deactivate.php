<?php
function recipe_deactivate_plugin() {
    wp_clear_scheduled_hook( 'recipe_daily_hook' );
}