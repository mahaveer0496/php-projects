<?php 
session_start();
if (array_key_exists("id", $_SESSION)) {
  echo 'Logged In! <a href="index.php?logout=1">Log Out</a>';
} else {
   header("Location: index.php");
}
?>