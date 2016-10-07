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
<h1>Personal Resources</h1>
<ul>
<?php 
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';
$sql = 'SELECT `Resource-Name`, `Resource_Detail`, `Resource-Type-Code-ID` 
FROM `Resources` 
where `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($rnam, $rdetail, $rtcid);

while($stmt->fetch()) { 
	echo '<p>'.$rnam.'</p>';
	echo '<p>'.$rdetail.'</p>';
	echo '<p>'.$rtcid.'</p>';
}
?>
 <form type="button" action="allresources.php" method="get">
 	<button class="update">See all resources</button>
</form>
</ul>
<br><br>
<h1>Working projects</h1>
<ul>
<?php 

$sql = 'SELECT `Project-ID`, `Resources-ID` from Project_has_Resources 
WHERE `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $rid);

while($stmt->fetch()) { 
	echo '<h5>Project ID</h5>'.PHP_EOL;
	echo '<p>'.$pid.'</p>'.PHP_EOL;
	echo '<h5>Resource ID</h5>'.PHP_EOL;
	echo '<p>'.$rid.'</p>'.PHP_EOL;
	echo '<br>'.PHP_EOL;
}
?>
</ul>
<ul id="delete">
<form action="deleteproject.php" method="post">
    	<input type="text" name="pid" placeholder="Project ID" required><br>
        <input type="text" name="rid" placeholder="Resource ID" required><br>
    	<button type="submit" value="Delete Resource">Delete resource</button>
    </form>
</ul>
</article>
</body>
</html>