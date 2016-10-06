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
<h2>Client info</h2>
<?php
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'SELECT `client-name`, `client-adress`, `client-contact-name`, `client-contact-phone`, `zip_code_zip_code_id`
from client
where `client-id` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($cnam, $cadr, $ccnam, $ccphone, $czip);

while($stmt->fetch()) { }

echo '<h3>'.$cnam.'</h3>';
?>
<!--UPDATE DETAILS-->
	<form action="updatedetails.php" method="post">
    	<input type="hidden" name="$cid" value='<?=$cid?>'>
        <input type="text" name="$cnam" placeholder="Client Name">
    	<input type="submit" value="Update Name">
    </form>
<?php 
	//combine to strings and make between them
	echo '<h4>'.'Address:'.'</h4>';
	echo '<p>'.$cadr. ' ' .$czip.'</p>';
	?>
    <?php 
    $sql = 'SELECT `City` 
	FROM `Zip_Code` 
	WHERE `Zip_Code_ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $czip);
$stmt->execute();
$stmt->bind_result($ci);

while($stmt->fetch()) { 
	echo '<p>'.$ci.'</p>';
	?>
    
    <?php
	echo '<h4>'.'Project Contact:'.'</h4>';
	echo '<p>'.$ccnam.'</p>';
	echo '<h4>'.'Contact Number:'.'</h4>';
	echo '<p>'.$ccphone.'</p>';
}
?>
</ul>
      

<h2>Projects</h2>
<ul>

<!--PROJECTS-->
<?php 

$sql = 'select `project-id`, `project-name`
from `project`
where `project-id` = ?
and `client-id` = `client-id`';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $pnam);

while($stmt->fetch()) { 
	echo '<li><a href="projectdetails.php?cid='.$cid.'">'.$pnam.'</a>'; 
}
	?>	
</ul>


</body>
</html>