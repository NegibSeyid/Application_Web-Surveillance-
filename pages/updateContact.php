

<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idS=isset($_POST['idC'])?$_POST['idC']:0;
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $date_naissance=isset($_POST['date_naissance'])?$_POST['date_naissance']:"";

    $nationalite=isset($_POST['nationalite'])?$_POST['nationalite']:"";


    
    $requete="update contact set nom=?,prenom=?  ,date_naissance=? ,nationalite=?  where code_contact=?";

    $params=array($nom,$prenom,$date_naissance,$nationalite,$idS );

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:Contacts.php');
?>
