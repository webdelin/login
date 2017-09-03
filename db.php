<?php
	require 'libs/rb.php';
	R::setup( 'pgsql:host=127.0.0.1;dbname=rb', 'postgres', '' );
	if (!R::testConnection()) {
		exit('#FEHLER: Keine verbindung zum Datenbank!');
	}
	session_start();
?>