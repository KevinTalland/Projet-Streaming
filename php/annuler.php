<?php
    session_start();
    unset($_SESSION['modif']);
    header("Location:".$_SERVER['HTTP_REFERER']);
?>