<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil Eldenscape</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
    <a href="index.html"><img src="images/logo/logo.png" alt="logo de Eldenscape" id="logo"></a>
    <div id="welcome">
        <h1>Bienvenue sur Eldenscape</h1>
        <?php
            if(isset($_GET['deconnexion'])){
                  $err = $_GET['deconnexion'];
                  if($err==1) $valid_deco ="Deconnexion terminer";
             }            
             if(isset($valid_deco)){
                  echo $valid_deco;
             }

            ?>
        <h2>Un escape game virtuel dont vous vous souviendrez !</h2>
        <p>Nous sommes en 2022, vous êtes choisis par une agence d'espionnage pour aller se renseigner sur une mystère nouvelle invention. Lors de votre mission vous serez en constante communication
            avec l'agence grâce à votre oreitette. En arrivant sur place, vous essayer de vous renseigner sur cette machine, vous découvrez alors que c'est une machine 
            à voyager dans le temps. L'agence essayer de pirater celle-ci mais active un piège présent dans la machine. Celle-ci
            vous bloque dans une bulle temporel.Au même moment vous perdez le contact avec l'agence. Cette bulle vous amène dans un lieux mais surtout une époque 
            différentes. Devant vous ce trouve une énigme, et lorsque vous essayer de la résoudre la communications reviens pendant quelques seconde avec l'agence. 
            Votre but est de trouver commencer sortir de cette bulle et d'en sortir.
            N'oubliez pas que l'agence est la pour vos aider.
            Plus le temps avance, moins vous aurez de chance de sortir et une fois les 1h passés vous serez bloquée pour toujours dans cette bulle.</p>
        <a href="inscription.php"><button class="custom-btn btn-main">S'inscrire</button></a>
        <a href="connexion.php"><button class="custom-btn btn-main">Se connecter</button></a>
        <button onclick="alert1()" class="custom-btn btn-second">Jouer en tant qu'invité</button>
        
    </div>
</body>
</html>