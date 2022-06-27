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
    <div id="formulaire">
        <div class="form">
            <div class="title">INSCRIPTION</div>
            <div class="subtitle">Sauvegardez votre progression en vous inscrivant !</div>
            <div class="input-container ic2">
              <input id="email" class="input" type="text" placeholder=" " />
              <div class="cut cut-username"></div>
              <label for="email" class="placeholder">Username</label>
            </div>
            <div class="input-container ic1">
              <input id="password" class="input" type="password" placeholder=" " />
              <div class="cut"></div>
              <label for="password" class="placeholder">Password</label>
            </div>
            <div class="input-container ic1">
              <input id="password" class="input" type="password" placeholder=" " />
              <div class="cut-confirm"></div>
              <label for="password" class="placeholder">Confirm Password</label>
            </div>

            <button type="text" class="submit">Inscription</button>
            <p>
              &lowbar;
            </p>
            <p>Vous êtes déjà membre ?</p>
            <a href="connexion.php"><button type="text" class="inscription">Connexion</button></a>
          </div>
        </div>
      </div>
</body>
</html>
