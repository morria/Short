<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
    <meta name="robots" content="noindex, nofollow">
    <title>Go</title>
    <script src="/js/vendor/underscore-min.js"></script>
    <script src="/js/vendor/require-jquery.js" data-main="/js/LDAP"></script>
    <link rel="stylesheet/less" type="text/css" href="/css/style.less" />
    <script src="/js/vendor/less-1.3.3.min.js" type="text/javascript"></script>
  </head>
  <body>
    <div id="content">
       <label>Whats your username?</label>
        <input
          type="text"
          id="ldap-name"
          data-short-url="<?= $short_url ?>"
          autofocus="autofocus"
          placeholder="your_name" />
    </div>
  </body>
</html>
