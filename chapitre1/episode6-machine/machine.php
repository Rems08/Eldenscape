<?php
session_start();
include_once('../../connexionBD.php'); 
$user =  $_SESSION['username'];
    $stmt = "SELECT challenge FROM utilisateur WHERE username='$user'";
    $req = $DB->prepare($stmt);
    $req->bindValue(1, $user, PDO::PARAM_INT);  
    $req ->execute();
    $challengeNb = $req->fetch();
    // echo $challengeNb["challenge"];
    // echo "$user";    
    $Nbchallenge = $challengeNb["challenge"];   ;
    // if($_SESSION['username'] !== NULL){
    //     $user = $_SESSION['username'];
    //     $stmt = "UPDATE utilisateur SET challenge = 3 WHERE username = '$user'";
    //     $req = $DB->prepare($stmt);    
    //     $req->bindValue(1, $user, PDO::PARAM_INT);  
    //     $req ->execute();
    // }
    // else{
    //     header('Location: ../../connexion.php');
    // }
if($Nbchallenge != "5"){
header("location:../episode5-vigenere/vigenere.php");
}
            ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>Machine</title>
<meta charset="UTF-8" />
<script src="machine.js"></script>

<link href="machine.css" type="text/css" rel="stylesheet" />
<link href="../../style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <a href="../../index.php"><img src="../../images/logo/logo.png" alt="logo de Eldenscape" id="logo"></a>
    
    
    <div class="page">
    <h1 id = "title"> Une ancienne machine mysterieuse
    </h1>

        <p >
        Vous vous approchez d'une table positionné dans le coin de la pièce. Sur cette table, vous trouvez une machine étrange. <br> 
        Vous reconnaissez la machine de Turing.<br> Vous trouvez  <a href= "img/algorithme.jpg" download = "" target="_blank">un tableau</a> correspondant à   un algorithme  et<a href="img/bandeau.jpg" download = "" target="_blank"> un bandeau</a> avec une combinaison de 4 chiffres <br>
        Trouvez le résultat de l'algorithme en utilisant le fonctionnement de la machine de Turing. 
        </p>
        <div>
          &nbsp;
        </div>
                
                <div id = "machine">
                    <div id = "machine_img">
                    
                    <img src = "img/machine.jpg">
                    </div>
                    <div id= "validation">
                    <form action="../../verifChallenge.php" method="POST" id="Episode2">
            <div class="box-input-validation">
                <div class="input-container-validation">

                    <input id="password" class="input-validation" type="text" placeholder=" " name="ep6turing"/>

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

                

    
           





        
    </div>
</body>
</html>
