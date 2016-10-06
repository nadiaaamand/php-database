<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Our Clients</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<header>
<?php 
include 'menu.php';
?>
</header>
<h1>Clients</h1>
<ul>
<?php
require_once 'dbcon.php';

$sql = 'SELECT `CLIENT-ID`, `CLIENT-NAME` FROM `Client`';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cnam);

while($stmt->fetch()){
	echo '<li><a href="clientdetails.php?cid='.$cid.'">'.$cnam.'</a></li>'.PHP_EOL;
}

?>
</ul>

<!--ADD PROJECT-->

<h3> ADD A PROJECT </h3>
<form action="addproject.php" method="post">
    <input type="text" name="$cnam" placeholder="Client Name" required>
    <input type="text" name="$cad" placeholder="Adress" required>	
    <input type="text" name="$ccnam" placeholder="Contact Name" required>
    <input type="text" name="$cphone" placeholder="Contact Phone" required>
      <input type="text" name="$czip" placeholder="Contact Zip" required>
    <input type="submit" value="Add New Client">
</form>


</body>
</html>