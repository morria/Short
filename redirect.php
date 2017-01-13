<?php
$short_url = $_GET['url'];

if (!preg_match('|^[0-9a-zA-Z_\/\-]{1,64}$|', $short_url)) {
    throw new Exception('That is not a valid short url');
}

require_once 'config.php';
require_once 'phplib/Shorten.php';
require_once 'phplib/DoesNotExistException.php';
require_once 'phplib/LDAPNotSetException.php';

try {
    $exploded = explode('/', $short_url);
    $short_url = array_shift($exploded);
    if (!empty($exploded)) {
        $rest = implode('/', $exploded);
    }

    $long_url =
        Shorten::longFromShort($short_url);

    if (isset($rest)) {
        if (preg_match('/\/$/', $long_url)) {
            $long_url .= $rest;
        } else {
            $long_url .= '/' . $rest;
        }
    }

    Shorten::increment($short_url);

    header('Location: ' .  $long_url, true, 302);
    exit;
} catch(DoesNotExistException $exception) {
    include 'templates/create.php';
    exit;
} catch(LDAPNotSetException $exception) {
    include 'templates/set_ldap.php';
    exit;
}
