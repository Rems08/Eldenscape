    <?php
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
                $pseudo = valid_donnees($_POST["pseudo"]);
                // $mail = valid_donnees($_POST["mail"]);
                $password = valid_donnees($_POST["password"]);
                $confpassword = valid_donnees($_POST["confpassword"]);
                


                //  Vérification du pseudo
                if(empty($pseudo)){
                    $valid = false;
                    $er_pseudo = ("Le pseudo d' utilisateur ne peut pas être vide");
                    echo 'fdffs444';
                //}elseif(grapheme_strlen($pseudo < 1)){
                //     $valid = false;
                //     $er_pseudo = 'Le pseduo doit faire plus de 5 caractères';
                //     echo 'fdf22fs';
                // }elseif(grapheme_strlen($pseudo > 25)){
                //     $valid = false;
                //     $er_pseudo = 'Le pseduo doit faire moins de 26 caractères';
                //     echo 'fdffs333';

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
                    $verifpseudo = $DB->prepare("SELECT * FROM utilisateur WHERE username=?");
                    $verifpseudo->execute(array([$pseudo])); 
                    $verifpseudo = $verifpseudo->fetch();
                    if ($verifpseudo) {
                        // email existe
                        $valid= false;
                        $er_conf_pseudo = "Le mail existe déja";
                        echo'gfd';
                    } else {
                        echo 'fdsssdsfsdfd';
                        // email n'existe pas
                    } 
                }
                

                // Vérification du mot de passe
                if(empty($password)) {
                    $valid = false;
                    $er_password = "Le mot de passe ne peut pas être vide";
                    echo 'fdffs';

                }elseif($password != $confpassword){
                    $valid = false;
                    $er_confpassword = "La confirmation du mot de passe ne correspond pas";
                }
            }
        if($valid){
            
            try{

                //$date_creation = date('Y-m-d H:i:s');
                $crypt_password = password_hash($password,PASSWORD_ARGON2ID);
                
                if(password_verify($password, $crypt_password)){
                    echo 'mot de passe valide';
                }else {
                    echo 'pas valide';
                }
                //On insère les données reçues
                $sth = $DB->prepare("
                    INSERT INTO utilisateur(username, password)
                    VALUES(?, ?)");
                $sth->execute(array($pseudo,$crypt_password));
                
                //On renvoie l'utilisateur vers la page de remerciement
                header("Location:connexion.php");
                exit;
            }
            catch(PDOException $e){
                echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
            }

        }else{
            
        }
    }
    ?>