<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";

    $date_naissance=isset($_POST['date_naissance'])?$_POST['date_naissance']:"";

    $nationalite=isset($_POST['nationalite'])?$_POST['nationalite']:"";

    
    $requete="insert into contact(nom, prenom, date_naissance, nationalite) values(?,?,?,?)";
    $params=array($nom,$prenom,$date_naissance,$nationalite) ;
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:contacts.php');
?>