<?php 
function recipe_add_new_columns( $columns ) {
    $columns                = [];
    $columns['cb']          = '<input type="checkbox" />';
    $columns['title']       = __( 'Title', 'recipe' );
    $columns['author']      = __( 'Author', 'recipe' );
    $columns['categories']  = __( 'Categories', 'recipe' );
    $columns['count']       = __( 'Count', 'recipe' );
    $columns['rating']      = __( 'Rating', 'recipe' );
    $columns['date']        = __( 'Date', 'recipe' );

    return $columns;
}

function recipe_manage_custom_columns( $column, $post_id ) {
    switch( $column ) {
        case 'count':
            $recipe_data = get_post_meta( $post_id, 'recipe_data', true );
            echo isset( $recipe_data['rating_count'] ) ? $recipe_data['rating_count'] : '0';
        break; 
        case 'rating':
            $recipe_data = get_post_meta( $post_id, 'recipe_data', true );
            echo isset( $recipe_data['rating'] ) ? $recipe_data['rating'] : '0';
        break;    
        default:
        break;
    }
}