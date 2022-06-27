<!DOCTYPE html>
<html lang="fr">
<head>
<title>MineSweeper</title>
<meta charset="UTF-8" />
<script src="MineSweeper.js"></script>
<script>
    /* on load scripts */
    window.onload = function() {
        MineSweeper.initialise();
    }
</script>
<link href="MineSweeper.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="page">
        <h1>
            D&eacute;mineur
        </h1>
        <?php
                session_start();
                if($_SESSION['username'] !== NULL){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<h1>Bonjour $user</h1>";
                }
                else {
                    header('Location: ../../connexion.php');
                }
            ?>
        <div>
          &nbsp;
        </div>
        <div class="game" id="plateau">


        </div>
        <div class="options">

            <div id="result" class="result">

            </div>

            <div class="menus">
                    <button class="custom-btn btn-second" onclick="MineSweeper.startGame('normal');">Recommencer</button>
                    <?php
                if(isset($_GET['validationChapitre1']))
                { 
                   if($_GET['validationChapitre1']==true)
                   {  
                      header("location:../../challengeValidation.php");
                   }
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>
