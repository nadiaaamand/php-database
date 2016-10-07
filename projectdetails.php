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
include 'menu.php'
?>
</header>
<article>
<h1>Client info</h1>
<?php
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'SELECT `client-name`, `client-adress`, `client-contact-name`, `client-contact-phone`, `zip_code_zip_code_id`
from client
where `client-id` = ?;';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($cnam, $cadr, $ccnam, $ccphone, $czip);

while($stmt->fetch()) { }

echo '<h2>'.$cnam.'</h2>';
?>
</ul>

<h1>Project Details</h1>
<ul>
<?php 

$sql = 'select `project-name`, `project-description`, `project-start-date`, `project-end-date`, `other-project-details`
from `project`
where `project-id` = ?
and `client-id` = `client-id`;';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pnam, $pdesc, $psd, $ped, $popid);

while($stmt->fetch()) { 
	echo '<h3>'.'Project name'.'</h3>'.PHP_EOL;
	echo '<p>'.$pnam.'</p>'.PHP_EOL;
	echo '<h3>'.'Project description'.'</h3>'.PHP_EOL;
	echo '<p>'.$pdesc.'</p>'.PHP_EOL;
	echo '<h3>'.'Project start date'.'</h3>'.PHP_EOL;
	echo '<p>'.$psd.'</p>'.PHP_EOL;
	echo '<h3>'.'Project end date'.'</h3>'.PHP_EOL;
	echo '<p>'.$ped.'</p>'.PHP_EOL;
	
}
?>
</ul>
<h1>Resources</h1>
<ul>
<?php 
$sql = 'SELECT `Resource-Name` 
FROM Resources 
WHERE `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($rnam);

while($stmt->fetch()) { 
	echo '<li><a class="pdetails" href="persondetails.php?cid='.$cid.'">'.$rnam.'</a></li>'.PHP_EOL;
}
?>
</ul>
</article>
</body>
</html>