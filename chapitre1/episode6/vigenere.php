<!DOCTYPE html>
<html lang="fr">
<head>
<title>ZTJIAICH</title>
<meta charset="UTF-8" />
<script src="vigenere.js"></script>

<link href="vigenere.css" type="text/css" rel="stylesheet" />
<link href="../../style.css" type="text/css" rel="stylesheet" />
</head>
<body>

    <h1 id = "title">Le chiffre de Vigenère
    </h1>
    <div class="page">

        <p >
            PP PSG HP SEFWP HWG MIHRGAII
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
                
                <div id = "vigenere">
                    <div id = "left">
                    <div id = "cle">
                    
                    <img src = "img/cle.jpg">
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
                    <div id = "table">
                    
                    <img src = "img/table.jpg">
                    </div>
                </div>
                    
                    

                   



                    

                </div>

                

    
           





        
    </div>
</body>
</html>
