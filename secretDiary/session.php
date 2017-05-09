<?php
   session_start();
if ($_SESSION["email"] != '') {
    echo "welcome to Session";
    print($_SESSION["email"]);
}
