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

echo '<h3>'.$cnam.'</h3>';
	//combine to strings and make between them
	echo '<h4>'.'Address:'.'</h4>';
	echo '<p>'.$cadr. ' ' .$czip.'</p>';
	echo '<h4>'.'Project Contact:'.'</h4>';
	echo '<p>'.$ccnam.'</p>';
	echo '<h4>'.'Contact Number:'.'</h4>';
	echo '<p>'.$ccphone.'</p>';
?>
</ul>

<h2>Projects</h2>
<ul>

<!--DELETE PROJECT-->
<?php 

$sql = 'select `project-ID`, `project-name`
from `project`
where `project-id` = ?
';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pnam);

while($stmt->fetch()) { 
	echo '<li><a href="projectdetails.php?cid='.$cid.'">'.$pnam.'</a>'; ?>


<form action="deleteproject.php" method="post">
<input type="hidden" name="pid" value="<?=$pid?>">
<input type="hidden" name="cid" value="<?=$cid?>"> <input type="submit" value="X">
</form>	

<?php
echo '</li>'; }
?>

</ul>


<!--ADD PROJECT-->

<h3> ADD A PROJECT </h3>
<form action="addproject.php" method="post">
    <input type="text" name="Project Name" value="<?=$pname?>">
    <input type="text" name="Description" value="<?=$pdesc?>">
    <input type="date" name="Project start" value="<?=$pstart?>">
    <input type="date" name="PRoject end" value="<?=$pend?>">
    <input type="submit" value="Add to Project">
</form>

</body>
</html>