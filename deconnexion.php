<?php
    session_start();

    session_destroy();
   
    header("Location:index.php?deconnexion=1 ");
?>