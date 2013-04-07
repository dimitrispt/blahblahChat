<?php

function jresponse($filename, $msg="", $error=0, $array=0) {
    $response = array("filename"=>$filename, "msg"=>$msg, "error"=>$error, "array"=>$array);
     return json_encode($response);
}

function startsWith($str, $prefix) {
    $temp = substr ( $str, 0, strlen ( $prefix ) );
    $temp = strtolower ( $temp );
    $prefix = strtolower ( $prefix );
    return ($temp == $prefix);
}

function getOnlineUsers($dbh, $time) {
    
    $SQL = "SELECT * FROM users WHERE online = 1 AND time > ? ORDER BY nickname ASC";
    $stmt = $dbh->prepare($SQL);
    $stmt->bindParam(1, $time);
    $stmt->execute();
    
    $users = $stmt->fetchAll();
    return $users;
    	
}


function getNewMessages($dbh, $time) {
    
    $SQL = "SELECT * FROM chat WHERE time > ? ORDER BY time ASC";
    $stmt = $dbh->prepare($SQL);
    $stmt->bindParam(1, $time);
    $stmt->execute();
    
    $messages = $stmt->fetchAll();
    return $messages;	
}
?>
