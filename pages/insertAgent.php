<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $Code=isset($_POST['Code'])?$_POST['Code']:"";

    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";

    $date_naissance=isset($_POST['date_naissance'])?$_POST['date_naissance']:"";

    $nationalite=isset($_POST['nationalite'])?$_POST['nationalite']:"";

   $specialite=isset($_POST['specialite'])?($_POST['specialite']):"";

   
   



    $requete="insert into agent(Code_identification, nom, prenom, date_naissance, nationalite, specialite) values(?,?,?,?,?,?)";
    $params=array( $Code,$nom,$prenom,$date_naissance,$nationalite,$specialite) ;
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:Agents.php');
?>