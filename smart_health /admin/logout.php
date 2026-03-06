<?php
    session_start();
    session_destroy();
    $p = session_get_cookie_params();
    setcookie(session_name(), '',time()-1000, $p['path'], $p['domain'], $p['secure'],$p['httponly']);
    header("location:login.php");
?>