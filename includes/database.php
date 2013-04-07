<?php
$host = 'localhost';
$user = 'root';
$pass = 'pantel1s';
$db    = 'blahblah';


try {
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	$error = $e->getMessage();
	echo("Can't connect to MySQL Server: $error\n");
	error_log( $error, 0);
	exit;
}
?>
