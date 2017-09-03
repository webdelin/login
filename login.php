<?php require 'db.php'; ?>
<?php 

	$data = $_POST;

	if (isset($data['logingo'])) {
		$errors = [];
		$user = R::findOne('users', 'login = ?', array($data['login']));
			if ($user) {
				if (password_verify($data['password'], $user->password)) {
					//Alles IO Autorisieren
					$_SESSION['logged_uder'] = $user;
					header("Location: index.php");
				}else{
					$errors[] = 'Password ist nich korreckt!';
				}
			}else{
				$errors[] = 'Benutzer ' . $data['login'] . ' nicht gefunden!';
			}
		if (!empty($errors)) {
			echo '<div style="color:red;">' . array_shift($errors) . '</div><hr>';
		}
	}
?>
	<form action="login.php" method="POST">

	<p>Login: <br>
		<input type="text" name="login" value="<?php echo @$data['login'] ?>">
	</p>

	<p>Password:  <br>
		<input type="password" name="password" value="<?php echo @$data['password'] ?>">
	</p>

	<p>
		<button type="submit" name="logingo">Eingang</button>
	</p>

</form>

