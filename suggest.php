<?php
$query = $_GET['query'];

require_once 'config.php';
require_once 'phplib/Shorten.php';
require_once 'phplib/DoesNotExistException.php';

$suggestions =
    Shorten::query($query);

include 'templates/suggest.php';
