require(['jquery'], function($) {
    var Create = function($selector) {
        $selector.change(_.bind(this.onChange, this));
    }

    Create.prototype = {
        onChange: function(event) {
            var shortUrl = $(event.target).attr('data-short-url');
            var longUrl = $(event.target).val();

            $.get('/shorten.php', {
                longurl: longUrl,
                shorturl: shortUrl,
                force: true,
            }, _.bind(this.onSuccess, this));
        },

        onSuccess: function(data) {
            location.href = data;
        }
    };

    new Create($('#long-url'));
});
