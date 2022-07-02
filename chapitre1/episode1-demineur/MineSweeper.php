<?php
session_start();
include_once('../../connexionBD.php'); 
require_once('../../CalculTime.php');        
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
// if($Nbchallenge != "0"){
//     header("location:../../principale.php");
// }
if(auto_logout("user_time"))
{
    session_unset();
    session_destroy();
    header("location:../../connexion.php");          
    exit;
} 
// if($Nbchallenge != "0"){
//     header("location:../../connexion.php");
// }
if(isset($_SESSION['username'])){
    // echo $challengeNb["challenge"];
    // echo "$user";    
    // $Nbchallenge = $challengeNb["challenge"];                
    // if($_SESSION['username'] !== NULL && $Nbchallenge == "0"){
    //     $user = $_SESSION['username'];
    //     $stmt = "UPDATE utilisateur SET challenge =0 WHERE username = '$user'";
    //     $req = $DB->prepare($stmt);
    //     $req->bindValue(1, $user, PDO::PARAM_INT);  
    //     $req ->execute();
    
}else{
    header('Location: ../../connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>MineSweeper</title>
<meta charset="UTF-8" />
<script src="MineSweeper.js"></script>
<script>
    /* on load scripts */
    window.onload = function() {
        MineSweeper.initialise();
    }
</script>
<link href="MineSweeper.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="page">
        <h1>
            D&eacute;mineur
        </h1>

        <div>
          &nbsp;
        </div>
        <div class="game" id="plateau">


        </div>
        <div class="options">

            <div id="result" class="result">

            </div>

            <div class="menus">
                    <button class="custom-btn btn-second" onclick="MineSweeper.startGame('normal');">Recommencer</button>
                    <?php
                if(isset($_GET['validationChapitre1']))
                { 
                   if($_GET['validationChapitre1']==true)
                   {  

                      header("location:../../verifChallenge?ep1=true");

                   }
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>
