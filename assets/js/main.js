(function($){
    $('#recipe_rating').bind('rated', function(){
        $(this).rateit('readonly', true);

        var form = {
            action: 'recipe_rate_recipe', 
            rid:    $(this).data('rid'), 
            rating: $(this).rateit('value')
        };

        $.post(recipe_obj.ajax_url, form, function(response){
            
        });
    });
})(jQuery);