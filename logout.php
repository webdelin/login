<?php
	require 'db.php';
	unset($_SESSION['logged_uder']);
	header("Location: /");
?>