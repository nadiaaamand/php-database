<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<h2>Personal Resources</h2>
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
 	<button>See all resources</button>
</form>
</ul>

<h2>Working projects</h2>
<ul>
<?php 

$sql = 'SELECT `Project-ID`, `Resources-ID` from Project_has_Resources 
WHERE `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $rid);

while($stmt->fetch()) { 
	echo '<h5>Project ID</h5>';
	echo '<p>'.$pid.'</p>';
	echo '<h5>Resource ID</h5>';
	echo '<p>'.$rid.'</p>';
	
}
?>
</ul>
<form action="deleteproject.php" method="post">
    	<input type="text" name="pid" placeholder="Project ID">
        <input type="text" name="rid" placeholder="Resource ID">
    	<input type="submit" value="Delete Resource">
    </form>

</body>
</html>