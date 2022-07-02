<?php
session_start();
include_once('../../connexionBD.php');
  
if(isset($_SESSION['id']) ){
    $user = $_SESSION['username'];
    $stmt = "SELECT challenge FROM utilisateur WHERE username='$user'";
    $req = $DB->prepare($stmt);
    $req->bindValue(1, $user, PDO::PARAM_INT);  
    $req ->execute();
    $challengeNb = $req->fetch();
    $Nbchallenge = $challengeNb["challenge"];
}else{
    header("location:../../connexion.php");
}
    // if($Nbchallenge != "3"){
    //header("location:chapitre1/episode3-logicdoors/logic-doors.php");
    // }
// if ( $Nbchallenge == "1" ){     
//     function valid_donnees($donnees){
//         $donnees = trim($donnees);
//         $donnees = stripslashes($donnees);
//         $donnees = htmlspecialchars($donnees);
//         return $donnees;
//     }
//     $passep2 = valid_donnees($_POST['password-ep2']);
//     if(($passep2 == 7439 || $passep2 == "7439") && $Nbchallenge == "1" ){
//         $stmt = "UPDATE utilisateur SET challenge = 2 WHERE username = '$user'";
//         $req = $DB->prepare($stmt);
//         $req->bindValue(1, $user, PDO::PARAM_INT);  
//         $req ->execute();
//         $challengeNb = $req->fetch();
//         header("location:../episode3/logic-doors.php"); 
//     }else{
//         $valid = false;
//         $_SESSION['err'] = true;
//         header("location:episode2.php");
//     }     
//   }else{
//     header("location:episode2.php?test");
//   }
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil Eldenscape</title>

  <link rel="stylesheet" href="../../style.css">
  <script src="script.js"></script>
</head>
<body>
    <a href="../../index.php"><img src="../../images/logo/logo.png" alt="logo de Eldenscape" id="logo"></a>
    <div id="welcome">
        <h1>Lancer la mystérieuse machine</h1>
        <h2>Vous venez d'entrer dans la salle super sécurisé !</h2>
        <p>Une fois la porte hackée, vous entrez maintenant dans la salle et découvrez la mystérieuse machine. Vous devez maintenant
            trouver comment lancer cette dernière... <br>Sur le bureau vous trouvez un mystérieux dossier composé de 2 documents <a href="./documents/code.jpg" download>Une note</a> et <a href="./documents/ASCII.jpg" download>Un étrange tableau</a>...

        </p>
        <form action="../../verifChallenge.php" method="POST" id="Episode2">
            <div class="box-input-validation">
                <div class="input-container-validation">

                    <input id="password" class="input-validation" type="text" placeholder=" " name="ep4binaire"/>

                    <div class="cut-validation"></div>

                    <label for="password" class="placeholder" name="">Password</label>
                </div>
                
                <button class="custom-btn btn-main" >Valider</button>


                <?php
                    if( $_SESSION['err'] == true){
                        $err_pass = "Le password n'est pas bon";
                        echo $err_pass;
                        $_SESSION['err'] = false;
                    }
                ?>
            </form> 

                </div>
            </div>
                    
    
    </div>
</body>

</html>


