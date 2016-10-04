<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<h2>Client info</h2>
<?php
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'SELECT `client-name`, `client-adress`, `client-contact-name`, `client-contact phone`, `zip_code_zip_code_id`
from client
where `client-id` = ?;';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($cnam, $cadr, $ccnam, $ccphone, $czip);

while($stmt->fetch()) { }

echo '<h2>'.$cnam.'</h1>';
?>
</ul>

<h2>Project Details</h2>
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
	echo '<h3>'.'Project name'.'</h3>';
	echo '<p>'.$pnam.'</p>';
	echo '<h3>'.'Project description'.'</h3>';
	echo '<p>'.$pdesc.'</p>';
	echo '<h3>'.'Project start date'.'</h3>';
	echo '<p>'.$psd.'</p>';
	echo '<h3>'.'Project end date'.'</h3>';
	echo '<p>'.$ped.'</p>';
	
}
?>
</body>
</html>