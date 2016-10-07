<?php
$curpage = basename ($_SERVER['PHP_SELF']);
//Using this cause you can't use a class directly since the class is on all pages - instead I have used an if statement --> if the current page is e.g. p5 the echo (show) that the class active. The $_server is a super global variable which holds information about header, locations.
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP-Menu</title>
</head>

<body>

<ul id="menu">
<li class="links"><a href="index.php"<?php if($curpage == 'index.php') {echo 'class="active"';}?>>Clients</a></li>
<li class="links"><a href="allresources.php"<?php if($curpage == 'allresources.php') {echo 'class="active"';}?>>All resources</a></li>
</ul>
</body>
</html>
