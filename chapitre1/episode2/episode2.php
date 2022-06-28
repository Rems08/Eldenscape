<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil Eldenscape</title>

  <link rel="stylesheet" href="../../style.css">
  <script src="script.js"></script>
</head>
<body>
    <a href="../../index.html"><img src="../../images/logo/logo.png" alt="logo de Eldenscape" id="logo"></a>
    <div id="welcome">
        <h1>Lancer la mystérieuse machine</h1>
        <h2>Vous venez d'entrer dans la salle super sécurisé !</h2>
        <p>Une fois la porte hackée, vous entrez maintenant dans la salle et découvrez la mystérieuse machine. Vous devez maintenant
            trouver comment lancer cette dernière... <br>Sur le bureau vous trouvez un mystérieux dossier composé de 2 documents <a href="./documents/code.jpg" download>Une note</a> et <a href="./documents/ASCII.jpg" download>Un étrange tableau</a>...

        </p>
        <form action="ep2Validation.php" method="POST">
            <div class="box-input-validation">
                <div class="input-container-validation">

                    <input id="password" class="input-validation" type="text" placeholder=" " name="password-ep2" required/>

                    <div class="cut-validation"></div>
                    <label for="password" class="placeholder">Password</label>
                </div>
                
                <a href="#"><button class="custom-btn btn-main">Valider</button></a>

                <?php
                    if( $_SESSION['err'] == true){
                        $err_pass = "Le password n'est pas bon";
                        echo $err_pass;
                    }
                ?>
               

                </div>
            </div>
        </form>
    
    </div>
</body>

</html>


