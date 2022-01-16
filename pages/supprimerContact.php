<?php
    session_start();
            
            require_once('connexiondb.php');
            $idS=isset($_GET['idS'])?$_GET['idS']:0;

            $requeteS="select count(*) S from contact where code_contact=$idS";
            $resultatS=$pdo->query($requeteS);
            $tabCountS=$resultatS->fetch();
            $nbrS=$tabCountS['S'];
            
                $requete="delete from contact where code_contact=?";
                $params=array($idS);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:Contacts.php');
          
         
        
    
    
    
    
?>