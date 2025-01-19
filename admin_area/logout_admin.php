<?php
    session_start () ;
    session_destroy ();
    //echo "<script>window.open('logout.php','_self')</script>";
    echo "<script>window.open('index.php','_self')</script>";
?>