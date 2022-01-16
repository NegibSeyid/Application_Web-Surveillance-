<?php
    require_once('identifier.php');
    require_once('connexiondb.php');

    $code=isset($_POST['idS'])?$_POST['idS']:0;
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $nationalite=isset($_POST['nationalite'])?$_POST['nationalite']:"";
    $date_naissance=isset($_POST['date_naissance'])?$_POST['date_naissance']:"";

    $mission=isset($_POST['code_mission'])?$_POST['code_mission']:"";


    
    $requete="update cible set nom=?,prenom=?, date_naissance=?, nationalite=?,code_mission=? where code_cible=?";

    $params=array($nom,$prenom,$date_naissance,  $nationalite, $mission,$code);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:cibles.php');
?>
