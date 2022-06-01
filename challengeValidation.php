<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil Eldenscape</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<?php
    
    session_start();
    // Verifie que l'utilisateur est connecté 
    if($_SESSION['username'] !== NULL){
        $user = $_SESSION['username'];
        echo "<h1>Félicitation $user vous avez réussi le premier challenge !</h1>";
    }
    else {
        header('Location: connexion.php');
    }
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'eldenscape';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
        $requete = "UPDATE `utilisateur` SET `chapitre1`=1 WHERE `utilisateur`.`username` = '".$user."';";
        $exec_requete = mysqli_query($db,$requete);
        if ($db->query($exec_requete) === TRUE) {
            echo "<h2>Record updated successfully</h2>";
          } else {
            echo "<h2>Error updating record: " . $db->error."</h2>";
          }        
  mysqli_close($db); // fermer la connexion
?> 
</body>
</html>
