<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
include 'menu.php';
?>
<ul>
<?php 

require_once 'dbcon.php';

$sql = 'SELECT `Resource-Name`, `Resource_Detail`, `Resource-Type-Code-ID` 
FROM Resources';

$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($rnam, $rdetail, $rtcid);

while($stmt->fetch()) { 
	echo '<h2>' .$rnam. '</h2>';
	echo '<p>' .$rdetail. '</p>';
	echo '<p>' .$rtcid. '</p>';

}
?>
</ul>

<form action="deleteproject.php" method="post">
    	<input type="text" name="$pid" placeholder="Project ID">
        <input type="text" name="$rid" placeholder="Resource ID">
    	<input type="submit" value="Delete Resource">
    </form>
</body>
</html>