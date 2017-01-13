<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="robots" content="noindex, nofollow">
    <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
    <title>Shorten</title>
    <script src="/js/vendor/underscore-min.js"></script>
    <script src="/js/vendor/require-jquery.js" data-main="/js/Get"></script>
    <link rel="stylesheet/less" type="text/css" href="/css/style.less" />
    <script src="/js/vendor/less-1.3.3.min.js" type="text/javascript"></script>
    <link type="application/opensearchdescription+xml" rel="search" href="go.osdd"/>
  </head>
  <body>
    <div id="content">

        <div id="shortener">
            <label>URL to shorten</label>
            <input
                type="text"
                id="long-url"
                autofocus="autofocus"
                placeholder="http://domain.com/path"
                value="<?= $long_url ?>" />
            <p class="error-message" id="error-bad-url">
                That URL is no good. Make sure it looks like
                http://domain.com/path
            </p>
        </div>

        <div id="info">
            <section>
                <h3>Bookmarklet</h3>
                <p>
                    Drag
                    <a href="javascript:void(location.href='http://<?= $_SERVER['HTTP_HOST'] ?>/?b=1&force=1&longurl='+encodeURIComponent(location.href))">Shorten</a>
                    to your bookmark toolbar to create a button that easily shortens URLs
                </p>
            </section>
            <section>
                <h3>API</h3>
                <p>
                    Easily get a short URL by hitting
                    http://<?= $_SERVER['HTTP_HOST'] ?>/shorten.php with
                    the variable "longurl" as the URL-encoded URL you wish
                    to shorten.
                </p>
                <p>
                    For example, in PHP:
                    <code>
$shorturl =
    file_get_contents(
        'http://<?= $_SERVER['HTTP_HOST'] ?>'
        . '/shorten.php?longurl='
        . urlencode($url));
                    </code>
                </p>
            </section>
            <section>
                <h3>Leaderboard</h3>
                <p>
                    What Short URL is the most clicked? Find out here:
                    <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/leaderboard">http://<?= $_SERVER['HTTP_HOST'] ?>/leaderboard</a>
                </p>
           </section>
        </div>
    </div>
  </body>
</html>
