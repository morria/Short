<?php

require('config.php');
require_once 'phplib/Shorten.php';

try {
    $stmt = Shorten::dbConn()->query('SELECT * FROM ' . DB_TABLE . ' order by referrals desc limit 20');
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    header('HTTP/1.1 404 Not Found');
    die("A database query failed. Sorry.");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>URL shortener - Leaderboad</title>
<meta name="robots" content="noindex, nofollow">
<style type="text/css">
#longurl { font-size:20px; padding:10px ; width: 600px}
body { font-family: "Lucida Grande" }
li { padding: 4px; }
table { font-size: 0.8em; border: 1px solid black; width: 98% }
td { border: 1px solid black }
</style>
</head>
<body>
<h1>URL Shortener - Most clicked URLs</h1>
<table>
<tr><td>Clicks</td><td>Short URL</td><td>Long URL</td><td>Created</td><td>Creator</td></tr>
<?php
if ($results) {
    foreach ($results as $row) {
        // Shorten the bugger
        $long_url = $row['long_url'];
        $long_url_truc = (strlen($long_url) > 70) ? substr($long_url, 0, 70).'...' : $long_url;
        // Better date
        $created = date("r", $row['created']);
        echo "<tr><td>{$row['referrals']}</td><td><a href=\"/{$row['short_url']}\">{$row['short_url']}</td><td title=\"{$long_url}\">{$long_url_truc}</td><td>{$created}</td><td>{$row['creator']}</td>";
    }
} else {
    echo "<h3>There are no short URLs yet!</h3>";
}
?>
</table>
</body>
</html>
