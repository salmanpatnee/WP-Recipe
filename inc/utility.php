<?php
function recipe_get_random_recipe() {
    global $wpdb;
    return $wpdb->get_var("SELECT `ID` FROM `".$wpdb->posts."` WHERE post_status='publish' AND post_type='recipe' ORDER BY rand() LIMIT 1");
}