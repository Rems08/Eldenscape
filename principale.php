<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
    <a href="index.html"><img src="images/logo/logo.png" alt="logo de Eldenscape" id="logo"></a>
    <div id="welcome">
        <!-- tester si l'utilisateur est connecté -->
        <?php
                session_start();
                if($_SESSION['username'] !== NULL){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<h1>Bonjour $user</h1>";
                }
                else {
                    header('Location: connexion.php');
                }
            ?>
        <h2>Vous êtes prêt à continuer votre aventure ?</h2>
        <a href="chapitre1/episode1/MineSweeper.php"><button class="custom-btn btn-main">continuer</button></a>
        <button class="custom-btn btn-second">Nouvelle Partie</button>
        <a href='principale.php?deconnexion=true'><button class="custom-btn btn-warning">Deconnexion</button></a>
        <!-- tester si l'utilisateur est connecté -->
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
