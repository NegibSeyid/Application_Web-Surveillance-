<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nomf=isset($_POST['nomS'])?$_POST['nomS']:"";
    $Domaine=isset($_POST['domaineS'])?strtoupper($_POST['domaineS']):"";
    
    $requete="insert into specialite(nom,Domaine) values(?,?)";
    $params=array($nomf,$Domaine);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:specialites.php');
?>