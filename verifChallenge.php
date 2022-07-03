<?php
    session_start();
    include_once('connexionBD.php');  
    // if(@$_SESSION["autoriser"] != "oui"){
    //     header("location:connexion.php");
    //     exit();
    // } 
    $user =  $_SESSION['username'];
    $stmt = "SELECT challenge FROM utilisateur WHERE username='$user'";
    $req = $DB->prepare($stmt);
    $req->bindValue(1, $user, PDO::PARAM_INT);  
    $req ->execute();
    $challengeNb = $req->fetch();
    // echo $challengeNb["challenge"];
    // echo "$user";    
    $Nbchallenge = $challengeNb["challenge"];
    extract($_POST);
    $valid = true;

    if(isset($_GET['newgame'])){
        if($_GET['newgame'] == true){
            $stmt = "UPDATE utilisateur SET challenge = 0 WHERE username = '$user'";
                $req = $DB->prepare($stmt);
                $req->bindValue(1, $user, PDO::PARAM_INT);  
                $req ->execute();
                $challengeNb = $req->fetch();
                $Nbchallenge = $challengeNb["challenge"];
                header("location:chapitre1/episode1-demineur/MineSweeper.php");
        }
    }
        if(isset($_GET['ep1']))
        { 
           if($_GET['ep1']==true)
            {  
                $stmt = "UPDATE utilisateur SET challenge =1 WHERE username = '$user'";
                $req = $DB->prepare($stmt);
                $req->bindValue(1, $user, PDO::PARAM_INT);  
                $req ->execute();
                $challengeNb = $req->fetch();
                $Nbchallenge = $challengeNb["challenge"];
                header("location:chapitre1/episode2-pacman/index.php");

            }
        }

        if (isset($_POST['pass_pacman'])){     
            $passep2pacman = ($_POST['pass_pacman']);
            if(($passep2 == "ZTKpTMrC41" ||$passep2 == "ZTKPTMRC41" || $passep2 == "ztkptmrc41" )){
                $stmt = "UPDATE utilisateur SET challenge = 2 WHERE username = '$user'";
                $req = $DB->prepare($stmt);
                $req->bindValue(1, $user, PDO::PARAM_INT);  
                $req ->execute();
                $challengeNb = $req->fetch();;
                header("location:chapitre1/episode3-logicdoors/logic-doors.php"); 
            }else{
                $_SESSION['validpacman'] = true;
                header("location:chapitre1/episode2-pacman/index.php");
                // $valid = false;
                // $_SESSION['err'] = true;
                // $_SESSION['test'] = $passep2;
                // header("location:chapitre1/episode2/episode2.php");
            }     
          }
          
    if(isset(($_POST['ep3logicdoors']))){
            
            if ($_POST['ep3logicdoors'] == 011001 || $_POST['ep3logicdoors'] == "011001"){
            $stmt = "UPDATE utilisateur SET challenge =3 WHERE username = '$user'";
            $req = $DB->prepare($stmt);
            $req->bindValue(1, $user, PDO::PARAM_INT);  
            $req ->execute();
            $challengeNb = $req->fetch();
            header("location:chapitre1/episode4-binaire/binaire.php"); 
        }else{
            $valid = false;
            $_SESSION['err'] = true;
            header("location:chapitre1/episode3-logicdoors/logic-doors.php"); 
      }
    }

    if (isset($_POST['ep4binaire'])){     
        $passep2 = ($_POST['ep4binaire']);
        if(($passep2 == 7439)){
            $stmt = "UPDATE utilisateur SET challenge = 4 WHERE username = '$user'";
            $req = $DB->prepare($stmt);
            $req->bindValue(1, $user, PDO::PARAM_INT);  
            $req ->execute();
            $challengeNb = $req->fetch();;
            header("location:chapitre1/episode5-vigenere/vigenere.php"); 
        }else{
            $valid = false;
            $_SESSION['err'] = true;
            
            header("location:chapitre1/episode4-binaire/binaire.php"); 
        }     
      } 

      if (isset($_POST['ep5vigenere'])){     
        $passep5 = ($_POST['ep5vigenere']);
        if(($passep5 == "IXENTWXF" || $passep5 == "ixentwxf")){
            $stmt = "UPDATE utilisateur SET challenge = 5 WHERE username = '$user'";
            $req = $DB->prepare($stmt);
            $req->bindValue(1, $user, PDO::PARAM_INT);  
            $req ->execute();
            $challengeNb = $req->fetch();;
            header("location:chapitre1/episode6-machine/machine.php"); 
        }else{
            $valid = false;
            $_SESSION['err'] = true;

            header("location:chapitre1/episode5-vigenere/vigenere.php"); 
        }     
      }

      if (isset($_POST['ep6turing'])){     
        $passep6 = ($_POST['ep6turing']);
        if(($passep6 == "11111111" || $passep6 == 11111111)){
            $stmt = "UPDATE utilisateur SET challenge = 6 WHERE username = '$user'";
            $req = $DB->prepare($stmt);
            $req->bindValue(1, $user, PDO::PARAM_INT);  
            $req ->execute();
            $challengeNb = $req->fetch();;
            $_SESSION['winchap1'] = true;
            header("location:chapitre1/pageFinal/index.php"); 
        }else{
            $valid = false;
            $_SESSION['err'] = true;
            header("location:chapitre1/episode6-machine/machine.php");
        }     
      }


      


    if(isset(($_GET['nochallengeverif']))){
        if($Nbchallenge == "0"){
            header("location:principale.php?nochallenge=true");
        }else if($Nbchallenge == "1"){
            header("location:chapitre1/episode2/episode2.php");
        }else if($Nbchallenge == "2"){
            header("location:chapitre1/episode3/logic-doors.php");
        }else if($Nbchallenge == "3"){
            header("location:chapitre1/pacman/index.php");
        // }else{
        //     header("location:principale.php");
        // }
    }}


// echo "<pre>";
// var_dump($challengeNb); //"Bonjour , $challengeNb"; 
// echo "</pre>";
?>