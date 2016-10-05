<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php
$pid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');
$rid = filter_input(INPUT_POST, 'rid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'DELETE FROM `Project_has_resources` 
WHERE `Project-ID` = ? 
AND `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('ii', $pid, $rid);
$stmt->execute();

if ($stmt->affected_rows >0 ){
	echo 'Project deleted';
}
else {
	echo 'No change - Project stil existing';

}

?>
</body>
</html>