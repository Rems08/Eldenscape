<!DOCTYPE html>
<html lang="fr">
<head>
<title>Logic-Doors</title>
<meta charset="UTF-8" />
<script src="logic-doors.js"></script>

<link href="logic-doors.css" type="text/css" rel="stylesheet" />
<link href="../../logic-doors.css" type="text/css" rel="stylesheet" />
</head>
<body>

    <h1 id = "title"> La porte menant à la salle principale
    </h1>
    <div class="page">

        <p >
            Une fois arrivé au fond du couloir, vous vous trouvez devant une grande porte en fer, avec un appareil servant à entrer un code à x chiffres.<br> Sur cette porte, un panneau indique "Salle principale". Vous tendez l'oreille et n'entendez aucun bruit.<br>
            Vous essayez d'ouvrir la porte, de l'enfoncer, d'entrer quelques codes aléatoires, rien n'y fait, la porte ne s'ouvre pas.<br>
            Vous fouillez les environ un instant et derrière le panneau. Vous trouvez un plan mystérieux. <br>Ce plan doit surement indiquer comment trouver le mot de passe afin d'ouvrir la porte.<br>
            A vous de le trouver.  
            <br>
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

        <div class="logic-doors" >
            <ul class = "Icons">

                <li><img src = "img/Icons/A.png" class = "  Icon"></li>
                <li><img src = "img/Icons/B.png" class = "  Icon"></li>
                <li><img src = "img/Icons/C.png" class = "  Icon"></li>
                <li><img src = "img/Icons/D.png" class = "  Icon"></li>
                <li><img src = "img/Icons/E.png" class = "  Icon"></li>
                <li><img src = "img/Icons/F.png" class = "  Icon"></li>
 
            </ul>
            <!-- A -->
            <img src = "img/logic doors/LINK.png" class = "link" id = "A_First_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "A_Second_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "A_Third_Link">
            <!-- B -->
            <img src = "img/logic doors/LINK.png" class = "link" id = "B_First_Link">
            <img src = "img/logic doors/NO.png" class = "door" id = "B_Door">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "B_Second_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "B_LinkToA_Door">
            <!-- AB -->
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "B_Third_Link">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "B_Last_Link">
            <img src = "img/logic doors/NOR.png" class = "door" id= "AB_Door">
            <img src = "img/logic doors/LINK.png" class = "link" id = "AB_First_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "AB_Second_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "AB_Third_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "AB_LinkToABCDEF_Door">
            <img src = "img/logic doors/LINK.png" class = "link" id = "AB_LinkToABCDEF_Door2">
            <img src = "img/logic doors/LINK.png" class = "link" id = "AB_LinkToABCDEF_Door3">
            <img src = "img/logic doors/LINK.png" class = "link" id = "AB_Last_Link">
            <!-- C -->
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "C_First_Link">
            <img src = "img/logic doors/NO.png" class = "door" id = "C_Door">
            <img src = "img/logic doors/LINK.png" class = "link" id = "C_Second_Link">
            <!-- CD -->
            <img src = "img/logic doors/OR.png" class = "door" id= "CD_Door">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "CD_First_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "CD_LinkToCDEF_Door">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "CD_LinkToCDEF_Door2">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "CD_LinkToCDEF_Door3">
            <img src = "img/logic doors/LINK.png" class = "link" id = "CD_LinkToCDEF_Door4">
            <!-- D -->
            <img src = "img/logic doors/LINK.png" class = "link" id = "D_First_Link">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "D_Second_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "D_LinkToC_Door">
            <img src = "img/logic doors/LINK.png" class = "link" id = "D_Last_Link">
            <!-- E -->
            <img src = "img/logic doors/LINK.png" class = "link" id = "E_First_Link">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "E_Second_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "E_LinkToF_Door">
            <img src = "img/logic doors/LINK.png" class = "link" id = "E_Last_Link">
            <!-- F -->
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "F_First_Link">
            <img src = "img/logic doors/NO.png" class = "door" id = "F_Door">
            <img src = "img/logic doors/LINK.png" class = "link" id = "F_Second_Link">
            <!-- EF -->
            <img src = "img/logic doors/OR.png" class = "door" id= "EF_Door">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "EF_First_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "EF_LinkToCDEF_Door">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "EF_LinkToCDEF_Door2">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "EF_LinkToCDEF_Door3">
            <img src = "img/logic doors/LINK.png" class = "link" id = "EF_LinkToCDEF_Door4">
            <!-- CDEF -->
            <img src = "img/logic doors/NOR.png" class = "door" id= "CDEF_Door">
            <img src = "img/logic doors/LINK.png" class = "link" id = "CDEF_First_Link">
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "CDEF_Second_Link">
            <img src = "img/logic doors/LINK.png" class = "link" id = "CDEF_LinkToABCDEF_Door">
            <img src = "img/logic doors/LINK.png" class = "link" id = "CDEF_LinkToABCDEF_Door2">
            <img src = "img/logic doors/LINK.png" class = "link" id = "CDEF_LinkToABCDEF_Door3">
            <img src = "img/logic doors/LINK.png" class = "link" id = "CDEF_Last_Link">
            <!-- ABCDEF -->
            <img src = "img/logic doors/AND.png" class = "door" id="ABCDEF_Door">
            <!-- OUTPUT -->
            <img src = "img/logic doors/DEMI-LINK.png" class = "demi-link" id = "OUTPUT">
            <img src = "img/Icons/1.png" class = "Icon" id = "Output1Icon">
            <h3 id = "Output_Text">Sortie
            </h3>



            <div class="box-input-validation">
               
            <div class="input-container-validation">
                <input id="password" class="input-validation" type="text" placeholder=" " name="password" required/>
                <div class="cut-validation"></div>
                <label for="password" class="placeholder">Password</label>
            </div>
            
            <a href="#"><button class="custom-btn btn-main">Valider</button></a>
            </div>
        </div>
            <div id="Table">
                <img src ="img/logic doors/Table.png">
            </div>


            

        </div>
        
    </div>
</body>
</html>
