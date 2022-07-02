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
// if($Nbchallenge != "4"){
//header("location:chapitre1/episode4-binaire/binaire.php");
// }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>ZTJIAICH</title>
<meta charset="UTF-8" />
<script src="vigenere.js"></script>

<link href="vigenere.css" type="text/css" rel="stylesheet" />
<link href="../../style.css" type="text/css" rel="stylesheet" />
</head>
<body>

    <h1 id = "title">Le chiffre de Vigenère
    </h1>
    <div class="page">

        <p >
            PP PSG HP SEFWP HWG MIHRGAII
        </p>


        <div>
          &nbsp;
        </div>
                
                <div id = "vigenere">
                    <div id = "left">
                    <div id = "cle">
                    
                    <img src = "img/cle.jpg">
                    </div>
                    <div id= "validation">
                    <form action="../../verifChallenge.php" method="POST" id="Episode5">
            <div class="box-input-validation">
                <div class="input-container-validation">

                    <input id="password" class="input-validation" type="text" placeholder=" " name="ep5vigenere"/>

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
                    <div id = "table">
                    
                    <img src = "img/table.jpg">
                    </div>
                </div>
                    
                    

                   



                    

                </div>

                

    
           





        
    </div>
</body>
</html>
