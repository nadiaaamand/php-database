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
$sql = 'SELECT `Resource-Name` 
FROM Resources 
WHERE `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($rnam);

while($stmt->fetch()) { 
	echo '<li><a href="persondetails.php?cid='.$cid.'">'.$rnam.'</a></li>';
}
?>
</ul>
</body>
</html>