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
<article>
<h1>Clients</h1>
<ul>
<?php
require_once 'dbcon.php';

$sql = 'SELECT `CLIENT-ID`, `CLIENT-NAME` FROM `Client`';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cnam);

while($stmt->fetch()){
	echo '<li><a class="pdetails" href="clientdetails.php?cid='.$cid.'">'.$cnam.'</a></li>'.PHP_EOL;
}

?>
</ul>
<br><br>
<!--ADD PROJECT-->

<h3> Add a project </h3>
<br>
<ul>
<form action="addproject.php" method="post">
    <input type="text" name="$cnam" placeholder="Client Name" required><br>
    <input type="text" name="$cad" placeholder="Adress" required><br>
    <input type="text" name="$ccnam" placeholder="Contact Name" required><br>
    <input type="text" name="$cphone" placeholder="Contact Phone" required><br>
      <input type="text" name="$czip" placeholder="Contact Zip" required><br>
    <button class="submit" type="submit" value="Add New Client">Add new client</button>
</form>
</ul>
</article>
</body>
</html>