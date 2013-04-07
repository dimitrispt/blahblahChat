<?php

$nickname = $_POST['nickname'];
$message = $_POST['message'];
$time = microtime(true) + 5.0;

require_once "includes/database.php";
try {

    $dbh->beginTransaction();
    $SQL = "INSERT INTO chat (time,nickname,message) VALUES (?,?, ?)";
    $stmt = $dbh->prepare($SQL);

     $time = microtime(true);
    $stmt->bindParam(1, $time);
    $stmt->bindParam(2, $nickname);
    $stmt->bindParam(3, $message);
        
    $stmt->execute();
				
    $dbh->commit();
				
} catch (PDOException $e){
    $dbh->rollback();
    $error = $e->getMessage();
    echo("Can not insert: $error\n");
    error_log( $error, 0);
    exit;
}


?>
