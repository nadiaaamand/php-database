<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$cnam = filter_input(INPUT_POST, '$cnam', FILTER_SANITIZE_STRING) or die('Missing/illegal parameter');
$cid = filter_input(INPUT_POST, '$cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter2');

require_once 'dbcon.php';

$sql = 'UPDATE `Client` 
SET `Client-Name` = ?
WHERE `Client-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('si', $cnam, $cid);
$stmt->execute();
$stmt->bind_result($cid, $cnam);

if ($stmt->affected_rows >0 ){
	echo 'Information Updated';
}
else {
	echo 'No change';

}
?>

</body>

</html>