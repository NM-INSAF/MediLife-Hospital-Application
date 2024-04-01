<?php
include '../libs/load.php';

try {
        //this Session::removeUserSession will remove the session information from the database;
        Session::removeUserSession($_COOKIE['sessionToken']);
        session_unset();
        session_destroy();
        unset($_COOKIE['sessionToken']); 
        setcookie('sessionToken', '', -1, '/');
        // setcookie("sessionToken", "");
        header("Location: /work/");
        exit;
} catch(Exception) {
    echo "<script>window.history.back();</script>";
}
