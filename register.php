<?php require 'db.php'; 

	$data = $_POST;

	if (isset($data['register'])) {
		
		$errors = [];

		if(trim($data['vorname']) == ''){
			$errors[] = 'Name und Vorname ist leer!';
		}

		if(trim($data['login']) == ''){
			$errors[] = 'Login ist leer!';
		}

		if(trim($data['email']) == ''){
			$errors[] = 'Email ist leer!';
		}

		if($data['password'] == ''){
			$errors[] = 'Password ist leer!';
		}

		if( R::count('users', "login = ?", array($data['login'])) > 0){
			$errors[] = 'Diese loginname ' . $data['login'] . ' ist besetzt!';
		}

		if( R::count('users', "email = ?", array($data['email'])) > 0){
			$errors[] = 'Diese Email ' . $data['email'] . ' ist schon eingetragen!';
		}

		if($data['password2'] != $data['password']){
			$errors[] = 'Passwort 2 ist nicht mit Password 1 identisch!';
		}

		//wenn massiv mit fehlern leer ist
		if (empty($errors)) {
			$user = R::dispense('users');
			$user->name = $data['vorname'];
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<div style="color:green;">Registrierung Erfolgreich</div><hr>';
		}else{
			echo '<div style="color:red;">' . array_shift($errors) . '</div><hr>';
		}
	}

?>
<form action="register.php" method="POST">
	<p>Name und Vorname:<br>
		<input type="text" name="vorname" value="<?php echo @$data['vorname'] ?>">
	</p>
	<p>Loginname: <br>
		<input type="text" name="login" value="<?php echo @$data['login'] ?>">
	</p>
	<p>Email: <br>
		<input type="email" name="email" value="<?php echo @$data['email'] ?>">
	</p>
	<p>Password:  <br>
		<input type="password" name="password" value="<?php echo @$data['password'] ?>">
	</p>
	<p>Password: <br>
		<input type="password" name="password2" value="<?php echo @$data['password2'] ?>">
	</p>
	<p>
		<button type="submit" name="register">Registrieren</button>
	</p>

</form>