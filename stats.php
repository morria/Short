<?php

require('config.php');
require_once 'phplib/Shorten.php';

$errorHandler = function() {
    header('HTTP/1.1 404 Not Found');
    die("404 - This short URL does not exist. ");
};

try {
    $stmt = Shorten::dbConn()->prepare('SELECT * FROM ' . DB_TABLE. ' WHERE short_url=?');
    $stmt->execute(array($_GET['url']));
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $errorHandler();
}

if (!$results) {
    $errorHandler();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>URL shortener - Stats for <?php echo $results['short_url'] ?></title>
<meta name="robots" content="noindex, nofollow">
<style type="text/css">
#longurl { font-size:20px; padding:10px ; width: 600px}
body { font-family: "Lucida Grande" }
li { padding: 4px; }
</style>
</head>
<body>
<h1>URL Shortener - Stats for <?php echo $results['short_url'] ?></h1>
<h3><?php echo  $results['referrals']?> clicks</h3>
<ul>
<li>Original URL: <a href="<?php echo $results['long_url'] ?>"><?php echo $results['long_url'] ?></a> </li>
<li>Created on <?php echo date("r", $results['created']) ?> by <?php echo  $results['creator']?></li>
</ul>
</body>
</html>
