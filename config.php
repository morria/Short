<?php
/*
 * First authored by Brian Cray
 * License: http://creativecommons.org/licenses/by/3.0/
 * Contact the author at http://briancray.com/
 */

// db options
define('DB_NAME', 'short');
define('DB_USER', 'shortuser');
define('DB_PASSWORD', 'PASSWORD');
define('DB_HOST', 'localhost');
define('DB_TABLE', 'shortenedurls');

// base location of script (include trailing slash)
define('BASE_HREF', 'http://' . $_SERVER['HTTP_HOST'] . '/');

// how long do you want your URLs?
define('SHORT_LENGTH', 7);

// change to limit short url creation to a single IP
define('LIMIT_TO_IP', $_SERVER['REMOTE_ADDR']);
?>
