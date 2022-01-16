<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    

    

    $date_debut=isset($_POST['date_debut'])?$_POST['date_debut']:"";
    $date_fin=isset($_POST['date_fin'])?$_POST['date_fin']:"";
    $pays=isset($_POST['Pays'])?$_POST['Pays']:"";
    $statut=isset($_POST['Statut'])?$_POST['Statut']:"";
    $Type=isset($_POST['Type'])?$_POST['Type']:"";
    $specialite=isset($_POST['specialite'])?$_POST['specialite']:"";
    $requete="insert into mission(Titre, Description, Pays ,Statut,Type,date_debut, date_fin,code_specialite) values(?,?,?,?,?,?,?,?)";
    $params=array($titre,$Description,$pays,$statut,$Type,$date_debut,$date_fin,$specialite) ;
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    header('location:missions.php');
?>