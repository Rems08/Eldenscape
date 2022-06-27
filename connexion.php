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
    <form action="verification.php" method="POST">
      <div id="formulaire">
        <div class="form">
            <div class="title">CONNEXION</div>
            <div class="subtitle">Connectez-vous</div>
            <div class="input-container ic2">
              <input id="email" class="input" type="text" placeholder=" " name="username" required/>
              <div class="cut cut-short"></div>
              <label for="email" class="placeholder">Email</label>
            </div>
            <div class="input-container ic1">
              <input id="password" class="input" type="password" placeholder=" " name="password" required/>
              <div class="cut"></div>
              <label for="password" class="placeholder">Password</label>
            </div>

            <button type="text" class="submit" value='LOGIN'>Connexion</button>
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect. Veuillez réessayer</p>";
                }
                ?>
            <p>
              &lowbar;
            </p>
            <a href="inscription.php"><p>Vous n'avez pas encore de compte ?</p></a>
          </div>
    </form>
    </div>
  </div>
      
</body>
</html>
