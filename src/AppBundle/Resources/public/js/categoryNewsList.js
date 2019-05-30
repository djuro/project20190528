$(document).ready( function() {
    

    var $categoryDropdown = $("#form_category");
    var defaultCategory = $categoryDropdown.val();
    retrieveArticles(defaultCategory);


    $categoryDropdown.change(function() {
        var chosenCategory = $categoryDropdown.val();
        retrieveArticles(chosenCategory);
      }
    );
   // alert(defaultCategory);

    function retrieveArticles(category) {
        var getRssMethodRoute = Routing.generate('get_rss');
        $.post(getRssMethodRoute, {category_url:category}, function(data) {
            alert("Data: " + data);
          });
    }
});