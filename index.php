<?php

session_start();
if (!isset($_POST['nickname']) ) {include "login.php"; exit;}


$_SESSION['nickname'] = $_POST['nickname'];
require_once "includes/database.php";
try {

    $dbh->beginTransaction();
    $SQL = "INSERT INTO users (time,nickname,online) VALUES (?,?, 1)";
    $stmt = $dbh->prepare($SQL);

     $time = microtime(true);
    $stmt->bindParam(1, $time);
    $stmt->bindParam(2, $_SESSION['nickname']);
    
    $stmt->execute();
				
    $last_id =  $dbh->lastInsertId();
    echo 'Welcome, <span id="welnick">'.$_SESSION['nickname'] .' </span>';
			
    $dbh->commit();
				
} catch (PDOException $e){
    $dbh->rollback();
    $error = $e->getMessage();
    echo("Can not insert: $error\n");
    error_log( $error, 0);
    exit;
}

try {
    $SQL = "SELECT * FROM users WHERE online = 1 ORDER BY nickname ASC";
    $stmt = $dbh->prepare($SQL);
    $stmt->bindParam(1, $time);
    $stmt->execute();
    
    $users_init = $stmt->fetchAll();
}
 catch (PDOException $e){
    $error = $e->getMessage();
    echo("Can not access users db table: $error\n");
    error_log( $error, 0);
    exit;
 }
    
 include "chat.php";
        





?>
