<?php

require('config.php');
require_once 'phplib/Shorten.php';

$short_url = trim($_REQUEST['url']);

Shorten::deleteFromShort($short_url);

echo 'Deleted ' . BASE_HREF . $short_url;
