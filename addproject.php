<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$pid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');
$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'INSERT INTO Project(`Project-ID`, `Project-Name`, `Project-Description`, `Project-Start-Date`, `Project-End-Date`, `CLIENT-ID`)
VALUES(?, ?, ?, ?, ?, ?)';
$stmt = $link->prepare($sql);
$stmt->bind_param('issssi', $pid, $pname, $pdesc, $pstart, $pend, $cid);
$stmt->execute();

if ($stmt->affected_rows >0 ){
	echo 'Film added to the category';
}
else {
	echo 'No change - film allready added to category';

}
?>
<hr>
<a href="clientdetails.php?fid=<?=$pid?>">Client Details</a><br>
<a href="clientprojects.php?cid=<?=$cid?>">Client Projects</a><br>

</body>
</html>