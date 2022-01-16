<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idS=isset($_POST['idS'])?$_POST['idS']:0;
    $nomS=isset($_POST['nomS'])?$_POST['nomS']:"";
    $DomaineS=isset($_POST['DomaineS'])?$_POST['DomaineS']:"";

    
    $requete="update specialite set nom=?,Domaine=? where code_specialite=?";

    $params=array($nomS,$DomaineS,$idS);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:specialites.php');
?>
