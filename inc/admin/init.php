<?php
function recipe_admin_init() {
    include( 'columns.php' );

    add_filter( 'manage_recipe_posts_columns', 'recipe_add_new_columns' );
    add_action( 'manage_recipe_posts_custom_column', 'recipe_manage_custom_columns', 10, 2 );
}