<?php
ini_set('display_errors', 0);
require_once 'config.php';
require_once 'phplib/Shorten.php';
require_once 'phplib/DoesNotExistException.php';

$long_url = isset($_REQUEST['longurl']) ? trim($_REQUEST['longurl']) : "";
$short_url = isset($_REQUEST['shorturl']) ? trim($_REQUEST['shorturl']) : "";

include 'templates/index.php';
