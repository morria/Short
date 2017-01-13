require(['jquery'], function($) {
    var Get = function($selector) {
        this.$selector = $selector;
        $selector.change(_.bind(this.onChange, this));

        if ($selector.val()) {
            $selector.trigger('change');
        }
    }

    Get.prototype = {
        onChange: function(event) {
            var shortUrl = $(event.target).attr('data-short-url');
            var longUrl = $(event.target).val();

            $('.error-message').hide();

            var jqXHR =
                $.get('/shorten.php', {
                    longurl: longUrl,
                    shorturl: shortUrl,
                    force: true,
                }, _.bind(this.onSuccess, this));

            jqXHR.fail(_.bind(this.onError, this));
        },

        onSuccess: function(data) {
            this.$selector.val(data).select();
        },

        onError: function(data) {
            $('#error-bad-url').show();
        }
    };

    new Get($('#long-url'));
});
