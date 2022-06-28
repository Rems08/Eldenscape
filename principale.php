<?php
//        <!-- tester si l'utilisateur est connecté -->
    session_start();
    include_once('connexionBD.php');     
    if(isset($_SESSION['id'])){
        $user = $_SESSION['username'];
        // afficher un message
        $bonjour = "Bonjour $user, vous êtes connecté";
    }else{
        header("location:connexion.php");
    }  
?>
<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>

    <a href="./index.html"><img src="images/logo/logo.png" alt="logo de Eldenscape" id="logo"></a>
    <div id="welcome">

        <h2>Vous êtes prêt à continuer votre aventure ?</h2>
        <a href="verifChallenge.php"><button class="custom-btn btn-main">continuer</button></a>
        <?php
        if(isset($_GET['nochallenge']))
                { 
                   if($_GET['nochallenge']==true)
                   {  
                      $nochallenge = "Vous n'avez pas encore commencer l'aventure, cliquer sur Nouvelle Partie";
                   }
                }
        ?>
        <?php
            if(isset($nochallenge)){
                echo $nochallenge;
            }
        ?>
        <a href='chapitre1/episode1/MineSweeper.php'><button class="custom-btn btn-second">Nouvelle Partie</button></a>
        <a href='deconnexion.php'><button class="custom-btn btn-warning">Deconnexion</button></a>
        <a href='principale.php?deconnexion=true'><button class="custom-btn btn-warning">Deconnexion</button></a>
        <!-- tester si l'utilisateur est connecté -->
        <?php
                if(isset($bonjour)){
                  echo $bonjour;
                }
                ?>
        <?php

                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:connexion.php");
                   }
                }
            ?>
    </div>
    </body>
</html>
