<?php
    session_start();
    session_destroy();
    header('Location:mainsession.php');
?>