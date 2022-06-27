<?php
    session_start();
    include_once('connexionBD.php');  
    if(@$_SESSION["autoriser"] != "oui"){
        header("location:connexion.php");
        exit();
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
    if($Nbchallenge == "0"){
        header("location:principale.php?nochallenge=true");
    }else if($Nbchallenge == "1"){
        header("location:chapitre1/episode2/episode2.php");
    }else if($Nbchallenge == "2"){
        header("location:chapitre1/episode3/logic-doors.php");
    }else if($Nbchallenge == "3"){
        header("location:chapitre1/pacman/index.php");
    }else{
        header("location:principale.php");
    }

    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
        if(isset($_GET['ep1']))
        { 
           if($_GET['ep1']==true && $Nbchallenge >= "0")
            {  
                $stmt = "UPDATE utilisateur SET challenge =1 WHERE username = '$user'";
                $req = $DB->prepare($stmt);
                $req->bindValue(1, $user, PDO::PARAM_INT);  
                $req ->execute();
                header("location:chapitre1/episode2/episode2.php");
            }
        }
    }
    if (isset($_POST['password-ep2'])){
        $passep2 = $_POST['password-ep2'];       
        function valid_donnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
        }
        $passep2 = valid_donnees($_POST['password-ep2']);
        
        if($passep2 == 7439 || $passep2 == "7439"){
            $stmt = "UPDATE utilisateur SET challenge =2 WHERE username = '$user'";
            $req = $DB->prepare($stmt);
            $req->bindValue(1, $user, PDO::PARAM_INT);  
            $req ->execute();
            $challengeNb = $req->fetch();
            header("location:chapitre1/episode3/logic-doors.php"); 
        }else{
            $valid = false;
            $_SESSION['err'] = true;
            header("location:chapitre1/episode2/episode2.php");
        }     
      }else{
       
        
        $valid = false;
        echo "Le mot de passe n'est pas remplie"; 
      }
    





// echo "<pre>";
// var_dump($challengeNb); //"Bonjour , $challengeNb"; 
// echo "</pre>";
?>