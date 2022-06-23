<!DOCTYPE html>
<html lang="fr">
<head>
<title>Machine</title>
<meta charset="UTF-8" />
<script src="machine.js"></script>

<link href="machine.css" type="text/css" rel="stylesheet" />
<link href="../../style.css" type="text/css" rel="stylesheet" />
</head>
<body>

    <h1 id = "title"> Une ancienne machine mysterieuse
    </h1>
    <div class="page">

        <p >
        Vous vous approchez d'une table positionné dans le coin de la pièce. Sur cette table, vous trouvez une machine étrange. <br> 
        Vous reconnaissez la machine de Turing. Vous trouvez  <a href= "img/algorithme.jpg" download = "" target="_blank">un tableau</a> correspondant à <a href="img/bandeau.jpg" download = "" target="_blank">  un algorithme </a> et un bandeau avec une combinaison de 4 chiffres <br>
        Trouvez le résultat de l'algorithme en utilisant le fonctionnement de la machine de Turing. 
        </p>

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
                
                <div id = "machine">
                    <div id = "machine_img">
                    
                    <img src = "img/machine.jpg">
                    </div>
                    <div id= "validation">
                    <div class="box-input-validation">
               
                        <div class="input-container-validation">
                        <input id="password" class="input-validation" type="text" placeholder=" " name="password" required/>
                        <div class="cut-validation"></div>
                        <label for="password" class="placeholder">Password</label>
                        </div>
               
                        <a href="#"><button class="custom-btn btn-main">Valider</button></a>
                    </div>
                    </div>

                </div>

                

    
           





        
    </div>
</body>
</html>
