<?php
$link = mysqli_connect("localhost", "root", "", "user");
if (mysqli_connect_error()) {
    die("Error in connectiing to database");
}
