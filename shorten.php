<?php
ini_set('display_errors', 0);

require_once 'phplib/Shorten.php';

$long_url = isset($_REQUEST['longurl']) ? trim($_REQUEST['longurl']) : "";
$short_url = isset($_REQUEST['shorturl']) ? trim($_REQUEST['shorturl']) : "";
$force = !empty($_REQUEST['force']);

if (empty($long_url) ||
   !preg_match('|^https?://|', $long_url) ||
   !filter_var($long_url, FILTER_VALIDATE_URL) !== false) {
    throw new Exception("Invalid URL $long_url");
}

require('config.php');

// check if the client IP is allowed to shorten
if ($_SERVER['REMOTE_ADDR'] != LIMIT_TO_IP) {
    throw new Exception('You are not allowed to shorten URLs with this service.');
}

$short_url =
    Shorten::shortFromLong($long_url, $short_url, $force);

echo BASE_HREF . $short_url;
