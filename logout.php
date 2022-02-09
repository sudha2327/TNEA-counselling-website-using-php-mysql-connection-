<?php
    session_start();
    unset($_SESSION["userid"]);
    unset($_SESSION["pass_word"]);
    header("Location:login.html");
?>