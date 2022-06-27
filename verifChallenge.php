<?php
    session_start();
    include_once('connexionBD.php');  
    if(@$_SESSION["autoriser"] != "oui"){
        header("location:connexion.php");
        exit();
    }  

$stmt = "SELECT challenge FROM utilisateur WHERE username=?";
$req = $DB->prepare($stmt);
$req->bindValue(1, $_SESSION['username'], PDO::PARAM_INT);  
$req ->execute();
$challengeNb = $req->fetch();
echo $challengeNb["challenge"];
$Nbchallenge = $challengeNb["challenge"];
// if($Nbchallenge == "0"){
//     header("location:principale.php?nochallenge=true");
// }else if($Nbchallenge == "1"){
//     header("location:chapitre1/episode2/episode2.php");
// }else if($Nbchallenge == "2"){
//     header("location:chapitre1/episode3/logic-doors.php");
// }else if($Nbchallenge == "3"){
//     header("location:chapitre1/pacman/index.php");
// }else{
//      header("location:principale.php");
// }





// echo "<pre>";
// var_dump($challengeNb); //"Bonjour , $challengeNb"; 
// echo "</pre>";
?>