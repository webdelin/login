<?php require 'db.php'; ?>
<?php 
	if(isset($_SESSION['logged_uder'])):?>
<h1>Eingeloggt als <?php echo $_SESSION['logged_uder']->login; ?></h1>
<a href="/logout.php">Logout</a>
<?php else: ?>
<a href="/login.php">Login</a>
<a href="/register.php">Registrieren</a>
<?php endif; ?>