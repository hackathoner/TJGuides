<?php 
	setcookie("user", false, time() - 3600,'/');
	header("Location: index.php")
?>