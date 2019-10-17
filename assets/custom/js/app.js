(function($){
    var App = {
        init: function() {
            $.ajax({
                url: 'dashboard/reload_data', 
                success: function(data) {
                    $('#data-app').empty();
                    $('#data-app').html(data);
                },
                complete: function() {
                  // Schedule the next request when the current one's complete
                  setTimeout(App.init, 30000);
                }
            });
        },
        hit_data: function() {
            $.ajax({
                url: 'dashboard/hit_app',
                complete: function() {
                  // Schedule the next request when the current one's complete
                  setTimeout(App.hit_data, 120000);
                }
            });
        }
    };

    App.init();
    App.hit_data();
})(jQuery);

