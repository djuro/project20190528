$(document).ready( function() {
    

    var $categoryDropdown = $("#form_category");
    var defaultCategory = $categoryDropdown.val();
    var $articlesListContainer = $("#articles_list");
    var $loadingImg = $('#loading_img');
    
    $(document).ajaxStart(function(){
      $loadingImg.css("display", "block");
    });

    $(document).ajaxComplete(function(){
      $loadingImg.css("display", "none");
    });


    retrieveArticles(defaultCategory);

    
    $categoryDropdown.change(function() {
        var chosenCategory = $categoryDropdown.val();
        retrieveArticles(chosenCategory);
      }
    );

    
    function retrieveArticles(category) {
        var getRssMethodRoute = Routing.generate('get_rss');
        $.post(getRssMethodRoute, {category_url:category}, function(response) {
            $articlesListContainer.empty();
            for(var i in response['data']) {
                $articlesListContainer.append(response['data'][i]);
            }
          });
    }
});