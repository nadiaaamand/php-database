<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<header>
<?php 
include 'menu.php';
?>
</header>
<article>
<h1>All resources</h1>

<ul>
<?php 

require_once 'dbcon.php';

$sql = 'SELECT `Resource-Name`, `Resource_Detail`, `Resource-Type-Code-ID` 
FROM Resources';

$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($rnam, $rdetail, $rtcid);

while($stmt->fetch()) { 
	echo '<h3>' .$rnam. '</h3>'.PHP_EOL;
	echo '<p>' .$rdetail. '</p>'.PHP_EOL;
	echo '<p>' .$rtcid. '</p>'.PHP_EOL;
	echo '<br>';
}
?>
</ul>
</article>
</body>
</html>