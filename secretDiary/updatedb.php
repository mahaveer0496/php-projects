<?php
session_start();
if (array_key_exists("content", $_POST)) {
    $link = mysqli_connect("localhost", "root", "", "user");
    if (mysqli_connect_error($link)) {
        die("connect error");
    } else {
       $query = "UPDATE `users` SET text = '".$_POST['content']."' WHERE id = ".$_SESSION["id"]." LIMIT 1";
         mysqli_query($link, $query);
    }
}
