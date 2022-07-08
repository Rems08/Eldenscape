<?php
session_start();
include_once('../../connexionBD.php'); 
require_once('../../CalculTime.php');
if(auto_logout("user_time"))
{
    session_unset();
    session_destroy();
    header("location:../../connexion.php");          
    exit;
} 

$user =  $_SESSION['username'];
$stmt = "SELECT challenge FROM utilisateur WHERE username='$user'";
$req = $DB->prepare($stmt);
$req->bindValue(1, $user, PDO::PARAM_INT);  
$req ->execute();
$challengeNb = $req->fetch();
// echo $challengeNb["challenge"];
// echo "$user";    
$Nbchallenge = $challengeNb["challenge"];
if($Nbchallenge != "1"){
    header("location:../episode1-demineur/MineSweeper.php");
}

    
            //     session_start();
            //     if($_SESSION['username'] !== NULL && $Nbchallenge == "4"){
            //         $user = $_SESSION['username'];
            //         $stmt = "UPDATE utilisateur SET challenge = 4 WHERE username = '$user'";
            //         $req = $DB->prepare($stmt);
            //         $req->bindValue(1, $user, PDO::PARAM_INT);  
            //         $req ->execute();
            //     }
            //     else {
            //         header('Location: ../../connexion.php');
            //     }
            // ?>
<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>EldenScape | Pacman</title>
    <link rel="shortcut icon" href="TemplateData/favicon.ico">
    <link rel="stylesheet" href="TemplateData/style.css">
    <link rel="stylesheet" href="../../style.css">
  </head>
  <body>
  <a href="../../index.php"><img src="../../images/logo/logo.png" alt="logo de Eldenscape" id="logo"></a>
    
    
    <div class="page">
    <h1 id = "title"> Infiltration
    </h1>

        <p >
            Vous ouvrez la porte est arrivez devant un dédale de couloirs. <br>
            Des gardiens rodent dans les prochains couloirs. Vous allez devoir vous infiltrer sans vous faire apercevoir. <br>Trouvez comment sortir sans vous faire attraper.
        </p>
      <!-- Unity -->
    <div id="unity-container" class="unity-desktop">
      <canvas id="unity-canvas" width=960 height=600></canvas>
      <div id="unity-loading-bar">
        <div id="unity-logo"></div>
        <div id="unity-progress-bar-empty">
          <div id="unity-progress-bar-full"></div>
        </div>
      </div>
      <div id="unity-mobile-warning">
        WebGL builds are not supported on mobile devices.
      </div>
      <div id="unity-footer">
        <div id="unity-webgl-logo"></div>
        <div id="unity-fullscreen-button"></div>
        <div id="unity-build-title">PacMan</div>
      </div>
    </div>
    <script>
      var buildUrl = "Build";
      var loaderUrl = buildUrl + "/episode2-pacman.loader.js";
      var config = {
        dataUrl: buildUrl + "/episode2-pacman.data",
        frameworkUrl: buildUrl + "/episode2-pacman.framework.js",
        codeUrl: buildUrl + "/episode2-pacman.wasm",
        streamingAssetsUrl: "StreamingAssets",
        companyName: "EldenScape",
        productName: "PacMan",
        productVersion: "1.0",
      };

      var container = document.querySelector("#unity-container");
      var canvas = document.querySelector("#unity-canvas");
      var loadingBar = document.querySelector("#unity-loading-bar");
      var progressBarFull = document.querySelector("#unity-progress-bar-full");
      var fullscreenButton = document.querySelector("#unity-fullscreen-button");
      var mobileWarning = document.querySelector("#unity-mobile-warning");

      // By default Unity keeps WebGL canvas render target size matched with
      // the DOM size of the canvas element (scaled by window.devicePixelRatio)
      // Set this to false if you want to decouple this synchronization from
      // happening inside the engine, and you would instead like to size up
      // the canvas DOM size and WebGL render target sizes yourself.
      // config.matchWebGLToCanvasSize = false;

      if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
        container.className = "unity-mobile";
        // Avoid draining fillrate performance on mobile devices,
        // and default/override low DPI mode on mobile browsers.
        config.devicePixelRatio = 1;
        mobileWarning.style.display = "block";
        setTimeout(() => {
          mobileWarning.style.display = "none";
        }, 5000);
      } else {
        canvas.style.width = "960px";
        canvas.style.height = "600px";
      }
      loadingBar.style.display = "block";

      var script = document.createElement("script");
      script.src = loaderUrl;
      script.onload = () => {
        createUnityInstance(canvas, config, (progress) => {
          progressBarFull.style.width = 100 * progress + "%";
        }).then((unityInstance) => {
          loadingBar.style.display = "none";
          fullscreenButton.onclick = () => {
            unityInstance.SetFullscreen(1);
          };
        }).catch((message) => {
          alert(message);
        });
      };
      document.body.appendChild(script);
    </script>
     <form action="../../verifChallenge.php" method="POST" id="ep2pacman"></form>
    <div class="box-input-validation">
               
      <div class="input-container-validation">
          <input id="password" class="input-validation" type="text" placeholder=" " name="pass_pacman"/>
          <div class="cut-validation"></div>
          <label for="password" class="placeholder">Password</label>
          <button class="custom-btn btn-main" >Valider</button>
           
      </div>
      <?php
        // if(isset($_SESSION['validpacman'])){
        //   if($_SESSION['validpacman'] == true){
        //     $err_pass = "Le password n'est pas bon";
        //     echo $err_pass;
        //    $_SESSION['err'] = false;

        //   }
        // }
      ?>
      

      
    
    </div>
    </form>
</div>

</body>
</html>
