<?php
    session_start();
    $_SESSION['modif']=1;
    header("Location:".$_SERVER['HTTP_REFERER']);
?>