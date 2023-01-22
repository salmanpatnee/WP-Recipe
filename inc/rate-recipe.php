<?php 
function recipe_rate_recipe() {
    
    global $wpdb;

    // Preparing data
    $output     = array( 'status' => 1 );
    $post_id    = absint( $_POST['rid'] );
    $rating     = round( $_POST['rating'], 1 );
    $user_ip    = $_SERVER['REMOTE_ADDR'];
    
    // Check if user already rated or not?
    $rating_count = $wpdb->get_var(
        "SELECT COUNT(*) FROM `" . $wpdb->prefix . "recipe_ratings` 
        WHERE recipe_id = '" . $post_id ."' AND user_ip='" . $user_ip . "'"
    );

    // If rated then return early.
    if( $rating_count > 0 ) {
        wp_send_json( $output );
    }

    // If not then proceed.
    $wpdb->insert(
        $wpdb->prefix . 'recipe_ratings',  
        array(
            'recipe_id' => $post_id, 
            'rating'    => $rating, 
            'user_ip'   => $user_ip
        ), 
        array( '%d', '%f', '%s' )
    );

    // Update post meta
    $recipe_data = get_post_meta( $post_id, 'recipe_data', true );
    $recipe_data['rating_count']++;
    $recipe_data['rating'] = round(
        $wpdb->get_var( "SELECT AVG(`rating`) FROM `" . $wpdb->prefix . "recipe_ratings` 
        WHERE recipe_id = '" . $post_id ."'" ), 1
    );
    update_post_meta( $post_id, 'recipe_data', $recipe_data );

    $output['status'] = 2;
    wp_send_json($output);

}