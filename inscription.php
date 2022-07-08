<?php
session_start();
include_once('connexionBD.php');

    if(!empty($_POST)){
            extract($_POST);
            $valid = true;
            if (isset($_POST['validinscription'])){

                function valid_donnees($donnees){
                    $donnees = trim($donnees);
                    $donnees = stripslashes($donnees);
                    $donnees = htmlspecialchars($donnees);
                    return $donnees;
                }
                $username = valid_donnees($_POST["usernameins"]);
                $password = valid_donnees($_POST["passwordins"]);
                $confpassword = valid_donnees($_POST["confpasswordins"]);

                if(empty($username)){
                    $valid = false;
                    $er_pseudo = ("Le pseudo d' utilisateur ne peut pas être vide");
                }elseif(grapheme_strlen($username) <= 2){
                    $valid = false;
                    $er_pseudo = 'Le pseduo doit faire plus de 3 caractères';
                }elseif(grapheme_strlen($username) >= 20){
                    $valid = false;
                    $er_pseudo = 'Le pseduo doit faire moins de 20 caractères';
    
                }else{
                  $stmt = $DB->prepare("SELECT username FROM utilisateur WHERE username=?");
                  $stmt->execute([$username]); 
                  $user = $stmt->fetch();
                  if ($user) {
                      $valid = false;
                      $er_pseudo = ("Ce pseudo existe déja, essayer de vous connecter");
                  } else {
                  } 
                }
                

                if(empty($password)) {
                    $valid = false;
                    $er_password = "Le mot de passe ne peut pas être vide";

                }elseif($password != $confpassword){
                    $valid = false;
                    $er_confpassword = "La confirmation du mot de passe ne correspond pas";
                }
            }else if (isset($_POST['urlconnexion']) ){
              header("Location:connexion.php");
              $valid = false;
            }
        if($valid){
            
            try{

                //$date_creation = date('Y-m-d H:i:s');
                $crypt_password = password_hash($password,PASSWORD_ARGON2ID);
                
                // if(password_verify($password, $crypt_password)){
                //     echo 'mot de passe valide';
                // }else {
                //     echo 'pas valide';
                // }
                //On insère les données reçues
                $sth = $DB->prepare("
                    INSERT INTO utilisateur(username, password)
                    VALUES(?, ?)");
                $sth->execute(array($username,$crypt_password));
                $valid_inscription ="Inscription terminé, connectez vous"; 
                //On renvoie l'utilisateur vers la page de remerciement
                header("Location:connexion.php?reussi=1");
                exit;
            }
            catch(PDOException $e){
                echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
            }

        }else{
            
        }
    }
    ?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion Eldenscape</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  <div id="main">

    <div><a href="./index.php"><img src="images/logo/logo.png" alt="logo de Eldenscape" id="logo" style="text-align: center;"></a></div>
      <form method="POST" id="inscription" action=" ">
        <div id="formulaire">
            <div class="form">
                <div class="title">INSCRIPTION</div>
                <div class="subtitle">Sauvegardez votre progression en vous inscrivant !</div>

                <div class="input-container ic2">                  
                  <input id="email" class="input" type="text" placeholder=" " name="usernameins" />
                  <div class="cut cut-username"></div>

                  <label for="email" class="placeholder">Pseudo</label>
                  <?php
                    if(isset($er_pseudo)){
                      echo $er_pseudo;
                    }
                  ?>
                </div>  
                <div class="input-container ic1"> 
                  <input id="password" class="input" type="password" placeholder=" " name="passwordins" />
                  <div class="cut"></div>
                  <?php
                    if(isset($er_password)){
                      echo $er_password;
                    }
                  ?>
                  <label for="password" class="placeholder">Password</label>
                </div>
                <div class="input-container ic1">
                  <input id="confpassword" class="input" type="password" placeholder=" " name="confpasswordins" />
                  <div class="cut-confirm"></div>
                  <?php
                    if(isset($er_confpassword)){
                      echo $er_confpassword;
                    }
                    
                  ?>
                    <?php
                    if(isset($valid_inscription)){
                      echo $valid_inscription;
                    }
                  ?>
                  <label for="confirm_password" class="placeholder">Confirm Password</label>
                </div>

                <input type="submit" class="submit"  name="validinscription" value="Inscription">
                <p>
                  &lowbar;
                </p>
                <p>Vous êtes déjà membre ?</p>
                <a href="connexion.php"><button type="text" class="inscription" name="urlconnexion" >Connexion</button></a>
              </div>
            </div>
        </form>
      </div>
    
</body>
</html>