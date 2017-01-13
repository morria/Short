require(['jquery', 'vendor/jquery.cookie'], function($) {
    var LDAP = function($selector) {
        $selector.change(_.bind(this.onChange, this));
    }

    LDAP.prototype = {
        onChange: function(event) {
            var shortUrl = $(event.target).data('short-url');
            var ldapName = $(event.target).val();

            // Save the LDAP name as a perma-cookie
            $.cookie('LDAP', ldapName);

            // Try the short URL again
            document.location.href = 'http://go/' + shortUrl;
        }
    };

    new LDAP($('#ldap-name'));
});
