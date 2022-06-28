<?php
session_start();
if(isset($_SESSION['id'])){
   header('Location: principale.php');
}
        include_once('connexionBD.php');

    if(!empty($_POST)){
            extract($_POST);
            $valid = true;

            if (isset($_POST['inscription'])){

                function valid_donnees($donnees){
                    $donnees = trim($donnees);
                    $donnees = stripslashes($donnees);
                    $donnees = htmlspecialchars($donnees);
                    // $donnees = mysqli_real_escape_string($donnees);
                    return $donnees;
                }
                $username = valid_donnees($_POST["username"]);
                // $mail = valid_donnees($_POST["mail"]);
                $password = valid_donnees($_POST["password"]);
                $confpassword = valid_donnees($_POST["confpassword"]);
                


                //  Vérification du pseudo
                if(empty($username)){
                    $valid = false;
                    $er_pseudo = ("Le pseudo d' utilisateur ne peut pas être vide");
                }elseif(grapheme_strlen($username) <= 2){
                    $valid = false;
                    $er_pseudo = 'Le pseduo doit faire plus de 3 caractères';
                }elseif(grapheme_strlen($username) >= 20){
                    $valid = false;
                    $er_pseudo = 'Le pseduo doit faire moins de 20 caractères';

                // Vérification du mail
                // if(empty($mail)){
                //     $valid = false;
                //     $er_mail = "Le mail ne peut pas être vide";
                //     echo 'fdsdd';  
    
                //     // On vérifit que le mail est dans le bon format
                // }elseif(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
                //     $valid = false;
                //     $er_mail = "Le format du mail n'est pas valide";
                //     echo 'fdsss';
                    
    
                }else{
                  $stmt = $DB->prepare("SELECT username FROM utilisateur WHERE username=?");
                  $stmt->execute([$username]); 
                  $user = $stmt->fetch();
                  if ($user) {
                      // le nom d'utilisateur existe déjà
                      $valid = false;
                      $er_pseudo = ("Ce pseudo existe déja, essayer de vous connecter");
                  } else {
                      // le nom d'utilisateur n'existe pas
                  } 
                }
                

                // Vérification du mot de passe
                if(empty($password)) {
                    $valid = false;
                    $er_password = "Le mot de passe ne peut pas être vide";

                }elseif($password != $confpassword){
                    $valid = false;
                    $er_confpassword = "La confirmation du mot de passe ne correspond pas";
                }
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
                $valid_inscription ="Inscription terminer, connecter vous"; 
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

    <div><a href="./index.html"><img src="images/logo/logo.png" alt="logo de Eldenscape" id="logo" style="text-align: center;"></a></div>
      <form method="POST" id="inscription" action=" ">
        <div id="formulaire">
            <div class="form">
                <div class="title">INSCRIPTION</div>
                <div class="subtitle">Sauvegardez votre progression en vous inscrivant !</div>

                <div class="input-container ic2">                  
                  <input id="email" class="input" type="text" placeholder=" " name="username" />
                  <div class="cut cut-username"></div>

                  <label for="email" class="placeholder">Pseudo</label>
                  <?php
                    if(isset($er_pseudo)){
                      echo $er_pseudo;
                    }
                  ?>
                </div>  
                <div class="input-container ic1"> 
                  <input id="password" class="input" type="password" placeholder=" " name="password" />
                  <div class="cut"></div>
                  <?php
                    if(isset($er_password)){
                      echo $er_password;
                    }
                  ?>
                  <label for="password" class="placeholder">Password</label>
                </div>
                <div class="input-container ic1">
                  <input id="confpassword" class="input" type="password" placeholder=" " name="confpassword" />
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

                <input type="submit" class="submit"  name="inscription" value="Inscription">
                <p>
                  &lowbar;
                </p>
                <p>Vous êtes déjà membre ?</p>
                <a href="connexion.php"><button type="text" class="inscription">Connexion</button></a>
              </div>
            </div>
        </form>
      </div>
    
</body>
</html>

