<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Our Clients</title>
</head>

<body>
<?php 
include 'menu.php';
?>
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
    <input type="text" name="$cnam" placeholder="Client Name">
    <input type="text" name="$cad" placeholder="Adress">	
    <input type="text" name="$ccnam" placeholder="Contact Name">
    <input type="text" name="$cphone" placeholder="Contact Phone">
      <input type="text" name="$czip" placeholder="Contact Zip">
    <input type="submit" value="Add New Client">
</form>


</body>
</html>