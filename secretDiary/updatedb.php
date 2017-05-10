<?php
session_start();
include ("connection.php");
if (array_key_exists("content", $_POST)) {
    
    if (mysqli_connect_error($link)) {
        die("connect error");
    } else {
        $query = "UPDATE `users` SET text = '".$_POST['content']."' WHERE id = ".$_SESSION["id"]." LIMIT 1";
         mysqli_query($link, $query);
    }
}
