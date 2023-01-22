<?php 
function recipe_daily_recipe() {
    set_transient(
        'recipe_daily_recipe', 
        recipe_get_random_recipe(), 
        DAY_IN_SECONDS
    );
}